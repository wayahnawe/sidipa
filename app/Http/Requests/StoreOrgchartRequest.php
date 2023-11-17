<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;


class StoreOrgchartRequest extends FormRequest
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
            'txtSubdit' => 'required|min:3|unique:org_chart,nama_subdit|max:100',
            'txtPrefix' => 'required|min:3|max:10',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'txtSubdit.required' => 'Satker/Subdit wajib diisi',
            'txtSubdit.min' => 'Nama Satker/Subdit minimal 3 karakter',
            'txtSubdit.max' => 'Nama Satker/Subdit maksimal 50 karakter',
            'txtSubdit.unique' => 'Nama Satker/Subdit sudah terdaftar',
            'txtPrefix.required' => 'Prefix Wajib diisi',
            'txtPrefix.min' => 'Nama Prefix minimal 3 karakter',
            'txtPrefix.max' => 'Nama Prefix maksimal 10 karakter',
        ];
    }
    /**
     * Get the error messages for the defined validation rules.*
     * @return array
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors()->toArray(),
            'status' => '0'
        ]));

        // return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
    }
}
