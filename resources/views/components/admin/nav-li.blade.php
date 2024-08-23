@props([
    'route' => '',
    'langs' => '',
    'class' => 'bx-book-open',
])

<li>
    <a class="{{ Request::is('admin/'.(($route == 'audioPoem')? 'audio-poem' : $route).'*') ? 'bg-[#fff]' : '' }}" href="{{route('admin.'.$route)}}">
        <i class="bx {{$class}} {{ Request::is('admin/'.(($route == 'audioPoem')? 'audio-poem' : $route).'*') ? 'text-[#11101d]' : '' }}"></i>
        <span  class="links_name {{ Request::is('admin/'.(($route == 'audioPoem')? 'audio-poem' : $route).'*') ? 'text-[#11101d]' : '' }}">
            {{__('nav.'.$langs)}}
        </span>
    </a>
</li>
