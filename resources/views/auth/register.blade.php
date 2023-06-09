<!-- component -->
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />
        <div class="mb-10">

            <x-title />
        </div>


        <div class="relative">
            <div
                class="absolute inset-0 bg-gradient-to-r from-white to-red-900 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-1 py-10 bg-gray-600 dark:shadow-2xl sm:rounded-3xl sm:p-10">
                <div class="max-w-md mx-auto">
                    <div>
                        <h1 class="mb-4 text-center text-gray-200 text-3xl">Registro</h1>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div>
                            <x-label for="name" value="{{ __('Nombre') }}" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                        </div>

                        <div class="mt-4">
                            <x-label for="email" value="{{ __('Correo Electrónico') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autocomplete="username" />
                        </div>

                        <div class="mt-4">
                            <x-label for="password" value="{{ __('Contraseña') }}" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                autocomplete="new-password" />
                        </div>

                        <div class="mt-4">
                            <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
                            <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                        </div>

                        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="mt-4">
                                <x-label for="terms">
                                    <div class="flex items-center">
                                        <x-checkbox name="terms" id="terms" required />

                                        <div class="ml-2">
                                            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' =>
                                                    '<a target="_blank" href="' .
                                                    route('terms.show') .
                                                    '" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">' .
                                                    __('Terms of Service') .
                                                    '</a>',
                                                'privacy_policy' =>
                                                    '<a target="_blank" href="' .
                                                    route('policy.show') .
                                                    '" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">' .
                                                    __('Privacy Policy') .
                                                    '</a>',
                                            ]) !!}
                                        </div>
                                    </div>
                                </x-label>
                            </div>
                        @endif

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-200 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                href="{{ route('login') }}">
                                {{ __('¿Ya estás registrado?') }}
                            </a>

                            <x-button class="ml-4">
                                {{ __('Registrarse') }}
                            </x-button>
                        </div>
                    </form>
                    <hr class="mt-2">
                    <x-sn-icons />
                </div>
            </div>
        </div>
        <div class="mt-14 space-y-4 text-gray-700 text-center sm:-mb-8">
            <p class="text-md">Al acceder, aceptas los <a href="#" class="underline">términos y condiciones</a> de
                nuestro sitio.</p>

            <p>Aplican los <a href="https://google.com/" class="underline"> términos de servicio de Google</a>.</p>
        </div>

    </x-authentication-card>
</x-guest-layout>
