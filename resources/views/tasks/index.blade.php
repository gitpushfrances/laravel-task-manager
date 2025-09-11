@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold">Tasks</h1>
    <a href="{{ route('tasks.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded">+ New Task</a>
</div>

<table class="min-w-full bg-white rounded shadow overflow-hidden">
    <thead class="bg-gray-200">
        <tr>
            <th class="py-2 px-4 text-left">Title</th>
            <th class="py-2 px-4 text-left">Description</th>
            <th class="py-2 px-4 text-left">Status</th>
            <th class="py-2 px-4 text-left">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
        <tr class="border-b">
            <td class="py-2 px-4">{{ $task->title }}</td>
            <td class="py-2 px-4">{{ $task->description }}</td>
            <td class="py-2 px-4">
                @if($task->status == 'pending')
                    <span class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded-full text-sm">Pending</span>
                @elseif($task->status == 'in-progress')
                    <span class="bg-blue-200 text-blue-800 px-2 py-1 rounded-full text-sm">In Progress</span>
                @else
                    <span class="bg-green-200 text-green-800 px-2 py-1 rounded-full text-sm">Completed</span>
                @endif
            </td>
            <td class="py-2 px-4 space-x-2">
                <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-500 hover:underline">Edit</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
