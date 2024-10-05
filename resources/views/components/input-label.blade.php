@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-yellow-500 dark:text-yellow-400']) }}>
    {{ $value ?? $slot }}
</label>
