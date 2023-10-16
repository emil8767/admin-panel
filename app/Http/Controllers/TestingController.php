<?php

namespace App\Http\Controllers;

use _PHPStan_5b84f9f0d\Nette\Neon\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TestingController extends Controller
{
    public function index()
    {
        if (env('APP_ENV') !== 'production') {
            return view('testing.index');
        } else {
            return abort(403, 'Access denied in production environment.');
        }
    }

    public function send(Request $data)
    {
        $data = json_decode($data->input('json'), true);
        if (is_null($data)) {
            throw new Exception('json is not valid!');
        }
        $response = Http::post('http://20.203.104.111/api/job/create', $data);
        dd($response->body());
    }
}
