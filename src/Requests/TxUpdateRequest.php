<?php


namespace Vexel\NotabeneLib\Requests;

class TxUpdateRequest extends \Illuminate\Foundation\Http\FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
//            /** Identifier of the Transfer
//             *  @example 123e4567-e89b-12d3-a456-426614174000
//             */
//            'id'=>'required|uuid',

            /** Beneficiary VASP Notification Email */
            'notificationEmail'=>'string|nullable',

            /**  Transaction txHash  */
            'txHash'=>'string|nullable',

            'destination'=>'string|nullable',

        ];
    }
}
