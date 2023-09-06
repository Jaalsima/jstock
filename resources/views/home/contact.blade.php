<x-home-layout>
    <x-slot name="title">
        Contáctanos
    </x-slot>

    <div class="flex flex-col justify-between min-h-screen">
        <livewire:home-navbar />
        <div
            class="w-5/6 p-4 m-4 mx-auto text-2xl font-semibold text-center bg-gray-200 rounded-lg shadow-lg md:w-4/6 lg:w-1/3 lg:text-5xl shadow-gray-400 dark:bg-gray-800">
            <span class="text-red-800">JS</span>tock Contacto
        </div>
        <!-- Contenido de Contacto -->
        <div class="w-5/6 mx-auto mt-8 lg:w-2/3 md:mt-1 lg:mt-8">

            <!-- Formulario de Contacto -->
            <form
                class="w-full p-6 mx-auto bg-gray-200 rounded-md shadow-lg md:w-5/6 lg:w-2/3 shadow-gray-400 dark:bg-gray-800 dark:shadow-gray-400">
                <div class="mb-4">
                    <label for="nombre"
                        class="block mb-2 text-lg font-medium text-gray-700 dark:text-gray-400">Nombre:</label>
                    <input type="text" id="nombre" name="nombre"
                        class="w-full p-2 bg-gray-100 border-2 border-gray-300 rounded-md dark:bg-gray-600 dark:border-gray-400 focus:ring-0 focus:border-red-800"
                        required>
                </div>

                <div class="mb-4">
                    <label for="correo" class="block mb-2 text-lg font-medium text-gray-700 dark:text-gray-400">Correo
                        Electrónico:</label>
                    <input type="email" id="correo" name="correo"
                        class="w-full p-2 bg-gray-100 border-2 border-gray-300 rounded-md dark:bg-gray-600 dark:border-gray-400 focus:ring-0 focus:border-red-800"
                        required>
                </div>

                <div class="mb-4">
                    <label for="mensaje"
                        class="block mb-2 text-lg font-medium text-gray-700 dark:text-gray-400">Mensaje:</label>
                    <textarea id="mensaje" name="mensaje" rows="4"
                        class="w-full p-2 bg-gray-100 border-2 border-gray-300 rounded-md dark:bg-gray-600 dark:border-gray-400 focus:ring-0 focus:border-red-800"
                        required></textarea>
                </div>

                <div class="text-center">
                    <button type="submit"
                        class="px-6 py-2 text-white bg-red-800 rounded-md hover:bg-red-600 focus:bg-red-600">Enviar
                        Mensaje</button>
                </div>
            </form>
            <!-- Fin del Formulario de Contacto -->
        </div>
        <!-- Fin del Contenido de Contacto -->

        <x-my-footer />
    </div>
</x-home-layout>
