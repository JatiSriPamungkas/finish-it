<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/finish-it.svg') }}">
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
                <div class="flex items-center justify-center p-2">
                    <img src="{{ asset('images/finish-it.png') }}" alt="Logo"
                        class="size-48 object-cover rounded-sm">
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
