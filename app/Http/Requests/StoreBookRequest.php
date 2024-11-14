<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|dimensions:min_width=1,min_height=1',
            'author_name' => 'required',
            'published_date' => 'required|date',
        ];
    }
}
