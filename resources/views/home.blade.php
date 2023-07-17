<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <div class="flex flex-col justify-between min-h-screen">
        <x-home-title />

        <x-my-footer />

        {{-- @if ($theme == 'clear'){
             <x-my-footer />
        }@else{
            <x-my-footer-dark/>
        }
        @endif --}}

    </div>
</x-app-layout>
