<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jamie Dovaston</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-zinc-900 text-white snap-container relative">

@include("layouts.nav")

<section class="relative bg-zinc-900 bg-blend-multiply">
    <!-- Video background -->
    <video autoplay loop muted playsinline controlsList="nodownload" class="absolute inset-0 w-full h-full object-cover z-10">
        <source src="https://jamie-portfolio-zipline.xrdxno.easypanel.host/u/OGSMDn.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <!-- Overlay content -->
    <div class="relative z-10 bg-black bg-opacity-75">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-24 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 data-key="title" class="lang max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl text-white">
                    Jamie Dovaston
                </h1>
                <p data-key="description" class="lang max-w-2xl mb-6 font-semibold lg:mb-8 md:text-xl lg:text-2xl text-gray-200 shadow-lg">
                    Level 5 Games Design and Programming Student at Staffordshire University
                </p>
                <a href="https://www.jamiedovaston.com/about-me"
                   class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg ring-2 ring-blue-800 transition-colors hover:bg-blue-800 hover:ring-blue-900 cursor-pointer">
                    About Me
                </a>
            </div>
        </div>
    </div>
</section>


<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>


@include("layouts.project")

</body>
</html>
