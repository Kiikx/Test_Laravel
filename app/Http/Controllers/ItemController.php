<?php

namespace App\Http\Controllers;

use App\Models\Creator;
use App\Models\Item;
use Illuminate\Http\Request;


class ItemController extends Controller
{

    public function home(Request $request)
    {
        $type = $request->query('type', 'all');
        $items = Item::with('creators')
            ->when($type != 'all', function ($query) use ($type) {
                return $query->where('type', $type);
            })->paginate(10); 

        return view('items.home', compact('items', 'type'));
    }

    public function index(Request $request)
    {
        $type = $request->query('type', 'all');
        $items = Item::with('creators')
            ->when($type != 'all', function ($query) use ($type) {
                return $query->where('type', $type);
            })->paginate(10); 

        return view('items.index', compact('items', 'type'));
    }


    public function create()
    {
        $creators = Creator::all();
        return view('items.create', compact('creators'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'type' => 'required|in:weapon,armor,magic',
            'creators' => 'array',
            'creators.*' => 'exists:creators,id',
        ]);

        $item = Item::create($validated);
        $item->creators()->attach($request->creators);

        return redirect()->route('items.index')->with('success', 'Item created successfully.');
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
        $creators = Creator::all();
        return view('items.edit', compact('item', 'creators'));
    }

    public function update(Request $request, Item $item)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'type' => 'required|in:weapon,armor,magic',
            'creators' => 'array',
            'creators.*' => 'exists:creators,id',
        ]);

        $item->update($validated);
        $item->creators()->sync($request->creators);

        return redirect()->route('items.index')->with('success', 'Item updated successfully.');
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}

