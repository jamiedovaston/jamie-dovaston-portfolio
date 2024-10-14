<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jamie Dovaston</title>
    <script src="https://cdn.tailwindcss.com"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/animation.css'])

</head>

<body class="text-white snap-container relative">

<!-- Video Background -->
<video autoplay muted loop playsinline class="absolute top-1/2 left-1/2 w-auto min-w-full min-h-full max-w-none transform -translate-x-1/2 -translate-y-1/2 z-0">
    <source src="https://image.overtimehosting.cloud/u/dh5TRP.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>


<div class="relative z-10">
    <header class="bg-zinc-800 p-4 bg-opacity-60">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-white text-2xl font-bold">
                <a href="#" class="hover:text-blue-500 transition">Jamie Dovaston</a>
            </div>
            <nav class="space-x-6">
                <a href="/" class="text-white font-medium hover:text-blue-500 transition">Home</a>
                <a href="/projects" class="text-white font-medium hover:text-blue-500 transition">Projects</a>
                <a href="/contact" class="text-white font-medium hover:text-blue-500 transition">Contact</a>
                <a href="/about-me" class="text-white font-medium px-4 py-2 rounded ring-2 ring-blue-800 hover:bg-blue-800 hover:ring-blue-900 transition">
                    About Me
                </a>
            </nav>
        </div>
    </header>

    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1 data-key="title" class="lang max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl text-white">Jamie Dovaston</h1>
            <p data-key="description" class="lang max-w-2xl mb-6 font-light lg:mb-8 md:text-lg lg:text-xl text-gray-400">Work in progress project managed by someone</p>
            <a href="https://www.jamiedovaston.com/about-me" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg ring-2 ring-blue-800 transition-colors hover:bg-blue-800 hover:ring-blue-900 cursor-pointer">
                About Me
            </a>
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex w-72 h-72 ml-auto">
            <img src="https://image.overtimehosting.cloud/u/RrfJ62.webp" alt="Jamie Dovaston Image">
        </div>
    </div>

    @include("layouts.project")
</div>

</body>
</html>
