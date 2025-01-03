<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class User extends Authenticatable
{

    const USER_ROLE = 1;
    const ADMIN_ROLE = 2;
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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
    
    public function products(){
        return  $this->hasMany(Product::class);
    }
    
    public function carts(){
        return $this->hasMany(Carts::class);
    }

    public function senderMessage(){
        return $this->hasMany(Message::class, 'sender_id');
    }

    public function receiverMessage(){
        return $this->hasMany(Message::class, 'receiver_id');
    }

    public function history(){
        return $this->hasMany(History::class);
    }

    
}
