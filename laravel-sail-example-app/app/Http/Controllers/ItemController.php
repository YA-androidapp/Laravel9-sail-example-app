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

    public function show()
    {
    }

    public function edit()
    {
    }

    public function update()
    {
    }

    public function destroy()
    {
    }
}
