<?php

use Livewire\Component;

new class extends Component {
    //
};
?>

<div class="flex flex-col gap-10">
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
                <a href="/projects" class="block transition-colors hover:text-gray-900"> Projects </a>
            </li>

            <li class="rtl:rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </li>
            <li>
                <a href="/projects" class="block transition-colors hover:text-gray-900"> 1 </a>
            </li>

            <li class="rtl:rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </li>
            <li>
                <a href="/projects" class="block transition-colors hover:text-gray-900"> Task</a>
            </li>

            <li class="rtl:rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </li>

            <li>
                <p class="block transition-colors hover:text-gray-900"> New </p>
            </li>
        </ol>
    </nav>
    <div class="flex flex-col gap-2 text-gray-700">
        <h1 class="text-4xl font-bold">New Task</h1>
        <p class="text-lg">Plot your new Task.</p>
    </div>
    <div class="w-125 rounded-md p-10 flex flex-col gap-8 border border-gray-700 bg-white">
        <form class="flex flex-col gap-4">
            @csrf

            <label for="Name">
                <span class="font-semibold text-gray-700"> Name </span>

                <input type="text" id="Name" placeholder="Task Name"
                    class="mt-1 w-full rounded border-gray-300 shadow-sm p-2 sm:text-sm">
            </label>

            <span class="font-semibold text-gray-700"> Project </span>
            <select name="project" class="mt-1 w-full rounded border-gray-300 shadow-sm p-2 sm:text-sm">
                <option value="Web Redesign">Web Redesign</option>
                <option value="Mobile App v2.0">Mobile App v2.0</option>
                <option value="Cloud Architecture">Cloud Architecture</option>
            </select>

            <label for="Due Date">
                <span class="font-semibold text-gray-700"> Due Date </span>

                <input type="date" id="Due Date" placeholder="Due Date"
                    class="mt-1 w-full rounded border-gray-300 shadow-sm p-2 sm:text-sm">
            </label>
            <div class="mt-8 flex justify-end gap-4">
                <a class="flex gap-2 rounded-sm border border-gray-700 bg-gray-700 px-4 py-2 font-semibold text-base text-white hover:bg-gray-600"
                    href="/projects/1/task/new">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>

                    Save
                </a>
                <a class="flex gap-2 rounded-sm border border-gray-700 bg-transparent px-4 py-2 font-semibold text-base text-gray-700 hover:bg-gray-200"
                    href="/projects/1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
