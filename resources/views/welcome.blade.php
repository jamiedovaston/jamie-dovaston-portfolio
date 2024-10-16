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

@include("layouts.nav")

<section class="bg-zinc-900 bg-blend-multiply">
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
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>


@include("layouts.project")

</body>
</html>
