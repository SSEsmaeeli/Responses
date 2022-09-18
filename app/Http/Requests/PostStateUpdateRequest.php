<?php

namespace App\Http\Requests;

use App\States\Post\PostBaseState;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostStateUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'state' => ['required', 'string', Rule::in(PostBaseState::getAllStates())],
        ];
    }
}
