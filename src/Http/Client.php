<?php

declare(strict_types=1);

namespace Esyede\DurianPay\Http;

use GuzzleHttp\Client as GuzzleClient;

class Client
{
    public $debug = false;
    public $debugs = [];
    public $errors = [];

    public function __construct(string $clientSecret, bool $debug = false)
    {
        $this->clientSecret = $clientSecret;
        $this->debug = $debug;

        $configs = [
            'base_uri' => 'https://api.durianpay.id/v1',
            'http_errors' => false,
            'auth' => [$this->clientSecret, ''],
            'headers' => [
                'Accept' => 'application/json',
            ]
        ];

        $this->connector = new GuzzleClient($configs);
    }

    public function addDebug(string $message)
    {
        if ($this->debug) {
            $this->debugs[] = $message;
        }

        return $this;
    }

    public function addError(string $message)
    {
        $this->errors[] = [
            'message' => $message
        ];

        return $this;
    }

    public function hasError()
    {
        return count($this->errors) > 0;
    }

    public function resetError()
    {
        $this->errors = [];
        return $this;
    }

    public function resetDebug()
    {
        $this->debugs = [];
        return $this;
    }

    public function post(string $endpoint, array $params = [], array $headers = [])
    {
        return $this->request('post', $endpoint, $params, $headers);
    }

    public function get($endpoint, array $params = [], array $headers = [])
    {
        return $this->request('get', $endpoint, $params, $headers);
    }

    public function delete(string $endpoint, array $params = [], array $headers = [])
    {
        return $this->request('delete', $endpoint, $params, $headers);
    }

    public function patch(string $endpoint, array $params = [], array $headers = [])
    {
        return $this->request('patch', $endpoint, $params, $headers);
    }

    public function put(string $endpoint, array $params = [], array $headers = [])
    {
        return $this->request('put', $endpoint, $params, $headers);
    }

    private function request(string $method, string $endpoint, array $params = [], array $headers = [])
    {
        try {
            $this->resetError();
            $this->resetDebug();

            $this->addDebug('URL: '.$this->connector->getConfig('base_uri').'/'.$endpoint);
            $this->addDebug('Request Method: '.strtoupper($method));
            $this->addDebug('Request Params: '.json_encode($params));
            $this->addDebug('Request Headers: '.json_encode(array_merge($this->connector->getConfig('headers'), $headers)));

            $method = strtolower($method);
            $data = ['headers' => $headers, 'json' => $params];

            if ($method === 'get') {
                $data = ['headers' => $headers, 'form_params' => $params];
            }

            $response = $this->connector->{$method}(ltrim($endpoint, '/'), $data);

            $body = $response->getBody()->getContents();

            $this->addDebug('Response HTTP Code: '.$response->getStatusCode());
            $this->addDebug('Response Header: '.json_encode($response->getHeaders()));
            $this->addDebug('Response Body: '.$body);

            $data = json_decode($body);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new Exception('Invalid JSON response');
            }

            return $data;
        } catch (Exception $e) {
            $this->addError($e->getMessage());
            return false;
        }
    }
}
