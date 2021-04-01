<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreIssueRequest extends FormRequest
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
          'item_name' => '',
					'description' => '',
					'date' => '',
					'location' => '',
					'raised_by' => '',
					'department' => '',
					'status' => '',
					'solved_by' => '',
					'action_taken' => '',
					'cause_of_breakdown' => '',
					'engineers_comment' => ''
        ];
    }

    public function messages()
    {
        return [
            
        ];
    }
}
