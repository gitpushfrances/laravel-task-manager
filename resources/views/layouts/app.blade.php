<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Task Manager</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 min-h-screen font-sans">
    <nav class="bg-blue-600 p-4 text-white font-bold text-xl">
        Laravel Task Manager
    </nav>

    <main class="container mx-auto py-6">
        @yield('content')
    </main>
</body>
</html>
