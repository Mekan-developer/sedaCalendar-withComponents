<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Dashboard') }}</title>
    <link rel="shortcut icon" href="{{  asset('icons/logo.png')}}" type="image/x-icon">

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.4.1/tinymce.min.js" integrity="sha512-c46AnRoKXNp7Sux2K56XDjljfI5Om/v1DvPt7iRaOEPU5X+KZt8cxzN3fFzemYC6WCZRhmpSlZvPA1pttfO9DQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        *{
            font-family: "Nunito", serif;
            font-optical-sizing: auto;
            font-weight: 500;
            font-style: normal;
        }

        .lang-col{
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 16px;
        }
        .line-clamp {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;  
            overflow: hidden;
        }
        .custom-scrollbar {
            scrollbar-width: thin;
        }
    </style>
</head>
<body>
    <div id="app">
        <main>
            <div class="w-full h-full dashboard-body">
                <div id="removeClass" class="z-50 sidebar activeClass relative">
                    <a href="{{route('admin.home')}}">
                        <div class="absolute top-1 left-4 w-28  h-10 ">
                        </div>
                    </a>
                    <div class="logo_content">
                        <div class="logo">
                            <div class="logo_name w-[126px] h-auto">
                                <img src="{{asset('icons/logo.png')}}" alt="">
                            </div>
                        </div>                        
                        <div id="hide">
                            <i  class="cursor-pointer bx bx-menu" id="btn" onclick="hide()"></i>
                        </div>
                        <div id="show">
                            <i  class="cursor-pointer bx bx-menu" id="btn" onclick="show()"></i>
                        </div>
                    </div>
                    <ul class="capitalize nav_list">
                        <li>
                            <a class="{{ Request::is('admin/poem*') ? 'bg-[#fff]' : '' }}" href="{{route('admin.poem')}}">
                                <i class="bx bx-book-open {{ Request::is('admin/poem*') ? 'text-[#11101d]' : '' }}"></i>
                                <span  class="links_name {{ Request::is('admin/poem*') ? 'text-[#11101d]' : '' }}">{{__('nav.poems')}}</span>
                            </a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/audio-poem*') ? 'bg-[#fff]' : '' }}" href="{{route('admin.audioPoem')}}"> 
                                <i class="bx bx-music {{ Request::is('admin/audio-poem*') ? 'text-[#11101d]' : '' }}" ></i>
                                <span class="links_name {{ Request::is('admin/audio-poem*') ? 'text-[#11101d]' : '' }}">{{__('nav.audio_poems')}}</span>
                            </a>
                        </li>
                        <li>
                            <a class="{{ Request::is('admin/gallery*') ? 'bg-[#fff]' : '' }}" href="{{route('admin.gallery')}}">
                                <i class='bx bx-photo-album {{ Request::is('admin/gallery*') ? 'text-[#11101d]' : '' }}' ></i>
                                <span class="links_name {{ Request::is('admin/gallery*') ? 'text-[#11101d]' : '' }}">{{__('nav.galleries')}}</span>
                            </a>
                        </li>
                        @if(auth()->user()->is_admin === 1)
                            <li>
                                <a class="{{ Request::is('admin/controll*') ? 'bg-[#fff]' : '' }}" href="{{route('admin.controll')}}">
                                    <i class='bx bx-user-plus {{ Request::is('admin/controll*') ? 'text-[#11101d]' : '' }}'></i>
                                    <span class="links_name {{ Request::is('admin/controll*') ? 'text-[#11101d]' : '' }}">{{__('nav.create_admin')}}</span>
                                </a>
                            </li>
                        @endif 
                    </ul>
                    <div class="profile_content">
                        <div id="langCol" class="flex flex-row flex-wrap w-full mb-4">
                            <div class="w-[48%] flex flex-row justify-center items-center">
                                <a class="{{app()->getLocale() == 'tm' ? 'border-b-2' : ''}} pb-3 px-1" href="{{route('change.locale',['lang'=>'tm'])}}">
                                    <div>
                                        <i class='bx bx-world text-nowrap'> TM  </i>
                                    </div>
                                </a>
                            </div>
                            <div class="w-[48%] flex justify-center items-center">
                                <a class="{{app()->getLocale() == 'ru' ? 'border-b-2' : ''}} pb-3 px-1" href="{{route('change.locale',['lang' => 'ru'])}}">
                                    <i class='bx bx-world text-nowrap'> RU</i>
                                </a>
                            </div>
                        </div>
                        <div class="profile">
                            <div class="profile_details">
                                    <img src="/icons/owner2.webp" alt="" />
                                <div class="name_job">
                                        <div class="name">{{ Auth::user()->name }}</div>
                                        @if (Auth::user()->is_admin == 1)
                                            <div class="job">Super admin</div>
                                        @else
                                            <div class="job">Admin</div>
                                        @endif 
                                </div>
                            </div>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="cursor-pointer bx bx-log-out" id="log_out"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
                <div class="home_content">
                    @yield('content')            
                </div>
            </div>
        </main>
    </div>
</body>
</html>

<script>
    function hide() {
    const element = document.getElementById("removeClass");  // Get the DIV element
    element.classList.remove("activeClass"); // Remove mystyle class from DIV
    document.getElementById("hide").style.display='none';
    document.getElementById("show").style.display='block';

    const langDiv = document.getElementById("langCol");
    langDiv.classList.add('lang-col');
    }
    function show() {
    const element = document.getElementById("removeClass");  // Get the DIV element
    element.classList.add("activeClass"); // Remove mystyle class from DIV
    document.getElementById("hide").style.display='block';
    document.getElementById("show").style.display='none';

    const langDiv = document.getElementById("langCol");
    langDiv.classList.remove('lang-col');
    }
</script>
