<?php

use Livewire\Component;

new class extends Component {
    //
};
?>

<div x-data="{ open: false }" class="absolute bottom-0 border-t border-gray-200">
    <button @click="open = true"
        class="flex items-center gap-4 bg-white p-6 cursor-pointer
                    hover:bg-gray-50">
        <img alt="" src="{{ asset('images/jati.jpg') }}" class="size-10 rounded-full object-cover">
        <p class="text-sm flex flex-col items-start">
            <strong class="block font-medium">Jati Sri Pamungkas</strong>
            <span> jatisripamungkas@gmail.com </span>
        </p>
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
            stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
        </svg>
    </button>

    <div x-show="open" class="fixed inset-0 z-[999] flex items-end justify-start pl-48 pb-20"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

        <div class="fixed inset-0 bg-gray-900/80 backdrop-blur-sm" @click="open = false"></div>

        <div class="relative bg-gray-800 border-2 border-gray-400 rounded-2xl transform overflow-hidden" x-show="open"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95 translate-y-4"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0">

            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="flex text-white items-center gap-4 px-6 py-4 cursor-pointer hover:bg-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75" />
                </svg>
                <p class="text-gray-300 text-lg">Logout</p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">@csrf</form>
        </div>
    </div>
</div>
