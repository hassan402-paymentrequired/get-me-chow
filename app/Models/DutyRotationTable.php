<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DutyRotationTable extends Model
{
    /** @use HasFactory<\Database\Factories\DutyRotationTableFactory> */
    use HasFactory, HasUlids;
}
