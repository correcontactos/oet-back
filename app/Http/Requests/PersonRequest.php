<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class PersonRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function attributes()
	{
		return [
			'document' => 'Documento',
			'first_name' => 'Primer Nombre',
			'second_name' => 'Segundo Nombre',
			'last_name' => 'Apellidos',
			'address' => 'Dirección',
			'phone' => 'Teléfono',
			'city' => 'Ciudad'
	   ];
	}
	
	public function rules()
	{
	   return [
			'document' => 'required|unique:person|min:4|max:10',
			'first_name' => 'required|min:2|max:30',
			'second_name' => 'max:30',
			'last_name' => 'required|min:2|max:30',
			'address' => 'required|min:4|max:30',
			'phone' => 'required|min:7|max:30',
			'city' => 'required|min:3|max:30'
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