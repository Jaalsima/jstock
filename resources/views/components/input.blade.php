@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        'bg-gray-200 border-gray-300 dark:border-gray-700 dark:bg-gray-300 dark:text-gray-700 focus:border-blue-300 dark:focus:border-blue-400 focus:ring-blue-300 dark:focus:ring-blue-400 rounded-md shadow-sm',
]) !!}>
