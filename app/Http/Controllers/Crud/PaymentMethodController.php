<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    //
    public function index()
    {
        $paymentMethods = PaymentMethod::all();
        return view('payment_methods.index', compact('paymentMethods'));
    }

    public function create()
    {
        return view('payment_methods.create');
    }

    public function store(Request $request)
    {
        $paymentMethod = PaymentMethod::create($request->all());
        return redirect()->route('payment_methods.index')->with('success', 'Payment method created successfully');
    }

    public function show(PaymentMethod $paymentMethod)
    {
        return view('payment_methods.show', compact('paymentMethod'));
    }

    public function edit(PaymentMethod $paymentMethod)
    {
        return view('payment_methods.edit', compact('paymentMethod'));
    }

    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        $paymentMethod->update($request->all());
        return redirect()->route('payment_methods.index')->with('success', 'Payment method updated successfully');
    }

    public function destroy(PaymentMethod $paymentMethod)
    {
        $paymentMethod->delete();
        return redirect()->route('payment_methods.index')->with('success', 'Payment method deleted successfully');
    }
}
