<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentDetailController extends Controller
{
    //
    public function index()
    {
        $paymentDetails = PaymentDetail::all();
        return view('payment_details.index', compact('paymentDetails'));
    }

    public function create()
    {
        return view('payment_details.create');
    }

    public function store(Request $request)
    {
        $paymentDetail = PaymentDetail::create($request->all());
        return redirect()->route('payment_details.index')->with('success', 'Payment detail created successfully');
    }

    public function show(PaymentDetail $paymentDetail)
    {
        return view('payment_details.show', compact('paymentDetail'));
    }

    public function edit(PaymentDetail $paymentDetail)
    {
        return view('payment_details.edit', compact('paymentDetail'));
    }

    public function update(Request $request, PaymentDetail $paymentDetail)
    {
        $paymentDetail->update($request->all());
        return redirect()->route('payment_details.index')->with('success', 'Payment detail updated successfully');
    }

    public function destroy(PaymentDetail $paymentDetail)
    {
        $paymentDetail->delete();
        return redirect()->route('payment_details.index')->with('success', 'Payment detail deleted successfully');
    }
}
