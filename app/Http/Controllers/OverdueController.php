<?php

namespace App\Http\Controllers;

use App\Models\Todo;

class OverdueController extends Controller
{
    public function index()
    {
        $overdues = Todo::where('status', 'overdue')->get();
        $todoCount = Todo::where('status', 'todo')->count();
        $doneCount = Todo::where('status', 'done')->count();
        $overdueCount = Todo::where('status', 'overdue')->count();

        return view('pages.overdue', compact('overdues','todoCount', 'doneCount', 'overdueCount'));
    }
}
