@extends('layouts.app')

@section('content')
<div class="max-w-lg p-8 mx-auto bg-white rounded-lg shadow-md">
    <h1 class="mb-6 text-2xl font-bold text-gray-800">✏️ Edit Task</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 font-semibold text-gray-700">Title</label>
            <input type="text" name="title" value="{{ $task->title }}"
                   class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div>
            <label class="block mb-1 font-semibold text-gray-700">Description</label>
            <textarea name="description"
                      class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">{{ $task->description }}</textarea>
        </div>

        <div>
            <label class="block mb-1 font-semibold text-gray-700">Status</label>
            <select name="status"
                    class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="in-progress" {{ $task->status == 'in-progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <button type="submit"
                class="w-full px-4 py-2 text-white bg-blue-600 rounded-lg shadow-md hover:bg-blue-700">
            Update Task
        </button>
    </form>
</div>
@endsection
