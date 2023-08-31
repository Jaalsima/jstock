<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 dark:bg-blue-700 border dark:border-gray-500 rounded-md font-semibold text-xs dark:text-gray-300 uppercase tracking-widest hover:bg-gray-50 dark:hover:bg-blue-600 focus:outline-none disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
