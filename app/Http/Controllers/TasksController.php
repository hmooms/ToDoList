<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\ToDoList;

class TasksController extends Controller
{
    public function create($id)
    {
        $list = ToDoList::find($id);
        return view('task.create')->with('list', $list);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $task = new Task;

        $task->title = $request->title;
        $task->description = $request->description;
        $task->minutes = $request->minutes;
        $task->status = $request->status;
        $task->list_id = $request->list_id;

        $task->save();

        return redirect()->route('index');
    }

   
    public function edit($id, $id2)
    {
        $list = ToDoList::find($id);
        $task = Task::find($id2);

        return view('task.edit')->with('task', $task)->with('list', $list);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $task = Task::find($id);

        $task->title = $request->title;
        $task->description = $request->description;
        $task->minutes = $request->minutes;
        $task->status = $request->status;
        $task->list_id = $request->list_id;

        $task->save();

        return redirect()->route('index');
    }


    public function destroy($id)
    {
        Task::find($id)->delete();

        return redirect()->route('index');
    }
}
