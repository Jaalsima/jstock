<x-home-layout>
    <x-slot name="title">
        Contáctanos
    </x-slot>

    <div class="flex flex-col justify-between min-h-screen">
        <livewire:home-navbar />

        <!-- Contenido de Contacto -->
        <div class="w-2/3 mx-auto mt-8">
            <h2 class="mb-6 text-3xl font-semibold text-center text-gray-900 dark:text-white">¡Contáctanos!</h2>

            <!-- Formulario de Contacto -->
            <form class="p-6 bg-white rounded-md shadow-md dark:bg-gray-800 dark:shadow-gray-400">
                <div class="mb-4">
                    <label for="nombre"
                        class="block mb-2 text-lg font-medium text-gray-700 dark:text-gray-400">Nombre:</label>
                    <input type="text" id="nombre" name="nombre"
                        class="w-full p-2 border-gray-300 rounded-md dark:border-gray-600 focus:outline-none focus:border-red-800"
                        required>
                </div>

                <div class="mb-4">
                    <label for="correo" class="block mb-2 text-lg font-medium text-gray-700 dark:text-gray-400">Correo
                        Electrónico:</label>
                    <input type="email" id="correo" name="correo"
                        class="w-full p-2 border-gray-300 rounded-md dark:border-gray-600 focus:outline-none focus:border-red-800"
                        required>
                </div>

                <div class="mb-4">
                    <label for="mensaje"
                        class="block mb-2 text-lg font-medium text-gray-700 dark:text-gray-400">Mensaje:</label>
                    <textarea id="mensaje" name="mensaje" rows="4"
                        class="w-full p-2 border-gray-300 rounded-md dark:border-gray-600 focus:outline-none focus:border-red-800" required></textarea>
                </div>

                <div class="text-center">
                    <button type="submit"
                        class="px-6 py-2 text-white bg-red-800 rounded-md hover:bg-red-600 focus:outline-none focus:bg-red-600">Enviar
                        Mensaje</button>
                </div>
            </form>
            <!-- Fin del Formulario de Contacto -->
        </div>
        <!-- Fin del Contenido de Contacto -->

        <x-my-footer />
    </div>
</x-home-layout>
