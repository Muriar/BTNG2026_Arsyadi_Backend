<?php

namespace App\Http\Controllers\Api;
use App\Models\Task; //penting
use App\Http\Resources\TaskResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index(){
        $tasks = Task::all();
        return response() -> json([
            'message' => 'Berhasil',
            'data' => TaskResource::collection($tasks)
        ],200);

    }

    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|string|max :225',
            'description' => 'nullable|string',
            "is_completed" => 'boolean',

        ]);

        $task = Task::create($validated);
        return response()->json([
            'message' => 'Task Berhasil dibuat',
            'data' => new TaskResource($task)
        ],201);
    }

    public function show($id){
        $task = Task::find($id);

        if (! $task) {
            return response()->json([
                'message' => 'Id tidak ditemukan',
            ], 404);
        }
    return response()->json();
    }

    public function update(Request $request, $id){
        $task = Task::find($id);
        if(!$task){
            return response()->json([
                'message' => 'Task Tidak Ditemukan'
            ], 404);
        }
        $validated = $request->validate([
            'title' => 'sometimes|required|string|max :225',
            'description' => 'nullable|string',
            "is_completed" => 'boolean',
        ]);
        $task ->update($validated);

        return response() ->json([
            'message' => 'Task Berhasil dibuat',
            'data' => new TaskResource($task)
        ],200);
    }

    public function destroy($id){
        $task = Task::find($id);

        if (! $task) {
            return response()->json([
                'message' => 'Id tidak ditemukan',
            ], 404);
        }

        $task->delete();

        return response()->json([
            'message' => 'Task berhasil dihapus'
        ]);
    }
}
