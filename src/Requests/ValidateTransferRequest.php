<?php


namespace Vexel\NotabeneLib\Requests;

class ValidateTransferRequest extends \Illuminate\Foundation\Http\FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'transactionAsset' => 'required|string',
            'destination' => 'required|string',
            'transactionAmount' => 'required|string|regex:/^0*[1-9][0-9]*$/i',
            'originatorVASPdid' => 'required|string|regex:/^did:[a-zA-Z0-9]*:.*$/i',
            'originatorEqualsBeneficiary' => 'required|boolean',
            'beneficiaryVASPdid' => 'string|nullable|regex:/^did:[a-zA-Z0-9]*:.*$/i',
            'beneficiaryVASPname' => 'string|nullable',
            'beneficiaryName' => 'string|nullable',
            'beneficiaryAccountNumber' => 'string|nullable',
            'beneficiaryAddress' => 'array|nullable', // beneficiaryAddress object
            'beneficiaryProof' => 'array|nullable', // beneficiaryProof object
            'travelRuleBehavior' => 'boolean|nullable',
            'network' => 'string|nullable',
        ];
    }
}
