<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVisitorRequest;
use App\Models\User;
use App\Models\Visitor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class VisitorsController extends Controller
{
    public function scan()
    {
        return  redirect()->to(URL::temporarySignedRoute(
            'visitor.manual.check.in',
            now()->addMinutes(60)
        ));
    }

    public function generateQrCode()
    {
        $qrCode = QrCode::size(300)
            ->merge(asset('/storage/images/log-in.png'), .5, true)
            ->generate(url(route('visitor.scan.des')));
        return view('qrcode', compact('qrCode'));
    }

    public function validateSignature(Request $request)
    {
        if (! $request->hasValidSignature()) {
            abort(401);
        }
        $users = User::select(['first_name', 'id', 'last_name'])
            ->get();
        return view('visitors.manual-create', compact('users'));
    }

    public function searchForVisitor(Request $request)
    {
        $visitors = [];
        if ($request->has('q')) {
            $visitors = \App\Models\Visitor::where('name', 'like', '%' . $request->q . '%')
                ->orWhere('email', 'like', '%' . $request->q . '%')
                ->orWhere('phone', 'like', '%' . $request->q . '%')
                ->with(['user', 'checkins.user'])
                ->get();
        }
        return response()->json(['visitors' => $visitors]);
    }

    public function sendVisitRequest(StoreVisitorRequest $request)
    {
        try {
            $visitor = createVisitor($request);
            return to_route('visitor.pending.request', $visitor)->with('success', 'Visit request sent successfully');
        } catch (Exception $e) {
            Log::error($e);
            return back()->with('error', 'Something went wrong');
        }
    }

    public function PendingVisitRequest(Visitor $visitor)
    {
        return view('visitors.pending-request', compact('visitor'));
    }

    public function show(Visitor $visitor)
    {
        $visitor = $visitor->load(['user', 'checkins']);
        return view('visitors.show', compact('visitor'));
    }

    public function resendVisitRequest(Request $request)
    {
        $visitor = Visitor::find($request->visitor_id);
        $visitor->checkins()->create([
            'reason' => $request->reason,
            'employee_id' => $request->employee_id
        ]);
        $visitor->is_confirmed = false;
        $visitor->save();
        return to_route('visitor.pending.request', $visitor)->with('success', 'Visit request sent successfully');
    }
}
