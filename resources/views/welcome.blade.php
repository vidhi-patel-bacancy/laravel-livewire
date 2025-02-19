<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>

<body class="bg-gray-100">
<div class="flex flex-col items-center min-h-screen">
    <header class="w-full bg-blue-600 text-white text-center py-4 text-xl font-semibold shadow-md">
        Laravel Livewire Dashboard
    </header>

    <!-- Two Column Layout -->
    <div class="grid grid-cols-2 md:grid-cols-1 gap-6 mt-10 w-full max-w-6xl">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Manage Your Application</h2>
            <div>
                @livewire('todo-list')
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Manage Your Users</h2>
            <div>
                @livewire('register-user')
            </div>
        </div>
    </div>
</div>

@livewireScripts
</body>

</html>
