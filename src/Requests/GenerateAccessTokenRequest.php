<?php


namespace Vexel\NotabeneLib\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenerateAccessTokenRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'client_id' => 'required|string',
            'client_secret' => 'required|string',
        ];
    }
}
