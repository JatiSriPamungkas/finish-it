<?php

use Livewire\Component;
use App\Models\Task;

new class extends Component {
    public $taskId;
    public $projectId;
    public $name;
    public $project;
    public $due;
    public $isChecked = false;
    public $search = '';

    public function mount($name, $project, $due, $taskId, $projectId)
    {
        $this->taskId = $taskId;
        $this->projectId = $projectId;
        $this->name = $name;
        $this->project = $project;
        $this->due = $due;

        $task = Task::where('id', $taskId)->first();
        $this->isChecked = $task && $task->status_id == 1;
    }

    public function toggle()
    {
        $this->isChecked = !$this->isChecked;

        Task::where('id', $this->taskId)->update([
            'status_id' => $this->isChecked ? 1 : 2,
        ]);

        $this->js('window.location.reload()');
    }
    public function deleteTask($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        session()->flash('message', 'Task erased! 🗑️');

        return redirect()->to('/projects/' . $this->projectId);
    }
};
?>

<label class="w-full flex items-center justify-between px-8 py-4 rounded-sm border-b border-gray-300 bg-white">
    <div class="flex items-center gap-4 cursor-pointer">
        <input type="checkbox"
            class="my-0.5 size-5 rounded border-gray-300 shadow-sm disabled:opacity-50 disabled:cursor-not-allowed"
            wire:click="toggle" {{ $isChecked ? 'checked' : '' }} wire:loading.attr="disabled">
        <div>
            <span
                class="font-medium text-gray-700 {{ $isChecked ? 'line-through' : '' }} decoration-1.5">{{ $name }}</span>
            <p class="mt-0.5 text-sm text-gray-700">
                {{ $project }}
            </p>
        </div>
    </div>
    <div class="flex items-center justify-between gap-18">
        <p>{{ $due }}</p>
        <div class="flex gap-2">
            <a href="/projects/{{ $projectId }}/task/edit/{{ $taskId }}"
                class="p-2 text-amber-600 hover:bg-amber-50 rounded-md transition cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                </svg>
            </a>

            <button
                x-on:click="
                Swal.fire({
                    title: 'Are you sure want to delete task?',
                    text: 'Data that delete cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#e11d48',
                    cancelButtonColor: '#4b5563',
                    confirmButtonText: 'Confirm',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $wire.deleteTask({{ $taskId }})
                    }
                })
            "
                class="p-2 text-red-600 hover:bg-red-50 rounded-md transition cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="3 6 5 6 21 6" />
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                    <line x1="10" y1="11" x2="10" y2="17" />
                    <line x1="14" y1="11" x2="14" y2="17" />
                </svg>
            </button>
        </div>
    </div>
</label>
