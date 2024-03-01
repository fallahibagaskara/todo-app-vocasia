<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class DoneController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $dones = Todo::where('user_id', $user->id)->where('status', 'done')->get();
        $todoCount = Todo::where('status', 'todo')->count();
        $doneCount = Todo::where('status', 'done')->count();
        $overdueCount = Todo::where('status', 'overdue')->count();

        return view('pages.done', compact('dones','todoCount', 'doneCount', 'overdueCount'));
    }
}
