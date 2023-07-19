<!-- component -->
<nav class="bg-gray-200 shadow-lg shadow-gray-400 w-100 px-8 md:px-auto">
    <div class="md:h-16 h-40 mx-auto md:px-4 container flex items-center justify-between flex-wrap md:flex-nowrap">
        <x-application-logo />
        <div class="text-gray-700 order-3 w-full md:w-auto md:order-2">
            <ul class="flex font-semibold justify-between">
                <!-- Active Link = text-red-700
                Inactive Link = hover:text-red-700 -->
                <li class="md:px-4 md:py-2 text-red-700"><a href="{{ route('home') }}">Inicio</a></li>
                <li class="md:px-4 md:py-2 hover:text-red-600"><a href="{{ route('home') }}">Búsqueda</a></li>
                <li class="md:px-4 md:py-2 hover:text-red-600"><a href="{{ route('home') }}">Blog</a></li>
                <li class="md:px-4 md:py-2 hover:text-red-600"><a href="{{ route('home') }}">Nosotros</a></li>
                <li class="md:px-4 md:py-2 hover:text-red-600"><a href="{{ route('home') }}">Contáctanos</a></li>
            </ul>
        </div>
        <div class="order-2 md:order-3">
            <x-login-register />
        </div>
    </div>
</nav>
