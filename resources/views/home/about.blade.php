<x-home-layout>
    <x-slot name="title">
        about
    </x-slot>

    <div class="flex flex-col justify-between min-h-screen">
        <livewire:home-navbar />

        <div class="relative p-2 bg-yellow-40">
            {{--  --}}
            <div class="flex flex-col w-full m-auto text-justify lg:w-3/4 2xl:w-2/3 lg:p-4">
                <div class="w-5/6 mx-auto mb-10 lg:ml-32">
                    <h1 class="text-4xl font-bold md:text-6xl lg:text-7xl"><span class="text-red-800">Qu</span>iénes somos
                    </h1>
                    <p class="pr-16 text-2xl font-semibold md:text-3xl">La solución a todos tus problemas</p>
                </div>
                <div class="w-full text-justify lg:flex">
                    <div class="relative mx-auto md:w-3/4 lg:w-2/3 h-80 md:h-60 lg:mr-8 group">
                        <div
                            class="w-full h-64 mt-12 duration-300 ease-in bg-gray-400 rounded md:h-40 lg:h-48 lg:mt-8 group-hover:shadow-lg dark:group-hover:shadow-red-400 group-hover:shadow-red-800 group-hover:-rotate-3">
                        </div>
                        <div style="margin: 0 5vh 0 6vh;"
                            class="absolute w-3/4 h-auto p-8 duration-300 ease-in bg-gray-200 rounded shadow-lg dark:text-gray-300 dark:bg-gray-800 -top-9 lg:top-2 lg:h-64 2xl:h-60 shadow-gray-400 group-hover:shadow-gray-600">
                            <h1 class="mb-2 text-3xl font-medium">Misión</h1>
                            <p>Nuestra misión es proporcionar un sistema de inventario JStock altamente eficiente y
                                confiable que permita a las empresas gestionar su inventario de manera efectiva, reducir
                                costos y aumentar la productividad.</p>
                        </div>
                    </div>
                    <div class="relative mx-auto md:w-3/4 lg:w-2/3 h-80 md:h-52 lg:mr-8 group">
                        <div
                            class="w-full h-64 mt-12 duration-300 ease-in bg-gray-400 rounded md:h-40 lg:h-48 lg:mt-8 group-hover:shadow-lg dark:group-hover:shadow-red-400 group-hover:shadow-red-800 group-hover:-rotate-3">
                        </div>
                        <div style="margin: 0 5vh 0 6vh;"
                            class="absolute w-3/4 h-auto p-8 duration-300 ease-in bg-gray-200 rounded shadow-lg dark:text-gray-300 dark:bg-gray-800 -top-9 lg:top-2 lg:h-64 2xl:h-60 shadow-gray-400 group-hover:shadow-gray-600">
                            <h1 class="mb-2 text-3xl font-medium">Visión</h1>
                            <p>Nuestra visión es convertirnos en el proveedor líder de soluciones de gestión de
                                inventario,
                                ofreciendo un sistema JStock de vanguardia que sea reconocido a nivel global por su
                                innovación y capacidad para impulsar el éxito empresarial.
                            </p>
                        </div>
                    </div>
                </div>
                <div
                    class="w-5/6 p-5 mx-auto mt-16 mb-4 bg-gray-300 lg:w-2/3 dark:text-gray-300 dark:bg-gray-800 rounded-xl">
                    <h1 class="text-3xl font-medium">Historia de JStock</h1>
                    <p>
                        JStock ha estado en la vanguardia de la gestión de inventario durante más de dos décadas.
                        Fundada en el año 2000 por un grupo de expertos en logística y tecnología, nuestra empresa ha
                        trabajado incansablemente para desarrollar y mejorar continuamente nuestro sistema de
                        inventario.
                    </p>
                    <p>
                        Durante los años, hemos colaborado con empresas de todos los tamaños, desde pequeñas empresas
                        locales hasta corporaciones internacionales, para proporcionar soluciones de inventario que
                        impulsen la eficiencia operativa y generen un impacto positivo en el resultado final.
                    </p>
                    <p>
                        Nuestro compromiso con la innovación nos ha llevado a la creación de un sistema JStock que es
                        altamente personalizable, escalable y fácil de usar. Nuestro equipo de desarrollo está siempre
                        trabajando en nuevas características y mejoras para garantizar que nuestros clientes tengan
                        acceso
                        a la mejor tecnología de gestión de inventario disponible.
                    </p>
                    <p>
                        En JStock, creemos en el poder de la gestión de inventario eficiente para transformar los
                        negocios y mejorar la rentabilidad. Estamos emocionados de seguir siendo líderes en esta
                        industria
                        en constante evolución y esperamos asociarnos contigo para optimizar la gestión de tu
                        inventario.
                    </p>
                </div>
            </div>


            <div class="grid w-5/6 gap-4 mx-auto my-10 lg:w-3/4 2xl:w-2/3 lg:grid-cols-2">
                <div
                    class="p-3 my-3 bg-gray-200 border-2 border-gray-400 rounded-lg md:flex dark:bg-gray-800 hover:border-gray-200 hover:shadow-lg hover:shadow-gray-600">
                    <!-- Card Image-->
                    <div class="flex-shrink-0 block mt-2 border-2 border-red-800 rounded-lg md:w-56 h-36">
                        <img class="object-cover w-full h-full rounded-lg"
                            src="{{ asset('images/inventory/opening.png') }}">
                    </div>
                    <!-- Card Body-->
                    <div class="md:ml-6">
                        <!--Card Heading -->
                        <div>
                            <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-300">Evento de Lanzamiento
                            </h3>
                        </div>
                        <!--Card Excerpt-->
                        <div class="my-2 text-gray-600">
                            <div class="my-2 text-gray-600 dark:text-gray-300">
                                Únete a nosotros en nuestro emocionante evento de lanzamiento de JStock, donde
                                presentaremos las últimas
                                características y mejoras de nuestro sistema de inventario. Estaremos encantados de
                                recibirte y discutir
                                cómo JStock puede beneficiar a tu empresa.
                            </div>
                        </div>
                        <!-- Read More Button-->
                    </div>
                </div>

                <div
                    class="p-3 my-3 bg-gray-200 border-2 border-gray-400 rounded-lg md:flex dark:bg-gray-800 hover:border-gray-200 hover:shadow-lg hover:shadow-gray-600">
                    <!-- Card Image-->
                    <div class="flex-shrink-0 block mt-2 border-2 border-red-800 rounded-lg md:w-56 h-36">
                        <img class="object-cover w-full h-full rounded-lg"
                            src="{{ asset('images/inventory/socio.jpg') }}">
                    </div>
                    <!-- Card Body-->
                    <div class="md:ml-6">
                        <!--Card Heading -->
                        <div>
                            <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-300">Socio Estratégico</h3>
                        </div>
                        <!--Card Excerpt-->
                        <div class="my-2 text-gray-600 dark:text-gray-300">
                            Estamos emocionados de anunciar nuestra nueva asociación estratégica con XYZ Corporation, un
                            líder en la
                            industria de la logística. Esta colaboración nos permitirá ofrecer soluciones de gestión de
                            inventario aún
                            más poderosas y personalizadas.
                        </div>
                        <!-- Read More Button-->
                    </div>
                </div>
                <div
                    class="p-3 my-3 bg-gray-200 border-2 border-gray-400 rounded-lg md:flex dark:bg-gray-800 hover:border-gray-200 hover:shadow-lg hover:shadow-gray-600">
                    <!-- Card Image-->
                    <div class="flex-shrink-0 block mt-2 border-2 border-red-800 rounded-lg md:w-56 h-36">
                        <img class="object-cover w-full h-full rounded-lg"
                            src="{{ asset('images/inventory/clients.avif') }}">
                    </div>
                    <!-- Card Body-->
                    <div class="md:ml-6">
                        <!--Card Heading -->
                        <div>
                            <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-300">Reseñas de Clientes</h3>
                        </div>
                        <!--Card Excerpt-->
                        <div class="my-2 text-gray-600 dark:text-gray-300">
                            Nuestros clientes adoran JStock. Aquí tienes lo que algunos de ellos dicen: "Desde que
                            implementamos
                            JStock, nuestra gestión de inventario se ha vuelto mucho más eficiente y nuestros costos han
                            disminuido
                            significativamente" - Cliente Satisfecho 1. "JStock es una herramienta esencial para
                            cualquier empresa
                            seria" - Cliente Satisfecho 2.
                        </div>
                        <!-- Read More Button-->
                        <button
                            class="rounded px-2 py-1.5 border border-red-600 shadow bg-red-800 text-white mr-3 my-2 hover:bg-red-600">
                            Leer más</button>
                    </div>
                </div>

                <div
                    class="p-3 my-3 bg-gray-200 border-2 border-gray-400 rounded-lg md:flex dark:bg-gray-800 hover:border-gray-200 hover:shadow-lg hover:shadow-gray-600">
                    <!-- Card Image-->
                    <div class="flex-shrink-0 block mt-2 border-2 border-red-800 rounded-lg md:w-56 h-36">
                        <img class="object-cover w-full h-full rounded-lg"
                            src="{{ asset('images/inventory/promo_event.jpg') }}">
                    </div>
                    <!-- Card Body-->
                    <div class="md:ml-6">
                        <!--Card Heading -->
                        <div>
                            <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-300">Campaña Promocional</h3>
                        </div>
                        <!--Card Excerpt-->
                        <div class="my-2 text-gray-600 dark:text-gray-300">
                            ¡No te pierdas nuestra campaña promocional especial de verano! Obtén un 20% de descuento en
                            la compra de nuestro sistema de gestión de inventario para PYMES "JStock" durante todo el
                            mes de julio. Esta es tu oportunidad de mejorar la gestión de tu inventario a un precio
                            excepcional.
                        </div>
                        <!-- Read More Button-->
                        <button
                            class="rounded px-2 py-1.5 border border-red-600 shadow bg-red-800 text-white mr-3 my-2 hover:bg-red-600">Leer
                            más</button>
                    </div>
                </div>

            </div>
        </div>




        <x-my-footer />
    </div>
</x-home-layout>
