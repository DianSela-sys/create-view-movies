<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel Application')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/movie-detail.css') }}">

</head>

<body class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white">

    <!-- Header -->
    <header>
        <nav style="background: rgb(200, 126, 241); backdrop-filter: blur(10px);" class="fixed w-full z-20 top-0 border-b border-purple-200">
            <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                <a href="/" class="flex items-center">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Logo">
                    <span class="self-center text-2xl font-semibold whitespace-nowrap">MyApp</span>
                </a>
                <ul class="flex space-x-4">
                    <li><a href="{{ route('movies.index') }}" style="color: #ffffff; background-color: rgb(192, 0, 240); border-radius: 8px; padding: 10px 20px; text-decoration: none; text-align: center; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); transition: transform 0.2s, background-color 0.3s;" onmouseover="this.style.backgroundColor='rgb(84, 6, 148)'; this.style.transform='translateY(-3px)';" onmouseout="this.style.backgroundColor='rgb(192, 0, 240)'; this.style.transform='translateY(0)';">Home</a></li>
                    <li><a href="#about" style="color: #ffffff; background-color: rgb(192, 0, 240); border-radius: 8px; padding: 10px 20px; text-decoration: none; text-align: center; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); transition: transform 0.2s, background-color 0.3s;" onmouseover="this.style.backgroundColor='rgb(84, 6, 148)'; this.style.transform='translateY(-3px)';" onmouseout="this.style.backgroundColor='rgb(192, 0, 240)'; this.style.transform='translateY(0)';">About</a></li>
                    <li><a href="#services" style="color: #ffffff; background-color: rgb(192, 0, 240); border-radius: 8px; padding: 10px 20px; text-decoration: none; text-align: center; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); transition: transform 0.2s, background-color 0.3s;" onmouseover="this.style.backgroundColor='rgb(84, 6, 148)'; this.style.transform='translateY(-3px)';" onmouseout="this.style.backgroundColor='rgb(192, 0, 240)'; this.style.transform='translateY(0)';">Services</a></li>
                    <li><a href="#contact" style="color: #ffffff; background-color: rgb(192, 0, 240); border-radius: 8px; padding: 10px 20px; text-decoration: none; text-align: center; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); transition: transform 0.2s, background-color 0.3s;" onmouseover="this.style.backgroundColor='rgb(84, 6, 148)'; this.style.transform='translateY(-3px)';" onmouseout="this.style.backgroundColor='rgb(192, 0, 240)'; this.style.transform='translateY(0)';">Contact</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Main Content -->
    <main class="pt-20 min-h-screen bg-gray-50 dark:bg-gray-900">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer bg-[rgb(200,126,241)] w-full border-t border-[rgb(170,96,211)]">
        <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
            <div class="md:flex md:justify-between">
                <!-- Logo dan Nama Aplikasi -->
                <div class="mb-6 md:mb-0">
                    <a href="/" class="flex items-center">
                        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 me-3" alt="Logo" />
                        <span class="self-center text-2xl font-semibold text-black">MyApp</span>
                    </a>
                </div>
                <!-- Tautan -->
                <div class="flex items-center gap-4">
                    <a href="#" class="text-black hover:text-[rgba(200,126,241,0.7)] transition-colors duration-300">Privacy Policy</a>
                    <a href="#" class="text-black hover:text-[rgba(200,126,241,0.7)] transition-colors duration-300">Terms of Use</a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>