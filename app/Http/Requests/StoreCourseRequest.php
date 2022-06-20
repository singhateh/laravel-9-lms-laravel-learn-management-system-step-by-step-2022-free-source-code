<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourseRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'nullable',
            'summary' => 'nullable',
            'requirement' => 'nullable|string',
            'category_id' => 'required|integer',
            'teacher_id' => 'required|integer',
            'status' => 'required|string',
            'price' => 'required|integer',
            'duration' => 'string|required',
            'started_at' => 'required|date',
            'finished_at' => 'required|date',
            'image' => 'nullable|image',
        ];
    }
}
