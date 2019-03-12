<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToDoList;

class ListsController extends Controller
{
    

    public function index()
    {
        $TDLists = ToDoList::all();

        return view('overview')->with($TDLists);
    }

    
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
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
