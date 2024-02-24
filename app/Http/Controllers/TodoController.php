<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public function index()
    {
        return view('pages.todo');
    }

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
}
