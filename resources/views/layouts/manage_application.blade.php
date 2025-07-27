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
<body class="w-[100dvw] h-[100dvh] overflow-hidden">

    <div class="w-full h-full overflow-hidden flex">
        <nav class="w-[300px] p-3 bg-gray-200 flex flex-col justify-between">
            <div class="divide-y-1 divide-gray-400">
                <div class="flex flex-col items-center gap-3 pt-10 pb-5">
                    <div class="w-full"><a href="{{ route('dashboard') }}" class="btn btn-sm">Back</a></div>
                    <div class="w-30 h-30 rounded-full bg-gray-400"></div>
                    <div class="capitalize text-xl font-semibold">{{ $application->name }}</div>
                </div>
                {{-- {{ dd(route('layouts', ['app_id' => request()->id])) }} --}}
                <div class="flex flex-col py-5">
                    <a href="{{ route('layouts', ['app_id' => Crypt::encryptString($application->id)]) }}" class="py-2 px-4 hover:bg-gray-300">Layouts</a>
                    <a href="" class="py-2 px-4 hover:bg-gray-300">Pages</a>
                    <a href="" class="py-2 px-4 hover:bg-gray-300">Components</a>
                </div>
            </div>
        </nav>
        
        <div class="p-5 w-full h-full overflow-y-scroll">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    @yield('script')
</body>
</html>