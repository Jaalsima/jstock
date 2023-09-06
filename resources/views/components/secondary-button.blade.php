<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-blue-500 dark:bg-blue-700 border dark:border-gray-500 rounded-md font-semibold hover:text-gray-100 text-xs dark:text-gray-300 uppercase tracking-widest hover:bg-blue-400 dark:hover:bg-blue-600 focus:outline-none disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
