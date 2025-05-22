<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVisitorRequest;
use App\Models\DutyRotationTable;
use App\Models\User;
use App\Models\Visitor;
use App\Notifications\VisitorArrivedNotification;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        $data = $this->getDashboardData($request);
        // dd($data);
        // $user = auth()->user();
        //  $user->notify(new VisitorArrivedNotification()); 
        return view('admin.index', compact('data'));
    }

    public function users()
    {
        $users = User::withCount('orders')->get()
            ->groupBy(function ($user) {
                return $user->is_buyer ? 'buyers' : 'users';
            })->toArray();
        return view('admin.users', compact('users'));
    }

    public function changeBuyer(Request $request)
    {
        $buyer = User::where('current_buyer', true)->first();
        $buyer->current_buyer = false;
        $buyer->save();
        $user = User::find($request->buyer);
        $user->current_buyer = true;
        $user->save();
        return back()->with('success', 'Buyer Changed Successfully');
    }

    public function settings()
    {
        $users = User::whereNotNull('rotation_index')->orderBy('rotation_index')->get();
        // $currentBuyer = getBuyer();
        $currentBuyer = User::where('current_buyer', true)->first();
        $user =  auth()->user();
        return view('admin.settings', compact('currentBuyer', 'users', 'user'));
    }

    public function visitors(Request $request)
    {
        $visitors = $this->filterVisitor($request)
            ->whereHas('latestCheckin', function ($query) use ($request) {
                $query->whereDate('created_at', today())
                    ->when($request->sort_by === 'check_in', function ($q) {
                        $q->whereNull('check_out_time') // Only visitors who are checked in
                            ->orderBy('check_in_time');
                    })
                    ->when($request->sort_by === 'check_out', function ($q) {
                        $q->whereNotNull('check_out_time') // Only visitors who are checked out
                            ->orderBy('check_out_time');
                    });
            })
            ->where('is_confirmed', true)
            ->orderBy('created_at', 'desc')
            ->paginate();
        return view('admin.visitors.index', compact('visitors'));
    }

    public function getVisitorsRequest()
    {
        $visitors = Visitor::where('is_confirmed', false)->with(['user', 'latestCheckin.user'])->get();
        // dd($visitors);
        return view('admin.visitors.request', compact('visitors'));
    }
    public function visitorsHistory(Request $request)
    {
        $visitors = $this->filterVisitor($request)
            ->whereDate('created_at', '<', Carbon::today())
            ->where('is_confirmed', true)
            ->paginate();
        return view('admin.visitors.history', compact('visitors'));
    }

    public function acceptVisitorRequest(Request $request, Visitor $visitor)
    {
        if ($request->action === 'accept') {
            $visitor->is_confirmed = true;
            $visitor->save();
            return to_route('admin.visitors.index')->with('success', 'Visitor accepted successfully.');
        }
        dd('hshs');
    }

    public function rejectVisitorRequest(Request $request, Visitor $visitor)
    {
        $visitor->is_confirmed = false;
        $visitor->delete();
        return to_route('admin.visitors.index');
    }

    public function createVisitor()
    {
        return view(
            'admin.visitors.create',
            [
                'users' => User::where('is_buyer', false)->where('is_admin', false)->get()
            ]
        );
    }

    public function storeVisitor(StoreVisitorRequest $request)
    {
        try {
            $visitor = createVisitor($request, true);
            return to_route('admin.visitors.index', $visitor)->with('success', 'VisitOrder added successfully');
        } catch (Exception $e) {
            Log::error($e);
            return back()->with('error', 'Something went wrong');
        }
    }

    public function checkout(Request $request, Visitor $visitor)
    {
        try {
            // dd($visitor);
            $visitor->latestCheckin->update(['check_out_time' => now()]);
            return to_route('admin.visitors.index')->with('success', 'Visitor checked out successfully');
        } catch (Exception $e) {
            Log::error($e);
            return back()->with('error', 'Something went wrong');
        }
    }


    public function show(User $user)
    {
        // Load the user with all visitor check-ins (past and current)
        $user = $user->load([
            'orders' => function ($query) {
                $query->latest();
            },
            'visitorCHeck' => function ($query) {
                $query->with('visitor') // Load visitor details
                    ->latest(); // Order by most recent first
                // ->withTrashed(); // Include soft-deleted if applicable
            }
        ])->loadCount([
            'orders',
            'visitorCHeck',
            'visitorCHeck as current_visitors_count' => function ($query) {
                $query->whereNull('check_out_time'); // Currently checked-in visitors
            },
            'visitorCHeck as todays_visitors_count' => function ($query) {
                $query->whereDate('created_at', today());
            }
        ]);

        // Separate current and past visitors for the view
        $currentVisitors = $user->visitorCHeck
            ->whereNull('check_out_time');

        $pastVisitors = $user->visitorCHeck
            ->whereNotNull('check_out_time');
        // dd($pastVisitors);
        return view('admin.users.show', compact(
            'user',
            'currentVisitors',
            'pastVisitors'
        ));
    }
}
