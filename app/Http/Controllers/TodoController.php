<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Todo;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        return view('todo.index', ['todos' => Todo::all()]);
    }

    public function show(Todo $todo)
    {
        return view('todo.show', ['todo' => $todo]);
    }

    public function create()
    {
        return view('todo.create');
        
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'difficulty' => 'required|in:' . implode(',', [Todo::DIFFICULTY_EASY, Todo::DIFFICULTY_HARD]),
           'user_id' => '|exists:users,id',
        ]);

        Todo::create($data);
        

        return redirect()->route('todo.index');
    }

    public function edit(Todo $todo)
    {
        return view('todo.edit', ['todo' => $todo]);
    }

    public function update(Request $request, Todo $todo)
    {
        $data = $request->validate([
            'title' => 'string',
            'difficulty' => 'in:' . implode(',', [Todo::DIFFICULTY_EASY, Todo::DIFFICULTY_HARD]),
           // 'user_id' => 'required|exists:users,id',
        ]);

        $todo->update($data);

        return redirect()->route('todo.index');
    }
    public function completed(Request $request, Todo $todo){
        $data = $request->validate([
            'status'=>'required|boolean'
        ]);
        $todo->update($data);
        
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('todo.index');
    }
}
