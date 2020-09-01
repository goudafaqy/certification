<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateProfile extends FormRequest
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

        $user = Auth::user();
        return [
            'name_ar' => ['required', 'string', 'max:255'],
            'name_en' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'national_id' => ['required', 'numeric', Rule::unique('users')->ignore($user->id)],
            'mobile' => 'required|size:10', //regex:/(966)[0-9]{9}
            'birth_date' => ['required', 'date'],
            'gender' => ['required'],
            'education' => ['required']
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'mobile.regex' => 'صيغه الجوال غير صحيحه مثال : 966500000000',
            'mobile.size' => 'صيغه الجوال غير صحيحه',
            'national_id.numeric' => 'هذا الحقل يجب ان يكون رقما',
        ];
    }
}
