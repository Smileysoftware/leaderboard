<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class createTime extends FormRequest {
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
			'time'   => 'required|min:6',
			'runner' => 'required'
		];
	}

	public function messages()
	{
		return [
			'time.required'   => 'You must enter a time',
			'time.min'        => 'You must enter a time in the correct sss:mm format',
			'runner.required' => 'A runner must be chosen'
		];
	}
}
