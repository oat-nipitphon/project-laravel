<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membe extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'card_code',
        'fullname',
        'address',
        'tel',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
