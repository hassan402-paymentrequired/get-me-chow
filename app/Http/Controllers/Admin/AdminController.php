<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DutyRotationTable;
use App\Models\User;
use Carbon\Carbon;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.index');
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
        $rotation = DutyRotationTable::first();
        $startDate = Carbon::parse($rotation->start_date);
        $today = Carbon::today();
        $daysPassed = $startDate->diffInDays($today);

        $users = User::whereNotNull('rotation_index')->orderBy('rotation_index')->get();

        if ($users->isEmpty()) {
            return 'No buyers available';
        }

        $index = floor($daysPassed / 2) % $users->count();

        $currentBuyer = $users[$index];
        return view('admin.settings', compact('currentBuyer', 'users'));
    }
}
