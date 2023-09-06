<x-home-layout>
    <x-slot name="title">
        Servicios
    </x-slot>

    <div class="flex flex-col justify-between min-h-screen">
        <!-- Agregamos un encabezado de navegación -->
        <livewire:home-navbar />

        <!-- Título principal -->
        <div
            class="w-5/6 p-4 m-4 mx-auto text-3xl font-semibold text-center bg-gray-200 rounded-lg shadow-lg lg:w-1/2 md:text-5xl shadow-gray-400 dark:bg-gray-800">
            <span class="text-red-800">JS</span>tock Servicios
        </div>

        <!-- Sección de Introducción -->
        <div
            class="w-5/6 py-6 m-4 mx-auto bg-gray-200 rounded-lg shadow-lg px-7 lg:w-1/2 md:px-20 shadow-gray-400 dark:bg-gray-800">
            <h2 class="text-3xl font-semibold text-center">Optimiza tu inventario con JStock</h2>
            <p class="mt-4 text-lg text-justify text-gray-700 dark:text-gray-400">
                En JStock, entendemos que la gestión de inventario es un pilar fundamental para el éxito de tu negocio.
                Es por eso que hemos desarrollado una amplia gama de servicios diseñados meticulosamente para mejorar
                la forma en que gestionas tus productos y materiales. Nuestra misión es ayudarte a alcanzar la máxima
                eficiencia, reducir costos innecesarios y eliminar los errores que suelen acompañar a los procesos
                manuales.
            </p>

            <p class="mt-4 text-lg text-justify text-gray-700 dark:text-gray-400">
                A medida que exploramos cómo JStock puede transformar tu flujo de trabajo de inventario, te invitamos
                a descubrir las ventajas de una gestión más inteligente y eficaz:
            </p>

            <ul class="mt-4 text-lg text-gray-700 list-disc list-inside dark:text-gray-400">
                <li><strong>Control en Tiempo Real:</strong> Con JStock, tendrás acceso instantáneo a la información
                    actualizada
                    sobre tu inventario. Esto te permitirá tomar decisiones informadas y responder rápidamente a las
                    cambiantes demandas del mercado.</li>
                <li><strong>Optimización de Pedidos:</strong> Nuestra plataforma utiliza algoritmos avanzados para
                    analizar
                    los datos de tu inventario y pronosticar las necesidades de reordenamiento. Esto evita la
                    sobrecompra
                    y asegura que siempre tengas lo que necesitas sin excedentes innecesarios.</li>
                <li><strong>Minimización de Errores:</strong> Los errores humanos pueden ser costosos y perjudiciales
                    para
                    tu negocio. JStock automatiza procesos propensos a errores, lo que reduce drásticamente la
                    probabilidad
                    de imprecisiones en tus registros de inventario.</li>
                <li><strong>Acceso a Datos Detallados:</strong> Con JStock, puedes obtener informes detallados sobre el
                    rendimiento de tus productos, identificar tendencias y tomar decisiones basadas en datos sólidos.
                    Esto te brinda una ventaja competitiva en el mercado.</li>
                <li><strong>Integración Sencilla:</strong> Si tienes una tienda en línea, JStock se integra sin
                    problemas,
                    lo que significa que tus niveles de inventario se mantendrán automáticamente actualizados en tu
                    plataforma de comercio electrónico, evitando problemas de gestión de existencias y mejorando la
                    experiencia del cliente.</li>
            </ul>
        </div>


        <!-- Sección de Servicios -->
        <div class="grid content-center w-auto gap-6 mx-auto mt-12 md:w-5/6 lg:grid-cols-3">
            <!-- Servicio 1: Gestión de Inventario en Tiempo Real -->
            <div class="relative h-auto mx-auto mb-10 text-center rounded-lg w-80 md:w-full lg:w-96 group">
                <div class="w-full md:h-60 h-52">
                    <img class="object-cover w-full h-full border-4 border-red-800 rounded-t-lg lg:rounded-lg"
                        src="{{ asset('images/inventory/inventory1.png') }}" alt="">
                </div>
                <div
                    class="top-0 z-10 h-auto p-6 text-white duration-300 ease-in bg-gray-600 rounded-b-lg lg:bg-transparent lg:absolute lg:p-10 group lg:group-hover:translate-y-36 lg:group-hover:bg-gray-600 lg:group-hover:w-full">
                    <h1 class="font-mono text-2xl md:mb-4 lg:opacity-0 group-hover:opacity-100">Gestión de Inventario en
                        Tiempo
                        Real</h1>
                    <p class="text-justify lg:opacity-0 group-hover:opacity-100">
                        Mantén un control total sobre tu inventario en tiempo real. Con JStock, puedes rastrear la
                        disponibilidad
                        de productos, verificar el nivel de existencias y recibir alertas automáticas cuando sea
                        necesario
                        reordenar. Nunca te quedarás sin existencias ni perderás ventas debido a la falta de productos.
                    </p>
                </div>
            </div>

            <!-- Servicio 2: Análisis de Datos Avanzados -->
            <div class="relative h-auto mx-auto mb-10 text-center rounded-lg w-80 md:w-full lg:w-96 group">
                <div class="w-full md:h-60 h-52">
                    <img class="object-cover w-full h-full border-4 border-red-800 rounded-t-lg lg:rounded-lg"
                        src="{{ asset('images/inventory/inventory2.png') }}" alt="">
                </div>
                <div
                    class="top-0 z-10 h-auto p-6 text-white duration-300 ease-in bg-gray-600 rounded-b-lg lg:bg-transparent lg:absolute lg:p-10 group lg:group-hover:translate-y-36 lg:group-hover:bg-gray-600 lg:group-hover:w-full">
                    <h1 class="font-mono text-2xl md:mb-4 lg:opacity-0 group-hover:opacity-100">Análisis de Datos
                        Avanzados</h1>
                    <p class="text-justify lg:opacity-0 group-hover:opacity-100">
                        Utiliza datos precisos para tomar decisiones informadas. Nuestra plataforma te proporciona
                        análisis de
                        inventario en profundidad. Identifica tendencias de ventas, productos estacionales y patrones de
                        compra
                        para optimizar tu estrategia de inventario y maximizar tus ganancias.
                    </p>
                </div>
            </div>

            <!-- Servicio 3: Automatización de Procesos -->
            <div class="relative h-auto mx-auto mb-10 text-center rounded-lg w-80 md:w-full lg:w-96 group">
                <div class="w-full md:h-60 h-52">
                    <img class="object-cover w-full h-full border-4 border-red-800 rounded-t-lg lg:rounded-lg"
                        src="{{ asset('images/inventory/inv_7.webp') }}" alt="">
                </div>
                <div
                    class="top-0 z-10 h-auto p-6 text-white duration-300 ease-in bg-gray-600 rounded-b-lg lg:bg-transparent lg:absolute lg:p-10 group lg:group-hover:translate-y-36 lg:group-hover:bg-gray-600 lg:group-hover:w-full">
                    <h1 class="font-mono text-2xl md:mb-4 lg:opacity-0 group-hover:opacity-100">Automatización de
                        Procesos</h1>
                    <p class="text-justify lg:opacity-0 group-hover:opacity-100">
                        Simplifica la gestión de inventario a través de la automatización. Con JStock, puedes configurar
                        reglas
                        personalizadas para reordenar automáticamente productos, generar informes de inventario y
                        sincronizar
                        datos con tu tienda en línea. Ahorra tiempo y reduce errores humanos en tu negocio.
                    </p>
                </div>
            </div>
        </div>

        <!-- Agregamos un pie de página -->
        <x-my-footer />
    </div>
</x-home-layout>


{{-- Esto es para Fácil Work
    <div class="w-1/2 p-4 m-auto text-justify">
    <div class="mb-10">
        <h2 class="text-3xl font-semibold text-center">Servicios de Mantenimiento y Reparaciones</h2>
    </div>
    <div class="flex">
        <div class="flex flex-col justify-center">
            <svg class="w-20 h-20 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-linecap="round" stroke-linejoin="round">
                <path
                    d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z" />
            </svg>
        </div>
        <div>
            <h1 class="font-mono text-2xl">Servicios de Fontanería</h1>
            <p>Nuestro equipo de expertos en fontanería está listo para mantener y reparar cualquier sistema de tuberías
                en tu almacén o empresa. Garantizamos un flujo de agua sin problemas y la detección y reparación de
                posibles fugas.</p>
        </div>

        <div class="flex flex-col justify-center">
            <svg class="w-20 h-20 text-blue-500" width="24" height="24" viewBox="0 0 24 24"
                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <path d="M7 7h10v6a3 3 0 0 1 -3 3h-4a3 3 0 0 1 -3 -3v-6" />
                <line x1="9" y1="3" x2="9" y2="7" />
                <line x1="15" y1="3" x2="15" y2="7" />
                <path d="M12 16v2a2 2 0 0 0 2 2h3" />
            </svg>
        </div>
        <div>
            <h1 class="font-mono text-2xl">Servicios Eléctricos</h1>
            <p>Nuestros expertos electricistas están capacitados para mantener y reparar sistemas eléctricos en tu
                almacén. Garantizamos una distribución de energía confiable y segura, y estamos disponibles para
                solucionar cualquier problema eléctrico.</p>
        </div>

        <div class="flex flex-col justify-center">
            <svg class="w-20 h-20 text-blue-500" width="24" height="24" viewBox="0 0 24 24"
                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" />
                <rect x="5" y="3" width="14" height="6" rx="2" />
                <path d="M19 6h1a2 2 0 0 1 2 2a5 5 0 0 1 -5 5l-5 0v2" />
                <rect x="10" y="15" width="4" height="6" rx="1" />
            </svg>
        </div>
        <div>
            <h1 class="font-mono text-2xl">Servicios de Pintura</h1>
            <p>Nuestro equipo de pintores profesionales está disponible para renovar y mantener la apariencia de tu
                almacén. Utilizamos los mejores materiales y técnicas para asegurar un acabado duradero y de alta
                calidad.</p>
        </div>
    </div>
</div> --}}
