<?php


namespace Vexel\NotabeneLib\Requests;

class FullyValidateTransferRequest extends \Illuminate\Foundation\Http\FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
          'transactionAsset'=>'required|string',
            'transactionAmount'=>'required|string|regex:/^0*[1-9][0-9]*$/i',
            'transactionBlockchainInfo'=>'required|array',
            'transactionBlockchainInfo.*.destination'=>'required|string',

        ];
    }
}
