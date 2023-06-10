<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'post' => 'required|max:50',
            'font' => 'required',
        ];
    }

    /**
     * 新規投稿フォームに入力された内容を取得する
     */
    public function content(): string
    {
        return $this->input('post');
    }

    /**
     * 新規投稿フォームで選択されたフォントを取得する
     */
    public function font():string
    {
        return $this->input('font');
    }
}
