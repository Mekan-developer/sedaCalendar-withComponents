@extends('layouts.dashboard')

@section('content')
    <div class="relative flex flex-col items-start w-full h-full p-8 overflow-hidden overflow-y-auto  md:flex-row md:overflow-visible custom-scrollbar ">
        <div class="flex flex-col w-full h-full">
            <div class="flex justify-start w-full">
                <span class="text-[#1D1B31] text-[28px] font-bold">{{__('nav.galleries')}}</span>
            </div>
            <div class="h-full overflow-hidden overflow-x-auto custom-scrollbar  bg-gray-50">
                <div class="container-images">
                    @foreach($images as $image)
                    <div class="flex flex-col gap-1 border border-gray-400 border-1 w-[200px] lg:w-auto">
                        <div class="image-item flex flex-col gap-1 max-h-[200px]  overflow-hidden">
                                <img class="bg-cover" src="{{$image->getImage()}}" alt="gallery images">                          
                        </div>
                        <div class="flex flex-row items-center justify-between w-full p-1">
                            <form action="{{ route('image.update', ['image' => $image->id])}}" 
                                method="post">
                                @csrf
                                @method('PUT')
                                <label class="inline-flex items-center cursor-pointer relative w-[164px]">
                                    <input type="checkbox" name="status" @if($image->status) checked @endif class="sr-only peer">
                                    <div class="relative w-11 h-6 bg-red-600 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                    @if($image->status) 
                                        <span class="text-sm font-medium text-gray-900 ms-3 dark:text-gray-300">@lang('nav.deactivate')</span>
                                    @else
                                        <span class="text-sm font-medium text-gray-900 ms-3 dark:text-gray-300">@lang('nav.activate')</span>
                                    @endif
                                    <button type="submit" class="w-[45px] h-[25px] absolute top-0"></button>{{-- image activate and disactivate button --}}
                                </label>
                            </form>
                            @if(auth()->user()->is_admin == 1)
                                <form action="{{ route('image.delete', ['image' => $image->id])}}" 
                                    method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <i class='bx bx-trash text-[24px] text-red-600 cursor-pointer'></i>
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>                    
                    @endforeach
                </div>
            </div>
        </div>
        <div class="flex flex-col justify-center w-full md:w-auto text-[16px] px-8">
            <div class="pt-4 mb-0 w-[230px]">
                <label class="mb-5 flex justify-center items-center text-xl font-semibold text-[#07074D] text-nowrap">
                    @lang('nav.upload_img')
                </label>  
                <form action="{{route('gallery.store')}}" method="POST"
                enctype="multipart/form-data" novalidate>
                    @csrf
                <div class="mb-4">
                    <input type="file" name="image[]" id="file" class="sr-only" multiple/>
                    <label
                    for="file"
                    class="relative flex min-h-[160px] items-center justify-center rounded-md border border-dashed border-[#07074D] p-8 text-center">
                    <div>
                        <span class="mb-2 block text-xl font-semibold text-[#07074D]">
                            Drop image here
                        </span>
                        <span class="mb-2 block text-base font-medium text-[#6B7280]">
                            Or
                        </span>
                        <span
                        class="inline-flex rounded border border-[#5556a59a] py-2 px-7 text-base font-medium text-[#07074D]">
                            Browse
                        </span>
                    </div>
                    </label>
                </div>
                <x-form.active-toggle name='status' checked class="my-8 py-4"> active </x-form.active-toggle>
            </div>
            <x-form.submit-button>@lang('nav.upload')</x-form.submit-button>
        </form>
        <x-form.error></x-form.error>
        </div>
    </div>
@endsection

<style>
.container-images {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
  grid-gap: 16px;
  padding: 10px;
}    
.image-item {
  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
  padding: 20px 0;
  font-size: 20px;
  aspect-ratio: 1/1;
}

@media (max-width: 1440px) {
    .container-images {  grid-template-columns: 1fr 1fr 1fr 1fr;}
}

@media (max-width: 1200px) {
    .container-images {  grid-template-columns: 1fr 1fr 1fr;}
}

@media (max-width: 992px) {
    .container-images {  grid-template-columns: 1fr 1fr;}
} 

</style>

<script>
    console.log('test')
    function deleteConfirm(text) {
      confirm(text);
    }
</script>