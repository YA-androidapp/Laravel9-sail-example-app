<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

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

    }

    public function store()
    {
        
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
