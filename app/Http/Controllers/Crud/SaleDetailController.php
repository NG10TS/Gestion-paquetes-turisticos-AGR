<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaleDetailController extends Controller
{
    //
    public function index()
    {
        $saleDetails = SaleDetail::all();
        return view('sale_details.index', compact('saleDetails'));
    }

    public function create()
    {
        return view('sale_details.create');
    }

    public function store(Request $request)
    {
        $saleDetail = SaleDetail::create($request->all());
        return redirect()->route('sale_details.index')->with('success', 'Sale detail created successfully');
    }

    public function show(SaleDetail $saleDetail)
    {
        return view('sale_details.show', compact('saleDetail'));
    }

    public function edit(SaleDetail $saleDetail)
    {
        return view('sale_details.edit', compact('saleDetail'));
    }

    public function update(Request $request, SaleDetail $saleDetail)
    {
        $saleDetail->update($request->all());
        return redirect()->route('sale_details.index')->with('success', 'Sale detail updated successfully');
    }

    public function destroy(SaleDetail $saleDetail)
    {
        $saleDetail->delete();
        return redirect()->route('sale_details.index')->with('success', 'Sale detail deleted successfully');
    }
}
