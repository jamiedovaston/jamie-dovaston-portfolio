<x-app-layout>
    <section class="bg-gray-50 dark:bg-gray-900 p-6">
        <div class="mx-auto max-w-screen-lg px-4">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4 text-gray-900 dark:text-white">Edit Project</h1>

                @if(session('success'))
                    <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('dashboard.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <!-- Title -->
                    <div class="mb-4">
                        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
                        <input type="text" name="title" id="title" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white" value="{{ old('title', $project->title) }}" required>
                    </div>

                    <!-- Background Image URL -->
                    <div class="mb-4">
                        <label for="background_image" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Background Image URL</label>
                        <input type="text" name="background_image" id="background_image" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white" value="{{ old('background_image', $project->background_image) }}" placeholder="Enter background image URL">
                        @if($project->background_image)
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Current: <a href="{{ $project->background_image }}" target="_blank" class="text-blue-600 hover:underline">{{ $project->background_image }}</a></p>
                        @endif
                    </div>

                    <!-- Image URLs -->
                    <div class="mb-4">
                        <label for="images" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Image URLs (Multiple)</label>
                        <div id="image-url-container" class="space-y-2">
                            @if($project->images && is_array($project->images))
                                @foreach($project->images as $index => $image)
                                    <div class="flex items-center space-x-2">
                                        <input type="text" name="images[]" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white" value="{{ $image }}" placeholder="Enter image URL">
                                        <a href="{{ $image }}" target="_blank" class="text-blue-600 hover:underline text-sm">View</a>
                                    </div>
                                @endforeach
                            @else
                                <input type="text" name="images[]" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white" placeholder="Enter image URL">
                            @endif
                        </div>
                        <button type="button" id="add-image-url" class="mt-2 px-4 py-2 bg-gray-200 text-gray-700 rounded-md shadow-sm hover:bg-gray-300 focus:ring-2 focus:ring-gray-400 dark:bg-gray-600 dark:text-gray-300">Add Another Image URL</button>
                    </div>

                    <!-- Video URL -->
                    <div class="mb-4">
                        <label for="video_path" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Video URL</label>
                        <input type="text" name="video_path" id="video_path" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white" value="{{ old('video_path', $project->video_path) }}" placeholder="Enter video URL">
                        @if($project->video_path)
                            <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Current: <a href="{{ $project->video_path }}" target="_blank" class="text-blue-600 hover:underline">{{ $project->video_path }}</a></p>
                        @endif
                    </div>

                    <!-- Short Description -->
                    <div class="mb-4">
                        <label for="short_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Short Description</label>
                        <textarea name="short_description" id="short_description" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">{{ old('short_description', $project->short_description) }}</textarea>
                    </div>

                    <!-- Colors -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="background_primary_color" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Background Primary Colour</label>
                            <input type="color" name="background_primary_color" id="background_primary_color" class="mt-1 block w-full" value="{{ old('background_primary_color', $project->background_primary_color) }}">
                        </div>
                        <div>
                            <label for="article_color" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Article Colour (Body Colour)</label>
                            <input type="color" name="article_color" id="article_color" class="mt-1 block w-full" value="{{ old('article_color', $project->article_color) }}">
                        </div>
                    </div>

                    <!-- Software Selection -->
                    <div class="mb-4">
                        <label for="software" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Software Used</label>
                        <select name="software[]" id="software" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white" multiple>
                            @php
                                $softwareOptions = ['Unity', 'Unreal Engine', 'C#', 'C++', 'SQL', 'PHP', 'NodeJS', 'Python', 'JavaScript', 'TypeScript', 'Tailwind CSS', 'React', 'Laravel'];
                            @endphp
                            @foreach($softwareOptions as $software)
                                <option value="{{ $software }}" @if(in_array($software, old('software', $project->software ?? []))) selected @endif>{{ $software }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Shortline Description -->
                    <div class="mb-4">
                        <label for="shortline_description" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Shortline Description</label>
                        <input type="text" name="shortline_description" id="shortline_description" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white" value="{{ old('shortline_description', $project->shortline_description) }}" required>
                    </div>

                    <!-- Body -->
                    <div class="mb-4">
                        <label for="body" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Body (Markdown)</label>
                        <textarea name="body" id="body" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white" required>{{ old('body', $project->body) }}</textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit" class="px-4 py-2 bg-blue-700 text-black rounded-lg shadow-sm hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Update Project</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <script src="https://cdn.tiny.cloud/1/5mavkvwtcts3fsepqjs6w90h8cxexk38jhcpbrj524lrt8dn/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#body, #short_description',
            plugins: 'code markdown image imagetools',
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | code | image',
            menubar: false,
            height: 400,
            images_upload_url: '/upload-image',
            automatic_uploads: true,
            images_upload_handler: function (blobInfo, success, failure) {
                let formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());

                fetch('/upload-image', {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
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

        document.getElementById('add-image-url').addEventListener('click', function () {
            const newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = 'images[]';
            newInput.classList.add('block', 'w-full', 'mt-2', 'px-3', 'py-2', 'border', 'border-gray-300', 'rounded-md', 'shadow-sm', 'focus:ring-primary-500', 'focus:border-primary-500', 'dark:bg-gray-700', 'dark:text-white');
            newInput.placeholder = 'Enter image URL';

            document.getElementById('image-url-container').appendChild(newInput);
        });
    </script>
</x-app-layout>
