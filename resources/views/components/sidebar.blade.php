<!-- component -->

<div class="flex flex-no-wrap">
    <div class="flex-col justify-between hidden w-64 bg-gray-300 shadow dark:bg-gray-800 sm:relative md:h-full sm:flex">
        <div class="px-8">

            <ul class="mt-12">

                {{-- <a href="{{ route('index-user') }}"
                        class="flex items-center p-2 rounded-lg group {{ request()->routeIs('index-user') ? 'text-blue-700 bg-gray-200' : 'text-gray-700 bg-opacity-50 hover:bg-gray-200' }}">
                        <i class="text-blue-700 fa-solid fa-arrow-right-to-bracket group-hover:text-blue-700"></i>
                        <span class="ml-3 group-hover:text-blue-700">Registrar</span>
                    </a> --}}
                <li>
                    <a href="{{ route('index-user') }}"
                        class="flex items-center p-2 rounded-lg group {{ request()->routeIs('index-user') ? 'text-blue-700 bg-gray-400 dark:bg-gray-700 bg-opacity-50' : '' }}">

                        <button type="button"
                            class="flex items-center w-full p-2 text-lg text-gray-700 transition duration-75 rounded-lg group hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-users" data-collapse-toggle="dropdown-users">
                            <i
                                class="z-10 flex-shrink-0 w-5 h-5 mr-3 text-red-800 transition duration-75 group-hover:text-blue-700 fa-solid fa-users dark:text-gray-400 dark:group-hover:text-white"></i>
                            <span
                                class="flex items-center w-full text-lg text-gray-700 transition duration-75 rounded-lg group hover:text-blue-700 dark:text-white dark:hover:bg-gray-700">Usuarios</span>

                        </button>
                    </a>
                </li>



                <li>
                    <a href="{{ route('index-customer') }}"
                        class="flex items-center p-2 rounded-lg group {{ request()->routeIs('index-customer') ? 'text-blue-700 bg-gray-400 dark:bg-gray-700 bg-opacity-50' : '' }}">

                        <button type="button"
                            class="flex items-center w-full p-2 text-lg text-gray-700 transition duration-75 rounded-lg group hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-custumers" data-collapse-toggle="dropdown-custumers">
                            <i
                                class="z-10 flex-shrink-0 w-5 h-5 mr-3 text-red-800 transition duration-75 group-hover:text-blue-700 fa-solid fa-users dark:text-gray-400 dark:group-hover:text-white"></i>
                            <span
                                class="flex items-center w-full text-lg text-gray-700 transition duration-75 rounded-lg group hover:text-blue-700 dark:text-white dark:hover:bg-gray-700">Clientes</span>

                        </button>
                    </a>
                </li>

                <li>
                    <a href="{{ route('index-supplier') }}"
                        class="flex items-center p-2 rounded-lg group {{ request()->routeIs('index-supplier') ? 'text-blue-700 bg-gray-400 dark:bg-gray-700 bg-opacity-50' : '' }}">

                        <button type="button"
                            class="flex items-center w-full p-2 text-lg text-gray-700 transition duration-75 rounded-lg group hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-suppliers" data-collapse-toggle="dropdown-suppliers">
                            <i
                                class="z-10 flex-shrink-0 w-5 h-5 mr-3 text-red-800 transition duration-75 group-hover:text-blue-700 fa-solid fa-users dark:text-gray-400 dark:group-hover:text-white"></i>
                            <span
                                class="flex items-center w-full text-lg text-gray-700 transition duration-75 rounded-lg group hover:text-blue-700 dark:text-white dark:hover:bg-gray-700">Proveedores</span>

                        </button>
                    </a>
                </li>

                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-lg text-gray-700 transition duration-75 rounded-lg group hover:text-blue-500 hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-products" data-collapse-toggle="dropdown-products">
                        <i
                            class="z-10 flex-shrink-0 w-5 h-5 mr-3 text-red-800 transition duration-75 group-hover:text-blue-700 fa-solid fa-cubes dark:text-gray-400 dark:group-hover:text-white"></i>
                        <span class="flex-1 text-left whitespace-nowrap ">Productos</span>
                        <i class="fa-solid fa-angle-down focus:hidden " id="angleDownIcon"></i>
                        <i class="hidden focus:block fa-solid fa-angle-up " id="angleUpIcon"></i>
                    </button>
                    <ul id="dropdown-products" class="hidden py-2 space-y-2 text-gray-700">

                        <li class="group hover:text-blue-700">
                            <a href="{{ route('index-product') }}"
                                class="flex items-center p-2 rounded-lg group {{ request()->routeIs('index-product') ? 'text-white bg-black bg-opacity-50' : 'bg-opacity-50 hover:bg-gray-700 hover:bg-opacity-40' }}">
                                <i
                                    class="flex-shrink-0 w-5 h-5 mr-3 text-red-700 transition duration-75 group-hover:text-blue-700 fa-solid fa-cubes dark:text-gray-400 dark:group-hover:text-white"></i>Productos</a>
                        </li>

                        <li class="group hover:text-blue-700">
                            <a href="{{ route('categories') }}"
                                class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700"><i
                                    class="flex-shrink-0 w-5 h-5 mr-3 text-red-700 transition duration-75 group-hover:text-blue-700 fa-solid fa-list-check dark:text-gray-400 dark:group-hover:text-white"></i>Categorías</a>
                        </li>
                        <li class="group hover:text-blue-700">
                            <a href="{{ route('brands') }}"
                                class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700"><i
                                    class="flex-shrink-0 w-5 h-5 mr-3 text-red-700 transition duration-75 group-hover:text-blue-700 fa-solid fa-tags dark:text-gray-400 dark:group-hover:text-white"></i>Marcas</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('inventory') }}">
                        <button type="button"
                            class="flex items-center w-full p-2 text-lg text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700"
                            aria-controls="dropdown-users" data-collapse-toggle="dropdown-users">
                            <i
                                class="z-10 flex-shrink-0 w-5 h-5 mr-3 text-red-800 transition duration-75 group-hover:text-blue-700 fa-solid fa-layer-group dark:text-gray-400 dark:group-hover:text-white"></i>
                            <span
                                class="flex items-center w-full text-lg text-gray-700 transition duration-75 rounded-lg group hover:text-blue-700 dark:text-white dark:hover:bg-gray-700">Inventario</span>

                        </button>
                    </a>
                </li>

                </li>

                <li>
                    <button type="button"
                        class="flex items-center w-full p-2 text-lg text-gray-700 transition duration-75 rounded-lg group hover:text-blue-700 hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700"
                        aria-controls="dropdown-movements" data-collapse-toggle="dropdown-movements">
                        <i
                            class="z-10 flex-shrink-0 w-5 h-5 mr-3 text-red-800 transition duration-75 group-hover:text-blue-700 fa-solid fa-money-bill-transfer dark:text-gray-400 dark:group-hover:text-white"></i>
                        <span class="flex-1 text-left whitespace-nowrap ">Movimientos</span>
                        <i class="fa-solid fa-angle-down focus:hidden " id="angleDownIcon"></i>
                        <i class="hidden focus:block fa-solid fa-angle-up " id="angleUpIcon"></i>
                    </button>
                    <ul id="dropdown-movements" class="hidden py-2 space-y-2 text-gray-700">
                        <li class="group hover:text-blue-700">
                            <a href="{{ route('purchases') }}"
                                class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700"><i
                                    class="flex-shrink-0 w-5 h-5 mr-3 text-red-700 transition duration-75 group-hover:text-blue-700 fa-solid fa-cart-shopping dark:text-gray-400 dark:group-hover:text-white"></i>Compras
                            </a>
                        </li>


                        <li class="group hover:text-blue-700">
                            <a href="{{ route('sales') }}"
                                class="flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700"><i
                                    class="flex-shrink-0 w-5 h-5 mr-3 text-red-700 transition duration-75 group-hover:text-blue-700 fa-solid fa-credit-card dark:text-gray-400 dark:group-hover:text-white"></i>Ventas</a>
                        </li>
                    </ul>
                </li>





            </ul>

        </div>
    </div>
</div>
