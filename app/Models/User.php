<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'user_type',
        'is_admin',
        'bio',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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

    public function followings(){
        return $this->belongsToMany(User::class, "follower_user", "follower_id", "user_id")->withTimestamps();
    }

    public function followers(){
        return $this->belongsToMany(User::class, "follower_user", "user_id", "follower_id")->withTimestamps();
    }

    public function follows(User $user){

        return $this->followings->contains($user);
        //we can check if the current user follows or not a certain user
        //by checking if a $user exists in the followings table , this will return a boolean
    }

    public function getImageURL(){
        if($this->image){
            return url('storage/'. $this->image);
        }
        return "https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario";
    }
}
