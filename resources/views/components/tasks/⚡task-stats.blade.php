<?php

use Livewire\Component;

new class extends Component {
    public $color;
    public $icon;
    public $value;
    public $status;
    public function mount($icon, $value, $status)
    {
        $this->icon = $icon;
        $this->value = $value;
        $this->status = Str::headline($status);
        $this->color = match ($status) {
            'todo' => 'blue',
            'in_progress' => 'amber',
            'done' => 'green',
            default => 'blue',
        };
    }
};
?>

<div class="h-42 p-8 rounded-sm flex gap-8 items-center bg-white shadow-md text-gray-700">
    <div class="h-18 bg-{{ $color }}-100 rounded-sm p-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-12 text-{{ $color }}-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}" />
        </svg>

    </div>
    <div class="flex flex-col gap-2">
        <h1 class="font-bold text-3xl">{{ $value }}</h1>
        <h3 class="font-semibold text-lg">{{ $status }}</h3>
    </div>
</div>
