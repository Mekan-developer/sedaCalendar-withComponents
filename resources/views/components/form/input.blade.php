<div>
    @props(['name' => '', 'placeholder' => '', 'value' => ''])
    <input 
    type="text"
    name="{{ $name }}" 
    placeholder="{{ $placeholder }}" 
    value="{{ $value }}" 

    {{$attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5'])}}
    />
</div>