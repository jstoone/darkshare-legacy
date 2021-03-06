<?php namespace DarkShare\Http\Requests;

use DarkShare\Http\Requests\Request;

class UrlsRequest extends Request {

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
			'destination' => 'required|url',
		];
	}

}
