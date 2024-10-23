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

<body class="text-white snap-container relative">

@include("layouts.nav")


<section class="min-h-screen bg-white dark:bg-zinc-900">
    <div class="py-8 mx-auto max-w-6xl lg:py-16">
        <div class="grid gap-4 px-4 mb-4 sm:mb-5 sm:grid-cols-3 sm:gap-6 md:gap-12">
            <!-- Column -->
            <div class="sm:col-span-2">
                <div class="flex items-center space-x-4">
                    <img class="mb-4 w-16 h-16 rounded-full sm:w-20 sm:h-20" src="https://avatars.githubusercontent.com/u/124085280?v=4" alt="Helene avatar">
                    <div>
                        <h2 class="flex items-center mb-2 text-xl font-bold leading-none text-zinc-900 sm:text-2xl dark:text-white">
                            Jamie Dovaston
                        </h2>
                    </div>
                </div>
                <dl>
                    <dt class="mb-2 font-semibold leading-none text-zinc-900 dark:text-white">About Me</dt>
                    <dd class="mb-4 font-light text-zinc-500 sm:mb-5 dark:text-zinc-400">{!! $contact->content ?? 'Contact information will be added soon.' !!}
                    </dd>
                    <dt class="mb-2 font-semibold leading-none text-zinc-900 dark:text-white">Socials</dt>
                    <dd class="inline-flex items-center mb-4 space-x-1 sm:mb-5">
                        <a href="https://jamie-dovaston.itch.io/" data-tooltip-target="tooltip-facebook" class="p-2 text-zinc-500 rounded-lg hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-white hover:bg-zinc-100 dark:hover:bg-zinc-700">
                            <img class="w-6 h-6 text-zinc-800 dark:text-white" src="https://jamie-portfolio-zipline.xrdxno.easypanel.host/u/OgjgVd.png" alt="Helene avatar">
                            <span class="sr-only">Itch.io</span>
                        </a>
                        <div id="tooltip-facebook" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-zinc-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-zinc-700">
                            Itch.io profile
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <a href="https://github.com/jamiedovaston" data-tooltip-target="tooltip-Github" class="p-2 text-zinc-500 rounded-lg hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-white hover:bg-zinc-100 dark:hover:bg-zinc-700">
                            <img class="w-6 h-6 text-zinc-800 dark:text-white" src="https://jamie-portfolio-zipline.xrdxno.easypanel.host/u/miE9c1.png" alt="Helene avatar">
                            <span class="sr-only">Github</span>
                        </a>
                        <div id="tooltip-Github" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-zinc-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-zinc-700">
                            Github profile
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                        <a href="https://www.linkedin.com/in/jamie-dovaston-814b71273/" data-tooltip-target="tooltip-Linkedin" class="p-2 text-zinc-500 rounded-lg hover:text-zinc-900 dark:text-zinc-400 dark:hover:text-white hover:bg-zinc-100 dark:hover:bg-zinc-700">
                            <img class="w-6 h-6 text-zinc-800 dark:text-white" src="https://jamie-portfolio-zipline.xrdxno.easypanel.host/u/Dtz4Rc.png" alt="Helene avatar">
                            <span class="sr-only">Linkedin</span>
                        </a>
                        <div id="tooltip-Linkedin" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-zinc-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-zinc-700">
                            Linkedin profile
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </dd>
                </dl>
            </div>
            <!-- Column -->
            <dl>
                <dt class="mb-2 font-semibold leading-none text-zinc-900 dark:text-white">Email Adress</dt>
                <dd class="mb-4 font-light text-zinc-500 sm:mb-5 dark:text-zinc-400">jamiedovaston@outlook.com</dd>
                <dt class="mb-2 font-semibold leading-none text-zinc-900 dark:text-white">CV</dt>
                <a href="https://jamie-portfolio-zipline.xrdxno.easypanel.host/u/uAZiIp.pdf" class="mb-4 font-light text-zinc-500 sm:mb-5 dark:text-zinc-400">Preview</a>
            </dl>
        </div>
    </div>
</section>

@include("layouts.footer")

</body>
</html>

