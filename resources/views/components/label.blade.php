@props(['value'])

<label
    {{ $attributes->merge(['class' => 'block font-medium text-lg text-gray-200 dark:text-gray-400 dark:hover:text-gray-100']) }}>
    {{ $value ?? $slot }}
</label>
