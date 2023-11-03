<div class="h-[88vh] overflow-y-scroll pr-3">
    <div
        class="relative p-6 bg-white border-b border-gray-200 lg:p-8 dark:bg-gray-700 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">
        <div class="absolute text-2xl font-semibold text-red-700 dark:text-red-600 opacity-60 top-3 right-4">
            JS<span class="text-black dark:text-gray-200">tock</span>
        </div>
        <div class="grid md:grid-cols-4 gap-6 mt-6">
            <div wire:click="earningsByMonth"
                class="flex flex-col px-3 py-8 border-2 border-green-500 rounded-lg cursor-pointer gap-y-6 hover:bg-green-100 h-44">
                <div class="flex justify-center text-green-700">
                    <i class="mr-4 lg:mr-2 2xl:mr-4 2xl:text-2xl text-2xl lg:text-xl fa-solid fa-money-bill-wave"></i>
                    <p class="text-2xl lg:text-xl font-normal text-center">Ganancias por mes</p>
                </div>
                <div class="text-2xl lg:text-xl 2xl:text-4xl font-semibold text-center text-{{ $colorStatus }}">
                    {{ $totalEarningsByMonth }}
                </div>
            </div>

            <div wire:click="minStock"
                class="flex flex-col px-3 py-8 border-2 rounded-lg cursor-pointer border-sky-500 gap-y-6 hover:bg-sky-100 h-44">
                <div class="flex justify-center text-sky-700">
                    <i
                        class="mr-4 lg:mr-2 2xl:mr-4 2xl:text-2xl text-2xl lg:text-xl fa-solid fa-exclamation-circle"></i>
                    <p class="text-2xl lg:text-xl font-normal text-center">Stock Mínimo</p>
                </div>
                <div class="text-4xl font-semibold text-center text-sky-700">
                    {{ $productsWithMinStock }}
                </div>
            </div>

            <div wire:click="aboutToExpire"
                class="flex flex-col px-3 py-8 border-2 border-yellow-500 rounded-lg cursor-pointer gap-y-6 hover:bg-yellow-100 h-44">
                <div class="flex justify-center text-yellow-700">
                    <i class="mr-4 lg:mr-2 2xl:mr-4 2xl:text-2xl text-2xl lg:text-xl fa-solid fa-hourglass-half"></i>
                    <p class="text-2xl lg:text-xl font-normal text-center">Próximos a vencer</p>
                </div>
                <div class="text-4xl font-semibold text-center text-yellow-700">
                    {{ $numExpirableProducts }}
                </div>
            </div>

            <div wire:click="expired"
                class="flex flex-col px-3 py-8 border-2 border-red-500 rounded-lg cursor-pointer gap-y-6 hover:bg-red-100 h-44">
                <div class="flex justify-center text-red-700">
                    <i class="mr-4 lg:mr-2 2xl:mr-4 2xl:text-2xl text-2xl lg:text-xl fa-solid fa-hourglass-end"></i>
                    <p class="text-2xl lg:text-xl font-normal text-center">Productos Vencidos</p>
                </div>
                <div class="text-4xl font-semibold text-center text-red-700">
                    {{ $numExpiredProducts }}
                </div>
            </div>
        </div>

    </div>

    <div class="w-full">
        <div class="w-full mx-auto my-4 p-6 rounded-lg">
            @if ($earningsByMonth)
                <livewire:inventory.inventory-earnings-by-month :monthlyEarnings="$monthlyEarnings" />
            @elseif($minStock)
                <livewire:inventory.inventory-min-stock :labels="$labels" :data="$data" />
            @elseif($aboutToExpire)
                <livewire:inventory.inventory-about-to-expire :expirableProducts="$expirableProducts" />
            @elseif($expired)
                <livewire:inventory.inventory-expired :expiredProducts="$expiredProducts" />
            @endif
        </div>
        <div class="hidden md:block w-full md:col-span-6">
            <livewire:inventory.inventory-general />
        </div>

    </div>
</div>
