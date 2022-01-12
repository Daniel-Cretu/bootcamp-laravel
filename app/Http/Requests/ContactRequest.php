<?php

namespace  App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize():bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'email' => ['string', 'email', 'required'],
            'name' => ['min:2', 'required', 'string'],
            'message' => ['required', 'string', 'min:10'],
            'readTerms' => ['required'],
        ];
    }
}
