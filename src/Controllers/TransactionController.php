<?php


namespace Vexel\NotabeneLib\Controllers;


use Illuminate\Http\Client\Request;
use Vexel\NotabeneLib\Requests\FullyValidateTransferRequest;
use Vexel\NotabeneLib\Requests\ValidateTransferRequest;
use Vexel\NotabeneLib\Transaction;

class TransactionController
{

    private Transaction $transaction;





    public function __construct()
    {
        $this->transaction = new Transaction(config('notabene.host'));
    }





    public function validateTransfer(ValidateTransferRequest $request)
    {
        $this->transaction->validateTransfer($request->all());
    }





    /**
     * @SWG\Get(
     *     path="/txValidateFull",
     *     summary="Fully validate transfer",
     *     tags={"Validations"},
     *     @SWG\Response(response=200, description="Successful operation"),
     *     @SWG\Response(response=400, description="Invalid request")
     * )
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
}


