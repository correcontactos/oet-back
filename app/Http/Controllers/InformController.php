<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class InformController extends BaseController
{
    public static function index()
    {
		/*$inform = DB::table('vehicle as v')
			->join('vehicle_person as vd', 'v.id', '=', 'vd.vehicle_id')
				->where('vd.type', '=', 'driver')
			->join('person as d', 'vd.person_id', '=', 'd.id')
			->join('vehicle_person as vo', 'v.id', '=', 'vo.vehicle_id')
				->where('vo.type', '=', 'owner')
			->join('person as o', 'vo.person_id', '=', 'o.id')
			->select('v.plate', 'v.mark', DB::raw('CONCAT(d.first_name, \' \', COALESCE(d.second_name,\'\'), \' \', d.last_name) as driver'), DB::raw('CONCAT(o.first_name, \' \', COALESCE(o.second_name,\'\'), \' \', o.last_name) as owner'))
			->get();*/
		
		// return json_encode(['data'=>$inform]);
	    	$inform = 'testing';
		return ['data'=>$inform];
    } 
}
