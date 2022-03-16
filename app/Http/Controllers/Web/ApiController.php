<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Service\Web\Client\AbstractApiClient;
use App\Service\Web\RequestService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ApiController extends Controller
{
    private RequestService $service;

    public function __construct(
        RequestService $service
    ) {
        $this->service = $service;
    }

    public function index(): View
    {
        return view('controllers.api.index')->with([
            'apiPath' => config('services.api.basePathApi'),
            'endpoints' => config('services.api.endpoints'),
            'methods' => AbstractApiClient::METHOD,
        ]);
    }

    public function getResult(Request $request): View
    {
        try {
            $response = $this->service->handleRequest($request);
        } catch (\Exception $e) {
            return view('error.index')->with([
                'errorMessage' => $e->getMessage()
            ]);
        }

        return view('controllers.api.result')->with([
            'response' => $response
        ]);
    }
}
