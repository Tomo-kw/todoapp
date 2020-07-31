<?php

namespace App\Http\Requests;

use App\Task;
use Illuminate\Foundation\Http\FormRequest;

class EditTask extends FormRequest
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
     * 編集欄のチェック
     *
     * @return array
     */
    public function rules()
    {
        return [
            'content' => 'required|max:20',
            'due_date' => 'required|after:yesterday',
        ];
    }

    public function attributes()
    {
        return [
            'content' => 'やること',
            'due_date' => '期限',
        ];
    }
}
