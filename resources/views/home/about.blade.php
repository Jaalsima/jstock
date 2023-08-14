<x-home-layout>
    <x-slot name="title">
        about
    </x-slot>

    <div class="flex flex-col justify-between min-h-screen">
        <livewire:home-navbar />

        <div class="bg-yellow-40 p-2 relative">
            {{--  --}}
            <div class="flex flex-col m-auto text-justify p-4 w-2/3">
                <div class="mb-10 ml-32">
                    <h1 class="text-7xl font-bold"><span class="text-red-800">Qu</span>iénes somos</h1>
                    <p class="text-3xl font-semibold">La solución a todos tus problemas</p>
                </div>
                <div class="flex text-justify w-full">
                    <div class="relative w-2/3 mr-8 h-64 group">
                        <div
                            class="bg-gray-400 group-hover:shadow-lg group-hover:shadow-red-800 w-full h-48 mt-8 group-hover:-rotate-3 ease-in duration-300 rounded">
                        </div>
                        <div style="margin: 0 5vh 0 6vh;"
                            class="absolute p-8 top-2 w-3/4 bg-gray-200 h-60 rounded shadow-lg shadow-gray-400 group-hover:shadow-gray-600 ease-in duration-300">
                            <h1 class="text-3xl font-medium">Misión</h1>
                            <b>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</b>
                        </div>
                    </div>
                    <div class="relative w-2/3 h-64 group">
                        <div
                            class="bg-gray-400 group-hover:shadow-lg group-hover:shadow-red-800 w-full h-48 mt-8 group-hover:rotate-3 ease-in duration-300 rounded">
                        </div>
                        <div style="margin: 0 5vh 0 6vh;"
                            class="absolute p-8 top-2 w-3/4 bg-gray-200 h-60 rounded shadow-lg shadow-gray-400 group-hover:shadow-gray-600 ease-in duration-300">
                            <h1 class="text-3xl font-medium">Visión</h1>
                            <b>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</b>
                        </div>
                    </div>
                </div>
                <div class="w-2/3 bg-gray-300 mt-16 mb-4 p-5 rounded-xl mx-auto">
                    <p>Lorem Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione cupiditate saepe,
                        blanditiis magni id beatae nostrum illum corporis tenetur, consequatur impedit ut neque nesciunt
                        eveniet odio dolorum corrupti dignissimos deserunt! ipsum dolor sit amet consectetur adipisicing
                        elit. Mollitia assumenda nulla quo, consectetur corporis exercitationem ab consequuntur
                        laudantium vitae voluptatibus est in quos, cumque pariatur alias dolor labore obcaecati iste.
                    </p>
                </div>
            </div>



            {{--  --}}
            <div class="m-auto text-justify p-4 w-1/2">
                <div class="mb-10">
                    <h2 class="text-3xl font-semibold text-center">Mantenimiento y reparaciones</h2>
                </div>
                <div class="flex">
                    <div class="flex flex-col justify-center">
                        <svg class="h-20 w-20 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-mono">Fontaneria</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta.</p>
                    </div>

                    <div class="flex flex-col justify-center">
                        <svg class="h-20 w-20 text-blue-500" width="24" height="24" viewBox="0 0 24 24"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <path d="M7 7h10v6a3 3 0 0 1 -3 3h-4a3 3 0 0 1 -3 -3v-6" />
                            <line x1="9" y1="3" x2="9" y2="7" />
                            <line x1="15" y1="3" x2="15" y2="7" />
                            <path d="M12 16v2a2 2 0 0 0 2 2h3" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-mono">Electricas</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta.</p>
                    </div>

                    <div class="flex flex-col justify-center">
                        <svg class="h-20 w-20 text-blue-500" width="24" height="24" viewBox="0 0 24 24"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <rect x="5" y="3" width="14" height="6" rx="2" />
                            <path d="M19 6h1a2 2 0 0 1 2 2a5 5 0 0 1 -5 5l-5 0v2" />
                            <rect x="10" y="15" width="4" height="6" rx="1" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-mono">Pintura</h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta.</p>
                    </div>
                </div>
            </div>

            <div class="mx-auto w-2/3 grid grid-cols-2 gap-4 my-10">
                <div
                    class="flex border-2 hover:border-gray-200  border-gray-400 bg-gray-200 p-3 rounded-lg my-3 hover:shadow-lg hover:shadow-gray-600">
                    <!-- Card Image-->
                    <div class="flex-shrink-0 hidden md:block mt-2 border-2 border-red-800 w-56 h-36 rounded-lg">
                        <img class="rounded-lg w-full h-full object-cover"
                            src="{{ asset('images/inventory/inventory1.png') }}">
                    </div>
                    <!-- Card Body-->
                    <div class="md:ml-6">
                        <!--Card Heading -->
                        <div>
                            <h3 class="text-2xl text-gray-800 font-semibold">This is a heading of your well written blog
                                post</h3>
                        </div>
                        <!--Card Excerpt-->
                        <div class="text-gray-600 my-2">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Impedit qui error ad, pariatur
                            accusantium earum sunt commodi sapiente ea autem eligendi iure aliquam explicabo, nobis
                            delectus minus eius perferendis quia...
                        </div>
                        <!-- Read More Button-->
                    </div>
                </div>

                <div
                    class="flex border-2 hover:border-gray-200 border-gray-400 bg-gray-200 p-3 rounded-lg my-3 hover:shadow-lg hover:shadow-gray-600">
                    <!-- Card Image-->
                    <div class="flex-shrink-0 hidden md:block mt-2 border-2 border-red-800 w-56 h-36 rounded-lg">
                        <img class="rounded-lg w-full h-full object-cover"
                            src="{{ asset('images/inventory/inventory1.png') }}">
                    </div>
                    <!-- Card Body-->
                    <div class="md:ml-6">
                        <!--Card Heading -->
                        <div>
                            <h3 class="text-2xl text-gray-800 font-semibold">This is a heading of your well written blog
                                post</h3>
                        </div>
                        <!--Card Excerpt-->
                        <div class="text-gray-600 my-2">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Impedit qui error ad, pariatur
                            accusantium earum sunt commodi sapiente ea autem eligendi iure aliquam explicabo, nobis
                            delectus minus eius perferendis quia...
                        </div>
                        <!-- Read More Button-->
                    </div>
                </div>
                <div
                    class="flex border-2 hover:border-gray-200 border-gray-400 bg-gray-200 p-3 rounded-lg my-3 hover:shadow-lg hover:shadow-gray-600">
                    <!-- Card Image-->
                    <div class="flex-shrink-0 hidden md:block mt-2 border-2 border-red-800 w-56 h-36 rounded-lg">
                        <img class="rounded-lg w-full h-full object-cover"
                            src="{{ asset('images/inventory/inventory1.png') }}">
                    </div>
                    <!-- Card Body-->
                    <div class="md:ml-6">
                        <!--Card Heading -->
                        <div>
                            <h3 class="text-2xl text-gray-800 font-semibold">This is a heading of your well written blog
                                post</h3>
                        </div>
                        <!--Card Excerpt-->
                        <div class="text-gray-600 my-2">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Impedit qui error ad, pariatur
                            accusantium earum sunt commodi sapiente ea autem eligendi iure aliquam explicabo, nobis
                            delectus minus eius perferendis quia...
                        </div>
                        <!-- Read More Button-->
                        <button
                            class="rounded px-2 py-1.5 border border-red-600 shadow bg-red-800 text-white mr-3 my-2 hover:bg-red-600">Read
                            More</button>
                    </div>
                </div>

                <div
                    class="flex border-2 hover:border-gray-200 border-gray-400 bg-gray-200 p-3 rounded-lg my-3 hover:shadow-lg hover:shadow-gray-600">
                    <!-- Card Image-->
                    <div class="flex-shrink-0 hidden md:block mt-2 w-56 h-36 rounded-lg border-2 border-red-800">
                        <img class="rounded-lg w-full h-full object-cover"
                            src="{{ asset('images/inventory/inventory1.png') }}">
                    </div>
                    <!-- Card Body-->
                    <div class="md:ml-6">
                        <!--Card Heading -->
                        <div>
                            <h3 class="text-2xl text-gray-800 font-semibold">This is a heading of your well written
                                blog post</h3>
                        </div>
                        <!--Card Excerpt-->
                        <div class="text-gray-600 my-2">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Impedit qui error ad, pariatur
                            accusantium earum sunt commodi sapiente ea autem eligendi iure aliquam explicabo, nobis
                            delectus minus eius perferendis quia...
                        </div>
                        <!-- Read More Button-->
                        <button
                            class="rounded px-2 py-1.5 border border-red-600 shadow bg-red-800 text-white mr-3 my-2 hover:bg-red-600">Read
                            More</button>
                    </div>
                </div>

            </div>
        </div>




        <x-my-footer />
    </div>
</x-home-layout>
