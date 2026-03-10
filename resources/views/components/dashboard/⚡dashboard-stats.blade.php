<?php

use Livewire\Component;

new class extends Component {
    public $title;
    public $value;
    public $note;
    public $color;
    public $icon;
};
?>

<div class="h-42 p-8 rounded-sm flex justify-between bg-white shadow-md text-gray-700">
    <div class="flex flex-col gap-2">
        <h3 class="font-semibold text-lg">{{ $title }}</h3>
        <h1 class="font-bold text-3xl">{{ $value }}</h1>
        <p class="text-sm text-{{ $color }}-600">{{ $note }}</p>
    </div>
    <div class="h-18 bg-{{ $color }}-100 rounded-sm p-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-12 text-{{ $color }}-500">
            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $icon }}" />
        </svg>
    </div>
</div>
