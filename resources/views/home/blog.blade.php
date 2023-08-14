<x-home-layout>
    <x-slot name="header">
        Blog
    </x-slot>

    <div class="flex flex-col justify-between min-h-screen">

        <livewire:home-navbar />

        <div
            class="bg-white dark:bg-gray-800 dark:text-gray-100 shadow-lg shadow-gray-400 rounded-lg w-1/2 mt-16 mx-auto p-4 text-center text-6xl text-bold text-gray-600">
            <h1>Blog JStock</h1>
        </div>

        <div class="flex w-4/5 mx-auto my-6">
            <div class="">
                <div class="pl-4 pr-12 py-4">
                    <a href="#" class="w-full mt-10 h-auto flex cursor-default" id="blog1">
                        <div class="bg-red-500 w-1/3 h-60 relative p-1 rounded-md shadow-md shadow-red-300">
                            <img class="bg-slate-700 w-full h-full object-cover rounded-lg "
                                src="{{ asset('images/inventory/inventory1.png') }}" alt="Worker">
                        </div>
                        <div
                            class="w-2/3 h-auto ml-12 p-4 text-justify rounded-md leading-normal bg-white dark:bg-gray-800 shadow-md shadow-gray-400">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                blog 1</h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                                technology acquisitions of 2021 so far, in reverse chronological order. Lorem ipsum
                                dolor
                                sit
                                amet consectetur adipisicing elit. Dicta possimus accusamus sed corporis facilis
                                laudantium
                                ea,
                                et libero? A, doloremque quas placeat commodi aliquam at facilis, adipisci, neque ipsum
                                ipsa
                                maiores officia harum ab cumque sint iure repudiandae molestiae unde eum ad provident
                                dolorum
                                repellat odio amet. Voluptas, ut placeat.</p>
                        </div>
                    </a>
                    <a href="#"
                        class="cursor-default w-full mt-10 h-auto flex flex-col items-center shadow-lg shadow-gray-500 bg-white border border-gray-200 rounded-lg md:flex-row dark:border-gray-700 dark:bg-gray-800">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Lorem ipsum
                                dolor
                                sit amet.</h5>
                            <div>
                                <div class="bg-red-500 p-1 mx-4 mb-2 float-right w-2/5 h-70 relative rounded-md">
                                    <img class="w-full h-full object-cover rounded-lg"
                                        src="{{ asset('images/inventory/inventory2.png') }}" alt="Worker"
                                        class=" w-4 ">
                                </div>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-justify">Here are the
                                    biggest enterprise
                                    technology acquisitions of 2021 so far, in reverse chronological order. Lorem ipsum
                                    dolor
                                    sit
                                    amet consectetur adipisicing elit. Dicta possimus accusamus sed corporis facilis
                                    laudantium
                                    ea,
                                    et libero? A, doloremque quas placeat commodi aliquam at facilis, adipisci, neque
                                    ipsum ipsa
                                    maiores officia harum ab cumque sint iure repudiandae molestiae unde eum ad
                                    provident
                                    dolorum
                                    repellat odio amet. Voluptas, ut placeat. Lorem ipsum dolor sit amet consectetur,
                                    adipisicing
                                    elit. Beatae culpa exercitationem labore officiis odio, quaerat, ea incidunt nam ad
                                    tempore
                                    deserunt corporis harum odit accusantium blanditiis, pariatur debitis. Facilis
                                    dignissimos
                                    saepe, nihil blanditiis rem itaque a voluptate ipsa quasi fuga, sapiente magni
                                    adipisci
                                    ipsum
                                    harum corrupti cumque optio vitae recusandae dolorem! Ipsum dolore, libero vitae at
                                    temporibus
                                    consectetur nulla autem numquam ullam officia cumque adipisci perspiciatis eius
                                    incidunt
                                    diassumenda corporis unde iste
                                    saepe, quis sequi rerum dignissimos, fugiat, praesentium aut. Accusamus aut illo,
                                    tempore
                                    alias
                                    nesciunt necessitatibus voluptatibus distinctio, ad provident incidunt temporibus in
                                    eum
                                    ipsum,
                                    dolore rerum. Et voluptatum perferendis molestiae! Illum maxime quia dolore
                                    distinctio nam
                                    possimus aperiam labore, facere quas, aliquam neque, dolor quaerat nobis doloremque
                                    quis
                                    porro
                                    est repellat consequatur dolores expedita aut sint minus. Quidem optio sunt
                                    voluptate, quas
                                    alias debitis ipsam recusandae, quo laboriosam reprehenderit ullam minima
                                    perferendis
                                    assumenda
                                    cupiditate maxime nobis vel dignissimos autem porro! Optio repellat magni, esse
                                    corporis
                                    dolorem
                                    cupiditate ex suscipit asperiores laborum, voluptates eos veniam iste quos fugiat
                                    debitis?
                                    Laborum officia cupiditate sed saepe, molestias nulla, fugit corrupti quidem a ad
                                    tempora
                                    sequi
                                    incidunt eum cumque, nisi numquam autem eos commodi laboriosam. Dolor quam iusto
                                    cumque
                                    dicta?
                                    Ut nobis perspiciatis consectetur quae officiis dolore impedit iusto possimus
                                    molestias quos
                                    vero, repudiandae accusamus dignissimos earum! Perferendis exercitationem a et vero
                                    architecto
                                    nemo, animi sunt!
                                </p>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="cursor-default w-full mt-10 h-auto flex">
                        <div class="bg-red-500 w-1/3 h-60 p-1 rounded-md shadow-md shadow-red-300 sticky top-3">
                            <img class="bg-slate-700 w-full h-full object-cover rounded-lg "
                                src="{{ asset('images/inventory/inventory3.avif') }}" alt="Worker">
                        </div>
                        <div
                            class="w-2/3 h-auto ml-12 p-4 text-justify rounded-md leading-normal bg-white dark:bg-gray-800 shadow-md shadow-gray-400">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                Lorem ipsum
                                dolor
                                sit amet.</h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise
                                technology acquisitions of 2021 so far, in reverse chronological order. Lorem ipsum
                                dolor
                                sit
                                amet consectetur adipisicing elit. Dicta possimus accusamus sed corporis facilis
                                laudantium
                                ea,
                                et libero? A, doloremque quas placeat commodi aliquam at facilis, adipisci, neque ipsum
                                ipsa
                                maiores officia harum ab cumque sint iure repudiandae molestiae unde eum ad provident
                                dolorum
                                repellat odio amet. Voluptas, ut placeat.
                                technology acquisitions of 2021 so far, in reverse chronological order. Lorem ipsum
                                dolor
                                sit
                                amet consectetur adipisicing elit. Dicta possimus accusamus sed corporis facilis
                                laudantium
                                ea,
                                et libero? A, doloremque quas placeat commodi aliquam at facilis, adipisci, neque ipsum
                                ipsa
                                maiores officia harum ab cumque sint iure repudiandae molestiae unde eum ad provident
                                dolorum
                                repellat odio amet. Voluptas, ut placeat. Lorem ipsum dolor sit amet consectetur,
                                adipisicing
                                elit. Beatae culpa exercitationem labore officiis odio, quaerat, ea incidunt nam ad
                                tempore
                                deserunt corporis harum odit accusantium blanditiis, pariatur debitis. Facilis
                                dignissimos
                                saepe, nihil blanditiis rem itaque a voluptate ipsa quasi fuga, sapiente magni adipisci
                                ipsum
                                harum corrupti cumque optio vitae recusandae dolorem! Ipsum dolore, libero vitae at
                                temporibus
                                consectetur nulla autem numquam ullam officia cumque adipisci perspiciatis eius incidunt
                                diassumenda corporis unde iste
                                saepe, quis sequi rerum dignissimos, fugiat, praesentium aut. Accusamus aut illo,
                                tempore
                                alias
                                nesciunt necessitatibus voluptatibus distinctio, ad provident incidunt temporibus in eum
                                ipsum,
                                dolore rerum. Et voluptatum perferendis molestiae! Illum maxime quia dolore distinctio
                                nam
                                possimus aperiam labore, facere quas, aliquam neque, dolor quaerat nobis doloremque quis
                                porro
                                est repellat consequatur dolores expedita aut sint minus. Quidem optio sunt voluptate,
                                quas
                                alias debitis ipsam recusandae, quo laboriosam reprehenderit ullam minima perferendis
                                assumenda
                                cupiditate maxime nobis vel dignissimos autem porro! Optio repellat magni, esse corporis
                                dolorem
                                cupiditate ex suscipit asperiores laborum, voluptates eos veniam iste quos fugiat
                                debitis?
                                Laborum officia cupiditate sed saepe, molestias nulla, fugit corrupti quidem a ad
                                tempora
                                sequi
                                incidunt eum cumque, nisi numquam autem eos commodi laboriosam. Dolor quam iusto cumque
                                dicta?
                                Ut nobis perspiciatis consectetur quae officiis dolore impedit iusto possimus molestias
                                quos
                                vero, repudiandae accusamus dignissimos earum! Perferendis exercitationem a et vero
                                architecto
                                nemo, animi sunt! </p>
                        </div>
                    </a>

                    <a href="#"
                        class="cursor-default w-full mt-10 h-auto flex flex-col items-center shadow-lg shadow-gray-500 bg-white border border-gray-200 rounded-lg md:flex-row dark:border-gray-700 dark:bg-gray-800">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Lorem ipsum
                                dolor
                                sit amet.</h5>
                            <div>
                                <div class="bg-red-500 p-1 mx-4 mb-2 float-right w-2/5 h-70 relative rounded-md">
                                    <img class="w-full h-full object-cover rounded-lg"
                                        src="{{ asset('images/inventory/inventory1.png') }}" alt="Worker"
                                        class=" w-4 ">
                                </div>
                                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400 text-justify">Here are the
                                    biggest enterprise
                                    technology acquisitions of 2021 so far, in reverse chronological order. Lorem ipsum
                                    dolor
                                    sit
                                    amet consectetur adipisicing elit. Dicta possimus accusamus sed corporis facilis
                                    laudantium
                                    ea,
                                    et libero? A, doloremque quas placeat commodi aliquam at facilis, adipisci, neque
                                    ipsum ipsa
                                    maiores officia harum ab cumque sint iure repudiandae molestiae unde eum ad
                                    provident
                                    dolorum
                                    repellat odio amet. Voluptas, ut placeat. Lorem ipsum dolor sit amet consectetur,
                                    adipisicing
                                    elit. Beatae culpa exercitationem labore officiis odio, quaerat, ea incidunt nam ad
                                    tempore
                                    deserunt corporis harum odit accusantium blanditiis, pariatur debitis. Facilis
                                    dignissimos
                                    saepe, nihil blanditiis rem itaque a voluptate ipsa quasi fuga, sapiente magni
                                    adipisci
                                    ipsum
                                    harum corrupti cumque optio vitae recusandae dolorem! Ipsum dolore, libero vitae at
                                    temporibus
                                    consectetur nulla autem numquam ullam officia cumque adipisci perspiciatis eius
                                    incidunt
                                    diassumenda corporis unde iste
                                    saepe, quis sequi rerum dignissimos, fugiat, praesentium aut. Accusamus aut illo,
                                    tempore
                                    alias
                                    nesciunt necessitatibus voluptatibus distinctio, ad provident incidunt temporibus in
                                    eum
                                    ipsum,
                                    dolore rerum. Et voluptatum perferendis molestiae! Illum maxime quia dolore
                                    distinctio nam
                                    possimus aperiam labore, facere quas, aliquam neque, dolor quaerat nobis doloremque
                                    quis
                                    porro
                                    est repellat consequatur dolores expedita aut sint minus. Quidem optio sunt
                                    voluptate, quas
                                    alias debitis ipsam recusandae, quo laboriosam reprehenderit ullam minima
                                    perferendis
                                    assumenda
                                    cupiditate maxime nobis vel dignissimos autem porro! Optio repellat magni, esse
                                    corporis
                                    dolorem
                                    cupiditate ex suscipit asperiores laborum, voluptates eos veniam iste quos fugiat
                                    debitis?
                                    Laborum officia cupiditate sed saepe, molestias nulla, fugit corrupti quidem a ad
                                    tempora
                                    sequi
                                    incidunt eum cumque, nisi numquam autem eos commodi laboriosam. Dolor quam iusto
                                    cumque
                                    dicta?
                                    Ut nobis perspiciatis consectetur quae officiis dolore impedit iusto possimus
                                    molestias quos
                                    vero, repudiandae accusamus dignissimos earum! Perferendis exercitationem a et vero
                                    architecto
                                    nemo, animi sunt!
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="mt-10 pt-4">
                <aside
                    class="w-48 sticky top-10 text-white rounded-md shadow-lg shadow-red-300 p-4 text-xl bg-gray-500 dark:bg-gray-800">
                    <h1 class="font-semibold">Noticias</h1>
                    <nav class="flex flex-col">
                        <div class="flex m-1">
                            <svg class=" w-4 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                            <a href="#blog1" class="">Información</a>
                        </div>
                        <div class="flex m-1">
                            <svg class=" w-4 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                            <a href="">Información</a>
                        </div>
                        <div class="flex m-1">
                            <svg class=" w-4 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                            <a href="">Información</a>
                        </div>
                        <div class="flex m-1">
                            <svg class=" w-4 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                            <a href="">Información</a>
                        </div>
                        <div class="flex m-1">
                            <svg class=" w-4 " xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                            <a href="">Información</a>
                        </div>
                    </nav>
                </aside>
            </div>
        </div>

        <x-my-footer />
    </div>
</x-home-layout>
