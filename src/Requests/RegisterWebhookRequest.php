<?php


namespace Vexel\NotabeneLib\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterWebhookRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            //A URL with HTTPS protocol
            'url' => 'required|string',

            //All of the query params needed appended in string format
            'params' => 'required|string|regex:/^\?([\w-]+(=[\w-]*)?(&[\w-]+(=[\w-]*)?)*)?$/i'

        ];
    }
}
