<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'G.Ezizow') }}</title>
        <link rel="shortcut icon" href="{{  asset('icons/logo.png')}}" type="image/x-icon">
        {{-- google fonts --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">
        {{-- google fonts --}}
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            *{
                font-family: "EB Garamond", serif;
                font-optical-sizing: auto;
                font-weight: 500;
                font-style: normal;
            }
            .line-clamp {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;  
                overflow: hidden;
            }
            html {
                scroll-behavior: smooth;
            }
            .manual-height{
                height: 100%;
                scroll-behavior: smooth;
            }

            /* loadder start */
             /* Loader wrapper */
        #loader-wrapper {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: white;
            z-index: 9999;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Spinner style */
        #loader {
            border: 10px solid #f3f3f3;
            border-radius: 50%;
            border-top: 10px solid #1a8ae6;
            width: 100px;
            height: 100px;
            animation: spin 2s linear infinite;
        }

        /* Spinner animation */
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* loader end */
        </style>
    </head>
    <body class="bg-[#E6DDD4]">
        <div id="loader-wrapper">
            <div id="loader"></div>
        </div>
        <div id="content">
            <nav id="header" class="sticky top-0 z-50">
                <div class="container relative flex flex-col items-center justify-between p-4 mx-auto md:static md:flex-row">
                    <div class="flex items-center justify-between w-full md:justify-start">
                        <div>
                            <img class="w-[126px] h-auto" src="{{asset('icons/logo.png')}}" alt="Logo">
                        </div>
                        <div class="flex md:hidden">
                            <i onclick="toggleDropdownNavBar()" class='bx bx-menu text-[24px]'></i>
                        </div>
                    </div>
                    <div  id="mega-menu-full"  class="absolute flex flex-col w-full h-0 overflow-hidden text-white transition-all duration-[1s] bg-gray-900 md:transition-none md:overflow-visible md:h-auto md:text-inherit md:bg-inherit md:static top-full md:gap-4 md:items-center md:justify-end md:flex-row md:w-auto">
                        <div>
                            <ul class="flex flex-col p-2 font-medium capitalize rounded-none md:rounded-lg whitespace-nowrap md:p-0 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                                <li>
                                    <a onclick="toggleDropdownNavBarHide()" href="#poems" class="block px-3 py-2 rounded text-inherit md:text-gray-900 md:p-0 hover:bg-gray-800 md:hover:bg-transparent md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{__('nav.poems')}}</a>
                                </li>
                                <li>
                                    <a onclick="toggleDropdownNavBarHide()" href="#audio_poems" class="block px-3 py-2 rounded text-inherit md:text-gray-900 md:p-0 hover:bg-gray-800 md:hover:bg-transparent md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">{{__('nav.audio_poems')}}</a>
                                </li>
                                <li>
                                    <a onclick="toggleDropdownNavBarHide()" href="#galleries" class="block px-3 py-2 rounded text-inherit md:text-gray-900 md:p-0 hover:bg-gray-800 md:hover:bg-transparent md:hover:text-blue-700 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">@lang('nav.galleries')</a>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="relative z-50 inline-block">
                            <!-- Button to toggle dropdown -->
                            <button id="languageButton" onclick="toggleDropdown()" class="items-center justify-center hidden w-full px-4 py-2 text-sm font-medium text-gray-700 rounded-md shadow-sm md:inline-flex focus:outline-none focus:ring-2 focus:ring-offset-2" aria-haspopup="true" aria-expanded="true">
                                <i class='mr-1 bx bx-world' ></i> <span class="uppercase "> {{app()->getLocale()}} </span>
                            </button>
                            <div id="languageDropdown" class="absolute right-0 w-full m-0 text-white origin-top-right bg-gray-600 rounded-none shadow-lg md:text-inherit md:bg-white md:rounded-md md:mt-2 md:hidden ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="languageButton">
                            <div class="p-2 md:px-0 md:py-1" role="none">
                                @if (app()->getLocale() == 'tm')
                                    <a href="locale/tm" class="block px-4 py-2 text-sm bg-gray-400 rounded md:bg-inherit md:hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                        TM
                                    </a>
                                    <a href="locale/ru" class="block px-4 py-2 text-sm rounded md:hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                        RU
                                    </a>
                                @else
                                    <a href="locale/tm" class="block px-4 py-2 text-sm rounded md:hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                        TM
                                    </a>
                                    <a href="locale/ru" class="block px-4 py-2 text-sm bg-gray-400 rounded md:bg-inherit md:hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                        RU
                                    </a>
                                @endif
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <div class="p-1 manual-height">
                <div class="container mx-auto">
                    @yield('content')
                </div>
            </div>
        </div>
        
    </body>
</html>
<!-- Optional: jQuery -->
<script src="{{asset('jquery/jquery.min.js')}}"></script>

<script>
    $(window).on('load', function() {
        $('#loader-wrapper').fadeOut('slow', function() {
            $('#content').fadeIn('slow');
        });
    });
</script>

<style>
    .heightWithAnimation{
        height: 224px;
    }
</style>
<script>
    function toggleDropdownNavBar(){
        const dropdownNavBar = document.getElementById('mega-menu-full');
        dropdownNavBar.classList.toggle('heightWithAnimation');
    }

    function toggleDropdownNavBarHide(){
        const dropdownNavBar = document.getElementById('mega-menu-full');
        dropdownNavBar.classList.remove('heightWithAnimation');
    }
</script>

<script>
    // sticky header
    window.onscroll = function() {
        changeHeaderColor();
    };

    function changeHeaderColor() {
        const header = document.getElementById("header");
        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
            header.style.backgroundColor = "#cfc4b8"; // Color when scrolled
        } else {
            header.style.backgroundColor = "#E6DDD4"; // Initial color
        }
    }
    // sticky header
    // for language
    function toggleDropdown() {
      const dropdown = document.getElementById('languageDropdown');
      dropdown.classList.toggle('md:hidden');
    }

    window.addEventListener('click', function(event) {
      const button = document.getElementById('languageButton');
      const dropdown = document.getElementById('languageDropdown');
      if (!button.contains(event.target) && !dropdown.contains(event.target)) {
        dropdown.classList.add('md:hidden');
      }
    });
    // for language
  </script>