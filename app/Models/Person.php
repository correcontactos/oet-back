<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Person extends Authenticatable
{
    protected $table = 'person';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'document',
        'first_name',
        'second_name',
        'last_name',
        'address',
        'phone',
        'city'
    ];

    public $timestamps = false;
}
