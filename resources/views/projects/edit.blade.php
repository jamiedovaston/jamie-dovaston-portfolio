@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <h1>Edit Project</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $project->title }}" required>
            </div>

            <div class="mb-3">
                <label for="logo" class="form-label">Project Logo</label>
                <input type="file" name="logo" id="logo" class="form-control">
                @if($project->logo)
                    <img src="{{ asset('storage/' . $project->logo) }}" alt="Current Logo" width="100" class="mt-2">
                @endif
            </div>

            <div class="mb-3">
                <label for="background" class="form-label">Project Background</label>
                <input type="file" name="background" id="background" class="form-control">
                @if($project->background)
                    <img src="{{ asset('storage/' . $project->background) }}" alt="Current Background" width="100" class="mt-2">
                @endif
            </div>

            <div class="mb-3">
                <label for="short_description" class="form-label">Short Description</label>
                <textarea name="short_description" id="short_description" class="form-control" required>{{ $project->short_description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="software_used" class="form-label">Software/Technologies Used</label>
                <select name="software_used[]" id="software_used" class="form-select" multiple>
                    <option value="php" @if(in_array('php', $project->software_used)) selected @endif>PHP</option>
                    <option value="laravel" @if(in_array('laravel', $project->software_used)) selected @endif>Laravel</option>
                    <option value="javascript" @if(in_array('javascript', $project->software_used)) selected @endif>JavaScript</option>
                    <option value="tailwind" @if(in_array('tailwind', $project->software_used)) selected @endif>Tailwind CSS</option>

                </select>
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Body (Markdown)</label>
                <textarea name="body" id="body" class="form-control" required>{{ $project->body }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Project</button>
        </form>
    </div>
@endsection
