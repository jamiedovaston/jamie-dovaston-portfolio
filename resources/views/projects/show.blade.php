@extends('layouts.wrapper')

@section('content')

@include("layouts.nav")

<body class="overflow-y-scroll no-scrollbar" style="background-color: {{ $project->background_primary_color }};">

<main class="pb-16 lg:pb-24 bg-zinc-900 antialiased min-h-screen" style="background-color: {{ $project->background_primary_color }};">
    <div class="relative w-full h-[460px] xl:h-[537px]">
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
                                <div class="relative mb-4 overflow-hidden rounded-lg" style="padding-top: 56.25%;"> <!-- 16:9 ratio (9/16 = 0.5625 or 56.25%) -->
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




    <div class="flex relative z-20 justify-between p-6 -m-36 mx-4 max-w-screen-xl bg-zinc-800 min-h-screen xl:-m-32 xl:p-9 xl:mx-auto" style="background-color: {{ $project->article_color }};">
        <article class="xl:w-[828px] w-full max-w-none format format-sm sm:format-base lg:format-lg format-blue format-invert">
            <div class="py-5 text-lg font-normal text-white">{!! ($project->body) !!}</div>
        </article>
        <aside class="hidden xl:block" aria-labelledby="sidebar-label">
            <div class="xl:w-[336px] sticky top-6">
                <h3 id="sidebar-label" class="sr-only">Sidebar</h3>
                <div class="mb-12">
                    <h4 class="mb-4 text-sm font-bold text-white uppercase">Latest news</h4>
                    <div class="mb-6 flex items-center">
                        <a href="#" class="shrink-0">
                            <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/articles/image-1.png" class="mr-4 max-w-full w-24 h-24 rounded-lg" alt="Image 1">
                        </a>
                        <div>
                            <h5 class="mb-2 text-lg font-bold leading-tight text-white">Our first office</h5>
                            <p class="mb-2 text-zinc-400">Over the past year, Volosoft has undergone changes.</p>
                            <a href="#" class="inline-flex items-center font-medium underline underline-offset-4 text-blue-500 hover:no-underline">
                                Read in 9 minutes
                            </a>
                        </div>
                    </div>
                    <div class="mb-6 flex items-center">
                        <a href="#" class="shrink-0">
                            <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/articles/image-2.png" class="mr-4 max-w-full w-24 h-24 rounded-lg" alt="Image 2">
                        </a>
                        <div>
                            <h5 class="mb-2 text-lg font-bold leading-tight text-white">Enterprise Design tips</h5>
                            <p class="mb-2 text-zinc-400">Over the past year, Volosoft has undergone changes.</p>
                            <a href="#" class="inline-flex items-center font-medium underline underline-offset-4 text-blue-500 hover:no-underline">
                                Read in 14 minutes
                            </a>
                        </div>
                    </div>
                    <div class="mb-6 flex items-center">
                        <a href="#" class="shrink-0">
                            <img src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/articles/image-3.png" class="mr-4 max-w-full w-24 h-24 rounded-lg" alt="Image 3">
                        </a>
                        <div>
                            <h5 class="mb-2 text-lg font-bold leading-tight text-white">Partnered up with Google</h5>
                            <p class="mb-2 text-zinc-400">Over the past year, Volosoft has undergone changes.</p>
                            <a href="#" class="inline-flex items-center font-medium underline underline-offset-4 text-blue-500 hover:no-underline">
                                Read in 9 minutes
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>
</main>

@endsection
