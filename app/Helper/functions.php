<?php

use App\Models\DutyRotationTable;
use App\Models\User;
use Carbon\Carbon;

function getBuyer() {
  $rotation = DutyRotationTable::first();
        $startDate = Carbon::parse($rotation->start_date);
        $today = Carbon::today();
        $daysPassed = $startDate->diffInDays($today);

        $users = User::whereNotNull('rotation_index')->orderBy('rotation_index')->get();

        if ($users->isEmpty()) {
            return 'No buyers available';
        }

        $index = floor($daysPassed / 2) % $users->count();

        return $users[$index];
}