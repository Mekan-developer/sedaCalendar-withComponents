<div id="modal_poem" class="absolute flex top-0 left-0 flex-col items-center  w-full h-full bg-[#979595c5] text-white py-8 px-8">
    <div class="overflow-hidden overflow-y-auto  bg-[#868e91c5] py-8 relative">
        <div class="absolute top-4 right-4">
            <a href="{{route('admin.audioPoem')}}">
                <i class='bx bx-x text-[40px] cursor-pointer text-gray-200'></i>
            </a>
        </div>
        <div class="flex justify-center items-center text-[20px] mb-2">
            <span class="text-white">
                @lang('nav.audio_edit')
            </span>
        </div>
        <form action="{{route('audioPoem.update',['audioPoem' => $audioPoem->id])}}" method="POST"class="flex flex-col gap-4 px-8 py-2" enctype="multipart/form-data" novalidate>
            @csrf
            @method('PUT')
            <div class="grid gap-6 md:grid-cols-2">
                    <x-form.input name="name_tm" value="{{$audioPoem->name_tm}}" placeholder="Название тм" required></x-form.input>
                    <x-form.input name="name_ru" value="{{$audioPoem->name_ru}}" placeholder="Название ру" required></x-form.input>
            </div>
            <div>
                <x-form.audio-file name="audio">format mp3</x-form.audio-file>
            </div>
            <div class="flex flex-row justify-between items-center h-[50px]">
                <x-form.active-toggle name='status' :checked="$audioPoem->status"> active </x-form.active-toggle>
                <x-form.order :orders="$audios" :currentOrder="$audioPoem->order"></x-form.order>
            </div>
            <x-form.submit-button>@lang('nav.create')</x-form.submit-button>
            <x-form.error></x-form.error>
       </form>
    </div>
</div>

<script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
<script>
tinymce.init({
    selector:'textarea.text_tm',
    maxwidth: 600,
    height: 300
});
tinymce.init({
    selector:'textarea.text_ru',
    maxwidth: 600,
    height: 300
});
</script> 
<script>
    function hideModal() {
        const element = document.getElementById("modal_poem");  // Get the DIV element
        element.style.display = "none"; // Remove mystyle class from DIV
    }
</script>

