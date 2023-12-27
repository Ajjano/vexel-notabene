<?php


namespace Vexel\NotabeneLib\Controllers;


use Illuminate\Http\Client\Request;
use Illuminate\Http\Response;
use Vexel\NotabeneLib\Requests\FullyValidateTransferRequest;
use Vexel\NotabeneLib\Requests\RegisterAddressRequest;
use Vexel\NotabeneLib\Requests\TxUpdateRequest;
use Vexel\NotabeneLib\Requests\ValidateTransferRequest;
use Vexel\NotabeneLib\Transaction;


class TransactionController
{

    private Transaction $transaction;





    public function __construct()
    {
        $this->transaction = new Transaction(config('notabene.host'));
    }





    /**
     * Test method
     *
     *
     * @param ValidateTransferRequest $request
     * @return \Illuminate\Http\JsonResponse
     *
     */
    public function validateTransfer(ValidateTransferRequest $request)
    {
        $res = $this->transaction->validateTransfer($request->all());

        if (!$res) {
            return response()->json([
                'status' => 'error',
                'data' => [],
                'msg' => 'some errors'
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => 'ok',
            'data' => $res,
            'msg' => ''
        ], Response::HTTP_OK);

    }





    /**
     * Test
     *
     * @param FullyValidateTransferRequest $request
     */
    public function fullyValidateTransfer(FullyValidateTransferRequest $request)
    {
        $this->transaction->txValidateFull($request->all());
    }





    public function index(Request $request)
    {
        //Phase 1 - SPARK
        //If you do not know who the counterparty of the transaction is, you can still create the TR transfer by enabling the skipBeneficiaryDataValidation flag true.
        //  $request->merge(['skipBeneficiaryDataValidation' => true]);


        $transfer = $this->transaction->txCreate($request->all());

        //Phase 2 - AMPLIFY
    }





    /**
     * Update a transfer with the passed parameters.
     * @param TxUpdateRequest $request
     * @param string $id Identifier of the Transfer @example 123e4567-e89b-12d3-a456-426614174000
     */
    public function update(TxUpdateRequest $request, string $id)
    {
        $request->merge(['id' => $id]);
        $this->transaction->addTransactionHash($request->all());
    }





    /**
     * @param RegisterAddressRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function registerAddress(RegisterAddressRequest $request)
    {
        $res = $this->transaction->registerAddress($request->all());

        if (isset($res['err'])) {
            return response()->json([
                'status' => 'error',
                'msg' => $res['err']['message']
            ], $res['err']['code']);
        }


        return response()->json([
            'status' => 'ok',
            'data' => $res
        ], Response::HTTP_OK);
    }
}


