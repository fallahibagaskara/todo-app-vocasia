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

        $todo->update([
            'title'     => $request->title,
            'comment'   => $request->comment,
            'clock'     => "07:00",
            'date'      => $request->date,
            'status'    => "todo",
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diudapte!',
            'data'    => $todo  
        ]);
    }
}
