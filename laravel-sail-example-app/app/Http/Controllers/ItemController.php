<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['list', 'show']);
    }

    public function list()
    {
        $items = Item::orderByDesc('created_at')->with('user')->paginate(5);
        return view('items.list', ['items' => $items]);
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string', 'max:400'],
            'user_id' => ['integer', Rule::exists('users', 'id')]
        ]);

        Item::create($data);
        return redirect()->route('items')->with('status', 'Created.');
    }

    public function show(Item $item)
    {
        return view('items.show', ['item' => $item]);
    }

    public function edit(Item $item)
    {
        return view('items.edit', ['item' => $item]);
    }

    public function update(Request $request, Item $item)
    {
        $this->authorize('edit', $item);
        $data = $request->validate([
            'title' => ['required', 'string', 'max:100'],
            'content' => ['required', 'string', 'max:400'],
            'user_id' => ['integer', Rule::exists('users', 'id')]
        ]);

        $item->update($data);
        return redirect()->route('items')->with('status', 'Updated.');
    }

    public function destroy(Item $item)
    {
        $this->authorize('edit', $item);
        $item->delete();
        return redirect()->route('items')->with('status', 'Removed.');
    }
}
