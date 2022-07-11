<?php namespace App\Http\Requests;
use App\Http\Requests\Request;
class ContactRequest extends Request {
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
            'name'=>'required|string',
            'phone'=>'required|numeric',
            'email' =>'required',
            'content'=>'required'
		];
	}
	public function messages()
	{
		return [
			'name|email|phone|content.required' => 'Bạn chưa nhập tên danh mục',
            'phone.numeric' => 'Không dùng định dạng',
		];
	}
}