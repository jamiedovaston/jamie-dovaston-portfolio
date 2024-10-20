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
        <h1 class="text-3xl font-bold">{{ $contact->title ?? 'Contact Us' }}</h1>
        <div class="mt-4">
            {!! $contact->content ?? 'Contact information will be added soon.' !!}
        </div>
</main>



</body>
</html>

