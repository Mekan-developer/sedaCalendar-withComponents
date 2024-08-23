<div id="modal_poem_edit" class="absolute top-0 left-0 flex-col items-center justify-center w-full h-full bg-[#979595c5] text-white">
    <div class="flex items-center justify-center w-full h-full">
        <div style="scrollbar-width: thin;" class="flex flex-col items-center w-full h-full  overflow-hidden overflow-y-auto bg-[#859094a2] py-4 relative">
            <div class="p-4 bg-[#859094c5] relative">
            <div class="absolute top-2 right-2">
                <a href="{{route('admin.poem')}}">
                    <i class='bx bx-x text-[40px] cursor-pointer text-gray-200'></i>
                </a>
            </div>
            <div class="flex justify-center items-center text-[20px]">
                <span class="text-white">
                   @lang('nav.poem_edit')
                </span>
            </div>
            <form method="POST" action="{{route('poem.update')}}" class="flex flex-col gap-2 px-12 py-2 w-[500px] md:w-[750px] " novalidate>
                @csrf
                <input class="hidden" type="number" name="id" value="{{$poem->id}}">
                <div class="grid gap-6 md:grid-cols-2">
                        <input type="text" id="name_tm" name="name_tm" value="{{$poem->name_tm}}" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Название стихотворения тм" required />
                        <input type="text" id="name_ru" name="name_ru" value="{{$poem->name_ru}}" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Название стихотворения ру" required />
                </div>
                <div class="flex flex-col gap-2">
                        <textarea class="text_tm" id="text_tm" name="text_tm" placeholder="стихотворения тм..." >{{$poem->text_tm}}</textarea>
                        <textarea class="text_ru" id="text_ru" name="text_ru" placeholder="стихотворения ру..." >{{$poem->text_ru}}</textarea>
                </div>
                <div class="grid gap-6 md:grid-cols-2">
                    <div>
                        <input type="text" id="author_name_tm" name="author_tm" value="{{$poem->author_tm}}" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="имя автора тм" required />
                    </div>
                    <div>
                        <input type="text" id="author_name_ru" name="author_ru" value="{{$poem->author_ru}}" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="имя автора ru" required />
                    </div>
                </div>
                <div class="flex flex-row justify-between items-center h-[50px]">
                    <x-form.active-toggle name='status' :checked="$poem->status"> active </x-form.active-toggle>
                    <x-form.order 
                    :orders="$poems" 
                    :currentOrder="$poem->order"
                    />
                </div>
                <x-form.submit-button>@lang('nav.create')</x-form.submit-button>
                <x-form.error></x-form.error>
            </form>
            </div>
        </div>
    </div>
</div>

{{-- <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script> --}}
<script>
tinymce.init({
    selector:'textarea.text_tm',
    license_key: 'glpvuu4bgw2i0d17uizamjpfwjswu59kbeacaefftswsyuty',
    maxwidth: 600,
    height: 300
});
tinymce.init({
    selector:'textarea.text_ru',
    license_key: 'glpvuu4bgw2i0d17uizamjpfwjswu59kbeacaefftswsyuty',
    maxwidth: 600,
    height: 300
});
</script> 

