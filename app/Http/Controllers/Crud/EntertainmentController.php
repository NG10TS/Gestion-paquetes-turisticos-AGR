<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EntertainmentController extends Controller
{
    public function index()
    {
        $entertainments = Entertainment::all();
        return view('entertainments.index', compact('entertainments'));
    }

    public function create()
    {
        return view('entertainments.create');
    }

    public function store(Request $request)
    {
        $entertainment = Entertainment::create($request->all());
        return redirect()->route('entertainments.index')->with('success', 'Entertainment created successfully');
    }

    public function show(Entertainment $entertainment)
    {
        return view('entertainments.show', compact('entertainment'));
    }

    public function edit(Entertainment $entertainment)
    {
        return view('entertainments.edit', compact('entertainment'));
    }

    public function update(Request $request, Entertainment $entertainment)
    {
        $entertainment->update($request->all());
        return redirect()->route('entertainments.index')->with('success', 'Entertainment updated successfully');
    }

    public function destroy(Entertainment $entertainment)
    {
        $entertainment->delete();
        return redirect()->route('entertainments.index')->with('success', 'Entertainment deleted successfully');
    }
}
