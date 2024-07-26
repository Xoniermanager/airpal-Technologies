<?php 
namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait ExceptionHandle
{
  
public function failedValidation(Validator $validator)
{
   throw new HttpResponseException(response()->json([
     'success'   => false,
     'message'   => 'Validation errors',
     'errors'      => $validator->errors(),
   ],400));
}

}