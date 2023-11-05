<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller{
    public function index()
    {
        $tasks=Task::all();
        return view ('tasks.index', ['tasks'=>$tasks]);
    }
    public function create()
    {
        return view('tasks.create');
    }
    public function store (Request $request)
    {
        $validatedData= $request->validate([
            'title'=>'required|string|max:255',
            'description'=>'required|string',
        ]);
        Task::create($validatedData);
        return redirect()->route(tasks.index);
    }
    public function edit($id)
    {
        $task= Task::finfOrFail($id);
        return view('tasks.edit',['task'=>$task]);
    }


}