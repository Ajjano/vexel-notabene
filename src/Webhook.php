<?php


namespace Vexel\NotabeneLib;


use GuzzleHttp\Client;

class Webhook
{
    private $client;
    private $host;





    public function __construct($host)
    {
        $this->client = new Client();
        $this->host = $host;
    }





    public function register(string $vaspDID, array $params)
    {
        return $this->sendRequest($vaspDID, $params, 'POST');
    }





    public function delete(string $vaspDID)
    {
        return $this->sendRequest($vaspDID, [], 'DELETE');

    }





    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function sendRequest(string $vaspDID, array $params, string $method)
    {
        $point = "integrations/{$vaspDID}/address-query-webhook";

        $response = $this->client->request($method, $this->host . $point, [
            'body' => json_encode($params),
            'headers' => [
                'accept' => 'application/json',
                'content-type' => 'application/json',
            ],
        ]);

        return $response->getBody();
    }
}
