<div>
    @props([
        'orders' => '',
        'currentOrder' => ''
    ])

    <div class="flex gap-2 items-center  w-[100px]">
        <span>@lang('nav.order')</span>
        <select id="small" name="order" class="block w-full p-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500">
            @foreach($orders as $order)
                <option @if($currentOrder == $order->order) selected @endif>{{$order->order}}</option>
            @endforeach
        </select>                    
    </div>
</div>