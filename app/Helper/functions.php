<?php

use App\Models\DutyRotationTable;
use App\Models\Floor;
use App\Models\Order;
use App\Models\User;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
    'employee_id' => $request->employee_id
  ]);
  if ($admin) {
    $visitor->update(['is_confirmed' => true]);
  }
  return $visitor;
}






function storageAppendInst($file_path, $data)
{
  return Storage::disk('public_uploads')->append($file_path, $data);
}

function saveFileUpload(Request $request, string $target = 'image')
{
  if ($request->hasFile($target)) {
    $file_name = $request->$target->getClientOriginalName();
    $file_type = $request->$target->getClientOriginalExtension();
    $storage = Storage::disk('public_uploads')->putFileAs($request->$target, time() . '_' . $file_name);
  }

  return $storage ??= null;
}

function hasBooked()
{
  return Order::where('owner_id', Auth::id())->whereDate('created_at', Carbon::today())->exists();
}
