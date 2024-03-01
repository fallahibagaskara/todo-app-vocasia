<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $todos = Todo::latest()->where('user_id', $user->id)->where(function ($query) {
            $query->where('status', 'todo')
                ->orWhere('status', 'done');
        })->get();
        $todoCount = Todo::where('status', 'todo')->count();
        $doneCount = Todo::where('status', 'done')->count();
        $overdueCount = Todo::where('status', 'overdue')->count();

        return view('pages.todo', compact('todos', 'todoCount', 'doneCount', 'overdueCount'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $todoData = [
            'user_id' => Auth::id(),
            'title'     => $request->title,
            'comment'   => $request->comment,
            'clock'     => $request->time,
            'date'      => $request->date,
            'status'    => "todo",
        ];

        if (Todo::create($todoData)) {
            return response()->json([
                'status' => 200,
            ]);
        }

        return response()->json([
            'status' => 500,
        ]);
    }

    /**
     * mark
     *
     * @param  mixed $todo
     * @return void
     */
    public function mark(Request $request, $id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            return response()->json(['success' => false, 'message' => 'Todo not found'], 404);
        }

        $todo->status = $request->input('status', 'done');

        if ($todo->save()) {
            return response()->json([
                'status' => 200,
            ]);
        }

        return response()->json([
            'status' => 500,
        ]);
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

        if ($todo->status !== 'done') {
            $newDateTime = strtotime($request->date . ' ' . $request->time);
            $currentDateTime = time();
            if ($newDateTime < $currentDateTime) {
                $todoData['status'] = 'overdue';
            }
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
