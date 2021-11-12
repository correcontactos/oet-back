<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use App\Http\Requests\VehicleRequest;

class VehicleController extends BaseController
{
    public static function store(VehicleRequest $request)
    {
		return Vehicle::insertGetId
		(
			[
				'plate' => $request->plate,
				'color' => $request->color,
				'mark' => $request->mark,
				'type' => $request->type
			]
		);
    } 
}
