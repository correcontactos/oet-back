<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Person;
use App\Models\Vehicle;
use App\Models\VehiclePerson;
use App\Http\Requests\PersonRequest;

class PersonController extends BaseController
{
    public static function store(PersonRequest $request)
    {
		$person = Person::insertGetId
		(
			[
				'document' => $request->document,
				'first_name' => $request->first_name,
				'second_name' => $request->second_name,
				'last_name' => $request->last_name,
				'address' => $request->address,
				'phone' => $request->phone,
				'city' => $request->city
			]
		);
		
		$vehicleperson = VehiclePerson::insertGetId
		(
			[
				'vehicle_id' => Vehicle::max('id'),
				'person_id' => $person,
				'type' => $request->type
			]
		);
		
		return [
			'person_id' => $person,
			'vehicle_person_id' => $vehicleperson
		];
    } 
}
