<?php

use Livewire\Component;
use Carbon\Carbon;

new class extends Component {
    public $greeting;

    public function mount()
    {
        $hour = Carbon::now('Asia/Jakarta')->hour;

        if ($hour >= 5 && $hour < 12) {
            $this->greeting = 'Good Morning';
        } elseif ($hour >= 12 && $hour < 18) {
            $this->greeting = 'Good Afternoon';
        } elseif ($hour >= 18 && $hour < 22) {
            $this->greeting = 'Good Evening';
        } else {
            $this->greeting = 'Good Night';
        }
    }
};
?>

<div class="contents">
    <x-slot:title>Finish It | Dashboard</x-slot:title>
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
        </ol>
    </nav>
    <div class="flex flex-col gap-2 text-gray-700">
        <h1 class="text-4xl font-bold">{{ $greeting }}, @auth
                {{ Auth::user()->name }}
            @endauth 👋🏻</h1>
        <p class="text-lg">What's your main focus today?</p>
    </div>
    <div class="w-full grid grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-8">
        <livewire:dashboard.dashboard-stats title="Task Completed" value="82" note="92% Completion Rate"
            color="green"
            icon="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
        <livewire:dashboard.dashboard-stats title="Active Projects" value="12" note="+2 This Week" color="blue"
            icon="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
        <livewire:dashboard.dashboard-stats title="Team Members" value="8" note="2 People Online" color="purple"
            icon="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
    </div>
    <div class="flex flex-col gap-8">
        <div class="flex justify-between items-center text-gray-700">
            <h1 class="font-semibold text-2xl">Active Projects</h1>
            <a href="/projects"
                class="font-medium hover:underline hover:underline-offset-8 hover:text-gray-900 hover:decoration-gray-900">View
                All</a>
        </div>
        <div class="grid grid-cols-2 gap-12">
            <livewire:dashboard.active-projects link="/projects/1" title="Website Redesign" status="in_progress"
                due="Mar 12" progress="25" totalTask="12/32">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum
                commodi cum voluptatum, ea minus, sapiente dolore voluptates itaque tempore quod at incidunt soluta eius
                vel perferendis placeat
                repellendus! Animi est esse veniam aspernatur placeat porro unde dicta eos nemo, optio dignissimos
                consequatur commodi et recusandae asperiores aliquid quam suscipit officia?
            </livewire:dashboard.active-projects>
            <livewire:dashboard.active-projects link="/projects/2" title="Mobile App V2.0" status="done" due="Feb 20"
                progress="100" totalTask="18/18">
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum commodi cum
                voluptatum, ea minus,sapiente dolore voluptates itaque tempore quod at incidunt soluta eius vel
                perferendis placeat
                repellendus! Animi est esse veniam aspernatur placeat porro unde dicta eos nemo, optio dignissimos
                consequatur commodi et recusandae asperiores aliquid quam suscipit officia?
            </livewire:dashboard.active-projects>
        </div>
    </div>
    {{-- <div class="fixed inset-0 z-50 grid place-content-center bg-black/50 p-4" role="dialog" aria-modal="true"
        aria-labelledby="modalTitle">
        <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-lg">
            <h2 id="modalTitle" class="text-xl font-bold text-gray-900 sm:text-2xl">Modal Title</h2>

            <div class="mt-4">
                <p class="text-pretty text-gray-700">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque euismod, nisi eu
                    consectetur. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
            </div>
        </div>
    </div> --}}
</div>
