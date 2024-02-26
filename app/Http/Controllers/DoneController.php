<?php

namespace App\Http\Controllers;

use App\Models\Todo;

class DoneController extends Controller
{
    public function index()
    {
        $dones = Todo::where('status', 'done')->get();
        $todoCount = Todo::where('status', 'todo')->count();
        $doneCount = Todo::where('status', 'done')->count();
        $overdueCount = Todo::where('status', 'overdue')->count();

        return view('pages.done', compact('dones','todoCount', 'doneCount', 'overdueCount'));
    }
}
