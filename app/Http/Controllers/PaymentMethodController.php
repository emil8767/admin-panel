<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PaymentMethod $paymentMethod)
    {
        $paymentMethods = PaymentMethod::orderBy('id')->paginate();
        return view('payment_methods.index', ['paymentMethods' => $paymentMethods, 'paymentMethod' => $paymentMethod]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(PaymentMethod $paymentMethod)
    {
        $statuses = $paymentMethod->statuses;
        return view('payment_methods.create', ['paymentMethod' => $paymentMethod, 'statuses' => $statuses]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $paymentMethod = new PaymentMethod();
        $data = $this->validate($request, [
            'status' => 'required',
            'order' => 'nullable',
            'segment' => 'nullable',
            'name' => 'required',
            'max_error' => 'nullable',]);
        $paymentMethod->fill($data);
        $paymentMethod->save();
        return redirect()
            ->route('payment-methods.index')->with('success', 'Payment method success create');
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
    public function edit(PaymentMethod $paymentMethod)
    {
        $statuses = $paymentMethod->statuses;
        return view('payment_methods.edit', ['paymentMethod' => $paymentMethod, 'statuses' => $statuses]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        $data = $this->validate($request, [
            'status' => 'required',
            'order' => 'nullable',
            'segment' => 'nullable',
            'name' => 'required',
            'max_error' => 'nullable',]);
        $paymentMethod->fill($data);
        $paymentMethod->save();
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
