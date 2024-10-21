<x-app-layout>

    <!-- Add this in the <head> section of your Blade template -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>


    <div class="container">
        <h1>Edit Project</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('dashboard.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $project->title) }}" required>
            </div>

            <!-- Background Image URL -->
            <div class="mb-3">
                <label for="background_image" class="form-label">Background Image URL</label>
                <input type="text" name="background_image" id="background_image" class="form-control" value="{{ $project->background_image }}" placeholder="Enter background image URL">
                @if($project->background_image)
                    <p class="mt-2">Current Background Image URL: <a href="{{ $project->background_image }}" target="_blank">{{ $project->background_image }}</a></p>
                @endif
            </div>

            <!-- Image URLs -->
            <div class="mb-3">
                <label for="images" class="form-label">Image URLs (Multiple)</label>
                <div id="image-url-container">
                    @if($project->images && is_array($project->images))
                        @foreach($project->images as $index => $image)
                            <input type="text" name="images[]" class="form-control mb-2" value="{{ $image }}" placeholder="Enter image URL">
                            <p class="text-sm text-muted">Current Image URL {{ $index + 1 }}: <a href="{{ $image }}" target="_blank">{{ $image }}</a></p>
                        @endforeach
                    @else
                        <input type="text" name="images[]" class="form-control mb-2" placeholder="Enter image URL">
                    @endif
                </div>
                <button type="button" id="add-image-url" class="btn btn-secondary mt-2">Add Another Image URL</button>
            </div>

            <!-- Video URL -->
            <div class="mb-3">
                <label for="video" class="form-label">Video URL</label>
                <input type="text" name="video" id="video_path" class="form-control" value="{{ $project->video_path }}" placeholder="Enter video URL">
                @if($project->video_path)
                    <p class="mt-2">Current Video URL: <a href="{{ $project->video_path }}" target="_blank">{{ $project->video_path }}</a></p>
                @endif
            </div>

            <div class="mb-3">
                <label for="short_description" class="form-label">Short Description</label>
                <textarea name="short_description" class="form-control" id="short_description" required>{{ old('short_description', $project->short_description ?? '') }}</textarea><br>
            </div>

            <!-- Colors -->
            <div class="mb-3">
                <label for="background_primary_color" class="form-label">Background Primary Colour</label>
                <input type="color" name="background_primary_color" id="background_primary_color" class="form-control" value="{{ old('background_primary_color', $project->background_primary_color) }}">
            </div>

            <div class="mb-3">
                <label for="article_color" class="form-label">Article Colour (Body Colour)</label>
                <input type="color" name="article_color" id="article_color" class="form-control" value="{{ old('article_color', $project->article_color) }}">
            </div>

            <!-- Software Selection -->
            <div class="mb-3">
                <label for="software" class="form-label">Software Used</label>
                <select name="software[]" id="software" class="form-select" multiple>
                    @php
                        $softwareOptions = [
                            'Unity', 'Unreal Engine', 'C#', 'C++', 'SQL', 'PHP', 'NodeJS',
                            'Python', 'JavaScript', 'TypeScript', 'Tailwind CSS', 'React', 'Laravel'
                        ];
                    @endphp
                    @foreach($softwareOptions as $software)
                        <option value="{{ $software }}" @if(in_array($software, old('software', $project->software ?? []))) selected @endif>
                            {{ $software }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="shortline_description" class="form-label">Shortline Description</label>
                <input type="text" name="shortline_description" id="shortline_description" class="form-control" value="{{ old('shortline_description', $project->shortline_description) }}" required>
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Body (Markdown)</label>
                <textarea name="body" id="body" class="form-control" required>{{ old('body', $project->body ?? '') }}</textarea>
            </div>


            <button type="submit" class="btn btn-primary">Update Project</button>
        </form>
    </div>

    <script src="https://cdn.tiny.cloud/1/5mavkvwtcts3fsepqjs6w90h8cxexk38jhcpbrj524lrt8dn/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#body', // The textarea ID for the body content
            plugins: 'code markdown image imagetools', // Enable Markdown, Code, and Image plugins
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | code | image',
            menubar: false,
            height: 400,
            images_upload_url: '/upload-image', // Endpoint for handling image uploads
            automatic_uploads: true,
            images_upload_handler: function (blobInfo, success, failure) {
                let formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());

                fetch('/upload-image', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include the CSRF token
                    }
                })
                    .then(response => response.json())
                    .then(result => {
                        if (result && result.location) {
                            success(result.location);
                        } else {
                            failure('Upload failed');
                        }
                    })
                    .catch(() => {
                        failure('Upload failed');
                    });
            }
        });
    </script>

    <script>
        tinymce.init({
            selector: '#short_description', // The textarea ID for the body content
            plugins: 'code markdown image imagetools', // Enable Markdown, Code, and Image plugins
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | code | image',
            menubar: false,
            height: 400,
            images_upload_url: '/upload-image', // Endpoint for handling image uploads
            automatic_uploads: true,
            images_upload_handler: function (blobInfo, success, failure) {
                let formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());

                fetch('/upload-image', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Include the CSRF token
                    }
                })
                    .then(response => response.json())
                    .then(result => {
                        if (result && result.location) {
                            success(result.location);
                        } else {
                            failure('Upload failed');
                        }
                    })
                    .catch(() => {
                        failure('Upload failed');
                    });
            }
        });
    </script>

    <script>
        document.getElementById('add-image-url').addEventListener('click', function () {
            // Create a new input element
            const newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = 'images[]';
            newInput.classList.add('form-control', 'mb-2');
            newInput.placeholder = 'Enter image URL';

            // Append the new input element to the container
            document.getElementById('image-url-container').appendChild(newInput);
        });
    </script>


</x-app-layout>
