<!-- resources/views/projects/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Project</title>
</head>
<body>
<h1>Add a New Project</h1>

<form action="{{ route('dashboard.projects.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="title">Title:</label>
    <input type="text" name="title" id="title" required><br>

    <!-- Multiple Logos Upload -->
    <div class="mb-3">
        <label for="logos" class="form-label">Project Logos (Multiple Images)</label>
        <input type="file" name="logos[]" id="logos" class="form-control" multiple>
    </div>

    <!-- Video Upload -->
    <div class="mb-3">
        <label for="video" class="form-label">Project Video (Optional)</label>
        <input type="file" name="video" id="video" class="form-control">
    </div>

    <label for="short_description">Short Description:</label>
    <textarea name="short_description" id="short_description" required></textarea><br>

    <label for="body">Body (Markdown):</label>
    <textarea name="body" id="body" required></textarea><br>

    <button type="submit">Add Project</button>
</form>

</body>
</html>
