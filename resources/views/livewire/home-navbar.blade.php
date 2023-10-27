<nav x-data="{ open: false }"
    class="sticky top-0 z-50 mb-4 bg-white border-b shadow-lg dark:bg-gray-800 shadow-gray-400 dark:border-gray-700">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto sm:px-6 lg:px-8">


        <div class="flex h-16">
            <!-- Logo -->
            <div class="flex items-center shrink-0">
                <a href="{{ route('home') }}">
                    <x-application-logo class="block h-9" />

                </a>
            </div>

            <div class="flex justify-center mx-auto my-4 text-lg">
                <!-- Navigation Links -->
                <div
                    class="hidden mx-3 border border-white lg:-my-px lg:flex lg:justify-center dark:border-gray-800 hover:border-red-400 hover:shadow-lg hover:shadow-red-300 hover:rounded">
                    @auth
                        <x-nav-link class="px-3" href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                            {{ __('Inicio') }}
                        </x-nav-link>
                    @else
                        <x-nav-link class="px-3" href="{{ route('home') }}" :active="request()->routeIs('home')">
                            {{ __('Inicio') }}
                        </x-nav-link>
                    @endauth
                </div>
                <div
                    class="hidden mx-3 border border-white lg:-my-px lg:flex lg:justify-center dark:border-gray-800 hover:shadow-lg hover:shadow-red-300 hover:rounded">
                    <x-nav-link class="px-3" href="{{ route('services') }}" :active="request()->routeIs('services')">
                        {{ __('Servicios') }}
                    </x-nav-link>
                </div>
                <div
                    class="hidden mx-3 border border-white lg:-my-px lg:flex lg:justify-center dark:border-gray-800 hover:shadow-lg hover:shadow-red-300 hover:rounded">

                    <x-nav-link class="px-3" href="{{ route('blog') }}" :active="request()->routeIs('blog')">
                        {{ __('Blog') }}
                    </x-nav-link>
                </div>
                <div
                    class="hidden mx-3 border border-white lg:-my-px lg:flex lg:justify-center dark:border-gray-800 hover:shadow-lg hover:shadow-red-300 hover:rounded">
                    <x-nav-link class="px-3" href="{{ route('about') }}" :active="request()->routeIs('about')">
                        {{ __('Nosotros') }}
                    </x-nav-link>
                </div>
                <div
                    class="hidden mx-3 border border-white lg:-my-px lg:flex lg:justify-center dark:border-gray-800 hover:shadow-lg hover:shadow-red-300 hover:rounded">
                    <x-nav-link class="px-3" href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                        {{ __('Contáctanos') }}

                    </x-nav-link>
                </div>

            </div>
            <!--Botones de registro e inicio de sesión-->
            <div class="hidden lg:-my-px lg:ml-10 lg:flex">
                <x-login-register />
            </div>

            <!-- Hamburger -->
            <div class="flex items-center -mr-2 lg:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden lg:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @auth
                <x-responsive-nav-link class="text-gray-500" href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                    {{ __('Inicio') }}
                </x-responsive-nav-link>
            @else
                <x-responsive-nav-link class="text-gray-500" href="{{ route('home') }}" :active="request()->routeIs('home')">
                    {{ __('Inicio') }}
                </x-responsive-nav-link>
            @endauth
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link class="text-gray-500" href="{{ route('services') }}" :active="request()->routeIs('services')">
                {{ __('Servicios') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('blog') }}" :active="request()->routeIs('blog')">
                {{ __('Blog') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                {{ __('Nosotros') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                {{ __('Contáctanos') }}
            </x-responsive-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">

            <x-login-register />
        </div>



    </div>

</nav>
