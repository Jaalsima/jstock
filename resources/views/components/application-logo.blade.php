<div>
    @if (auth()->check())
        <div class="flex justify-between">
            <div class="bg-red-700 rounded-full">
                <a href="{{ route('dashboard') }}" class="flex items-center">
                    <img src="{{ asset('images/jstock.svg') }}" width="50"
                        class="transition duration-700 ease-in-out rounded-full shadow-white-2xl brightness-90 hover:brightness-150"
                        alt="Logo JStock">
                </a>
            </div>

            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-gray-400"><a
                    href="{{ route('dashboard') }}"><span class="ml-4 text-red-700">JS</span>tock </a></span>

        </div>
    @else
        <div class="flex justify-between">
            <div class="bg-red-700 rounded-full">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{ asset('images/jstock.svg') }}" width="50"
                        class="transition duration-700 ease-in-out rounded-full shadow-white-2xl brightness-90 hover:brightness-150"
                        alt="Logo JStock">
                </a>
            </div>

            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-gray-400"><a
                    href="{{ route('home') }}"><span class="ml-4 text-red-700">JS</span>tock </a></span>

        </div>
    @endif
</div>
