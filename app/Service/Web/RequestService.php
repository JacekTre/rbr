<?php

namespace App\Service\Web;

use App\Service\Web\Client\AbstractApiClient;
use App\Service\Web\Client\RequestDelete;
use App\Service\Web\Client\RequestGet;
use App\Service\Web\Client\RequestPost;
use App\Service\Web\Client\RequestPut;
use Illuminate\Http\Request;

class RequestService
{
    public function handleRequest(Request $request): array
    {
        $path = $this->buildPath($request);
        $body = $request->get('body') ?? "";
        $method = $request->get('method');

        switch ($method)
        {
            case AbstractApiClient::POST :
                return (new RequestPost($path, $body))->sendRequest();
            case AbstractApiClient::PUT :
                return (new RequestPut($path, $body))->sendRequest();
            case AbstractApiClient::GET :
                return (new RequestGet($path, $body))->sendRequest();
            case AbstractApiClient::DELETE :
                return (new RequestDelete($path, $body))->sendRequest();
            default:
                throw new \Exception('Undefined request method');
        }
    }

    private function buildPath(Request $request): string
    {
        $path = $request->get('basePath') . $request->get('endpoint');

        $id = $request->get('objectId');
        if (! is_null($id)) {
            $path .= '/' . $id;
        }

        return $path;
    }
}
