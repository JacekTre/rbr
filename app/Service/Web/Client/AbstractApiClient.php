<?php

declare(strict_types=1);

namespace App\Service\Web\Client;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;


abstract class AbstractApiClient
{
    public const SUCCESS = 'success';

    public const FAILURE = 'failure';

    public const METHOD = ['POST', 'PUT', 'GET', 'DELETE'];

    protected function post(string $path, array $body): array
    {
        $client = new Client();

        $response = $client->post(
            $path,
            [
                'body' => json_encode($body),
                'headers' => $this->prepareHeaders()
            ]
        );

        return $this->handleResponse($response);
    }

    protected function delete(string $path): array
    {
        $client = new Client();

        $response = $client->delete(
            $path,
            [
                'headers' => $this->prepareHeaders(),
            ]
        );

        return $this->handleResponse($response);
    }

    protected function put(string $path, ?array $body = null): array
    {
        $client = new Client();

        $response = $client->put(
            $path,
            [
                'headers' => $this->prepareHeaders(),
                'body' => json_encode($body)
            ]
        );

        return $this->handleResponse($response);
    }

    protected function get(string $path): array
    {
        $client = new Client();


        $response = $client->get(
            $path,
            [
                'headers' => $this->prepareHeaders(),
            ]
        );

        return $this->handleResponse($response);
    }

    private function handleResponse(ResponseInterface $response): array
    {

        if ($response->getStatusCode() == 200) {
            return [
                'status' => self::SUCCESS,
                'message' => json_decode($response->getBody()->getContents(), true)
            ];
        }

        if ($response->getStatusCode() == 401) {
            return [
                'status' => self::FAILURE,
                'message' => 'No authorized access'
            ];
        }

        if ($response->getStatusCode() == 500) {
            return [
                'status' => self::FAILURE,
                'message' => 'Error on server'
            ];
        }

        return [
            'status' => self::FAILURE,
            'message' => 'Unknown error'
        ];
    }

    private function prepareHeaders(): array
    {
        return [
            'Content-type' => 'application/json; charset=utf-8',
        ];
    }
}
