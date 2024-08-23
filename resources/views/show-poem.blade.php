<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gurbannazar Ezizow</title>
    <link rel="shortcut icon" href="{{  asset('icons/logo.png')}}" type="image/x-icon">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    {{-- fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Esteban&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .poem-font {
            font-family: "Playfair Display", serif;
            font-optical-sizing: auto;
            font-weight: 400;
            font-style: normal;
        }
    </style>
</head>
<body class="flex flex-col justify-center h-screen space-y-4 bg-gray-50">
    <div class="container poem-font w-full h-full flex gap-10 flex-col relative pt-0 mx-auto">
        <a href="{{route('main')}}">
            <div class="absolute top-2 md:top-5 left-5 md:left-20 w-[120px]">
                <img class="bg-cover" src="{{asset('icons/logo.png')}}" alt="">
            </div>
        </a>
        <div class="w-full flex flex-col items-center">
            <div>
                <span class="text-[30px] font-samibold">Gurbannazar Ezizow</h1>
            </div>
            <div class="indent-24 text-[20px] opacity-70">
                <p>Goşgular ýygyndysy</p>
            </div> 
        </div>
        <div>
        <div class="text-center pt-6 mb-24">
            <div>
                <div class="text-[26px] mb-6 font-semibold">
                    <p>{{ $poem['name_'.app()->getLocale()] }}</p>
                </div>
            </div>
            <div>
                {!! $poem['text_'.app()->getLocale()] !!}    
            </div>      
        </div>
    </div>
</body>
</html>
