<!-- resources/views/admin/software/index.blade.php -->

<x-app-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-semibold mb-6">Software List</h1>

        <!-- Success Message -->
        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Add New Software Button -->
        <div class="mb-6">
            <a href="{{ route('dashboard.software.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none">
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 5a1 1 0 011-1h3a1 1 0 011 1v3a1 1 0 11-2 0V7.414L6.707 14.707a1 1 0 01-1.414-1.414L11.586 6H10a1 1 0 01-1-1z" />
                </svg>
                Add New Software
            </a>
        </div>

        <!-- Software Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-md">
                <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 text-left text-gray-600">Name</th>
                    <th class="px-4 py-2 text-left text-gray-600">Primary Color</th>
                    <th class="px-4 py-2 text-left text-gray-600">Secondary Color</th>
                    <th class="px-4 py-2 text-left text-gray-600">Image</th>
                    <th class="px-4 py-2 text-center text-gray-600">Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($software as $item)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $item->name }}</td>
                        <td class="px-4 py-2">
                            <div class="inline-block w-4 h-4 rounded-full" style="background-color: {{ $item->primary_color }}"></div>
                            <span class="ml-2">{{ $item->primary_color }}</span>
                        </td>
                        <td class="px-4 py-2">
                            <div class="inline-block w-4 h-4 rounded-full" style="background-color: {{ $item->secondary_color }}"></div>
                            <span class="ml-2">{{ $item->secondary_color }}</span>
                        </td>
                        <td class="px-4 py-2">
                            @if($item->image_url)
                                <img src="{{ $item->image_url }}" alt="Software Image" class="w-12 h-12 rounded-full">
                            @else
                                <span class="text-gray-500">No image</span>
                            @endif
                        </td>
                        <td class="px-4 py-2 text-center">
                            <a href="{{ route('dashboard.software.edit', $item->id) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
                            <form action="{{ route('dashboard.software.destroy', $item->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure you want to delete this software?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-2 text-center text-gray-500">No software found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
