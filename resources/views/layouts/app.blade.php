<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Task Manager</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen font-sans bg-gray-100">
    <nav class="p-4 text-xl font-bold text-white bg-blue-600">
        Laravel Task Manager
    </nav>

    <main class="container py-6 mx-auto">
        @yield('content')
    </main>
</body>
</html>
