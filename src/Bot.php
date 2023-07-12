<?php


class Bot extends Parse {

    public function init() {

        $updateResponse = $this->sendWS('getupdates', 'GET');
        $response       = json_decode($updateResponse, true);

        $length = count($response["result"]);

        /* obtém a última atualização recebida pelo bot */
        $lastUpdate = $response["result"][$length-1];

        if (isset($lastUpdate['message'])) {
            $this->processMessage($lastUpdate['message']);
        }

    }

    protected function sendWS(string $method, string $methodHttp, $parameters = null) {
        $options = array(
            'http' => array(
                'method'  => $methodHttp,
                'content' => !empty($parameters) && is_array($parameters) ? json_encode($parameters) : '',
                'header'  =>  "Content-Type: application/json\r\n" .
                    "Accept: application/json\r\n"
            )
        );

        $context  = stream_context_create($options);
        $response = file_get_contents(getenv('API_URL') . $method, false, $context);

        return $response;
    }

    protected function processMessage(array $message): void {

    }

}
