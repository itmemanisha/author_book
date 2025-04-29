<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Styles / Scripts -->
      
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
        <h1>Welcome</h1>
        <a href="{{ url('authors') }}" class="fw-bold fs-5">Manage Author</a>
        <a href="{{ url('books') }}" class="fw-bold fs-5 mx-4">Manage Book</a>
        <a href="{{ url('publishers') }}" class="fw-bold fs-5">Manage Publish</a>
        <a href="{{ url('chatbot') }}" target="_blank" class="fw-bold fs-5 ms-3">ChatBot</a>
    </body>
</html>
