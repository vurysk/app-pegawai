@props(['pageTitle'])

<!DOCTYPE html>
<html lang="en" class="h-screen bg-gray-950"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pageTitle }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
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

        main::-webkit-scrollbar {
            width: 4px;
        }
        main::-webkit-scrollbar-track {
            background: #111827; 
        }
        main::-webkit-scrollbar-thumb {
            background: #4b5563; 
            border-radius: 10px;
        }
        main::-webkit-scrollbar-thumb:hover {
            background: #6b7280; 
        }
    </style>
</head>


<body class="h-screen flex flex-col font-[Inter] bg-gray-950 text-gray-100 overflow-hidden">
    
    <div class="flex-none">
        <x-navbar />
    </div>

    <div class="flex-none">
        <x-header :title="$pageTitle" />
    </div>


    <main class="flex-1 overflow-y-auto w-full max-w-8xl mx-auto px-4 sm:px-6 py-6">
        <div class="gradient-border rounded-2xl p-1 mb-4"> 
            <div class="bg-gray-800/90 backdrop-blur-sm rounded-2xl p-6 border border-gray-700/50">
                {{ $slot }}
            </div>
        </div>


        <footer class="text-center py-4 text-xs text-gray-400 border-t border-gray-800/50">
            <div class="max-w-8xl mx-auto">
                <p class="flex items-center justify-center space-x-2">
                    <span>© {{ date('Y') }} Employee System</span>
                    <span class="w-1 h-1 bg-gray-600 rounded-full"></span>
                    </p>
            </div>
        </footer>
    </main>

</body>
</html>



