@extends('layouts.app')

@section('content')
<div class="py-4 container-fluid" style="background-color: #f8f9fa; min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb" class="mb-4">
                    <ol class="p-0 bg-transparent breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('tasks.index') }}" class="text-decoration-none">Tasks</a>
                        </li>
                        <li class="breadcrumb-item active text-dark fw-medium" aria-current="page">Edit Task</li>
                    </ol>
                </nav>

                <!-- Main Form Card -->
                <div class="overflow-hidden border-0 shadow-sm card">
                    <!-- Header -->
                    <div class="p-4 text-white card-header bg-warning bg-gradient">
                        <div class="d-flex align-items-center">
                            <div class="p-3 bg-white bg-opacity-25 rounded-3 me-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                <i class="text-white fas fa-edit"></i>
                            </div>
                            <div>
                                <h4 class="mb-1 fw-bold">Edit Task</h4>
                                <p class="mb-0 text-white-50 small">Update your task information</p>
                            </div>
                        </div>
                    </div>

                    <!-- Current Task Info -->
                    <div class="p-3 bg-light border-bottom">
                        <div class="flex-wrap gap-2 d-flex align-items-center justify-content-between">
                            <div class="flex-wrap gap-2 d-flex align-items-center">
                                <span class="badge bg-secondary small">Current:</span>
                                <span class="fw-semibold text-dark">{{ $task->title }}</span>
                                @if($task->status == 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($task->status == 'in-progress')
                                    <span class="badge bg-info">In Progress</span>
                                @else
                                    <span class="badge bg-success">Completed</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Form Content -->
                    <div class="p-4 card-body">
                        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Task Title -->
                            <div class="mb-4">
                                <label for="title" class="form-label fw-semibold text-dark">
                                    Task Title <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input type="text"
                                           id="title"
                                           name="title"
                                           value="{{ old('title', $task->title) }}"
                                           class="form-control form-control-lg border-0 bg-light @error('title') is-invalid @enderror"
                                           placeholder="Enter task title..."
                                           required>
                                    <span class="border-0 input-group-text bg-light">
                                        <i class="fas fa-edit text-muted"></i>
                                    </span>
                                </div>
                                @error('title')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Task Description -->
                            <div class="mb-4">
                                <label for="description" class="form-label fw-semibold text-dark">
                                    Description
                                </label>
                                <div class="position-relative">
                                    <textarea id="description"
                                              name="description"
                                              rows="4"
                                              class="form-control border-0 bg-light @error('description') is-invalid @enderror"
                                              placeholder="Describe your task... (optional)">{{ old('description', $task->description) }}</textarea>
                                    <span class="top-0 p-3 position-absolute end-0">
                                        <i class="fas fa-align-left text-muted"></i>
                                    </span>
                                </div>
                                @error('description')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Task Status -->
                            <div class="mb-4">
                                <label for="status" class="form-label fw-semibold text-dark">
                                    Task Status
                                </label>
                                <select id="status"
                                        name="status"
                                        class="form-select form-select-lg border-0 bg-light @error('status') is-invalid @enderror">
                                    <option value="pending" {{ old('status', $task->status) == 'pending' ? 'selected' : '' }}>
                                        📋 Pending
                                    </option>
                                    <option value="in-progress" {{ old('status', $task->status) == 'in-progress' ? 'selected' : '' }}>
                                        ⚡ In Progress
                                    </option>
                                    <option value="completed" {{ old('status', $task->status) == 'completed' ? 'selected' : '' }}>
                                        ✅ Completed
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Task Timestamps (Read-only info) -->
                            <div class="p-4 mb-4 border bg-light rounded-3">
                                <h6 class="mb-3 fw-semibold text-dark">Task Information</h6>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="small">
                                            <span class="text-muted">Created:</span>
                                            <span class="text-dark ms-2 fw-medium">{{ $task->created_at->format('M d, Y \a\t g:i A') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="small">
                                            <span class="text-muted">Last Updated:</span>
                                            <span class="text-dark ms-2 fw-medium">{{ $task->updated_at->format('M d, Y \a\t g:i A') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="pt-4 mt-4 border-top">
                                <div class="gap-2 d-flex flex-column flex-sm-row justify-content-end">
                                    <a href="{{ route('tasks.index') }}"
                                       class="px-4 py-2 btn btn-outline-secondary rounded-3">
                                        <i class="fas fa-times me-2"></i>Cancel
                                    </a>
                                    <button type="submit"
                                            class="px-5 py-2 text-white shadow-sm btn btn-warning btn-lg rounded-3 fw-semibold">
                                        <i class="fas fa-save me-2"></i>Update Task
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Tips Card -->
                <div class="mt-4 border-0 card bg-warning bg-opacity-10">
                    <div class="p-4 card-body">
                        <div class="d-flex align-items-start">
                            <div class="me-3">
                                <i class="fas fa-info-circle text-warning fs-4"></i>
                            </div>
                            <div>
                                <h6 class="mb-2 fw-semibold text-warning-emphasis">Tips for updating tasks</h6>
                                <ul class="mb-0 text-warning-emphasis small">
                                    <li class="mb-1">Update status as you progress through the task</li>
                                    <li class="mb-1">Add more details to the description when needed</li>
                                    <li class="mb-0">Consider breaking large tasks into smaller ones</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.form-control:focus, .form-select:focus {
    border-color: #ffc107;
    box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
}

.btn {
    transition: all 0.2s ease-in-out;
}

.btn:hover {
    transform: translateY(-1px);
}

.card {
    transition: all 0.2s ease-in-out;
}

.bg-light {
    background-color: #f8f9fa !important;
}

.btn-warning {
    background: linear-gradient(135deg, #ffc107, #ff8800);
    border-color: #ffc107;
}

.btn-warning:hover {
    background: linear-gradient(135deg, #ff8800, #ffc107);
    border-color: #ff8800;
}
</style>
@endsection
