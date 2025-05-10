<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVisitorRequest;
use App\Models\DutyRotationTable;
use App\Models\User;
use App\Models\Visitor;
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

    public function settings()
    {
        $users = User::whereNotNull('rotation_index')->orderBy('rotation_index')->get();
        $currentBuyer = getBuyer();
        return view('admin.settings', compact('currentBuyer', 'users'));
    }

    public function visitors(Request $request)
    {
        $visitors = $this->filterVisitor($request)->paginate();
        return view('admin.visitors.index', compact('visitors'));
    }

    public function getVisitorsRequest()
    {
        $visitors = Visitor::where('is_confirmed', false)->with(['user', 'latestCheckin'])->get();
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
}
