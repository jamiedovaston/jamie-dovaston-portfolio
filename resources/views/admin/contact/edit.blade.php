<x-app-layout>
    <div class="container">
        <h1>Edit Contact Page</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('dashboard.contact.update') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $contact->title ?? '' }}" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content (Markdown)</label>
                <textarea name="content" id="content" class="form-control" required>{{ $contact->content ?? '' }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Contact</button>
        </form>
    </div>
</x-app-layout>
