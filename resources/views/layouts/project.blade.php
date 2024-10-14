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
                        <!-- Carousel wrapper -->
                        @if($project->logos)
                            <div id="logo-carousel" class="relative w-full" data-carousel="static">
                                <!-- Carousel wrapper -->
                                <div class="relative mb-4 min-h-72 overflow-hidden rounded-lg">
                                    @foreach($project->logos as $index => $logo)
                                        <div class="{{ $index === 0 ? 'block' : 'hidden' }} duration-1000 ease-in-out" data-carousel-item="{{ $index === 0 ? 'active' : '' }}">
                                            <img src="{{ asset('storage/' . $logo) }}" class="absolute left-1/2 top-1/2 block h-full -translate-x-1/2 -translate-y-1/2" alt="Project Logo" />
                                        </div>
                                    @endforeach
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
                                    <span class="text-base font-medium text-gray-500 dark:text-gray-400"><span id="carousel-current-item">1</span> of {{ count($project->logos) }}</span>
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
                        @endif
                    </div>

                    <div>
                        <a href="#" class="text-lg font-semibold leading-tight text-zinc-900 hover:underline dark:text-white">test</a>
                        <p class="mt-2 text-base font-normal text-zinc-500 dark:text-zinc-400">test</p>
                    </div>

                    <a href="#" title="" class="inline-flex items-center gap-2 text-sm font-medium text-blue-700 hover:underline dark:text-blue-600">
                        <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8H5m12 0a1 1 0 0 1 1 1v2.6M17 8l-4-4M5 8a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.6M5 8l4-4 4 4m6 4h-4a2 2 0 1 0 0 4h4a1 1 0 0 0 1-1v-2a1 1 0 0 0-1-1Z" />
                        </svg>
                       text
                    </a>

                    <div class="flex items-center justify-between gap-4">
                        <p class="text-2xl font-extrabold leading-tight text-zinc-900 dark:text-white">dfsdf</p>

                    </div>

                    <div class="flex items-center gap-4">
                        <button type="button" class="inline-flex w-full items-center justify-center gap-2 rounded-lg border border-zinc-200 bg-white px-5 py-2.5 text-sm font-medium text-zinc-900 hover:bg-zinc-100 hover:text-blue-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-zinc-100 dark:border-zinc-600 dark:bg-zinc-800 dark:text-zinc-400 dark:hover:bg-zinc-700 dark:hover:text-white dark:focus:ring-zinc-700">
                            <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6C6.5 1 1 8 5.8 13l6.2 7 6.2-7C23 8 17.5 1 12 6Z" />
                            </svg>
                            yeh
                        </button>

                        <button type="button" class="inline-flex w-full items-center justify-center gap-2 rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium  text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg class="-ms-2 me-2 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                            </svg>
                            idk
                        </button>
                    </div>
                </div>
                    @endforeach
                @else
                    <p>No projects found.</p>
                @endif
            </div>



        @if(isset($projects) && $projects->isNotEmpty())
            @foreach($projects as $project)
            <div class="space-y-8 lg:space-y-12">
                <img class="object-cover object-top w-full h-auto rounded-lg shadow-lg dark:hidden"
                     src="{{ asset('storage/' . $project->logo) }}" alt="{{ $project->title }} Logo">
                <img class="object-cover object-top w-full h-auto rounded-lg shadow-lg dark:block hidden"
                     src="{{ asset('storage/' . $project->logo) }}" alt="{{ $project->title }} Logo">

                <div class="space-y-6">
                    <div class="space-y-4">
                        <h3 class="text-3xl font-bold leading-tight text-zinc-900 sm:text-4xl dark:text-white">
                            {{ $project->title }}
                        </h3>
                        <p class="text-base font-normal text-zinc-500 sm:text-lg dark:text-zinc-400">
                            {{ $project->short_description }}
                        </p>

                    </div>

                    <div class="flex items-center gap-2.5">
                        @if(is_array($project->software_used) && !empty($project->software_used))
                            @foreach($project->software_used as $software)
                                <div class="p-1 rounded-lg hover:bg-zinc-50 dark:hover:bg-zinc-800">
                                    <img data-tooltip-target="tooltip-logo-typescript" class="object-contain w-auto h-8"
                                         src="{{ asset('path/to/icons/' . $software . '.svg') }}" alt="{{ $software }}">
                                </div>
                            @endforeach
                        @else
                            <p>No software used specified.</p>
                        @endif
                    </div>

                    <a href="{{ route('projects.show', $project) }}" title=""
                       class="text-white inline-flex items-center bg-blue-700  hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                       role="button">
                        View case study
                        <svg aria-hidden="true" class="w-5 h-5 ml-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        @else
                    <p>No projects found.</p>
        @endif


        </div>
    </div>
</section>
