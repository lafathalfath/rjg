<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') ?: 'Laravel' }} | @yield('title')</title>

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
    
    @yield('style')
</head>
<body class="bg-[#eee] w-[100dvw] h-[100dvh] flex items-center justify-center">
    
    <div class="p-5 bg-white flex flex-col items-center">
        <h1 class="text-2xl font-bold mb-5">
            @yield('title')
        </h1>
        <div>
            @yield('content')
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    @yield('script')
</body>
</html>