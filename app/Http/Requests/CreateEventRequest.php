<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * SignupRequest
 */
class CreateEventRequest extends FormRequest
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
        if ($this->recurrence_on == 1) {
            return [
                'title' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'recurrence_on' => 'required',
                "repeat_on" => "required",
                "skip_day" => "required"
            ];
        } else {
            return [
                'title' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
                'recurrence_on' => 'required',
                "repeat_index" => "required",
                "repeat_day" => "required",
                "repeat_criteria" => "required"
            ];
        }
    }

    /**
     * Method messages
     *
     * @return void
     */
    public function messages()
    {
        return [
            'title.required' => 'Please enter title',
            'start_date.required' => 'Please start date',
            'end_date.required' => 'Please end date',
            'recurrence_on.required' => 'Please choose recurrence',
            'repeat_on.required' => 'Please choose repeat on',
            'skip_day.required' => 'Please choose day',
            'repeat_index.required' => 'Please choose repeat index',
            'repeat_day.required' => 'Please choose repeat day',
            'repeat_criteria.required' => 'Please choose criteria',
        ];
    }
}
