<!-- component -->
<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif

        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div
                class="absolute inset-0 bg-gradient-to-r from-white to-gray-400 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-1 py-10 bg-gray-600 dark:shadow-2xl sm:rounded-3xl sm:p-10">
                <div class="max-w-md mx-auto">
                    <div>
                        <h1 class="mb-4 text-center text-gray-200 text-4xl">Ingresar</h1>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div>
                            <x-label for="email" value="{{ __('Email') }}" />
                            <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autofocus autocomplete="username" />
                        </div>
                        <div class="mt-4">
                            <x-label for="password" value="{{ __('Password') }}" />
                            <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                autocomplete="current-password" />
                        </div>
                        <div class="block mt-4">
                            <label for="remember_me" class="flex items-center">
                                <x-checkbox id="remember_me" name="remember" />
                                <span
                                    class="ml-2 text-sm text-gray-600 dark:text-gray-400 dark:hover:text-gray-100">{{ __('Recuérdame') }}</span>
                            </label>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                    href="{{ route('password.request') }}">
                                    {{ __('¿Olvidaste tu contraseña?') }}
                                </a>
                            @endif
                            <x-button class="ml-4">
                                {{ __('Acceder') }}
                            </x-button>
                        </div>

                    </form>
                    <hr class="mt-2">
                    <div class="flex justify-center gap-3 mt-4">
                        {{-- Inicio de sesión con Google --}}
                        <a href="https://www.google.com"><img src="{{ asset('images/sn_icons/google.svg') }}"
                                class="w-7 bg-gray-300 hover:bg-gray-50 rounded-full" alt="Google"></a>

                        {{-- Inicio de sesión con Facebook --}}
                        <a href="https://www.facebook.com/"><img src="{{ asset('images/sn_icons/facebook.svg') }}"
                                class="w-7 bg-gray-300 hover:bg-gray-50 rounded-full" alt="Facebook"></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-32 space-y-4 text-gray-200 text-center sm:-mb-8">
            <p class="text-xs">By proceeding, you agree to our <a href="#" class="underline">Terms of Use</a> and
                confirm
                you have read our <a href="#" class="underline">Privacy and Cookie Statement</a>.</p>
            <p class="text-xs">This site is protected by reCAPTCHA and the <a href="#" class="underline">Google
                    Privacy
                    Policy</a> and <a href="#" class="underline">Terms of Service</a> apply.</p>
        </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
