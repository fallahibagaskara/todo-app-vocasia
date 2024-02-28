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

    public function check()
    {
        $overdueTasks = Todo::where('status', 'todo')
                            ->where(function ($query) {
                                $query->where('date', '<', now()->format('m/d/Y'))
                                    ->orWhere(function ($query) {
                                        $query->where('date', '=', now()->format('m/d/Y'))
                                            ->where('clock', '<', now()->format('H:i'));
                                    });
                            })
                            ->get();
    
        $updatedTasksCount = 0;
    
        foreach ($overdueTasks as $task) {
            $task->status = 'overdue';
            $task->save();
            $updatedTasksCount++;
            $updatedTaskTitles[] = $task->title;
        }
    
        return response()->json(['message' => 'Overdue tasks checked and updated successfully.', 'updated_tasks' => $updatedTasksCount, 'updated_task_titles' => $updatedTaskTitles]);
    }    
}
