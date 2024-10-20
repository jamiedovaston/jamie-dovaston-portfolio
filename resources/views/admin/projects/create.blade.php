<x-app-layout>

    <!-- Add this in the <head> section of your Blade template -->
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>


    <h1>Add a New Project</h1>

<form action="{{ route('dashboard.projects.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="title">Title:</label>
    <input type="text" name="title" id="title" required><br>

    <!-- Multiple Images Upload -->
    <label for="images">Project Images (Multiple)</label>
    <input type="file" name="images[]" id="images" multiple><br>

    <!-- Video Upload -->
    <label for="video">Project Video (Optional)</label>
    <input type="file" name="video" id="video"><br>

    <label for="short_description">Short Description:</label>
    <textarea name="short_description" class="form-control" id="short_description" required>{{ old('short_description', $project->short_description ?? '') }}</textarea><br>

    <label for="background_image">Background Image</label>
    <input type="file" name="background_image" id="background_image"><br>

    <label for="background_primary_color">Background Primary Colour:</label>
    <input type="color" name="background_primary_color" id="background_primary_color"><br>

    <label for="article_color">Article Colour (Body Colour):</label>
    <input type="color" name="article_color" id="article_color"><br>

    <!-- Software Selection -->
    <label for="software">Software Used:</label>
    <select name="software[]" id="software" multiple>
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
    </select><br>

    <label for="shortline_description">Shortline Description:</label>
    <input type="text" name="shortline_description" id="shortline_description" required><br>

    <div class="mb-3">
        <label for="body" class="form-label">Body (Markdown)</label>
        <textarea name="body" id="body" class="form-control" required>{{ old('body', $project->body ?? '') }}</textarea>
    </div>

    <button type="submit">Add Project</button>
</form>

    <script src="https://cdn.tiny.cloud/1/5mavkvwtcts3fsepqjs6w90h8cxexk38jhcpbrj524lrt8dn/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#body', // The textarea ID for the body content
            plugins: 'code markdown', // Enable Markdown and Code plugins
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | code',
            menubar: false,
            height: 400,
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save(); // Save content back to the original textarea
                });
            }
        });
    </script>
    <script>
        tinymce.init({
            selector: '#short_description', // The textarea ID for the body content
            plugins: 'code markdown', // Enable Markdown and Code plugins
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | code',
            menubar: false,
            height: 400,
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save(); // Save content back to the original textarea
                });
            }
        });
    </script>

</x-app-layout>
