<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Elite System</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <style>
        .glow-text {
            text-shadow: 0 0 20px rgba(139, 92, 246, 0.6);
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #0f172a 100%);
        }
        
        .floating-logo {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .pulse-glow {
            animation: pulse-glow 2s ease-in-out infinite alternate;
        }
        
        @keyframes pulse-glow {
            from { box-shadow: 0 0 20px rgba(139, 92, 246, 0.4); }
            to { box-shadow: 0 0 40px rgba(139, 92, 246, 0.8); }
        }
    </style>
</head>

<body class="antialiased bg-gray-950 min-h-screen font-[Inter]">
    <section class="gradient-bg lg:grid lg:min-h-screen lg:place-content-center">
        <div class="mx-auto w-screen max-w-4xl px-4 py-16 sm:px-6 sm:py-24 lg:px-8 lg:py-32">
            <div class="mx-auto max-w-prose text-center">
                <!-- Logo Section -->
                <div class="flex justify-center mb-12">
                    <div class="relative group">
                        <!-- Outer Glow Ring -->
                        <div class="absolute inset-0 rounded-full bg-gradient-to-r from-purple-600 to-pink-600 blur-lg opacity-75 group-hover:opacity-100 transition-opacity duration-500"></div>
                        
                        <!-- Logo Container -->
                        <div class="relative floating-logo pulse-glow bg-gray-900 rounded-full p-6 border border-purple-500/30">
                            <img src="/image/owl2.png" alt="HR Elite System" 
                                 class="w-24 h-24 lg:w-32 lg:h-32 transition-transform duration-500 group-hover:scale-110">
                        </div>
                    </div>
                </div>

                <!-- Text Content -->
                <h1 class="text-3xl font-light text-gray-300 sm:text-4xl mb-6">
                    Welcome to
                </h1>

                <h2 class="text-6xl font-bold bg-gradient-to-r from-purple-400 via-pink-400 to-purple-400 bg-clip-text text-transparent sm:text-7xl glow-text mb-8">
                   Employee System
                </h2>

                <p class="text-xl text-gray-400 sm:text-2xl max-w-2xl mx-auto leading-relaxed mb-12">
                    Crafted with precision for modern workforce
                </p>

                <!-- CTA Button -->
                <div class="flex justify-center">
                    <a class="px-12 py-4 bg-gradient-to-r from-purple-800 to-purple-800 text-white font-medium rounded-xl shadow-2xl transform transition-all duration-300 hover:from-purple-700 hover:to-purple-700 hover:scale-105 hover:shadow-purple-500/25 border border-purple-900 flex items-center space-x-3"
                       href="{{ route('employees.index') }}">
                        <span>Enter System</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

