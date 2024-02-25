<?php

namespace App\Http\Controllers;

use App\Models\Todo;

class OverdueController extends Controller
{
    public function index()
    {
        $overdues = Todo::where('status', 'overdue')->get();
        return view('pages.overdue', compact('overdues'));
    }
}
