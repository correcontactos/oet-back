<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Vehicle extends Authenticatable
{
    protected $table = 'vehicle';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'plate',
        'color',
        'mark',
        'type'
    ];

    public $timestamps = false;
}
