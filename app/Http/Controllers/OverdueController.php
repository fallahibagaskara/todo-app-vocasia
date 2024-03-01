<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Overdue;
use Illuminate\Support\Facades\Auth;

class OverdueController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $overdues = Todo::where('user_id', $user->id)->where('status', 'overdue')->get();
        $todoCount = Todo::where('status', 'todo')->count();
        $doneCount = Todo::where('status', 'done')->count();
        $overdueCount = Todo::where('status', 'overdue')->count();

        return view('pages.overdue', compact('overdues','todoCount', 'doneCount', 'overdueCount'));
    }

    public function check()
    {
        $user = Auth::user();
        $overdueTasks = Todo::where('user_id', $user->id)->where('status', 'todo')->where(function ($query) {
                                $query->where('date', '<', now()->format('m/d/Y'))
                                    ->orWhere(function ($query) {
                                        $query->where('date', '=', now()->format('m/d/Y'))
                                            ->where('clock', '<', now()->format('H:i'));
                                    });
                            })->get();

        $updatedTasksCount = 0;
        $updatedTaskTitles = [];

        foreach ($overdueTasks as $task) {
            $task->status = 'overdue';
            $task->save();
            $updatedTasksCount++;
            $updatedTaskTitles[] = $task->title;
        }

        return response()->json(['message' => 'Overdue tasks checked and updated successfully.', 'updated_tasks' => $updatedTasksCount, 'updated_task_titles' => $updatedTaskTitles]);
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $todo = Todo::findOrFail($id);

        return response()->json($todo);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $todo
     * @return void
     */
    public function update(Request $request, Todo $todo)
    {
        $todo = Todo::findOrFail($request->todo_id);

        $todoData = [
            'title'     => $request->title,
            'comment'   => $request->comment,
            'clock'     => $request->time,
            'date'      => $request->date,
        ];

        $newDateTime = strtotime($request->date . ' ' . $request->time);
        $currentDateTime = time();
        if ($newDateTime > $currentDateTime) {
            $todoData['status'] = 'todo';
        }

        if ($todo->update($todoData)) {
            return response()->json([
                'status' => 200,
            ]);
        }

        return response()->json([
            'status' => 500,
        ]);
    }


    public function delete(Request $request)
    {
        $todo = Todo::find($request->id);

            if ($todo->delete()) {
                return response()->json([
                    'status' => 200,
                ]);
            }

            return response()->json([
                'status' => 500,
            ]);

    }
}
