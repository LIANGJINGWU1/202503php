<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize():bool{
        return true;
    }
    public function rules(): array{
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author_id' => 'required|exists:authors,id',
        ];
    }

    public function messages():array{
        return[
            'title.required' => '标题不能为空',
            'title.string' => '标题必须是字符串',
            'title.max' => '标题不能超过 :max 个字符',
            'content.required' => '内容不能为空',
            'content.string' => '内容必须是字符串',
            'author_id.required' => '作者不能为空',
            'author_id.exists' => '作者不存在',
        ];
    }
}
