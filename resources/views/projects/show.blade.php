@php
    $parsedown = new Parsedown();
@endphp

<div class="project-details">
    <h1>{{ $project->title }}</h1>
    <p>Created by: {{ $project->user->name }}</p>
    <p>Released on: {{ $project->created_at->format('F d, Y') }}</p>

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

    <div class="project-body">
        {!! $parsedown->text($project->body) !!}
    </div>

</div>
