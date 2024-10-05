@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-yellow-500 bg-black text-yellow-500 dark:bg-black dark:border-yellow-400 dark:text-yellow-400 focus:border-yellow-500 focus:ring-yellow-500 rounded-md shadow-sm']) !!}>
