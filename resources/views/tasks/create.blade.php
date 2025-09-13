@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="border-0 shadow-sm card">
            <div class="text-white card-header bg-primary">
                <h5 class="mb-0"><i class="fas fa-plus me-2"></i>Create Task</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Task Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" value="{{ old('title') }}"
                               class="form-control @error('title') is-invalid @enderror"
                               placeholder="Enter task title" required>
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea name="description" rows="3"
                                  class="form-control @error('description') is-invalid @enderror"
                                  placeholder="Optional">{{ old('description') }}</textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Initial Status</label>
                        <select name="status" class="form-select">
                            <option value="pending">📋 Pending</option>
                            <option value="in-progress">⚡ In Progress</option>
                            <option value="completed">✅ Completed</option>
                        </select>
                    </div>

                    <div class="gap-2 d-flex justify-content-end">
                        <a href="{{ route('tasks.index') }}" class="btn btn-outline-secondary">Cancel</a>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-plus me-1"></i> Create Task
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
