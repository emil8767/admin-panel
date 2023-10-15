<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DisbursementController extends Controller
{
    public function index()
    {
        $permissions = auth()->user()->role->permissions;
        $result = [];
        foreach($permissions as $permission) {
            $result[] = $permission->name;
        }
        if (in_array('can create user', $result)) {
        $apiUrl = config('app.disb_service');
        try {
        $response = [Http::get($apiUrl . '/api/job/list')];
        } catch (\Exception $e) {
            $response = [];
        }
        return view('disbursement', ['data' => $response]);
        } else  return abort(403, "You don't have permission");
    }
}
