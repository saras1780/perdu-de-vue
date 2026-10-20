@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' => 'border-zinc-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full text-sm', 'rows' => 4]) }}>{{ $slot }}</textarea>
