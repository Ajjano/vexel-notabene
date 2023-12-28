<?php


namespace Vexel\NotabeneLib\Controllers;


use Illuminate\Http\Client\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Vexel\NotabeneLib\Requests\FullyValidateTransferRequest;
use Vexel\NotabeneLib\Requests\GenerateAccessTokenRequest;
use Vexel\NotabeneLib\Requests\RegisterAddressRequest;
use Vexel\NotabeneLib\Requests\TxUpdateRequest;
use Vexel\NotabeneLib\Requests\ValidateTransferRequest;
use Vexel\NotabeneLib\Resources\TfSimpleVaspsResource;
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
     * Fully Validate your transfer with this method
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
     * Registers the blockchain address of a customer in your address book.
     *
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





    /**
     * Returns a list of VASPs. VASPs can be searched and sorted and results are paginated.
     *
     * @param TfSimpleVaspsResource $request
     * @return JsonResponse
     */
    public function listVasps(TfSimpleVaspsResource $request): JsonResponse
    {
        $res = $this->transaction->tfSimpleVASPs($request->get('q'));

        if (isset($res['err'])) {
            return response()->json([
                'status' => 'error',
                'msg' => $res['err']['message']
            ], $res['err']['code']);
        }

        /**
         * A user resource.
         *
         * @status 200
         */
        return response()->json([
            'status' => 'ok',
            'data' => $res
        ], Response::HTTP_OK);

    }





    /**
     * Returns a generated accessToken
     *
     * @param GenerateAccessTokenRequest $request
     * @return JsonResponse
     */
    public function generateAccessToken(GenerateAccessTokenRequest $request)
    {
        $request->merge([
            'grant_type' => 'client_credentials',
            'audience' => env('NOTABENE_STATE') === 'prod' ? config('notabene.host') : config('notabene.host_test')
        ]);

        $res = $this->transaction->generateAccessToken($request->all());

        if (isset($res['err'])) {
            return response()->json([
                'status' => 'error',
                'msg' => $res['err']['message']
            ], $res['err']['code']);
        }


        return response()->json([
            'status' => 'ok',
            'data' => [
                /**
                 * Access token
                 */
                'access_token' => $res['access_token'],
            ],
            'msg' => 'Valid for ' . $res['expires_in'] . ' sec'
        ], 200);


    }





//    public function receiveTravelRuleMsg()
//    {
//        //automatically confirm that a blockchain address is yours
//    }
}


