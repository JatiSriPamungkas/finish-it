<x-layout>
    <x-slot:title>Projects</x-slot:title>
    <div class="flex flex-col gap-2 text-gray-700">
        <h1 class="text-4xl font-bold">Projects</h1>
        <p class="text-lg">Maintain all of your project here.</p>
    </div>

    <div>
        <label for="Search">
            {{-- <span class="text-sm font-medium text-gray-700"> Search </span> --}}
            <div class="flex  gap-4 w-100 rounded border-gray-300 p-2 shadow-sm bg-white sm:text-sm">
                <button type="button" aria-label="Submit"
                    class="rounded-full p-1 text-gray-700 transition-colors hover:bg-gray-100 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-4">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z">
                        </path>
                    </svg>
                </button>
                <input type="search" id="Search" class="w-full focus:outline-0 focus:border-0 ">
                {{-- <span class="absolute inset-y-0 left-2 grid w-8 place-content-center">
                </span> --}}
            </div>
        </label>
    </div>

    <div class="grid grid-cols-4 gap-8">
        <a href="/projects" class="flex flex-col gap-4 rounded-md border border-gray-300 p-4 shadow-sm sm:p-6 bg-white">
            <h1 class="font-semibold text-xl">Website Redesign</h1>
            <p class="line-clamp-12">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi alias totam quidem? Rem error,
                voluptate nam impedit minus animi assumenda fugit, recusandae repudiandae labore nihil qui dolorum
                magnam asperiores, quisquam iusto mollitia laboriosam? Facere quis delectus qui minus illo, soluta modi
                quos ipsam earum. Incidunt sunt ratione ad quod ipsa.
            </p>
            <div class="flex items-center justify-between text-sm">
                <h3 class="rounded-full bg-amber-100 px-2.5 py-0.5 whitespace-nowrap text-amber-700 font-semibold">
                    In Progress
                </h3>
                <h3 class="text-gray-700">Due Mar 15</h3>
            </div>
            <div role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                <p class="text-sm font-medium text-gray-900">25%</p>

                <div class="mt-2 h-2 w-full rounded-full bg-gray-200">
                    <div class="h-full rounded-full bg-blue-600" style="width: 25%"></div>
                </div>
            </div>
            <dl class="mt-6 flex gap-4 lg:gap-6 justify-end">
                <div class="flex just items-center gap-2">
                    <dt class="text-gray-700">
                        12/32
                    </dt>
                    <dd class="text-xs text-gray-700">Tasks</dd>
                </div>
            </dl>
        </a>
        <a href="/projects" class="flex flex-col gap-4 rounded-md border border-gray-300 p-4 shadow-sm sm:p-6 bg-white">
            <h1 class="font-semibold text-xl">Mobile App V2.0</h1>
            <p class="line-clamp-12">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum commodi cum voluptatum, ea minus,
                sapiente dolore voluptates itaque tempore quod at incidunt soluta eius vel perferendis placeat
                repellendus! Animi est esse veniam aspernatur placeat porro unde dicta eos nemo, optio dignissimos
                consequatur commodi et recusandae asperiores aliquid quam suscipit officia?
            </p>
            <div class="flex items-center justify-between text-sm">
                <h3 class="rounded-full bg-green-100 px-2.5 py-0.5 whitespace-nowrap text-green-700 font-semibold">
                    Done
                </h3>
                <h3 class="text-gray-700">Due Feb 20</h3>
            </div>
            <div role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                <p class="text-sm font-medium text-gray-900">100%</p>

                <div class="mt-2 h-2 w-full rounded-full bg-gray-200">
                    <div class="h-full rounded-full bg-blue-600" style="width: 100%"></div>
                </div>
            </div>
            <dl class="mt-6 flex gap-4 lg:gap-6 justify-end">
                <div class="flex just items-center gap-2">
                    <dt class="text-gray-700">
                        7/18
                    </dt>
                    <dd class="text-xs text-gray-700">Tasks</dd>
                </div>
            </dl>
        </a>
        <a href="/projects" class="flex flex-col gap-4 rounded-md border border-gray-300 p-4 shadow-sm sm:p-6 bg-white">
            <h1 class="font-semibold text-xl">Mobile App V2.0</h1>
            <p class="line-clamp-12">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum commodi cum voluptatum, ea minus,
                sapiente dolore voluptates itaque tempore quod at incidunt soluta eius vel perferendis placeat
                repellendus! Animi est esse veniam aspernatur placeat porro unde dicta eos nemo, optio dignissimos
                consequatur commodi et recusandae asperiores aliquid quam suscipit officia?
            </p>
            <div class="flex items-center justify-between text-sm">
                <h3 class="rounded-full bg-green-100 px-2.5 py-0.5 whitespace-nowrap text-green-700 font-semibold">
                    Done
                </h3>
                <h3 class="text-gray-700">Due Feb 20</h3>
            </div>
            <div role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                <p class="text-sm font-medium text-gray-900">100%</p>

                <div class="mt-2 h-2 w-full rounded-full bg-gray-200">
                    <div class="h-full rounded-full bg-blue-600" style="width: 100%"></div>
                </div>
            </div>
            <dl class="mt-6 flex gap-4 lg:gap-6 justify-end">
                <div class="flex just items-center gap-2">
                    <dt class="text-gray-700">
                        7/18
                    </dt>
                    <dd class="text-xs text-gray-700">Tasks</dd>
                </div>
            </dl>
        </a>
        <a href="/projects" class="flex flex-col gap-4 rounded-md border border-gray-300 p-4 shadow-sm sm:p-6 bg-white">
            <h1 class="font-semibold text-xl">Cloud Architecture</h1>
            <p class="line-clamp-12">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum commodi cum voluptatum, ea minus,
                sapiente dolore voluptates itaque tempore quod at incidunt soluta eius vel perferendis placeat
                repellendus! Animi est esse veniam aspernatur placeat porro unde dicta eos nemo, optio dignissimos
                consequatur commodi et recusandae asperiores aliquid quam suscipit officia?
            </p>
            <div class="flex items-center justify-between text-sm">
                <h3 class="rounded-full bg-blue-100 px-2.5 py-0.5 whitespace-nowrap text-blue-700 font-semibold">
                    To Do
                </h3>
                <h3 class="text-gray-700">Due Feb 20</h3>
            </div>
            <div role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                <p class="text-sm font-medium text-gray-900">100%</p>

                <div class="mt-2 h-2 w-full rounded-full bg-gray-200">
                    <div class="h-full rounded-full bg-blue-600" style="width: 100%"></div>
                </div>
            </div>
            <dl class="mt-6 flex gap-4 lg:gap-6 justify-end">
                <div class="flex just items-center gap-2">
                    <dt class="text-gray-700">
                        7/18
                    </dt>
                    <dd class="text-xs text-gray-700">Tasks</dd>
                </div>
            </dl>
        </a>
    </div>
    <ul class="flex justify-center gap-1 text-gray-900">
        <li>
            <a href="#"
                class="grid size-8 place-content-center rounded border border-gray-200 transition-colors hover:bg-gray-50 rtl:rotate-180"
                aria-label="Previous page">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
        </li>

        <li>
            <a href="#"
                class="block size-8 rounded border border-gray-200 text-center text-sm/8 font-medium transition-colors hover:bg-gray-50">
                1
            </a>
        </li>

        <li
            class="block size-8 rounded border border-indigo-600 bg-indigo-600 text-center text-sm/8 font-medium text-white">
            2
        </li>

        <li>
            <a href="#"
                class="block size-8 rounded border border-gray-200 text-center text-sm/8 font-medium transition-colors hover:bg-gray-50">
                3
            </a>
        </li>

        <li>
            <a href="#"
                class="block size-8 rounded border border-gray-200 text-center text-sm/8 font-medium transition-colors hover:bg-gray-50">
                4
            </a>
        </li>

        <li>
            <a href="#"
                class="grid size-8 place-content-center rounded border border-gray-200 transition-colors hover:bg-gray-50 rtl:rotate-180"
                aria-label="Next page">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
        </li>
    </ul>
</x-layout>
