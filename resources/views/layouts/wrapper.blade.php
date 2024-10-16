<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jamie's Projects</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="icon" href="{{ asset('images/OTHLOGO-removebg-preview.png') }}" type="image/png">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>

    <style>
        .rainbow-divider {
            height: 8px;
            background: linear-gradient(to right, red, orange, yellow, green, blue, indigo, violet);
        }
        .sidebar {
            width: 300px;
            background-color: #1F2937; /* Tailwind CSS Zinc-800 */
        }
        .sidebar .section-title {
            border-bottom: 1px solid #374151; /* Tailwind CSS Zinc-600 */
        }
        .sidebar .link-btn {
            background-color: #374151; /* Tailwind CSS Zinc-600 */
        }
    </style>

</head>


<body class="bg-zinc-800 overflow-y-scroll no-scrollbar">
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

@yield('content')

</body>
</html>
