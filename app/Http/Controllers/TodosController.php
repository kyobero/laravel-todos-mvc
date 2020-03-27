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

    public function show($todoId)
    {
        // $todo = Todo::find($todoId);
        // return view('todos.show')->with('todo', $todo);


        return view('todos.show')->with('todo', Todo::find($todoId));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store()
    {
        // dd(request()->all());
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required'
        ]);

        $data = request()->all();

        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed=false;

        $todo->save();

        return redirect('/todos');
    }
}
