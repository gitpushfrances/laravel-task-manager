@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="border-0 shadow-sm card">
            <div class="card-header bg-warning text-dark">
                <h5 class="mb-0"><i class="fas fa-edit me-2"></i>Edit Task</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Task Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" value="{{ old('title', $task->title) }}"
                               class="form-control @error('title') is-invalid @enderror" required>
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea name="description" rows="3"
                                  class="form-control @error('description') is-invalid @enderror">{{ old('description', $task->description) }}</textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Status</label>
                        <select name="status" class="form-select">
                            <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>📋 Pending</option>
                            <option value="in-progress" {{ $task->status == 'in-progress' ? 'selected' : '' }}>⚡ In Progress</option>
                            <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>✅ Completed</option>
                        </select>
                    </div>

                    <div class="gap-2 d-flex justify-content-end">
                        <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save me-1"></i> Update Task
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
