<?php

use Livewire\Component;

new class extends Component {
    public $name;
    public $project;
    public $due;
    public $isChecked = false;
    public function mount($name, $project, $due)
    {
        $this->name = $name;
        $this->project = $project;
        $this->due = $due;
    }
    public function toggle()
    {
        $this->isChecked = !$this->isChecked;
    }
    public function test()
    {
        dd('clicked!');
    }
};
?>

<label class="w-full flex items-center justify-between px-8 py-4 rounded-sm border-b border-gray-300 bg-white">
    <div class="flex items-center gap-4">
        <input type="checkbox" class="my-0.5 size-5 rounded border-gray-300 shadow-sm" wire:click="toggle">

        <div>
            <span
                class="font-medium text-gray-700 {{ $isChecked ? 'line-through' : '' }} decoration-1.5">{{ $name }}</span>
            <p class="mt-0.5 text-sm text-gray-700">
                {{ $project }}
            </p>
        </div>
    </div>

    {{-- <button wire:click="test">click me!</button> --}}
    <p>{{ $due }}</p>
</label>
