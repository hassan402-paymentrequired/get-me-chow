<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasUlids;

    protected $fillable = [
        'user_id',
        'title',
        'message',
        'type',
        'is_read',
    ];

   
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
}
