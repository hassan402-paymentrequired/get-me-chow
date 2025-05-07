<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasUlids;


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    /**
     * Get all of the orders for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class, 'owner_id');
    }


    /**
     * Get all of the delivery for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deliveries(): HasMany
    {
        return $this->hasMany(Order::class, 'receiver_id');
    }

    /**
     * Get all of the accountNumber for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function accountNumber(): HasMany
    {
        return $this->hasMany(AccountNumber::class);
    }

    /**
     * Get the floor that owns the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function floor(): BelongsTo
    {
        return $this->belongsTo(Floor::class);
    }

    /**
     * Get all of the messages for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
   public function chats(): HasMany
    {
        return $this->hasMany(Chat::class);
    }

    /**
     * Get all chats where the user is the buyer.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function buyerChats(): HasMany
    {
        return $this->hasMany(Chat::class, 'buyer_id');
    }
}
