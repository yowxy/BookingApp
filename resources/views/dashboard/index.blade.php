

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('dashboard.components.navbar')
    @include('dashboard.components.sidebar')
      <!-- resources/views/admin/partials/sidebar.blade.php -->
</body>
</html>
