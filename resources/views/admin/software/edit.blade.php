<!-- resources/views/software/edit.blade.php -->

<x-app-layout>
    <div class="container">
        <h1>Edit Software</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('dashboard.software.update', $software) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Software Name</label>
                <input type="text" name="name" id="name" class="block w-full px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" value="{{ $software->name }}" required>
            </div>

            <div class="mb-3">
                <label for="image_url" class="form-label">Image URL</label>
                <input type="url" name="image_url" id="image_url" class="form-input w-full" value="{{ old('image_url', $software->image_url) }}" placeholder="Enter image URL">
                @if($software->image_url)
                    <p class="mt-2">Current Image URL: <a href="{{ $software->image_url }}" target="_blank">{{ $software->image_url }}</a></p>
                @endif
            </div>

            <div class="mb-3">
                <label for="primary_color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Primary Color</label>
                <input type="color" name="primary_color" id="primary_color" class="block w-full px-3 py-2 border rounded-lg" value="{{ $software->primary_color }}">
            </div>

            <div class="mb-3">
                <label for="secondary_color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Secondary Color</label>
                <input type="color" name="secondary_color" id="secondary_color" class="block w-full px-3 py-2 border rounded-lg" value="{{ $software->secondary_color }}">
            </div>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Update Software</button>
        </form>
    </div>
</x-app-layout>
