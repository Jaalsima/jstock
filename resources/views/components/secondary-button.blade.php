<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 border dark:border-gray-500 rounded-md font-semibold text-xs dark:text-gray-300 uppercase tracking-widest focus:outline-none disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
