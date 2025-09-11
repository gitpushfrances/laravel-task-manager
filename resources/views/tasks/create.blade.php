@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Add Task</h1>

<form action="{{ route('tasks.store') }}" method="POST" class="bg-white p-6 rounded shadow-md max-w-lg">
    @csrf
    <div class="mb-4">
        <label class="block mb-1 font-semibold">Title</label>
        <input type="text" name="title" class="border rounded w-full p-2" required>
    </div>
    <div class="mb-4">
        <label class="block mb-1 font-semibold">Description</label>
        <textarea name="description" class="border rounded w-full p-2"></textarea>
    </div>
    <div class="mb-4">
        <label class="block mb-1 font-semibold">Status</label>
        <select name="status" class="border rounded w-full p-2">
            <option value="pending">Pending</option>
            <option value="in-progress">In Progress</option>
            <option value="completed">Completed</option>
        </select>
    </div>
    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white py-2 px-4 rounded">Add Task</button>
</form>
@endsection
