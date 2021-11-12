<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class VehiclePerson extends Authenticatable
{
    protected $table = 'vehicle_person';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'vehicle_id',
        'person_id'
    ];

    public $timestamps = false;
}
