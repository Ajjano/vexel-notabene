<?php


namespace Vexel\NotabeneLib\Controllers;


use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Vexel\NotabeneLib\Requests\RegisterWebhookRequest;
use Vexel\NotabeneLib\Webhook;

class WebhookController
{

    private $webhook;





    public function __construct()
    {
        $this->webhook = new Webhook(config('notabene.host'));
    }





    /**
     * Register an Webhook for querying addresses
     *
     * @param RegisterWebhookRequest $request
     * @param string $vaspDID VASP DID
     * @return JsonResponse
     */
    public function registerWebhook(RegisterWebhookRequest $request, string $vaspDID): JsonResponse
    {
        $res = $this->webhook->register($vaspDID, $request->all());

        if (isset($res['err'])) {
            return response()->json([
                'status' => 'error',
                'msg' => $res['err']['message']
            ], $res['err']['code']);
        }


        return response()->json([
            'status' => 'ok',
            'data' => [
                //Secret to validate Notabene's request
                'secret' => $res['secret']
            ],
        ], 200);
    }





    /**
     * Register an Webhook for querying addresses
     *
     * @param string $vaspDID
     * @return JsonResponse
     */
    public function deleteWebhook(string $vaspDID): JsonResponse
    {
        $res = $this->webhook->delete($vaspDID);

        if (isset($res['err'])) {
            return response()->json([
                'status' => 'error',
                'msg' => $res['err']['message']
            ], $res['err']['code']);
        } elseif (!$res['isDeleted']) {
            return response()->json([
                'status' => 'error',
                'msg' => $res['message']
            ], Response::HTTP_SERVICE_UNAVAILABLE);
        }

        return response()->json([
            'status' => 'ok',
            'data' => [
                'isDeleted' => $res['isDeleted']
            ],
            'msg' => $res['message']
        ], 200);

    }
}


