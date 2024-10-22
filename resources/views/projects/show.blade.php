@extends('layouts.wrapper')

@section('content')

    @include("layouts.nav")

    <body class="overflow-y-scroll no-scrollbar" style="background-color: {{ $project->background_primary_color }};">

    <main class="pb-16 lg:pb-24 bg-zinc-900 antialiased min-h-screen" style="background-color: {{ $project->background_primary_color }};">
        <div class="relative w-full h-[460px] xl:h-[400] xl:mt-5">
            <!-- Blurred Background -->
            <div class="absolute top-0 left-0 w-full h-full bg-[url('{{ $background_image }}')] bg-no-repeat bg-cover bg-center bg-blend-darken blur-3xl"></div>

            <div class="absolute top-20 left-1/2 mx-auto w-full max-w-screen-xl -translate-x-1/2 xl:top-1/2 xl:-translate-y-1/2">
                <div class="grid grid-cols-1 xl:grid-cols-2 gap-8 items-center">
                    <!-- Text Content -->
                    <div class="px-4 xl:px-0">
                        <h1 class="mb-4 max-w-4xl text-2xl font-extrabold leading-none text-white sm:text-3xl lg:text-4xl">{{ $project->title }}</h1>
                        <div class="text-lg font-normal text-zinc-300">{!! $project->shortline_description !!}</div>
                    </div>

                    <!-- Carousel Content -->
                    <div class="w-full max-w-md mx-auto" id="animation-carousel" data-carousel="slide">
                        <div class="relative h-[360px] overflow-hidden">
                            <!-- Carousel wrapper -->
                            @if(!empty($project->images) && is_array($project->images))
                                <div id="animation-carousel" class="relative w-full" data-carousel="slide">
                                    <!-- Carousel wrapper with 16:9 aspect ratio -->
                                    <div class="relative mb-2 overflow-hidden rounded-lg" style="padding-top: 56.25%;"> <!-- Reduced mb-4 to mb-2 -->
                                        <div class="absolute inset-0 image-gallery">
                                            @foreach($project->images as $index => $image)
                                                <div class="{{ $index === 0 ? 'block' : 'hidden' }} duration-700 ease-in-out" data-carousel-item>
                                                    <img src="{{ $image }}" class="absolute inset-0 w-full h-full object-cover" alt="Project Image {{ $index + 1 }}" />
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @else
                                <p>No images available for this project.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Flex container for article and sidebar -->
        <div class="flex flex-col xl:flex-row relative z-20 justify-between p-6 mt-0 xl:mt-0 mx-4 max-w-screen-xl bg-zinc-800 xl:p-9 xl:mx-auto rounded-3xl" style="background-color: {{ $project->article_color }};">
            <!-- Reduced mt-8 to mt-4 -->

            <!-- Article Section -->
            <article class="xl:w-[828px] w-full max-w-none format format-sm sm:format-base lg:format-lg format-blue format-invert bg-black bg-opacity-15 rounded-2xl mb-6 xl:mb-0">
                <div class="py-5 text-lg font-normal text-white p-5">{!! ($project->body) !!}</div>
            </article>

            <!-- Sidebar Section -->
            <aside class="w-full xl:w-auto xl:block bg-black bg-opacity-15 rounded-2xl" aria-labelledby="sidebar-label">
                <div class="xl:w-[336px] sticky top-6 p-5">
                    <h3 id="sidebar-label" class="sr-only">Sidebar</h3>
                    <div class="mb-12">
                        <h4 class="mb-4 text-sm font-bold text-white uppercase">Software Used</h4>
                        <div class="mb-6 flex items-center border-4 rounded-3xl" style="background-color: darkslategray; border-color: darkcyan;">
                            <img src="https://jamie-portfolio-zipline.xrdxno.easypanel.host/u/pIBxWE.png" class="p-1.5 h-12">
                            <p class="text-lg font-bold leading-tight text-white">Unity Engine</p>
                        </div>
                        <div class="mb-6 flex items-center border-4 rounded-3xl" style="background-color: darkslategray; border-color: darkcyan;">
                            <img src="https://jamie-portfolio-zipline.xrdxno.easypanel.host/u/pIBxWE.png" class="p-1.5 h-12">
                            <p class="text-lg font-bold leading-tight text-white">Another Tool</p>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </main>

@endsection
