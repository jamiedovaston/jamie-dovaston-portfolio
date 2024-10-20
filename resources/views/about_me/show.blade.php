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

<main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-zinc-900 antialiased">
        @if($aboutMe)
            <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">{{ $aboutMe->title }}</h1>
            <div class="markdown-content">
                {!! \Illuminate\Support\Str::markdown($aboutMe->content) !!}
            </div>
        @else
            <p>No content available.</p>
        @endif
</main>



</body>
</html>
