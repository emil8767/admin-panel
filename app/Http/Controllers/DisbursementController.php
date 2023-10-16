<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;


class DisbursementController extends Controller
{
    public function index()
    {
        $permissions = auth()->user()->role->permissions;
        $result = [];
        foreach ($permissions as $permission) {
            $result[] = $permission->name;
        }

        if (in_array('can_use_disb', $result)) {
            $apiUrl = config('app.disb_service');
            try {
                $response = Http::get($apiUrl . 'api/job/list');
            } catch (\Exception $e) {
                $response = [];
            }
            return view('disbursement', ['data' => json_decode($response->body(), true)]);
        }
        return abort(403, "You don't have permission");
    }

    public function update(Request $request)
    {
        return view('dis-edit', ['id' => $request->query('id')]);
    }

    public function updatePost(Request $request)
    {
        $data = $this->validate($request, [
            'id' => 'required|integer',
            'status' => 'nullable|string',
            'comments' => 'nullable|string',
        ]);
        $data['admin_id'] = $request->user()->id;
        $apiUrl = config('app.disb_service');
        $response = Http::post($apiUrl . 'api/job/update/', $data);
        return redirect('disbursement');
    }

    public function disbHist(int $id)
    {
        $permissions = auth()->user()->role->permissions;
        $result = [];
        foreach ($permissions as $permission) {
            $result[] = $permission->name;
        }

        if (in_array('can_see_hist', $result)) {
            $apiUrl = config('app.disb_service');
            try {
                $response = Http::get($apiUrl . 'api/job/hist/' . $id);
            } catch (\Exception $e) {
                $response = [];
            }
            return view('dis-hist', ['data' => json_decode($response->body(), true)]);
        }
        return abort(403, "You don't have permission");
    }
}
