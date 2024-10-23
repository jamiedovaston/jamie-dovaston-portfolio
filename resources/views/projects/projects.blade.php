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

<section class="bg-zinc-900 antialiased min-h-screen">
    <div class="max-w-screen-xl px-4 py-8 mx-auto lg:px-6 sm:py-16 lg:py-24">
        <div class="max-w-2xl mx-auto space-y-4 text-center">
            <h2 class="text-3xl font-extrabold leading-tight tracking-tight text-white sm:text-4xl">
                My Projects
            </h2>
            <p class="text-base font-normal text-zinc-400 sm:text-xl">
                This is what I've created so far.
            </p>
        </div>

        <div class="max-w-5xl mx-auto mt-8 space-y-16 sm:mt-12 lg:mt-16">
            <div class="grid gap-8 sm:grid-cols-1 lg:grid-cols-1">
                @if(isset($projects) && $projects->isNotEmpty())
                    @foreach($projects as $project)
                        <div class="flex flex-col lg:flex-row gap-6 p-6 rounded-2xl border-4 border-zinc-700 bg-white shadow-sm" style="background-color: {{ $project->background_primary_color }}; border-color: {{ $project->article_color }};">

                            <!-- Left: Image carousel -->
                            <div class="lg:w-1/2 w-full">
                                @if(!empty($project->images) && is_array($project->images))
                                    <div id="animation-carousel-{{ $project->id }}" class="relative w-full" data-carousel="slide">
                                        <div class="relative mb-4 overflow-hidden rounded-lg" style="padding-top: 56.25%;">
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

                            <!-- Right: Title, description, software used -->
                            <div class="lg:w-1/2 w-full flex flex-col justify-between">
                                <div class="text-center">
                                    <!-- Project title -->
                                    <a href="{{ route('projects.show', $project) }}" class="block text-2xl font-extrabold leading-tight text-white">{{ $project->title }}</a>

                                    <!-- Short description -->
                                    <p class="mt-4 text-lg font-semibold leading-tight text-white">{!! $project->short_description !!}</p>
                                </div>

                                <!-- List of Software Used -->
                                <div class="mt-6">
                                    <h4 class="mb-4 text-sm font-bold text-white uppercase">Software Used</h4>
                                    @foreach($software as $softwareItem)
                                        <div class="mb-6 flex items-center border-4 rounded-3xl"
                                             style="background-color: {{ $softwareItem->primary_color ?? 'darkslategray' }}; border-color: {{ $softwareItem->secondary_color ?? 'darkcyan' }};">
                                            @if($softwareItem->image_url)
                                                <img src="{{ $softwareItem->image_url }}" alt="{{ $softwareItem->name }}" class="p-1.5 h-12">
                                            @else
                                                <img src="https://via.placeholder.com/48" alt="No Image Available" class="p-1.5 h-12">
                                            @endif
                                            <p class="text-lg font-bold leading-tight text-white ml-3">{{ $softwareItem->name }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No projects available.</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Auto-slide JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('[data-carousel="slide"]').forEach(function(carousel) {
                const items = carousel.querySelectorAll('[data-carousel-item]');
                let currentIndex = 0;

                function showNextSlide() {
                    items[currentIndex].classList.add('hidden');
                    currentIndex = (currentIndex + 1) % items.length;
                    items[currentIndex].classList.remove('hidden');
                }

                setInterval(showNextSlide, 3000); // 3-second interval for auto-slide
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>

</body>
</html>
