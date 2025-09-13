@extends('layouts.app')

@section('content')
<div class="py-4 container-fluid" style="background-color: #f8f9fa; min-height: 100vh;">
    <div class="container">
        <!-- Header Section -->
        <div class="mb-4 border-0 shadow-sm card">
            <div class="p-4 card-body">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <div class="d-flex align-items-center">
                            <div class="p-3 bg-primary bg-opacity-10 rounded-3 me-3" style="width: 60px; height: 60px; display: flex; align-items: center; justify-content: center;">
                                <i class="fas fa-clipboard-list text-primary fs-4"></i>
                            </div>
                            <div>
                                <h1 class="mb-1 h3 fw-bold text-dark">Task Manager</h1>
                                <p class="mb-0 text-muted small">Organize and track your tasks efficiently</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 col-md-4 text-md-end mt-md-0">
                        <a href="{{ route('tasks.create') }}" class="px-4 py-2 shadow-sm btn btn-primary rounded-3">
                            <i class="fas fa-plus me-2"></i>New Task
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tasks Overview Cards -->
        @php
            $pendingCount = $tasks->where('status', 'pending')->count();
            $inProgressCount = $tasks->where('status', 'in-progress')->count();
            $completedCount = $tasks->where('status', 'completed')->count();
        @endphp

        <div class="mb-4 row">
            <!-- Pending Tasks -->
            <div class="mb-3 col-md-4">
                <div class="border-0 shadow-sm card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="p-3 bg-warning bg-opacity-10 rounded-3 me-3">
                                <i class="fas fa-clock text-warning fs-5"></i>
                            </div>
                            <div>
                                <p class="mb-1 text-muted small fw-medium">PENDING</p>
                                <h3 class="mb-0 fw-bold">{{ $pendingCount }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- In Progress Tasks -->
            <div class="mb-3 col-md-4">
                <div class="border-0 shadow-sm card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="p-3 bg-info bg-opacity-10 rounded-3 me-3">
                                <i class="fas fa-spinner text-info fs-5"></i>
                            </div>
                            <div>
                                <p class="mb-1 text-muted small fw-medium">IN PROGRESS</p>
                                <h3 class="mb-0 fw-bold">{{ $inProgressCount }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Completed Tasks -->
            <div class="mb-3 col-md-4">
                <div class="border-0 shadow-sm card h-100">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="p-3 bg-success bg-opacity-10 rounded-3 me-3">
                                <i class="fas fa-check-circle text-success fs-5"></i>
                            </div>
                            <div>
                                <p class="mb-1 text-muted small fw-medium">COMPLETED</p>
                                <h3 class="mb-0 fw-bold">{{ $completedCount }}</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tasks Table -->
        <div class="border-0 shadow-sm card">
            <div class="py-3 bg-white card-header border-bottom">
                <h5 class="mb-1 fw-semibold">All Tasks</h5>
                <p class="mb-0 text-muted small">Manage and track your task progress</p>
            </div>

            @if($tasks->count() > 0)
                <div class="p-0 card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 table-hover">
                            <thead class="bg-light">
                                <tr>
                                    <th class="px-4 py-3 border-0 text-uppercase small fw-medium text-muted">Task</th>
                                    <th class="px-4 py-3 border-0 text-uppercase small fw-medium text-muted">Description</th>
                                    <th class="px-4 py-3 border-0 text-uppercase small fw-medium text-muted">Status</th>
                                    <th class="px-4 py-3 text-center border-0 text-uppercase small fw-medium text-muted">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tasks as $task)
                                <tr>
                                    <td class="px-4 py-3">
                                        <div class="fw-semibold text-dark">{{ $task->title }}</div>
                                    </td>
                                    <td class="px-4 py-3">
                                        <div class="text-muted small" style="max-width: 300px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                            {{ $task->description ?? 'No description' }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-3">
                                        @if($task->status == 'pending')
                                            <span class="px-3 py-2 badge bg-warning text-dark rounded-pill">
                                                <i class="fas fa-circle me-1" style="font-size: 0.5em;"></i>
                                                Pending
                                            </span>
                                        @elseif($task->status == 'in-progress')
                                            <span class="px-3 py-2 badge bg-info rounded-pill">
                                                <i class="fas fa-circle me-1" style="font-size: 0.5em;"></i>
                                                In Progress
                                            </span>
                                        @else
                                            <span class="px-3 py-2 badge bg-success rounded-pill">
                                                <i class="fas fa-circle me-1" style="font-size: 0.5em;"></i>
                                                Completed
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <div class="gap-2 d-flex justify-content-center">
                                            <a href="{{ route('tasks.edit', $task->id) }}"
                                               class="px-3 py-2 btn btn-outline-primary btn-sm rounded-3">
                                                <i class="fas fa-edit me-1"></i>Edit
                                            </a>
                                            <button wire:click="delete({{ $task->id }})"
                                                    onclick="return confirm('Are you sure you want to delete this task?')"
                                                    class="px-3 py-2 btn btn-outline-danger btn-sm rounded-3">
                                                <i class="fas fa-trash me-1"></i>Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <!-- Empty State -->
                <div class="py-5 text-center card-body">
                    <i class="mb-3 fas fa-clipboard-list text-muted" style="font-size: 4rem; opacity: 0.3;"></i>
                    <h4 class="mb-3 text-muted">No tasks yet</h4>
                    <p class="mb-4 text-muted">Get started by creating your first task.</p>
                    <a href="{{ route('tasks.create') }}" class="px-4 py-2 btn btn-primary rounded-3">
                        <i class="fas fa-plus me-2"></i>Create Task
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
.table-hover tbody tr:hover {
    background-color: rgba(0,0,0,.02);
}

.card {
    transition: all 0.2s ease-in-out;
}

.btn {
    transition: all 0.2s ease-in-out;
}

.btn:hover {
    transform: translateY(-1px);
}

.badge {
    font-size: 0.75em;
    font-weight: 500;
}
</style>
@endsection
