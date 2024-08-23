@extends('layouts.dashboard')

@section('content')
    <div class="relative flex flex-col items-center w-full h-full p-12">
        <div class="flex justify-start w-full">
            <span class="text-[#1D1B31] text-[28px] font-bold">{{__('nav.audio_poems')}}</span>
        </div>
        <div class="w-full h-[100px]">
            <div class="flex flex-row-reverse">
                <button onclick="showModal()" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 me-2 mb-2">@lang('nav.create')</button>
                {{-- <button  type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg px-5 py-2.5 me-2 mb-2">порядок</button> --}}
            </div>
        </div>
        @include('./admin/includeAudioPoem.index')
    </div>

        @if(isset($audioPoem->showEdit)) 
            @include('./admin/includeAudioPoem.edit')
        @endif
    @include('./admin/includeAudioPoem.create')
    @if ($errors->any())
        <script>window.showModal()</script>
    @endif
@endsection