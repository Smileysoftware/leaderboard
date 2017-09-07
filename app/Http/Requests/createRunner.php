<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createRunner extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'firstname' => 'required|min:2',
			'surname'   => 'required|min:2',
			'dob'       => 'required|min:8',
			'email'     => 'required|unique:users',
		];
	}

	public function messages()
	{
		return [
			'firstname.required' => 'You must enter a firstname',
			'firstname.min'      => 'You must enter a firstname with two or more characters',

			'surname.required' => 'You must enter a surname',
			'surname.min'      => 'You must enter a surname with two or more characters',

			'dob.required' => 'You must enter a date of birth',
			'dob.min'      => 'You must enter a date of birth with eight or more characters',

			'email.required' => 'You must enter a email',
			'email.unique'   => 'A user with that email address already exists',
		];
	}
}
