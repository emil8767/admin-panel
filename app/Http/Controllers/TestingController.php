<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
