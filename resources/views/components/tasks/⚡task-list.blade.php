<?php

use Livewire\Component;
use App\Models\Task;

new class extends Component {
    public $taskId;
    public $name;
    public $project;
    public $due;
    public $isChecked = false;
    public $search = '';

    public function mount($name, $project, $due, $taskId)
    {
        $this->taskId = $taskId;
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
    <p>{{ $due }}</p>
</label>
