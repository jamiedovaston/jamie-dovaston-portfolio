<x-app-layout>
        <h1>Projects</h1>


        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <a href="{{ route('dashboard.projects.create') }}" class="btn btn-primary">Create New Project</a>


        <table class="table mt-4">
            <thead>
            <tr>
                <th>Title</th>
                <th>Short Description</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->short_description }}</td>
                    <td>
                        <a href="{{ route('dashboard.projects.edit', $project) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('dashboard.projects.destroy', $project) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
</x-app-layout>
