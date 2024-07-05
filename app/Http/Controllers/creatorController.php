<?php

namespace App\Http\Controllers;

use App\Models\Creator;
use Illuminate\Http\Request;

class CreatorController extends Controller
{
    public function index()
    {
        $creators = Creator::paginate(10);
        return view('creators.index', compact('creators'));
    }

    public function create()
    {
        return view('creators.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'speciality' => 'required|in:Blacksmith,Armorer,enchanter',
        ]);

        Creator::create($validated);

        return redirect()->route('creators.index')->with('success', 'Creator created successfully.');
    }

    public function show($id)
    {
        $creator = Creator::with('items')->findOrFail($id);
        return view('creators.show', compact('creator'));
    }

    public function edit(Creator $creator)
    {
        return view('creators.edit', compact('creator'));
    }

    public function update(Request $request, Creator $creator)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'speciality' => 'required|in:Blacksmith,Armorer,enchanter',
        ]);

        $creator->update($validated);

        return redirect()->route('creators.index')->with('success', 'Creator updated successfully.');
    }

    public function destroy(Creator $creator)
    {
        $creator->delete();
        return redirect()->route('creators.index')->with('success', 'Creator deleted successfully.');
    }
}

