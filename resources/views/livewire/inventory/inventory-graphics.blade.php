<div class="h-[88vh] overflow-y-scroll pr-3">
    <div
        class="relative p-6 bg-white border-b border-gray-200 lg:p-8 dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">
        <div class="absolute text-2xl font-semibold text-red-700 opacity-60 top-3 right-4">
            JS<span class="text-black">tock</span>
        </div>

        <div class="grid grid-cols-4 gap-6 mt-6">
            <div wire:click="earningsByMonth"
                class="flex flex-col px-3 py-8 border-2 border-green-500 rounded-lg cursor-pointer gap-y-6 hover:bg-green-100 h-44">
                <div class="flex justify-center text-green-700">
                    <i class="mr-4 text-2xl fa-solid fa-money-bill-wave"></i>
                    <p class="text-2xl font-normal text-center">Ganancias por mes</p>
                </div>
                <div class="text-4xl font-semibold text-center text-{{ $colorStatus }}">
                    {{ $totalEarningsByMonth }}
                </div>
            </div>

            <div wire:click="minStock"
                class="flex flex-col px-3 py-8 border-2 rounded-lg cursor-pointer border-sky-500 gap-y-6 hover:bg-sky-100 h-44">
                <div class="flex justify-center text-sky-700">
                    <i class="mr-4 text-2xl fa-solid fa-exclamation-circle"></i>
                    <p class="text-2xl font-normal text-center">Stock Mínimo</p>
                </div>
                <div class="text-4xl font-semibold text-center text-sky-700">
                    {{ $productsWithMinStock }}
                </div>
            </div>

            <div wire:click="aboutToExpire"
                class="flex flex-col px-3 py-8 border-2 border-yellow-500 rounded-lg cursor-pointer gap-y-6 hover:bg-yellow-100 h-44">
                <div class="flex justify-center text-yellow-700">
                    <i class="mr-4 text-2xl fa-solid fa-hourglass-half"></i>
                    <p class="text-2xl font-normal text-center">Próximos a vencer</p>
                </div>
                <div class="text-4xl font-semibold text-center text-yellow-700">
                    {{ $numExpirableProducts }}
                </div>
            </div>

            <div wire:click="expired"
                class="flex flex-col px-3 py-8 border-2 border-red-500 rounded-lg cursor-pointer gap-y-6 hover:bg-red-100 h-44">
                <div class="flex justify-center text-red-700">
                    <i class="mr-4 text-2xl fa-solid fa-houglass-end"></i>
                    <p class="text-2xl font-normal text-center">Productos Vencidos</p>
                </div>
                <div class="text-4xl font-semibold text-center text-red-700">
                    {{ $expiredProducts }}
                </div>
            </div>
        </div>

    </div>

    <div class="grid w-full grid-cols-12 gap-4">
        <div class="w-full col-span-7">
            <livewire:inventory.inventory-management />
        </div>


        <div class="w-full col-span-5">
            <div class="p-6 bg-gray-200 bg-opacity-25 dark:bg-gray-800 lg:p-8">
                @if ($earningsByMonth)
                <livewire:inventory.inventory-earnings-by-month :monthlyEarnings="$monthlyEarnings" />
                @elseif($minStock)
                <livewire:inventory.inventory-min-stock :labels="$labels" :data="$data" />
                @elseif($aboutToExpire)
                <livewire:inventory.inventory-about-to-expire :expirableProducts="$expirableProducts" />
                @elseif($expired)
                <livewire:inventory.inventory-expired />
                @else
                <livewire:inventory.inventory-general />
                @endif
            </div>
        </div>
    </div>
</div>