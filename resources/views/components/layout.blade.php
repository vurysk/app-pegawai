@props(['pageTitle'])

<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }} - HR Elite</title>

    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    
    <style>
        .gradient-border {
            background: linear-gradient(135deg, #1f2937, #111827);
            position: relative;
        }
        .gradient-border::before {
            content: '';
            position: absolute;
            inset: -1px;
            background: linear-gradient(135deg, #a57fff, #9000ff, #e8c6ff);
            border-radius: inherit;
            z-index: -1;
        }
    </style>
</head>

<body class="min-h-screen flex flex-col font-[Inter] bg-gray-950 text-gray-100">
    <x-navbar />
    <x-header :title="$pageTitle" />

    <main class="flex-grow mx-auto w-full max-w-8xl px-6 py-8">
        <div class="gradient-border rounded-2xl p-1">
            <div class="bg-gray-800/90 backdrop-blur-sm rounded-2xl p-8 border border-gray-700/50">
                {{ $slot }}
            </div>
        </div>
    </main>

    <footer class="text-center py-6 text-sm text-gray-100 border-t border-gray-800/50 mt-12">
        <div class="max-w-8xl mx-auto">
            <p class="flex items-center justify-center space-x-2">
                <span>© {{ date('Y') }} HR Elite System</span>
                <span class="w-1 h-1 bg-gray-600 rounded-full"></span>
                <span>Crafted with precision for modern workforce</span>
            </p>
        </div>
    </footer>
</body>
</html>

