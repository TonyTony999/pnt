<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'bio',
        'age',
        'height',
        'weight',
        'sexually_active',
        'sex_frequency',
        'birth_control',
        'anal_sex'

    ];

    public function user(){
        return $this->belongsTo(User::class);
        /*Here we are setting a relationship of one to one between
        an idea and a user, an idea will always belong to a user */
    }
}
