<x-app-layout>
    <x-slot name="header">
        Inicio
    </x-slot>
    <div class="flex flex-col justify-between min-h-screen">
        <x-home-title />
        <div class="m-4 p-6 shadow-md shadow-gray-300">
            <livewire:user-datatable />
        </div>
        <x-my-footer />
    </div>
</x-app-layout>
