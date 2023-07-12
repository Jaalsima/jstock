<footer class="text-center text-xl">

    <ul class="mt-12 flex justify-center gap-6 md:gap-8">

        <li>
            <a href="https://api.whatsapp.com/send?phone=3017053140" rel="noreferrer" target="_blank">
                <span class="sr-only">Whatsapp</span>
                <img src="{{ asset('images/whatsapp.svg') }}" alt="WhatsApp Icon"
                    class="hover:bg-gray-50 hover:rounded-full h-6 w-6" fill="currentColor" viewBox="0 0 24 24"
                    aria-hidden="true" />
            </a>
        </li>

        <li>
            <a href="https://www.facebook.com" rel="noreferrer" target="_blank">
                <span class="sr-only">Facebook</span>
                <img src="{{ asset('images/facebook2.svg') }}" alt="Facebook Icon"
                    class="rounded-full h-6 w-6  hover:bg-gray-50" fill="currentColor" viewBox="0 0 24 24"
                    aria-hidden="true" />
            </a>
        </li>

        <li>
            <a href="https://www.twitter.com" rel="noreferrer" target="_blank">
                <span class="sr-only">Twitter</span>
                <img src="{{ asset('images/twitter.svg') }}" alt="Twitter Icon"
                    class="hover:bg-gray-50 hover:rounded-full h-6 w-6" fill="currentColor" viewBox="0 0 24 24"
                    aria-hidden="true" />
            </a>
        </li>

        <li>
            <a href="https://www.instagram.com" rel="noreferrer" target="_blank">
                <span class="sr-only">Instagram</span>
                <img src="{{ asset('images/instagram3.svg') }}" alt="Instagram Icon"
                    class="hover:rounded-full hover:bg-gray-50 h-6 w-6" fill="currentColor" viewBox="0 0 24 24"
                    aria-hidden="true" />
            </a>
        </li>

        <li>
            <a href="https://www.youtube.com" rel="noreferrer" target="_blank">
                <span class="sr-only">Youtube</span>
                <img src="{{ asset('images/youtube3.svg') }}" alt="Youtube Icon"
                    class=" h-6 w-6 hover:bg-gray-50 hover:rounded-full" fill="currentColor" viewBox="0 0 24 24"
                    aria-hidden="true" />
            </a>
        </li>

    </ul>
    <div>
        <div>
            <div class="mx-auto mt-6 max-w-md text-center leading-relaxed text-gray-300">
                <a href="#"
                    class="group block-flex items-center text-gray-700 dark:text-gray-100 focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500">
                    <div class="text-center text-xl">
                        <div>{{ config('jstock.version') }}</div>
                        <div>{{ config('jstock.developer') }}</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="dark:text-gray-100 focus:outline focus:outline-2 focus:rounded-sm focus:outline-indigo-500">2023 &copy;
    </div>

</footer>


</div>
