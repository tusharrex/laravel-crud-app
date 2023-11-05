@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Task List</h2>
    <a class="btn btn-success" href="{{ route('tasks.create') }}">Create New Task</a>

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td><strong>{{ $task->title }}</strong></td>
                <td>@if (strpos($task->description, '<iframe') !== false)
                        
                        {!! $task->description !!}
                    @else
                        <!-- Display regular description text -->
                        <p>
                            {{$task->description}}
                        </p>
                        @endif</td>
                <td>
                    <a class="btn btn-info" href="{{ route('tasks.create') }}">Create New</a>
                    <a class="btn btn-warning" href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                    <form method="POST" action="{{ route('tasks.destroy', $task->id) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
