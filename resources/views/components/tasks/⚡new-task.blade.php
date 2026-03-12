<?php

use Livewire\Component;
use App\Models\Task;
use App\Models\Project;

new class extends Component {
    public $name;
    public $project_id;
    public $due_date;
    public $priority_id = 1;

    public function mount($projectId)
    {
        $this->project_id = $projectId;
    }
    protected $rules = [
        'name' => 'required|min:3',
        'project_id' => 'required|exists:projects,id',
        'due_date' => 'required|date',
        'priority_id' => 'required|integer|in:1,2,3,4',
    ];

    public function save()
    {
        $this->validate();

        Task::create([
            'name' => $this->name,
            'due_date' => $this->due_date,
            'project_id' => $this->project_id,
            'status_id' => 2,
            'priority_id' => (int) $this->priority_id,
            'user_id' => Auth::id(),
        ]);

        session()->flash('message', 'Task baru berhasil di-plot! 🚀');

        return redirect()->to('/projects/' . $this->project_id);
    }

    public function with(): array
    {
        return [
            'projects' => Project::all(),
        ];
    }
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
                <a href="/projects/{{ $project_id }}" class="block transition-colors hover:text-gray-900">
                    {{ $project_id }} </a>
            </li>

            <li class="rtl:rotate-180">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </li>
            <li>
                <a href="/projects/{{ $project_id }}/" class="block transition-colors hover:text-gray-900"> Task</a>
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
        <form wire:submit.prevent="save" class="flex flex-col gap-4">
            @csrf

            <label for="name">
                <span class="font-semibold text-gray-700"> Name </span>
                <input type="text" id="name" wire:model="name" placeholder="Task Name"
                    class="mt-1 w-full rounded border-gray-300 shadow-sm p-2 sm:text-sm @error('name') border-red-500 @enderror">
                @error('name')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </label>

            <label>
                <span class="font-semibold text-gray-700"> Project </span>
                <select wire:model="project_id"
                    class="mt-1 w-full rounded border-gray-300 shadow-sm p-2 sm:text-sm @error('project_id') border-red-500 @enderror">
                    <option value="">-- Select Project --</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
                @error('project_id')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </label>

            <label>
                <span class="font-semibold text-gray-700"> Priority </span>
                <select wire:model="priority_id"
                    class="mt-1 w-full rounded border-gray-300 shadow-sm p-2 sm:text-sm @error('priority_id') border-red-500 @enderror">
                    <option value="1">Low 🟢</option>
                    <option value="2">Medium 🟡</option>
                    <option value="3">High 🟠</option>
                    <option value="4">Urgent 🔴</option>
                </select>
                @error('priority_id')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </label>

            <label for="due_date">
                <span class="font-semibold text-gray-700"> Due Date </span>
                <input type="date" id="due_date" wire:model="due_date"
                    class="mt-1 w-full rounded border-gray-300 shadow-sm p-2 sm:text-sm @error('due_date') border-red-500 @enderror">
                @error('due_date')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </label>

            <div class="mt-8 flex justify-end gap-4">
                <button type="submit" wire:loading.attr="disabled"
                    class="flex gap-2 rounded-sm border border-gray-700 bg-gray-700 px-4 py-2 font-semibold text-base text-white hover:bg-gray-600 disabled:opacity-50">

                    <svg wire:loading.remove xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                    </svg>

                    <span wire:loading.remove>Save</span>
                    <span wire:loading>Plotting...</span>
                </button>

                <a class="flex gap-2 rounded-sm border border-gray-700 bg-transparent px-4 py-2 font-semibold text-base text-gray-700 hover:bg-gray-200"
                    href="/projects">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
