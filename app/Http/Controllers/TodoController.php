<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::latest()->get();
        return view('pages.todo', compact('todos'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'title'     => 'required',
        //     'comment'   => 'required',
        //     // 'clock'     => 'required',
        //     'date'      => 'required',
        //     'status'    => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json($validator->errors(), 422);
        // }

        $todoData = [
            'title'     => $request->title,
            'comment'   => $request->comment,
            'clock'     => "07:00",
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
        $todo->save();

        return response()->json(['success' => true, 'message' => 'Todo status updated successfully'], 200);
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $todo = Todo::findOrFail($id); // Mengambil data todo berdasarkan ID

        // Mengembalikan data todo dalam format JSON untuk digunakan dalam AJAX request
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
        // $validator = Validator::make($request->all(), [
        //     'title'     => 'required',
        //     'comment'   => 'required',
        //     // 'clock'     => 'required',
        //     'date'      => 'required',
        //     'status'    => 'required',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json($validator->errors(), 422);
        // }

        $todoData = [
            'title'     => $request->title,
            'comment'   => $request->comment,
            'clock'     => "07:00",
            'date'      => $request->date,
            'status'    => "todo",
        ];

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

        if (!$todo) {
            return response()->json(['status' => 404, 'message' => 'Todo not found'], 404);
        }

        if ($todo->delete()) {
            return response()->json(['status' => 200, 'message' => 'Todo deleted successfully'], 200);
        } else {
            return response()->json(['status' => 500, 'message' => 'Failed to delete todo'], 500);
        }
    }
}
