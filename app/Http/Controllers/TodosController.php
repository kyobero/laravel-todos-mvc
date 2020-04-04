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

    public function show(TODO $todo)
    {
        // $todo = Todo::find($todoId);
        // return view('todos.show')->with('todo', $todo);


        return view('todos.show')->with('todo', $todo);
    }

    public function create()
    {
        return view('todos.create');
    }

    public function store()
    {
        // dd(request()->all());
        $this->validate(request(), [
            'name' => 'required|min:6|max:12',
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

    public function edit(TODO $todo)
    {

        return view('todos.edit')->with('todo', $todo);
    }

    public function update(TODO $todo)
    {
        $this->validate(request(), [
            'name' => 'required|min:6|max:12',
            'description' => 'required'
        ]);

        $data = request()->all();
        // $todo = Todo::find($todoId);

        $todo->name = $data['name'];

        $todo->description = $data['description'];

        $todo->save();

        return redirect('/todos');
    }

    public function destroy(TODO $todo)
    {

        $todo -> delete();

        return redirect('/todos');
    }

    public function complete(TODO $todo)
    {
        $todo->completed = true;

        $todo->save();

        session()->flash('success', 'Todo completed successfully');

        return redirect('/todos');
    }
}
