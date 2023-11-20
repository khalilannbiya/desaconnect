@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded transition duration-500 ease-in-out
ring-1 ring-black focus:outline-none focus:ring-2 focus:ring-vermillion focus:border-transparent shadow-sm']) !!}>