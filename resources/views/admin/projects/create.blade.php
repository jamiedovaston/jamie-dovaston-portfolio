<x-app-layout>

    <!-- Add the TinyMCE editor script in the <head> section of your Blade template -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <section class="bg-white dark:bg-gray-900">
        <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
            <form action="{{ route('dashboard.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h2 class="mb-4 text-xl font-semibold leading-none text-gray-900 dark:text-white">Add a New Project</h2>

                <div class="grid gap-4 mb-4 md:gap-6 md:grid-cols-2 sm:mb-8">

                    <!-- Project Title -->
                    <div class="sm:col-span-2">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                        <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                    </div>

                    <!-- Multiple Image URLs Input -->
                    <div class="sm:col-span-2">
                        <label for="images" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image URLs (Multiple)</label>
                        <div id="image-url-container">
                            <input type="text" name="images[]" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 mb-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Enter image URL">
                        </div>
                        <button type="button" id="add-image-url" class="text-black bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 mt-2 dark:bg-primary-600 dark:hover:bg-primary-700">Add Another Image URL</button>
                    </div>

                    <!-- Video URL Input -->
                    <div class="sm:col-span-2">
                        <label for="video_path" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Video URL</label>
                        <input type="text" name="video_path" id="video_path" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Enter video URL">
                    </div>

                    <!-- Background Image URL Input -->
                    <div class="sm:col-span-2">
                        <label for="background_image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Background Image URL</label>
                        <input type="text" name="background_image" id="background_image" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" placeholder="Enter background image URL">
                    </div>

                    <!-- Short Description -->
                    <div class="sm:col-span-2">
                        <label for="short_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Short Description</label>
                        <textarea name="short_description" id="short_description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>{{ old('short_description') }}</textarea>
                    </div>

                    <!-- Background Primary Color -->
                    <div>
                        <label for="background_primary_color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Background Primary Colour</label>
                        <input type="color" name="background_primary_color" id="background_primary_color" class="w-full p-2.5 rounded-lg bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600">
                    </div>

                    <!-- Article Color -->
                    <div>
                        <label for="article_color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Article Colour (Body Colour)</label>
                        <input type="color" name="article_color" id="article_color" class="w-full p-2.5 rounded-lg bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600">
                    </div>

                    <!-- Software Selection -->
                    <div class="sm:col-span-2">
                        <label for="software" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Software Used</label>
                        <select name="software[]" id="software" multiple class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
                            <option value="Unity">Unity</option>
                            <option value="Unreal Engine">Unreal Engine</option>
                            <option value="C#">C#</option>
                            <option value="C++">C++</option>
                            <option value="SQL">SQL</option>
                            <option value="PHP">PHP</option>
                            <option value="NodeJS">NodeJS</option>
                            <option value="Python">Python</option>
                            <option value="JavaScript">JavaScript</option>
                            <option value="TypeScript">TypeScript</option>
                            <option value="Tailwind CSS">Tailwind CSS</option>
                            <option value="React">React</option>
                            <option value="Laravel">Laravel</option>
                        </select>
                    </div>

                    <!-- Shortline Description -->
                    <div class="sm:col-span-2">
                        <label for="shortline_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Shortline Description</label>
                        <input type="text" name="shortline_description" id="shortline_description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>
                    </div>

                    <!-- Body (Markdown) -->
                    <div class="sm:col-span-2">
                        <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body (Markdown)</label>
                        <textarea name="body" id="body" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white" required>{{ old('body') }}</textarea>
                    </div>

                </div>

                <!-- Submit Button -->
                <div class="flex items-center space-x-4">
                    <button type="submit" class="text-black bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700">Add Project</button>
                </div>
            </form>
        </div>
    </section>

    <!-- TinyMCE Initialization -->
    <script>
        tinymce.init({
            selector: '#body, #short_description',
            plugins: 'code markdown',
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | code',
            menubar: false,
            height: 400,
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });
            }
        });

        document.getElementById('add-image-url').addEventListener('click', function () {
            const newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.name = 'images[]';
            newInput.classList.add('bg-gray-50', 'border', 'border-gray-300', 'text-gray-900', 'text-sm', 'rounded-lg', 'block', 'w-full', 'p-2.5', 'mb-2', 'dark:bg-gray-700', 'dark:border-gray-600', 'dark:placeholder-gray-400', 'dark:text-white');
            newInput.placeholder = 'Enter image URL';
            document.getElementById('image-url-container').appendChild(newInput);
        });
    </script>

</x-app-layout>
