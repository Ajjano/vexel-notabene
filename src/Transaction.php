<?php


namespace Vexel\NotabeneLib;


use GuzzleHttp\Client;

class Transaction
{
    private $client;
    private $host;





    public function __construct($host)
    {
        $this->client = new Client();
        $this->host = $host;
    }





    public function validateTransfer($params)
    {
        $res = $this->sendRequest('POST', $params, 'tx/validate');
        return $res;
    }





    private function sendRequest(string $method, array $params, string $point)
    {
        $response = $this->client->request($method, $this->host . $point, [
            'body' => json_encode($params),
            'headers' => [
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
        ]);

        return $response->getBody();
    }





    public function txCreate(array $params)
    {
        $res = $this->sendRequest('POST', $params, 'tx/create');
        return $res;
    }





    public function createNotificationWebhook(array $params)
    {
        $res = $this->sendRequest('POST', $params, 'integrations/config/txnotification');
        return $res;
    }





    public function updateTransfer(array $params)
    {
        $res = $this->sendRequest('POST', $params, 'tx/update');
        return $res;
    }





    public function txValidateFull(array $params)
    {
        return $this->sendRequest('POST', $params, 'tx/validate/full');
    }





    public function tfSimpleVASPs($nameOfTheVASP)
    {
        $res = $this->sendRequest('GET', ['q' => $nameOfTheVASP, 'fields' => 'did, name, verificationStatus, country, website, isRegulated', 'per_page' => 100], 'tf/simple/vasps');

        if (isset($res['vasps'])) {
            return ['status' => 'ok', 'vasps' => $res];
        } else {
            return ['status' => 'error', 'vasps' => [], 'msg' => $res['err']['message']];

        }
    }





    /**
     * @param $params
     * If you do not know who the counterparty of the transaction is, you can still create the TR transfer by enabling the !! skipBeneficiaryDataValidation !! flag true.
     * @return string[]
     */
    public function index($params)
    {
        $res = $this->txValidateFull($params);
        if ($res['error'] || $res['warnings']) {
            return $res['error'] ?? $res['warnings'];
        }

        if ($res['addressSource'] === 'UNKNOWN') {

            return ['status' => 'error', 'msg' => 'You should identify your counterparty!'];
            // txSimpleVASPs
            //tfSimpleVASPs
        }

        if ($res['isValid']) {
            $params['beneficiaryVASPdid'] = $res['beneficiaryVASPdid'];
            $params['beneficiaryVASPname'] = $res['beneficiaryVASPname'];
            $this->txCreate($params);
        }
    }





    public function addTransactionHash($params)
    {
        try {
            $this->sendRequest('POST', $params, 'tx/update');
            return true;
        } catch (\Exception $exception) {
            return false;
        }

    }





    public function registerAddress($params)
    {
        $res = $this->sendRequest('POST', $params, 'address/registerCustomer');

        return $res;
    }





    public function getDid(array $params)
    {
        $this->sendRequest('GET', $params, 'auth/viewer');
    }





    public function generateAccessToken(array $params)
    {
        return $this->sendRequest('POST', $params, 'oauth/token');
    }
}
