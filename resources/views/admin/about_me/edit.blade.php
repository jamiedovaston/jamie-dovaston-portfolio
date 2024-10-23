<x-app-layout>
    <div class="container">
        <h1>Edit About Me</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('dashboard.about_me.update') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $aboutMe->title ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content (Markdown)</label>
                <textarea name="content" id="content" class="form-control" rows="10" required>{{ old('content', $aboutMe->content ?? '') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</x-app-layout>



    <script src="https://cdn.tiny.cloud/1/5mavkvwtcts3fsepqjs6w90h8cxexk38jhcpbrj524lrt8dn/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#content',
            plugins: 'code markdown',
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
