<?php

use Livewire\Component;

new class extends Component {
    public $color;
    public $icon;
    public $type;
    public function mount($icon, $type)
    {
        $this->icon = $icon;
        $this->color = match ($type) {
            'success' => 'green',
            'warning' => 'amber',
            'error' => 'red',
            default => 'red',
        };
        $this->type = Str::headline($type);
    }
};
?>

<div role="alert"
    class="w-75 fixed right-5 top-5 rounded-md border border-{{ $color }}-500 bg-{{ $color }}-50 p-4 shadow-sm">
    <div class="flex items-start gap-4">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="-mt-0.5 size-6 text-{{ $color }}-700">
            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}"></path>
        </svg>

        <div class="flex-1">
            <strong class="block leading-tight font-medium text-{{ $color }}-800"> {{ $type }} </strong>

            <p class="mt-0.5 text-sm text-{{ $color }}-700">
                {{ $slot }}
            </p>
        </div>
    </div>
</div>
