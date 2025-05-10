<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    /** @use HasFactory<\Database\Factories\VisitorFactory> */
    use HasFactory, HasUlids;


    public function user()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }


    public function checkins()
    {
        return $this->hasMany(VisitorCheckIn::class);
    }
    public function latestCheckin()
    {
        return $this->hasOne(VisitorCheckIn::class)->latestOfMany();
    }
}
