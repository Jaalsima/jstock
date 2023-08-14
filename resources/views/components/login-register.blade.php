<!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
<div>
    @if (Route::has('login'))
        <div class="z-10 p-4 text-right lg:top-0 lg:right-0">
            @auth
                <a href="{{ url('/dashboard') }}"
                    class="py-2 text-lg text-gray-700 dark:text-gray-300 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-gray-500"></a>
            @else
                <div class="flex gap-10 pr-4 text-lg">
                    <a href="{{ route('login') }}"
                        class='inline-flex items-center px-2 py-1 text-lg leading-5 text-gray-700 border border-white dark:text-gray-300 hover:shadow-lg dark:border-gray-800 hover:border-red-400 hover:shadow-red-300 hover:rounded'>Ingresar
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class='inline-flex items-center px-2 py-1 text-lg leading-5 text-gray-700 border border-white dark:text-gray-300 hover:shadow-lg dark:border-gray-800 hover:border-red-400 hover:shadow-red-300 hover:rounded'>Registro</a>

                </div>
        @endif
    @endauth
</div>
@endif
</div>
