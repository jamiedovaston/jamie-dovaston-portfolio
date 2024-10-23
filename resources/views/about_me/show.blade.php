<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jamie Dovaston</title>
    <script src="https://cdn.tailwindcss.com"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/animation.css'])

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

</head>

<body class="bg-zinc-900 snap-container relative">

@include("layouts.nav")

<main class="min-h-screen pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-zinc-900 antialiased">
    <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
        <article class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
            <header class="mb-4 lg:mb-6 not-format">
                <address class="flex items-center mb-6 not-italic">
                    <div class="inline-flex items-center mr-3 text-sm text-zinc-900 dark:text-white">
                        <img class="mr-4 w-16 h-16 rounded-full" src="https://avatars.githubusercontent.com/u/124085280?v=4" alt="Jese Leos">
                        <div>
                            <a href="#" rel="author" class="text-xl font-bold text-zinc-900 dark:text-white">Jamie Dovaston</a>
                        </div>
                    </div>
                </address>
                <h1 class="mb-4 text-3xl font-extrabold leading-tight text-zinc-900 lg:mb-6 lg:text-4xl dark:text-white">About me</h1>
            </header>
            <div class="dark:text-white">{!! \Illuminate\Support\Str::markdown($aboutMe->content) !!}</div>
        </article>
    </div>
</main>

@include("layouts.footer")

</body>
</html>
