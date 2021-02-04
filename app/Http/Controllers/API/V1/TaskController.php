<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        return Task::all();
    }
    public function show(Task $tasks){
        return $tasks;
    }
    public function store(Request $request){
        $data= $request->all();
        return Task::create($data);
    }
    public function update(Request $request, Task $tasks){
        $tasks->update($request->all());
        return $tasks;
    }
    public function destroy(Task $tasks){
        $tasks->delete();
        return 'ok';

    }

}
