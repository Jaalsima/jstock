<div class="flex justify-center gap-3 mt-4">
        {{-- Inicio de sesión con Google --}}
        <a href="{{url('auth/google/redirect')}}"><img src="{{ asset('images/sn_icons/google.svg') }}"
                        class="w-7 bg-white hover:bg-gray-50 rounded-full" alt="Google"></a>

        {{-- Inicio de sesión con Facebook --}}
        <a href="{{url('auth/facebook/redirect')}}"><img src="{{ asset('images/sn_icons/facebook.svg') }}"
                        class="w-7 bg-white hover:bg-gray-50 rounded-full" alt="Facebook"></a>
</div>