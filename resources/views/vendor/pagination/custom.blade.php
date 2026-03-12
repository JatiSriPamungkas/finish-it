@if ($paginator->hasPages())
    <ul class="flex justify-center gap-1 text-gray-900" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li>
                <span
                    class="grid size-8 place-content-center rounded border border-gray-100 text-gray-400 cursor-not-allowed">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </li>
        @else
            <li>
                <button wire:click="previousPage" wire:loading.attr="disabled"
                    class="grid size-8 place-content-center rounded border border-gray-200 transition-colors hover:bg-gray-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li><span
                        class="block size-8 rounded border border-gray-200 text-center text-sm/8 font-medium">{{ $element }}</span>
                </li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li
                            class="block size-8 rounded border border-indigo-600 bg-indigo-600 text-center text-sm/8 font-medium text-white">
                            {{ $page }}
                        </li>
                    @else
                        <li>
                            <button wire:click="gotoPage({{ $page }})"
                                class="block size-8 rounded border border-gray-200 text-center text-sm/8 font-medium transition-colors hover:bg-gray-50">
                                {{ $page }}
                            </button>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <button wire:click="nextPage" wire:loading.attr="disabled"
                    class="grid size-8 place-content-center rounded border border-gray-200 transition-colors hover:bg-gray-50">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </li>
        @else
            <li>
                <span
                    class="grid size-8 place-content-center rounded border border-gray-100 text-gray-400 cursor-not-allowed">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
            </li>
        @endif
    </ul>
@endif
