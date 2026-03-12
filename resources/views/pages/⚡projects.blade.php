<?php

use Livewire\Component;
use App\Models\Project;
use Livewire\Attributes\Computed;

new class extends Component {
    public $search = '';
    public $myRole;
    public $myId;

    public function mount()
    {
        $this->myId = Auth::id();
        $this->myRole = Auth::user()->role_id;
    }

    #[Computed]
    public function activeProjects()
    {
        $query = Project::where('is_active', true)
            ->where('name', 'like', '%' . $this->search . '%')
            ->addSelect([
                'tasks_count' => DB::table('tasks')->selectRaw('count(*)')->whereColumn('project_id', 'projects.id'),
                'tasks_done_count' => DB::table('tasks')->selectRaw('count(*)')->whereColumn('project_id', 'projects.id')->where('status_id', 1),
            ]);

        if ($this->myRole !== 1) {
            $query->whereIn('id', function ($sub) {
                $sub->select('project_id')->from('project_members')->where('user_id', $this->myId);
            });
        }

        return $query->get();
    }
};
?>

<div class="contents">
    <x-slot:title>Finish It | Projects</x-slot:title>
    <div class="flex justify-between items-center">
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
                    <input wire:model.live.debounce.300ms="search" type="search" id="Search" placeholder="Search"
                        class="w-full focus:outline-0 focus:border-0 ">
                </div>
            </label>
        </div>

        <a class="flex gap-4 rounded-sm border border-gray-700 bg-gray-700 px-6 py-4 font-semibold text-white hover:bg-gray-600 {{ $this->myRole === 3 ? 'hidden' : '' }}"
            href="/projects/new">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            New Project
        </a>
    </div>

    <div class="grid grid-cols-4 gap-8 text-gray-700">
        @if (count($this->activeProjects) > 0)
            @foreach ($this->activeProjects as $project)
                @php
                    $currentProgress = round(($project->tasks_done_count / max(1, $project->tasks_count)) * 100);

                    if ($currentProgress == 0) {
                        $status = 'todo';
                    } elseif ($currentProgress > 0 && $currentProgress < 100) {
                        $status = 'in_progress';
                    } else {
                        $status = 'done';
                    }
                @endphp

                <livewire:projects.project-list wire:key="p-{{ $project->id }}" link="/projects/{{ $project->id }}"
                    title="{{ $project->name }}" status="{{ $status }}" due="{{ $project->due_date }}"
                    progress="{{ $currentProgress }}"
                    totalTask="{{ $project->tasks_done_count }}/{{ $project->tasks_count }}">
                    {{ $project->description }}
                </livewire:projects.project-list>
            @endforeach
        @else
            <div class="col-span-4 p-10 text-center bg-yellow-100 border-2 border-yellow-400 rounded-xl">
                <p class="text-yellow-700 font-bold text-lg text-pretty">
                    Project "{{ $search }}" not found ⚠️
                </p>
            </div>
        @endif
    </div>
</div>
