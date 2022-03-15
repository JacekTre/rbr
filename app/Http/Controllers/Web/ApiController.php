<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Service\Web\Client\AbstractApiClient;
use Illuminate\View\View;

class ApiController extends Controller
{

    public function index(): View
    {
        return view('controllers.api.index')->with([
            'apiPath' => config('services.api.basePathApi'),
            'endpoints' => config('services.api.endpoints'),
            'methods' => AbstractApiClient::METHOD,
        ]);
    }

    public function getResult(): View
    {
        return view('controllers.api.index');
    }
}
