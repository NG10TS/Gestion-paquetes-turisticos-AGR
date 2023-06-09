<?php

namespace App\Http\Controllers\Crud;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    //
    public function index()
    {
        $roomTypes = RoomType::all();
        return view('roomTypes.index', compact('roomTypes'));
    }

    public function create()
    {
        return view('roomTypes.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'room_type' => 'required',
            'capacity' => 'required|integer',
            // Add validation rules for other fields as needed
        ]);

        RoomType::create($validatedData);

        return redirect()->route('roomTypes.index')->with('success', 'Room type created successfully.');
    }

    public function edit(RoomType $roomType)
    {
        return view('roomTypes.edit', compact('roomType'));
    }

    public function update(Request $request, RoomType $roomType)
    {
        $validatedData = $request->validate([
            'room_type' => 'required',
            'capacity' => 'required|integer',
            // Add validation rules for other fields as needed
        ]);

        $roomType->update($validatedData);

        return redirect()->route('roomTypes.index')->with('success', 'Room type updated successfully.');
    }

    public function destroy(RoomType $roomType)
    {
        $roomType->delete();

        return redirect()->route('roomTypes.index')->with('success', 'Room type deleted successfully.');
    }
}
