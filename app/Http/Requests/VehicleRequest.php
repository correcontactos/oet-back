<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class VehicleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function attributes()
	{
		return [
			'plate' => 'Placa',
			'color' => 'Color',
			'mark' => 'Marca',
			'type' => 'Tipo'
	   ];
	}
	
	public function rules()
	{
	   return [
			'plate' => 'required|unique:vehicle|min:2|max:10',
			'color' => 'required|min:2|max:30',
			'mark' => 'required|min:4|max:30',
			'type' => 'required'
	   ];
	}
	
	public function failedValidation(Validator $validator)
	{
		$msg = '';
		$data = json_decode($validator->errors());
	   
		foreach($data as $key)
		{
		   foreach ($key as $id => $value)
		   $msg .= $value.PHP_EOL;
		}
	   
		throw new HttpResponseException(response()->json([
			'success'   => false,
			'message'   => 'Validation errors',
			'error'      => $msg
		])); 
	}
}