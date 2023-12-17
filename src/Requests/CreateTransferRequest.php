<?php


namespace Vexel\NotabeneLib\Requests;

class CreateTransferRequest extends \Illuminate\Foundation\Http\FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
         'transactionAmount'=>'required|decimal',

        ];
    }
}
