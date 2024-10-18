<section class="bg-white dark:bg-zinc-900 antialiased">
    <div class="max-w-screen-xl px-4 py-8 mx-auto lg:px-6 sm:py-16 lg:py-24">
        <div class="max-w-2xl mx-auto space-y-4 text-center">
            <h2 class="text-3xl font-extrabold leading-tight tracking-tight text-zinc-900 sm:text-4xl dark:text-white">
                My Projects
            </h2>
            <p class="text-base font-normal text-zinc-500 sm:text-xl dark:text-zinc-400">
                This is what i've created so far.
            </p>
        </div>
        <div class="max-w-5xl mx-auto mt-8 space-y-16 sm:mt-12 lg:mt-16">


            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @if(isset($projects) && $projects->isNotEmpty())
                    @foreach($projects as $project)
                <div class="space-y-4 rounded-lg border border-zinc-200 bg-white p-6 shadow-sm dark:border-zinc-700 dark:bg-zinc-800">
                    <div id="controls-carousel" class="relative w-full" data-carousel="static">

                        <div class="pb-5 flex items-center justify-between gap-4">
                            <p class="text-2xl font-extrabold leading-tight text-zinc-900 dark:text-white">{{ $project->title }}</p>
                        </div>

                        <!-- Carousel wrapper -->
                        @if(!empty($project->images) && is_array($project->images))
                            <div id="logo-carousel" class="relative w-full" data-carousel="static">
                                <!-- Carousel wrapper -->
                                <div class="relative mb-4 min-h-72 overflow-hidden rounded-lg">
                                    <div class="image-gallery">
                                        @foreach($project->images as $index => $image)
                                            <div class="{{ $index === 0 ? 'block' : 'hidden' }} duration-10 ease-in-out" data-carousel-item>
                                                <img src="{{ asset('storage/' . $image) }}" class="absolute left-1/2 top-1/2 block h-full -translate-x-1/2 -translate-y-1/2 dark:hidden" alt="Project Image {{ $index + 1 }}" />
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!-- Carousel navigation -->
                                <div class="flex items-center justify-center gap-4">
                                    <button type="button" class="group flex h-full cursor-pointer items-center justify-center rounded-lg p-1.5 hover:bg-gray-50 focus:outline-none dark:hover:bg-gray-800" data-carousel-prev>
                                        <span class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                                            <svg class="h-7 w-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                                            </svg>
                                            <span class="hidden">Previous</span>
                                        </span>
                                    </button>
                                    <span class="text-base font-medium text-gray-500 dark:text-gray-400">
                                        <span id="carousel-current-item">1</span> of {{ count($project->images) }}
                                    </span>
                                    <button type="button" class="group flex h-full cursor-pointer items-center justify-center rounded-lg p-1.5 hover:bg-gray-50 focus:outline-none dark:hover:bg-gray-800" data-carousel-next>
                                        <span class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                                            <svg class="h-7 w-7" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                                            </svg>
                                            <span class="hidden">Next</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        @else
                            <p>No images available for this project.</p>
                        @endif

                    </div>

                    <div>
                        <a class="text-lg font-semibold leading-tight text-zinc-900 hover:underline dark:text-white">{!! $project->short_description !!}</a>
                    </div>

                    <div class="flex items-center gap-4">
                        <a href="{{ route('projects.show', $project) }}" class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium  text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            View Case Study
                        </a>
                    </div>
                </div>
                    @endforeach
                @else
                    <p>No projects found.</p>
                @endif
            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>

</section>
