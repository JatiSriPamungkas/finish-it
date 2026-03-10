<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? config('app.name') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body>
    @if (session('status'))
        <livewire:toast :icon="session('icon')" :type="session('type')">
            {{ session('status') }}
        </livewire:toast>
    @endif
    <main class="bg-slate-100">
        <aside class="fixed left-0 top-0 w-88.5 h-screen justify-between border-e border-gray-300 bg-white">
            <div class="px-6 py-10">
                <div>
                    <svg width="250" viewBox="0 0 58 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M24.6625 0C29.5499 0.000157557 33.512 3.87456 33.5121 8.65224C33.5121 8.91866 33.4997 9.18398 33.4824 9.44828H40.9366C48.1871 9.44828 51.0342 18.6407 45.0014 22.5723L37.1131 27.7122C35.415 28.8193 35.8805 31.3743 37.8654 31.84C38.5143 31.9921 39.1997 31.8658 39.7475 31.4934L44.3242 28.1927C44.4979 28.0675 44.7074 28 44.9225 28H57.4922C57.9872 28 58.1886 28.6281 57.7838 28.909L44.4783 38.1397C41.99 39.8319 38.8796 40.4048 35.9321 39.7133C26.9186 37.5986 24.8061 26.0015 32.5185 20.9749L37.7818 17.5457H29.7048H24.5358C23.0515 17.5457 21.6504 17.1926 20.4171 16.5691C21.7314 17.4535 24.9805 18.4377 27.7216 18.6251C27.9658 18.6251 28.3625 18.8385 27.8901 19.3183L11.2952 35.7067C11.105 35.8945 10.847 36 10.578 36H0.507884C0.056246 36 -0.169872 35.4613 0.149574 35.1463L19.5219 16.0472C17.1349 14.4709 15.5652 11.8013 15.5649 8.77349C15.5649 3.92875 19.5825 0 24.5385 0H24.6625ZM24.8419 6.74915C23.6982 6.74915 22.771 7.35337 22.771 8.09871C22.7715 8.71319 23.4024 9.23009 24.2648 9.39292C24.3487 9.42847 24.4413 9.44828 24.5385 9.44828H25.1533C25.1544 9.44225 25.1535 9.43586 25.1546 9.42983C26.1495 9.33152 26.9122 8.77441 26.9127 8.09871C26.9127 7.35337 25.9855 6.74915 24.8419 6.74915Z"
                            fill="#002A3D">
                        </path>
                    </svg>
                </div>

                <ul class="mt-12 space-y-2">
                    <li>
                        <a href="/"
                            class="flex items-center gap-4 rounded-lg px-4 py-2 font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-900">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 7.125C2.25 6.504 2.754 6 3.375 6h6c.621 0 1.125.504 1.125 1.125v3.75c0 .621-.504 1.125-1.125 1.125h-6a1.125 1.125 0 0 1-1.125-1.125v-3.75ZM14.25 8.625c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v8.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-8.25ZM3.75 16.125c0-.621.504-1.125 1.125-1.125h5.25c.621 0 1.125.504 1.125 1.125v2.25c0 .621-.504 1.125-1.125 1.125h-5.25a1.125 1.125 0 0 1-1.125-1.125v-2.25Z" />
                            </svg>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li>
                        <a href="/projects"
                            class="flex items-center gap-4 rounded-lg px-4 py-2 font-medium text-gray-500 hover:bg-gray-100 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                            </svg>
                            <p>
                                Projects
                            </p>
                        </a>
                    </li>
                    <li>
                        {{-- <livewire:modal /> --}}
                    </li>
                </ul>
            </div>

            <livewire:modal />
        </aside>

        <section class="w-full min-h-screen pl-120 pr-32 py-10 flex flex-col gap-10">
            {{ $slot }}
        </section>
    </main>

    @livewireScripts
</body>

</html>
