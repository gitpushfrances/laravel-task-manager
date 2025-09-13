<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Task Manager</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* Small polish */
        .card, .btn { transition: all .2s ease-in-out; }
        .btn:hover { transform: translateY(-1px); }
        .table-hover tbody tr:hover { background-color: rgba(0,0,0,.02); }
        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 .2rem rgba(13,110,253,.25);
            border-color: #0d6efd;
        }
    </style>
</head>
<body class="bg-light">
    <nav class="mb-4 navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('tasks.index') }}">
                <i class="fa-solid fa-clipboard-check me-2"></i> Task Manager
            </a>
            <a href="{{ route('tasks.create') }}" class="btn btn-light btn-sm">
                <i class="fas fa-plus me-1"></i> New Task
            </a>
        </div>
    </nav>

    <main class="container pb-5">
        @yield('content')
    </main>
</body>
</html>
