<?php

use Livewire\Component;

new class extends Component {
    //
};
?>

<div class="contents">
    <x-slot:title>Finish It | Projects</x-slot:title>
    <nav aria-label="Breadcrumb">
        <ol class="flex items-center gap-1 text-sm text-gray-700">
            <li>
                <a href="/" class="block transition-colors hover:text-gray-900" aria-label="Home">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                </a>
            </li>

            <li class="rtl:rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </li>

            <li>
                <p class="block transition-colors hover:text-gray-900"> Projects </p>
            </li>
        </ol>
    </nav>
    <div class="flex flex-col gap-2 text-gray-700">
        <h1 class="text-4xl font-bold">Projects</h1>
        <p class="text-lg">Maintain all of your project here.</p>
    </div>

    <label for="Search">
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
            <input type="search" id="Search" placeholder="Search" class="w-full focus:outline-0 focus:border-0 ">
        </div>
    </label>

    <div class="grid grid-cols-4 gap-8 text-gray-700">
        <livewire:projects.project-list link="/projects/1" title="Website Redesign" status="in_progress" due="Mar 12"
            progress="25" totalTask="12/32">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum commodi cum voluptatum,
            ea minus,
            sapiente dolore voluptates itaque tempore quod at incidunt soluta eius vel perferendis placeat
            repellendus! Animi est esse veniam aspernatur placeat porro unde dicta eos nemo, optio dignissimos
            consequatur commodi et recusandae asperiores aliquid quam suscipit officia?
        </livewire:projects.project-list>
        <livewire:projects.project-list link="/projects/2" title="Mobile App V2.0" status="done" due="Feb 20"
            progress="100" totalTask="18/18">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum commodi cum voluptatum,
            ea minus,
            sapiente dolore voluptates itaque tempore quod at incidunt soluta eius vel perferendis placeat
            repellendus! Animi est esse veniam aspernatur placeat porro unde dicta eos nemo, optio dignissimos
            consequatur commodi et recusandae asperiores aliquid quam suscipit officia?
        </livewire:projects.project-list>
        <livewire:projects.project-list link="/projects/3" title="Mobile App V2.0" status="done" due="Feb 20"
            progress="100" totalTask="18/18">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum commodi cum voluptatum,
            ea minus,
            sapiente dolore voluptates itaque tempore quod at incidunt soluta eius vel perferendis placeat
            repellendus! Animi est esse veniam aspernatur placeat porro unde dicta eos nemo, optio dignissimos
            consequatur commodi et recusandae asperiores aliquid quam suscipit officia?
        </livewire:projects.project-list>
        <livewire:projects.project-list link="/projects/4" title="Cloud Architecture" status="todo" due="Des 25"
            progress="0" totalTask="0/24">
            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum commodi cum voluptatum,
            ea minus,
            sapiente dolore voluptates itaque tempore quod at incidunt soluta eius vel perferendis placeat
            repellendus! Animi est esse veniam aspernatur placeat porro unde dicta eos nemo, optio dignissimos
            consequatur commodi et recusandae asperiores aliquid quam suscipit officia?
        </livewire:projects.project-list>
    </div>
    <livewire:projects.project-pagination />
</div>
