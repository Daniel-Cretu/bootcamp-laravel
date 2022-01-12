<?php

namespace  App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactUsRequest extends FormRequest
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
            'department' => ['array', Rule::in(['administration', 'accounting', 'tehnicalDepartment', 'logistic']),],
            'districts' => ['required', 'array', 'min:1', 'in:chishinau,orhei,straseni'],
            'message' => ['required', 'string', 'min:10'],
            'readTerms' => ['required'],
        ];
    }
}
