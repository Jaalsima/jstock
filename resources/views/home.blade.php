<x-home-layout>
    <x-slot name="title">
        Home
    </x-slot>
    <div class="flex flex-col justify-between min-h-screen">
        <x-home-navbar />
        <x-home-content />
        {{-- <livewire:user-datatable /> --}}
        <x-my-footer />
    </div>
</x-home-layout>
