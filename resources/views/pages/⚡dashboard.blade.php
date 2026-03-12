<?php

use Livewire\Component;
use Carbon\Carbon;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;

new class extends Component {
    public $greeting;
    public $completedTasksCount = 0;
    public $activeProjectsCount = 0;
    public $teamMembersCount = 0;
    public $completionRateCount = 0;
    public $newProjectsThisWeekCount = 0;
    public $activeProjects;

    public function mount()
    {
        $this->setGreeting();
        $this->setDashboardStats();
    }

    public function setGreeting()
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

    public function setDashboardStats()
    {
        $myId = Auth::id();
        $myRole = Auth::user()->role_id;

        // Card: Task Completed
        $queryTasks = Task::query();
        if ($myRole !== 1) {
            $queryTasks->whereIn('project_id', function ($sub) use ($myId) {
                $sub->select('project_id')->from('project_members')->where('user_id', $myId);
            });
        }

        $totalTaskCount = $queryTasks->count();
        $this->completedTasksCount = (clone $queryTasks)->where('status_id', 1)->count();
        $this->completionRateCount = $totalTaskCount > 0 ? round(($this->completedTasksCount / $totalTaskCount) * 100) : 0;

        // Card: Active Projects
        $queryActive = Project::where('is_active', true);
        if ($myRole !== 1) {
            $queryActive->whereIn('id', function ($sub) use ($myId) {
                $sub->select('project_id')->from('project_members')->where('user_id', $myId);
            });
        }
        $this->activeProjectsCount = $queryActive->count();
        $this->activeProjects = $queryActive
            ->addSelect([
                'tasks_count' => DB::table('tasks')->selectRaw('count(*)')->whereColumn('project_id', 'projects.id'),
                'tasks_done_count' => DB::table('tasks')->selectRaw('count(*)')->whereColumn('project_id', 'projects.id')->where('status_id', 1),
            ])
            ->get();

        $queryNew = Project::where('created_at', '>=', now()->subDays(7));
        if ($myRole !== 1) {
            $queryNew->whereIn('id', function ($sub) use ($myId) {
                $sub->select('project_id')->from('project_members')->where('user_id', $myId);
            });
        }
        $this->newProjectsThisWeekCount = $queryNew->count();

        // Card: Team Members
        if ($myRole === 1) {
            $this->teamMembersCount = User::where('id', '!=', $myId)->count();
        } else {
            // Cari temen yang satu project sama lo
            $this->teamMembersCount = DB::table('project_members')
                ->whereIn('project_id', function ($q) use ($myId) {
                    $q->select('project_id')->from('project_members')->where('user_id', $myId);
                })
                ->where('user_id', '!=', $myId)
                ->distinct('user_id')
                ->count();
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
        <livewire:dashboard.dashboard-stats title="Task Completed" value="{{ $completedTasksCount }}"
            note="{{ $completionRateCount }}% Completion Rate" color="green"
            icon="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
        <livewire:dashboard.dashboard-stats title="Active Projects" value="{{ $activeProjectsCount }}"
            note="+{{ $newProjectsThisWeekCount }} This Week" color="blue"
            icon="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
        <livewire:dashboard.dashboard-stats title="Team Members" value="{{ $teamMembersCount }}" note="2 People Online"
            color="purple"
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
            @foreach ($activeProjects as $activeProject)
                @php
                    $progress = round(($activeProject->tasks_done_count / max(1, $activeProject->tasks_count)) * 100);

                    if ($progress == 0) {
                        $status = 'todo';
                    } elseif ($progress > 0 && $progress < 100) {
                        $status = 'in_progress';
                    } else {
                        $status = 'done';
                    }
                @endphp
                <livewire:dashboard.active-projects link="/projects/{{ $activeProject->id }}"
                    title="{{ $activeProject->name }}" status="{{ $status }}"
                    due="{{ $activeProject->due_date }}" progress="{{ $progress }}"
                    totalTask="{{ $activeProject->tasks_done_count }}/{{ $activeProject->tasks_count }}">
                    {{ $activeProject->description }}
                </livewire:dashboard.active-projects>
            @endforeach
        </div>
    </div>
</div>
