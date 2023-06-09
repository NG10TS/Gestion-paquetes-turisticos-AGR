<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerTypeController extends Controller
{
    //
    public function index()
    {
        $customerTypes = CustomerType::all();
        return view('customer_types.index', compact('customerTypes'));
    }

    public function create()
    {
        return view('customer_types.create');
    }

    public function store(Request $request)
    {
        $customerType = CustomerType::create($request->all());
        return redirect()->route('customer_types.index')->with('success', 'Customer type created successfully');
    }

    public function show(CustomerType $customerType)
    {
        return view('customer_types.show', compact('customerType'));
    }

    public function edit(CustomerType $customerType)
    {
        return view('customer_types.edit', compact('customerType'));
    }

    public function update(Request $request, CustomerType $customerType)
    {
        $customerType->update($request->all());
        return redirect()->route('customer_types.index')->with('success', 'Customer type updated successfully');
    }

    public function destroy(CustomerType $customerType)
    {
        $customerType->delete();
        return redirect()->route('customer_types.index')->with('success', 'Customer type deleted successfully');
    }
}
