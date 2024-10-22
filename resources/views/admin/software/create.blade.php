<!-- resources/views/software/create.blade.php -->

<x-app-layout>
    <div class="container">
        <h1>Add New Software</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('dashboard.software.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Software Name</label>
                <input type="text" name="name" id="name" class="block w-full px-3 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div class="mb-3">
                <label for="image_url" class="form-label">Image URL</label>
                <input type="url" name="image_url" id="image_url" class="form-input w-full" value="{{ old('image_url') }}" placeholder="Enter image URL">
            </div>

            <div class="mb-3">
                <label for="primary_color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Primary Color</label>
                <input type="color" name="primary_color" id="primary_color" class="block w-full px-3 py-2 border rounded-lg">
            </div>

            <div class="mb-3">
                <label for="secondary_color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Secondary Color</label>
                <input type="color" name="secondary_color" id="secondary_color" class="block w-full px-3 py-2 border rounded-lg">
            </div>

            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Add Software</button>
        </form>
    </div>
</x-app-layout>
