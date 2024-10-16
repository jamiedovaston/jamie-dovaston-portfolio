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

    <!-- Multiple Images Upload -->
    <label for="images">Project Images (Multiple)</label>
    <input type="file" name="images[]" id="images" multiple><br>

    <!-- Video Upload -->
    <label for="video">Project Video (Optional)</label>
    <input type="file" name="video" id="video"><br>

    <label for="short_description">Short Description:</label>
    <textarea name="short_description" id="short_description" required></textarea><br>

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

    <label for="body">Body (Markdown):</label>
    <textarea name="body" id="body" required></textarea><br>

    <button type="submit">Add Project</button>
</form>

</body>
</html>
