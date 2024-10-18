@extends('layouts.wrapper')

@section('content')

    @include("layouts.nav")


<main class="pb-16 lg:pb-24 bg-zinc-900 antialiased">
    <div class="relative w-full h-[460px] xl:h-[537px] bg-[url('{{ asset('storage/' . $background_image) }}')] bg-no-repeat bg-cover bg-center bg-blend-darken">
        <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50"></div>

        <div class="absolute top-20 left-1/2 mx-auto w-full max-w-screen-xl -translate-x-1/2 xl:top-1/2 xl:-translate-y-1/2">
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-8 items-center">
                <!-- Text Content -->
                <div class="px-4 xl:px-0">
                <span class="block mb-4 text-zinc-300">
                    Published by
                    <a href="#" class="font-semibold text-white hover:underline">{{ $project->user ? $project->user->name : 'Unknown' }}</a>
                </span>
                    <h1 class="mb-4 max-w-4xl text-2xl font-extrabold leading-none text-white sm:text-3xl lg:text-4xl">{{ $project->title }}</h1>
                    <div class="text-lg font-normal text-zinc-300">{!! $project->shortline_description !!}</div>
                </div>

                <!-- Carousel Content -->
                <div class="w-full max-w-md mx-auto" id="animation-carousel" data-carousel="slide">
                    <div class="relative h-[360px] overflow-hidden">
                        <!-- Carousel item 1 -->
                        <div class="absolute inset-0 z-10 -translate-x-full transition-all duration-700 ease-in-out" data-carousel-item="">
                            <div class="rounded-lg border border-zinc-200 bg-zinc-50 p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-800">
                                <a href="#">
                                    <img class="mx-auto mb-4 h-48 dark:hidden md:mb-6" src="https://image.overtimehosting.cloud/u/CNtAty.png" alt="keyboard" />
                                    <img class="mx-auto mb-4 hidden h-48 dark:block md:mb-6" src="https://image.overtimehosting.cloud/u/CNtAty.png" alt="keyboard" />
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Carousel Navigation -->
                    <div class="mt-4 flex items-center justify-center md:mt-6">
                        <button type="button" class="group mr-4 flex h-full cursor-pointer items-center justify-center focus:outline-none" data-carousel-prev="">
                        <span class="text-zinc-500 hover:text-zinc-700 dark:text-zinc-400 dark:hover:text-zinc-200">
                            <svg aria-hidden="true" class="h-7 w-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                        </button>
                        <button type="button" class="group flex h-full cursor-pointer items-center justify-center focus:outline-none" data-carousel-next="">
                        <span class="text-zinc-500 hover:text-zinc-700 dark:text-zinc-400 dark:hover:text-zinc-200">
                            <svg aria-hidden="true" class="h-7 w-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="flex relative z-20 justify-between p-6 -m-36 mx-4 max-w-screen-xl bg-zinc-800 rounded xl:-m-32 xl:p-9 xl:mx-auto">
        <article class="xl:w-[828px] w-full max-w-none format format-sm sm:format-base lg:format-lg format-blue format-invert">
            <div class="flex flex-col lg:flex-row justify-between lg:items-center">
                <div class="flex items-center space-x-3 text-zinc-400 text-base mb-2 lg:mb-0">
                    Published on {{ $project->created_at->format('F d, Y') }}
                </div>
            </div>

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



    <!-- Video Display -->
    @if($project->video_path)
        <div class="project-video mt-3">
            <video controls width="100%">
                <source src="{{ asset('storage/' . $project->video_path) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    @endif



@endsection
