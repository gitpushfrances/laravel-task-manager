@extends('layouts.app')

@section('content')
<div class="row g-4">
    <!-- Stats -->
    @php
        $pendingCount = $tasks->where('status', 'pending')->count();
        $inProgressCount = $tasks->where('status', 'in-progress')->count();
        $completedCount = $tasks->where('status', 'completed')->count();
    @endphp

    <div class="col-12 col-md-4">
        <div class="text-center border-0 shadow-sm card">
            <div class="card-body">
                <i class="mb-2 fas fa-clock text-warning fa-2x"></i>
                <h6 class="text-muted">Pending</h6>
                <h3 class="fw-bold">{{ $pendingCount }}</h3>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4">
        <div class="text-center border-0 shadow-sm card">
            <div class="card-body">
                <i class="mb-2 fas fa-spinner text-info fa-2x"></i>
                <h6 class="text-muted">In Progress</h6>
                <h3 class="fw-bold">{{ $inProgressCount }}</h3>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4">
        <div class="text-center border-0 shadow-sm card">
            <div class="card-body">
                <i class="mb-2 fas fa-check-circle text-success fa-2x"></i>
                <h6 class="text-muted">Completed</h6>
                <h3 class="fw-bold">{{ $completedCount }}</h3>
            </div>
        </div>
    </div>
</div>

<!-- Task List -->
<div class="mt-4 border-0 shadow-sm card">
    <div class="bg-white card-header">
        <h5 class="mb-1">All Tasks</h5>
        <small class="text-muted">Manage and track your tasks</small>
    </div>

    @if($tasks->count() > 0)
        <div class="table-responsive">
            <table class="table mb-0 table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Task</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td class="fw-semibold">{{ $task->title }}</td>
                            <td class="text-muted small" style="max-width:250px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                                {{ $task->description ?? 'No description' }}
                            </td>
                            <td>
                                @if($task->status == 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($task->status == 'in-progress')
                                    <span class="badge bg-info">In Progress</span>
                                @else
                                    <span class="badge bg-success">Completed</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-outline-primary me-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Are you sure you want to delete this task?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="py-5 text-center card-body text-muted">
            <i class="mb-3 fas fa-clipboard-list fa-3x"></i>
            <p>No tasks yet. Create your first task to get started.</p>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-1"></i> Create Task
            </a>
        </div>
    @endif
</div>
@endsection
