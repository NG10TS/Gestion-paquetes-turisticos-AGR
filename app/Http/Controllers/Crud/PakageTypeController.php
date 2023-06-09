<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PakageTypeController extends Controller
{
    //
    public function index()
    {
        $packageTypes = PackageType::all();
        return view('package_types.index', compact('packageTypes'));
    }

    public function create()
    {
        return view('package_types.create');
    }

    public function store(Request $request)
    {
        $packageType = PackageType::create($request->all());
        return redirect()->route('package_types.index')->with('success', 'Package type created successfully');
    }

    public function show(PackageType $packageType)
    {
        return view('package_types.show', compact('packageType'));
    }

    public function edit(PackageType $packageType)
    {
        return view('package_types.edit', compact('packageType'));
    }

    public function update(Request $request, PackageType $packageType)
    {
        $packageType->update($request->all());
        return redirect()->route('package_types.index')->with('success', 'Package type updated successfully');
    }

    public function destroy(PackageType $packageType)
    {
        $packageType->delete();
        return redirect()->route('package_types.index')->with('success', 'Package type deleted successfully');
    }
}
