<?php

namespace App\Http\Controllers;

use App\Models\Todo;

class DoneController extends Controller
{
    public function index()
    {
        $dones = Todo::where('status', 'done')->get();
        return view('pages.done', compact('dones'));
    }
}
