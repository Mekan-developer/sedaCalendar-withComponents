@props([
    'count' => 0,
    'href' => '#',
    'iconClass' => ''
])
<div class="flex flex-col w-[38%] bg-gray-400 rounded-md overflow-hidden gap-4 ">
    <div class="flex flex-row gap-4 pt-6 pb-2 px-4 bg-gray-300">
        <div>
            <i class="bx {{ $iconClass }} text-[24px]"></i>
        </div>                        
        <div>@lang('nav.admin_audio_poem')</div>
    </div>
    <div class="pt-6 pb-6 px-4 text-white text-justify">
        {{ $card_text }}
    </div>
    <div class="flex justify-between p-2 border-t-2">
        <div class="flex justify-center flex-1 text-white">
            {{$count}} {{ $card_section }}
        </div>
        <div class="flex flex-1 justify-center items-center text-white">
            <a class="flex justify-center items-center" href="{{ $href }}">
                <i class='bx bx-show-alt text-[30px] mr-2'> </i> giňişleýin görmek
            </a>
        </div>
    </div>
</div>