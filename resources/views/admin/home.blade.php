@extends('layouts.dashboard')
@section('content')
    <div class="flex flex-col gap-10 p-2 pr-4">
        <div class="flex flex-row bg-gray-400 p-2">
            <div class="w-[120px] max-h-[200px]">
                <img class="bg-cover" src="{{asset('images/image2.jpg')}}" alt="Gurbannazar Ezizow image">
            </div>
            <div class="flex-1 p-2 text-white max-w-[700px] text-[18px] indent-4 text-justify">
                <p>
                    @lang('nav.admin_home')
                </p>
            </div>
        </div>
        <div class="flex justify-center items-center w-full">
            <div class="flex justify-around flex-wrap gap-10 md:gap-16 ">

                <x-admin.home-card iconClass="bx-book-open" :count="$poemCount" :href="route('admin.poem')">
                    <x-slot:card_text>
                        Bu bölümde Siz web sahypasynda gorkezilýän goşgulary goşup, goşulan goşgulary üýtgedip, bozup hem-de şol bir wagtda statusyny hem üýtgedip bilersiňiz
                    </x-slot:card_text>
                    <x-slot:card_section>
                        poems
                     </x-slot:card_section>
                </x-admin.home-card>

                <x-admin.home-card iconClass="bx-music" :count="$audioCount" :href="route('admin.audioPoem')">
                    <x-slot:card_text>
                        Bu bölümde Siz web sahypasynda gorkezilýän okalan audio goşgulary goşup, goşulan audio goşgulary üýtgedip, bozup hem-de şol bir wagtda statusyny hem üýtgedip bilersiňiz
                    </x-slot:card_text>
                    <x-slot:card_section>
                        audio poem
                     </x-slot:card_section>
                </x-admin.home-card>

                <x-admin.home-card iconClass="bx-photo-album" :count="$galleryCount" :href="route('admin.gallery')">
                    <x-slot:card_text>
                        Bu bölümde Siz web sahypasynda gorkezilýän suratlary goşup, bozup hem-de şol bir wagtda statusyny hem üýtgedip bilersiňiz
                    </x-slot:card_text>
                    <x-slot:card_section>
                        galereýa
                     </x-slot:card_section>
                </x-admin.home-card>

                <x-admin.home-card iconClass="bx-user-plus" :count="$userCount" :href="(auth()->user()->is_admin == 1) ? route('admin.controll') : ''">
                    <x-slot:card_text>
                        Bu bölümde Siz web sahypasyny dolandyrmak üçin admin doredip, üýtgedip hemde bozup bilersiňiz!
                    </x-slot:card_text>
                    <x-slot:card_section>
                        admin
                     </x-slot:card_section>
                </x-admin.home-card> 
            </div>
        </div>     
    </div>
@endsection