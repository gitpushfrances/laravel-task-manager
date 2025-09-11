@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Task</h1>

<form action="{{ route('tasks.update', $task->id) }}" method="POST" class="bg-white p-6 rounded shadow-md max-w-lg">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label class="block mb-1 font-semibold">Title</label>
        <input type="text" name="title" class="border rounded w-full p-2" value="{{ $task->title }}" required>
    </div>
    <div class="mb-4">
        <label class="block mb-1 font-semibold">Description</label>
        <textarea name="description" class="border rounded w-full p-2">{{ $task->description }}</textarea>
    </div>
    <div class="mb-4">
        <label class="block mb-1 font-semibold">Status</label>
        <select name="status" class="border rounded w-full p-2">
            <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="in-progress" {{ $task->status == 'in-progress' ? 'selected' : '' }}>In Progress</option>
            <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
        </select>
    </div>
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">Update Task</button>
</form>
@endsection
