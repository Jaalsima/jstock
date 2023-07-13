<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-gray-700 dark:text-white hover:bg-gray-300 dark:hover:text-black inline-flex items-center px-4 py-2 border border-gray-100 dark:hover:border-blue-500 dark:hover:bg-white rounded-md font-semibold text-sm text-white uppercase tracking-widest dark:hover:bg-gray-300 focus:bg-blue-400  active:bg-blue-900 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-700 ']) }}>
    {{ $slot }}
</button>
