<section class="bg-zinc-900 antialiased min-h-screen">
    <div class="max-w-screen-xl px-4 py-8 mx-auto lg:px-6 sm:py-16 lg:py-24">
        <div class="max-w-2xl mx-auto space-y-4 text-center">
            <h2 class="text-3xl font-extrabold leading-tight tracking-tight text-white sm:text-4xl">
                My Projects
            </h2>
            <p class="text-base font-normal text-zinc-400 sm:text-xl">
                This is what i've created so far.
            </p>
        </div>
        <div class="max-w-10xl mx-auto mt-8 space-y-16 sm:mt-12 lg:mt-16">

            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @if(isset($projects) && $projects->isNotEmpty())

                    @foreach($projects as $project)
                        <a href="{{ route('projects.show', $project) }}" class="block">
                            <div class="space-y-4 rounded-2xl border-4 border-zinc-700 bg-white p-6 shadow-sm" style="background-color: {{ $project->background_primary_color }}; border-color: {{ $project->article_color }};">
                                <div class="relative w-full" data-carousel="static">
                                    <div class="pb-5 flex items-center justify-between gap-4">
                                        <p class="text-2xl font-extrabold leading-tight text-white">{{ $project->title }}</p>
                                    </div>

                                    <!-- Carousel wrapper -->
                                    @if(!empty($project->images) && is_array($project->images))
                                        @php
                                            $carouselId = 'carousel-' . $loop->index;
                                        @endphp
                                        <div id="{{ $carouselId }}" class="relative w-full animation-carousel" data-carousel="slide">
                                            <!-- Carousel wrapper with 16:9 aspect ratio -->
                                            <div class="relative mb-4 overflow-hidden rounded-lg" style="padding-top: 56.25%;"> <!-- 16:9 ratio -->
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

                                <div>
                                    <p class="text-lg font-semibold leading-tight text-white">{!! $project->short_description !!}</p>
                                </div>
                            </div>
                        </a>
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
            // Select all carousels with the class 'animation-carousel'
            const carousels = document.querySelectorAll('.animation-carousel');

            carousels.forEach((carousel) => {
                const items = carousel.querySelectorAll('[data-carousel-item]');
                let currentIndex = 0;

                function showNextSlide() {
                    items[currentIndex].classList.add('hidden');
                    currentIndex = (currentIndex + 1) % items.length;
                    items[currentIndex].classList.remove('hidden');
                }

                // Set interval for auto-sliding every 3 seconds (3000 milliseconds)
                setInterval(showNextSlide, 3000);
            });
        });
    </script>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>

</section>
