<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UserValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        $id     = intval($this->route('id'));
        $item   = NULL;
        if($id > 0) {
            $item = User::find($id);
        }
        return [
			'first_name'                => 'bail|required|string|min:1|max:255',
            'middle_name'               => 'bail|nullable|string|max:255',
			'last_name'                 => 'bail|required|string|min:1|max:255',
            'email'                     => 'bail|nullable|email|unique:users,email'.($id > 0 ? ','.$item->id.',id' : ''),
            'r_id'                      => 'bail|required|integer|min:0',
			'c_id'                      => 'bail|required|integer|min:0',
            'ug_id'                     => 'bail|required|integer|min:0',
            'd_id'                      => 'bail|required|integer|min:0',
			'date_hired'                => 'bail|required',
            'es_id'                     => 'bail|nullable|integer',
            'is_id'                     => 'bail|nullable|integer',
            'fr_id'                     => 'bail|nullable|integer',
            'job_level'                 => 'bail|nullable|integer',
        ];
    }

		/**
		 * Get custom attributes for validator errors.
		 *
		 * @return array
		 */
		public function attributes()
		{
			return [
				'first_name'                => 'First Name',
                'middle_name'               => 'Middle Name',
			    'last_name'                 => 'Last Name',
                'email'                     => 'Email',
                'r_id'                      => 'Role',
			    'c_id'                      => 'Company',
                'ug_id'                     => 'Department',
                'd_id'                      => 'Designation',
			    'date_hired'                => 'Date Hired',
                'es_id'                     => 'Employee Status',
                'is_id'                     => 'Immediate Supervisor',
                'fr_id'                     => 'Final Rater',
                'job_level'                 => 'Job Level',
			];
		}
}
