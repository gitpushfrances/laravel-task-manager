@extends('layouts.app')

@section('content')
<div class="max-w-lg p-8 mx-auto bg-white rounded-lg shadow-md">
    <h1 class="mb-6 text-2xl font-bold text-gray-800">➕ Add New Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST" class="space-y-5">
        @csrf
        <div>
            <label class="block mb-1 font-semibold text-gray-700">Title</label>
            <input type="text" name="title"
                   class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div>
            <label class="block mb-1 font-semibold text-gray-700">Description</label>
            <textarea name="description"
                      class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500"></textarea>
        </div>

        <div>
            <label class="block mb-1 font-semibold text-gray-700">Status</label>
            <select name="status"
                    class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-blue-500">
                <option value="pending">Pending</option>
                <option value="in-progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <button type="submit"
                class="w-full px-4 py-2 text-white bg-green-600 rounded-lg shadow-md hover:bg-green-700">
            Add Task
        </button>
    </form>
</div>
@endsection
