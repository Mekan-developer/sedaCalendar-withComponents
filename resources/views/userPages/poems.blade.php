<div class="flex flex-col">
    <div class="flex items-center justify-center w-full mb-3">
        <p class="uppercase text-[26px]">@lang('nav.poems')</p>
    </div>
    <div class="flex flex-row flex-wrap items-center justify-center gap-2 md:justify-between">
        @foreach($poems as $poem)
            <div class="flex justify-start w-full h-[80px] md:h-[76px] gap-4 p-1 overflow-hidden bg-[#b5aa9f5e] rounded-md md:p-2 md:m-0 md:w-[49%]">
                <div class="flex items-center justify-center">
                    <a href="{{route('show-poem',['poem' => $poem->id])}}">
                        <i class='bx bx-book-open text-[46px]' ></i>
                    </a>
                </div>
                <a href="{{route('show-poem',['poem' => $poem->id])}}">
                <div class="flex flex-col items-start justify-center flex-1 p-0 m-0">
                    <div>
                        <h2 class="text-[22px] capitalize">{{$poem['author_'.app()->getLocale()]}}</h2>
                    </div>
                    <div class="opacity-80">
                        <p class="flex line-clamp text-[16px] leading-[16px] pr-20 indent-4">
                            {{$poem['name_'.app()->getLocale()]}}
                        </p>
                    </div>
                </div>
            </a>
            </div>
        @endforeach
    </div>    
    <div id="audio_poems" class="mb-10"> </div>
</div>


