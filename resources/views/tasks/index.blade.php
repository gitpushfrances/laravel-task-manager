@extends('layouts.app')

@section('content')
<div class="flex items-center justify-between mb-6">
    <h1 class="text-3xl font-bold text-gray-800">📋 Task Manager</h1>
    <a href="{{ route('tasks.create') }}"
       class="px-4 py-2 text-white transition bg-blue-600 rounded-lg shadow-md hover:bg-blue-700">
       + New Task
    </a>
</div>

<div class="overflow-x-auto">
    <table class="min-w-full bg-white rounded-lg shadow-md">
        <thead class="bg-gray-100 border-b">
            <tr>
                <th class="px-4 py-3 font-semibold text-left text-gray-600">Title</th>
                <th class="px-4 py-3 font-semibold text-left text-gray-600">Description</th>
                <th class="px-4 py-3 font-semibold text-left text-gray-600">Status</th>
                <th class="px-4 py-3 font-semibold text-left text-gray-600">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y">
            @foreach($tasks as $task)
            <tr class="transition hover:bg-gray-50">
                <td class="px-4 py-3 font-medium text-gray-800">{{ $task->title }}</td>
                <td class="px-4 py-3 text-gray-600">{{ $task->description }}</td>
                <td class="px-4 py-3">
                    @if($task->status == 'pending')
                        <span class="px-3 py-1 text-sm text-yellow-700 bg-yellow-100 rounded-full">Pending</span>
                    @elseif($task->status == 'in-progress')
                        <span class="px-3 py-1 text-sm text-blue-700 bg-blue-100 rounded-full">In Progress</span>
                    @else
                        <span class="px-3 py-1 text-sm text-green-700 bg-green-100 rounded-full">Completed</span>
                    @endif
                </td>
                <td class="flex px-4 py-3 space-x-2">
                    <a href="{{ route('tasks.edit', $task->id) }}"
                       class="text-blue-600 hover:underline">Edit</a>

                    <!-- Livewire Delete -->
                    <button wire:click="delete({{ $task->id }})"
                            class="text-red-600 hover:underline">
                        Delete
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="container mt-5">
  <div class="alert alert-success">
    🎉 Bootstrap is working!
  </div>
  <button class="btn btn-primary">Click Me</button>
</div>

@endsection


