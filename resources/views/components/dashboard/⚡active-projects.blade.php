<?php

use Livewire\Component;

new class extends Component {
    public $link;
    public $title;
    public $status;
    public $due;
    public $progress;
    public $totalTask;
    public $color;
    public function mount($link, $title, $status, $due, $progress, $totalTask)
    {
        $this->link = $link;
        $this->title = $title;
        $this->status = Str::headline($status);
        $this->due = $due;
        $this->progress = $progress;
        $this->totalTask = $totalTask;
        $this->color = match ($status) {
            'todo' => 'blue',
            'in_progress' => 'amber',
            'done' => 'green',
            default => 'blue',
        };
    }
};
?>

<a href="{{ $link }}"
    class="flex flex-col gap-4 rounded-md border border-gray-300 p-4 shadow-sm bg-white hover:bg-gray-100/90 sm:p-6">
    <h1 class="font-semibold text-xl">{{ $title }}</h1>
    <p class="line-clamp-2">
        {{ $slot }}
    </p>
    <div class="flex items-center justify-between text-sm">
        <h3
            class="rounded-full bg-{{ $color }}-100 px-2.5 py-0.5 whitespace-nowrap text-{{ $color }}-700 font-semibold">
            {{ $status }}
        </h3>
        <h3 class="text-gray-700">Due {{ $due }}</h3>
    </div>
    <div role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
        <p class="text-sm font-medium text-gray-900">{{ $progress }}%</p>

        <div class="mt-2 h-2 w-full rounded-full bg-gray-200">
            <div class="h-full rounded-full bg-blue-600" style="width: {{ $progress }}%"></div>
        </div>
    </div>
    <dl class="mt-6 flex gap-4 lg:gap-6 justify-end">
        <div class="flex just items-center gap-2">
            <dt class="text-gray-700">
                {{ $totalTask }}
            </dt>
            <dd class="text-xs text-gray-700">Tasks</dd>
        </div>
    </dl>
</a>
