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
                        <li class="breadcrumb-item active text-dark fw-medium" aria-current="page">Create New Task</li>
                    </ol>
                </nav>

                <!-- Main Form Card -->
                <div class="overflow-hidden border-0 shadow-sm card">
                    <!-- Header -->
                    <div class="p-4 text-white card-header bg-primary bg-gradient">
                        <div class="d-flex align-items-center">
                            <div class="p-3 bg-white bg-opacity-25 rounded-3 me-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                <i class="text-white fas fa-plus"></i>
                            </div>
                            <div>
                                <h4 class="mb-1 fw-bold">Create New Task</h4>
                                <p class="mb-0 text-white-50 small">Add a new task to your task manager</p>
                            </div>
                        </div>
                    </div>

                    <!-- Form Content -->
                    <div class="p-4 card-body">
                        <form action="{{ route('tasks.store') }}" method="POST">
                            @csrf

                            <!-- Task Title -->
                            <div class="mb-4">
                                <label for="title" class="form-label fw-semibold text-dark">
                                    Task Title <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input type="text"
                                           id="title"
                                           name="title"
                                           value="{{ old('title') }}"
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
                                              placeholder="Describe your task... (optional)">{{ old('description') }}</textarea>
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
                                    Initial Status
                                </label>
                                <select id="status"
                                        name="status"
                                        class="form-select form-select-lg border-0 bg-light @error('status') is-invalid @enderror">
                                    <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>
                                        📋 Pending
                                    </option>
                                    <option value="in-progress" {{ old('status') == 'in-progress' ? 'selected' : '' }}>
                                        ⚡ In Progress
                                    </option>
                                    <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>
                                        ✅ Completed
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Form Actions -->
                            <div class="pt-4 mt-4 border-top">
                                <div class="gap-2 d-flex flex-column flex-sm-row justify-content-end">
                                    <a href="{{ route('tasks.index') }}"
                                       class="px-4 py-2 btn btn-outline-secondary rounded-3">
                                        <i class="fas fa-times me-2"></i>Cancel
                                    </a>
                                    <button type="submit"
                                            class="px-5 py-2 shadow-sm btn btn-success btn-lg rounded-3 fw-semibold">
                                        <i class="fas fa-plus me-2"></i>Create Task
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Tips Card -->
                <div class="mt-4 border-0 card bg-primary bg-opacity-10">
                    <div class="p-4 card-body">
                        <div class="d-flex align-items-start">
                            <div class="me-3">
                                <i class="fas fa-info-circle text-primary fs-4"></i>
                            </div>
                            <div>
                                <h6 class="mb-2 fw-semibold text-primary">Tips for creating effective tasks</h6>
                                <ul class="mb-0 text-primary-emphasis small">
                                    <li class="mb-1">Use clear, action-oriented titles</li>
                                    <li class="mb-1">Include specific details in the description</li>
                                    <li class="mb-0">Set appropriate initial status based on your workflow</li>
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
    border-color: #0d6efd;
    box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
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
</style>
@endsection
