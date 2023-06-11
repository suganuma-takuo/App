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
            'record.date' => 'required|date|max:20',
            'record.time_in' => 'required|date_format:H:i|max:20',
            'record.time_out' => 'required|date_format:H:i|max:20',
            'record.break_in' => 'required|date_format:H:i|max:20',
            'record.break_out' => 'required|date_format:H:i|max:20',
        ];
    }
}
