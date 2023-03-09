<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSkillRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'min:3', 'max:20'],
            'slug' => ['required', Rule::unique('skills')->ignore($this->skill)],
            // 'slug' => 'required|unique:skills,slug,' . $this->skill->id,
        ];
    }
}
