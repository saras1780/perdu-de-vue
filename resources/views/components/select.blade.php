@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge(['class' => 'border-zinc-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full text-sm']) }}>
    {{ $slot }}
</select>
