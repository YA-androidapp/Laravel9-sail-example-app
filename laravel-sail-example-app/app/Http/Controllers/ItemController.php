<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['list', 'show']);
    }

    public function list()
    {
    
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
