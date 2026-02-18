@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Навигация по страницам" class="flex items-center justify-between">
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-stone-400 bg-white border border-stone-200 cursor-not-allowed rounded-lg">
                    &laquo; Назад
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-stone-700 bg-white border border-stone-200 rounded-lg hover:bg-stone-50 hover:text-amber-600 transition">
                    &laquo; Назад
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-stone-700 bg-white border border-stone-200 rounded-lg hover:bg-stone-50 hover:text-amber-600 transition">
                    Вперёд &raquo;
                </a>
            @else
                <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-stone-400 bg-white border border-stone-200 cursor-not-allowed rounded-lg">
                    Вперёд &raquo;
                </span>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-stone-600">
                    Показано
                    <span class="font-medium">{{ $paginator->firstItem() }}</span>
                    &ndash;
                    <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    из
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    записей
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex rounded-lg shadow-sm">
                    {{-- Кнопка "Назад" --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="Назад">
                            <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-stone-300 bg-white border border-stone-200 cursor-not-allowed rounded-l-lg" aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-stone-500 bg-white border border-stone-200 rounded-l-lg hover:bg-stone-50 hover:text-amber-600 transition" aria-label="Назад">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif

                    {{-- Номера страниц --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-stone-500 bg-white border border-stone-200 cursor-default">{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-amber-500 border border-amber-500 cursor-default">{{ $page }}</span>
                                    </span>
                                @else
                                    <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-stone-700 bg-white border border-stone-200 hover:bg-stone-50 hover:text-amber-600 transition" aria-label="Перейти на страницу {{ $page }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Кнопка "Вперёд" --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-stone-500 bg-white border border-stone-200 rounded-r-lg hover:bg-stone-50 hover:text-amber-600 transition" aria-label="Вперёд">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="Вперёд">
                            <span class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-stone-300 bg-white border border-stone-200 cursor-not-allowed rounded-r-lg" aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
