<div id="modal_poem" class="absolute hidden top-0 left-0 flex-col items-center justify-center w-full h-full bg-[#979595c5] text-white">
    <div class="flex items-center justify-center w-full h-full">
        <div style="scrollbar-width: thin;" class="flex flex-col items-center w-full h-full  overflow-hidden overflow-y-auto bg-[#859094a2] py-4 ">
            <div class="p-4 bg-[#859094c5] relative">
                <div class="absolute top-2 right-2">
                    <i onclick="hideModal()" class='bx bx-x text-[40px] cursor-pointer text-gray-200'></i>
                </div>
                <div class="flex justify-center items-center text-[20px]">
                    <span class="text-white">
                        @lang('nav.poem_create')
                    </span>
                </div>
                <form method="POST" action="{{route('poem.store')}}" class="flex flex-col gap-2 px-12 py-2 w-[500px] md:w-[750px] ">
                    @csrf
                    <div class="grid gap-6 md:grid-cols-2">
                        <x-form.input name="name_tm" placeholder="Название тм" required></x-form.input>
                        <x-form.input name="name_ru" placeholder="Название ру" required></x-form.input>
                    </div>
                    <div class="flex flex-col gap-2">
                        <textarea class="text_tm" id="text_tm" name="text_tm" placeholder="стихотворения тм..."></textarea>
                        <textarea class="text_ru" id="text_ru" name="text_ru" placeholder="стихотворения ру..."></textarea>
                    </div>
                    <div class="grid gap-6 md:grid-cols-2">
                        <x-form.input name="author_tm" placeholder="имя автора тм" required></x-form.input>
                        <x-form.input name="author_ru" placeholder="имя автора ру" required></x-form.input>
                    </div>
                    <div>
                        <x-form.active-toggle name='status' checked> active </x-form.active-toggle>
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
    height: 250
});
tinymce.init({
    selector:'textarea.text_ru',
    license_key: 'glpvuu4bgw2i0d17uizamjpfwjswu59kbeacaefftswsyuty',
    maxwidth: 600,
    height: 250
});
</script> 
<script>
    function hideModal() {
        // window.show();//sidebar
        const element = document.getElementById("modal_poem");  // Get the DIV element
        element.style.display = "none"; // Remove mystyle class from DIV
    }
    function showModal() {
        // window.hide();//sidebarr
        const element = document.getElementById("modal_poem");  // Get the DIV element
        element.style.display = "block"; // Remove mystyle class from DIV
    }
</script>

