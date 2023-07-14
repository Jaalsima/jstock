<!-- I begin to speak only when I am certain what I will say is not better left unsaid. - Cato the Younger -->
<div>
    @if (Route::has('login'))
        <div class="sm:fixed sm:top-0 sm:right-0 p-4 text-right z-10">
            @auth
                <a href="{{ url('/dashboard') }}"
                    class="font-semibold text-gray-700 hover:text-red-700 dark:text-gray-500 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Inicio</a>
            @else
                <div class="flex gap-10 pr-4 text-lg">
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-700 hover:text-red-700 dark:text-gray-500 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Ingresar
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="font-semibold text-gray-700 hover:text-red-700 dark:text-gray-500 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Registro</a>

                </div>
        @endif
    @endauth
</div>
@endif
</div>
