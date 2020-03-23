<?php

namespace App\Http\Controllers;

use App\Todo;

use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index ()
    {
        //Fetch all todos from the database
        //display them in the todos.index page
        // $todos = Todo::all();
        // return view('todos.index')->with('todos', $todos);

        return view('todos.index')->with('todos', Todo::all());
    }
}
