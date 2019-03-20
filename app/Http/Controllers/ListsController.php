<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        return view('list.create')->with('user', $user);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);


        $list = new ToDoList;

        $list->title = $request->title;
        $list->user_id = $request->user;

        $list->save();

        return redirect()->route('index');
    }

   
    public function edit($id)
    {
        $list = ToDoList::find($id);
        $user = Auth::user();
        return view('list.edit')->with('user', $user)->with('list', $list);
    }

    
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $list = ToDoList::find($id);
        
        $list->title = $request->title;
        $list->user_id = $request->user;

        $list->save();

        return redirect()->route('index');
    }

   
    public function destroy($id)
    {
        ToDoList::find($id)->delete();

        return redirect()->route('index');
    }
}
