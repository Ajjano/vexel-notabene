<?php


namespace Vexel\NotabeneLib\Requests;

class RegisterAddressRequest extends \Illuminate\Foundation\Http\FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            //Decentralized Identifier
            'vaspDID' => 'required|string|regex:/^did:[a-zA-Z0-9]*:.*$/i',

            //Asset symbol (BTC,ETH)
            'asset'=>'required|string',

            'address'=>'required|string',
            'customerRef'=>'required|string'


        ];
    }
}
