<?php

use App\Models\DutyRotationTable;
use App\Models\Floor;
use App\Models\User;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

function getBuyer()
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

  return $users[$index];
}

function getFloor()
{
  $floor = Floor::where('id', Auth::user()->floor_id)->first();
  return $floor->name;
}

function validateFilterRequest(Request $request): array
{
  $search = $request->string('search')->trim() ?? '';
  $period  = $request->period ?? 'today';
  return ['search' => $search, 'period' => $period];
}

function createVisitor(Request $request, $admin = false)
{
  $visitor = Visitor::create(Arr::except($request->validated(), ['reason']));
  $visitor->checkins()->create([
    'reason' => $request->reason,
  ]);
  if ($admin) {
    $visitor->update(['is_confirmed' => true]);
  }
  return $visitor;
}
