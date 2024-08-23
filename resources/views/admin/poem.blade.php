@extends('layouts.dashboard')

@section('content')
<div class="relative flex flex-col items-center w-full h-full p-12">

    <div class="flex justify-start w-full">
        <span class="text-[#1D1B31] text-[28px] font-bold">{{__('nav.poems')}}</span>
    </div>
    <div class="w-full h-[100px]">
        <div class="flex flex-row-reverse">
            <button onclick="showModal()" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 me-2 mb-2">@lang('nav.create')</button>
        </div>
    </div>
    @include('./admin/includePoem.index')
    @if(isset($poem->showEdit))
        @include('./admin/includePoem.edit')
    @endif
    @include('./admin/includePoem.create')
</div>

@endsection