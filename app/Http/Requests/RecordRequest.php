<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RecordRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'record.date' => 'required|date|before_or_equal:today',
            'record.time_in' => 'required',
            'record.time_out' => 'nullable|after:record.time_in|after:record.break_out',
            'record.break_in' => 'nullable||after:record.time_in',
            'record.break_out' => 'nullable|after:record.break_in',
            'record.remarks' => 'nullable|string|max:20',

        ];
    }
}
