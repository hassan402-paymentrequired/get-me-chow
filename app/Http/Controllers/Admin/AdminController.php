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
        $users = User::whereNotNull('rotation_index')->orderBy('rotation_index')->get();
        $currentBuyer = getBuyer();
        return view('admin.settings', compact('currentBuyer', 'users'));
    }
}
