<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class VisitorCheckIn extends Model
{
    use HasUlids;

    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }
}
