<?php

namespace juanmicl\dummiesflow;

use GuzzleHttp\Client;

class dummiesFlow
{
    const BASE_URI = 'https://console.dialogflow.com/api-client/demo/embedded/';
    const TIMEOUT = 3.0;

    /*
    * Where to find?
    * https://bot.dialogflow.com/(AGENTNAME)
    */
    private static $agentName;

    public function setAgent($agent)
    {
        self::$agentName = $agent;
    }

    public function genSession() {
        return uniqid();
    }

    public function query($sessionId, $query)
    {
        $client = new Client([
            'base_uri' => self::BASE_URI,
            'timeout'  => self::TIMEOUT,
        ]);

        $response = $client->request('GET', self::$agentName.'/demoQuery?q='.$query.'&sessionId='.$sessionId);
        $body = $response->getBody();
        $data = json_decode($body, true);

        return $data['result']['fulfillment']['speech'];
    }
}
?>