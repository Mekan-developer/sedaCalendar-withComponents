<div>
    @props([
        'name' => ''
    ])
    <label for="file"> {{ $slot }} </label>
    <input id="file" type="file" name={{ $name }} class="flex items-center p-1  w-full text-sm text-gray-900 border border-gray-200 rounded-sm cursor-pointer bg-gray-200 focus:outline-none" required>
</div>