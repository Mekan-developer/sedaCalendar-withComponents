

<div class="relative w-full h-full mt-2 overflow-y-auto shadow-md custom-scrollbar sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 rtl:text-right">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-4">Id</th>
                <th scope="col" class="px-6 py-3">
                    {{__('nav.name_of_poems')}}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{__('nav.poems')}}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{__('nav.author')}}
                </th>
                <th scope="col" class="px-6 py-3">
                    {{__('nav.status')}}
                </th>
                <th scope="col" class="px-6 py-3">
                    order
                </th>
                <th scope="col" class="px-6 py-3">
                    {{__('nav.actions')}}
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($poems as $poem)
            <tr class="border-b odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                <th class="px-6 py-4">{{ $poem->id }}</th>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $poem['name_'.app()->getLocale()] }}
                </th>
                <td class="px-6 py-4 overflow-hidden line-clamp">
                    {!! $poem['text_'.app()->getLocale()] !!}
                    
                </td>
                <td class="px-6 py-4">
                    {{ $poem['author_'.app()->getLocale()] }}
                </td>
                <td class="px-6 py-4">
                    <form action="{{ route('poem.active', ['poem' => $poem->id])}}" 
                        method="post">
                        @csrf
                        @method('PUT')
                        <label class="inline-flex items-center cursor-pointer relative">
                            <input type="checkbox" name="status" @if($poem->status) checked @endif class="sr-only peer">
                            <div class="relative w-11 h-6 bg-red-600 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            <button type="submit" class="w-[45px] h-[25px] absolute top-0"></button>{{-- image activate and disactivate button --}}
                        </label>
                    </form>
                </td>
                <td class="px-6 py-4">
                    {{ $poem->order }}
                </td>
                <td class="flex gap-4 px-6 py-4 ">
                    <a href="{{route('poem.edit',['poem' => $poem->id])}}">
                        <button type="submit" class="flex p-2.5 rounded-xl transition-all duration-300">
                            <i class='bx bx-edit text-[24px]'></i>
                        </button>
                    </a>
                    @if(auth()->user()->is_admin == 1)
                        <form action="{{ route('poem.delete', ['poem' => $poem->id])}}" 
                            method="post">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="flex p-2.5 rounded-xl transition-all duration-300 text-red-600">
                                <i class='text-[24px] bx bx-trash'></i>
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
