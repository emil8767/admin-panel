<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PaymentMethod $paymentMethod)
    {
        $permissions = auth()->user()->role->permissions;
        $result = [];
        foreach ($permissions as $permission) {
            $result[] = $permission->name;
        }

        if (!in_array('can_use_disb', $result)) {
            return abort(403, "You don't have permission");
        }
        $apiUrl = config('app.disb_service');
        try {
            $response = Http::get($apiUrl . 'api/payment-methods/list');
        } catch (\Exception $e) {
            $response = [];
        }
        return view('payment_methods.index', ['paymentMethods' => json_decode($response->body())]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(PaymentMethod $paymentMethod)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentMethod $paymentMethod)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editNew(Request $request)
    {
        return view('payment_methods.edit', ['paymentMethod' => null, 'statuses' => [], 'id' => $request->query('id')]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateNew(Request $request, PaymentMethod $paymentMethod)
    {
        $data = $this->validate($request, [
            'id' => 'integer',
            'status' => 'nullable|boolean',
            'order' => 'nullable',
            'segment' => 'nullable',
            'max_error' => 'nullable'
        ]);
        $apiUrl = config('app.disb_service');
        $data['admin_id'] = $request->user()->id;
        $data['payment_id'] = (int) $data['id'];
        unset($data['id']);
        $response = Http::post($apiUrl . 'api/payment-methods/update/', $data);
        return redirect()
            ->route('payment-methods.index')->with('success', 'Payment method success update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentMethod $paymentMethod)
    {
        //
    }
}
