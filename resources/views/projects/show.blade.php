@extends('layouts.wrapper')

@section('content')


<main class="pb-16 lg:pb-24 bg-zinc-900 antialiased">
    <header class="bg-[url('https://flowbite.s3.amazonaws.com/blocks/marketing-ui/articles/background.png')] w-full h-[460px] xl:h-[537px] bg-no-repeat bg-cover bg-center bg-blend-darken relative">
        <div class="absolute top-0 left-0 w-full h-full bg-black bg-opacity-50"></div>
        <div class="absolute top-20 left-1/2 px-4 mx-auto w-full max-w-screen-xl -translate-x-1/2 xl:top-1/2 xl:-translate-y-1/2 xl:px-0">
            <span class="block mb-4 text-zinc-300">Published by <a href="#" class="font-semibold text-white hover:underline">{{ $project->user ? $project->user->name : 'Unknown' }}</a></span>
            <h1 class="mb-4 max-w-4xl text-2xl font-extrabold leading-none text-white sm:text-3xl lg:text-4xl">{{ $project->title }}</h1>
            <p class="text-lg font-normal text-zinc-300">Before going digital, you might scribbling down some ideas in a sketchbook.</p>
        </div>
    </header>
    <div class="flex relative z-20 justify-between p-6 -m-36 mx-4 max-w-screen-xl bg-zinc-800 rounded xl:-m-32 xl:p-9 xl:mx-auto">
        <article class="xl:w-[828px] w-full max-w-none format format-sm sm:format-base lg:format-lg format-blue format-invert">
            <div class="flex flex-col lg:flex-row justify-between lg:items-center">
                <div class="flex items-center space-x-3 text-zinc-400 text-base mb-2 lg:mb-0">
                    Published on {{ $project->created_at->format('F d, Y') }}
                </div>
            </div>

            <p class="py-5 text-lg font-normal text-white">{!! ($project->body) !!}</p>
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

<div class="project-details">
    <h1>{{ $project->title }}</h1>
    <p>Created by: {{ $project->user ? $project->user->name : 'Unknown' }}</p>

    @if($project->logos)
        <div id="logo-slideshow" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($project->logos as $index => $logo)
                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                        <img src="{{ asset('storage/' . $logo) }}" class="d-block w-100" alt="Project Logo">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#logo-slideshow" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#logo-slideshow" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    @endif

    <!-- Video Display -->
    @if($project->video_path)
        <div class="project-video mt-3">
            <video controls width="100%">
                <source src="{{ asset('storage/' . $project->video_path) }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    @endif


</div>

@endsection
