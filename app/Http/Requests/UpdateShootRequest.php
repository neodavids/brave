<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShootRequest extends FormRequest
{
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
          'name' => 'required',
					'start_date' => 'required',
					'end_date' => 'required',
					'status' => 'required',
					'producer_1' => 'required',
					'producer_2' => 'required',
					'producer_3' => 'required',
					'producer_4' => 'required',
					'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Name is Required',
						'start_date.required'=>'This is required',
						'end_date.required'=>'You must set the end date',
						'status.required'=>'This is a reqiured Field',
						'producer_1.required'=>'This is a reqiured field',
						'producer_2.required'=>'This is a reqiured field',
						'producer_3.required'=>'This is a reqiured field',
						'producer_4.required'=>'This is a reqiured field',
						'description.required'=>'This is a reqiured field'
        ];
    }
}
