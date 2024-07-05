<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;


class ItemController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->query('type', 'all');
        $items = Item::when($type != 'all', function ($query) use ($type) {
            return $query->where('type', $type);
        })->paginate(2); 

        return view('items.index', compact('items', 'type'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'type' => 'required|in:weapon,armor,magic',
        ]);

        Item::create($request->all());

        return redirect()->route('items.index')->with('success', 'Item created successfully.');
    }

    public function destroy($id)
    {
        
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }

    public function show($id)
    {
        try {
            $item = Item::findOrFail($id);
            return view('items.show', compact('item'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('items.index')->with('error', 'Item not found!');
        }
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $Item)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'type' => 'required|in:weapon,armor,magic',
        ]);

        $Item->update($validated);

        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }
}

