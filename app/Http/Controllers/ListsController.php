<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\ToDoList;
use App\User;

class ListsController extends Controller
{
    public function index()
    {
        $tdlists = ToDoList::all();
        $users = User::all();
        $tasks = Task::all();

        return view('overview')->with('tdlists', $tdlists)->with('users', $users)->with('tasks', $tasks);
    }

    
    public function create()
    {
        $users = User::pluck('name', 'id');
        return view('list/create')->with('users', $users);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);


        $list = new ToDoList;

        $list->title = $request->title;
        
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
