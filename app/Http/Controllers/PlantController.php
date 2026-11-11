<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;


class PlantController extends Controller
{
    public function index()
    {
        $plants = Plant::latest()->paginate(10);

        return view('plants.index', compact('plants'));
    }

    public function create()
    {
        return view('plants.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:100'],
            'unit_price' => ['required', 'numeric', 'min:0'],
            'description' => ['required', 'string'],
            'stock_status' => ['required', 'in:in_stock,out_of_stock'],
        ]);

        $request->user()->plants()->create($validated);

        return redirect()->route('plants.index')
            ->with('success', 'Plant added successfully.');
    }

    public function show(Plant $plant)
    {
        return view('plants.show', compact('plant'));
    }

    public function edit(Plant $plant)
    {
        return view('plants.edit', compact('plant'));
    }

    public function update(Request $request, Plant $plant)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:100'],
            'unit_price' => ['required', 'numeric', 'min:0'],
            'description' => ['required', 'string'],
            'stock_status' => ['required', 'in:in_stock,out_of_stock'],
        ]);

        $plant->update($validated);

        return redirect()->route('plants.index')
            ->with('success', 'Plant updated successfully.');
    }

    public function destroy(Plant $plant)
    {
        $plant->delete();

        return redirect()->route('plants.index')
            ->with('success', 'Plant deleted successfully.');
    }
}
