@if (is_numeric($refresh))
<div class="flex flex-col h-screen justify-between" wire:poll.{{ $refresh }}.ms>
    @elseif (is_string($refresh))
    <div class="flex flex-col h-screen justify-between" wire:poll="{{ $refresh }}">
        @else
        <div class="flex flex-col h-screen justify-between">
            @endif

            {{-- search field --}}
            @include('laravel-livewire-tables::includes.search')
            @include('laravel-livewire-tables::includes.offline')
            @include('laravel-livewire-tables::includes.loading')

            {{-- Main section --}}
            <main x-data="{ modal: false }" class="flex-1 relative z-0 overflow-y-auto py-6 focus:outline-none"
                tabindex="0">
                <div class="sm:flex sm:items-center mx-auto px-4 sm:px-6 lg:px-8">

                    {{-- Title --}}
                    <h1 class="text-2xl font-semibold text-gray-900">
                        {{ $title }} <span class="cursor-pointer"
                            x-on:click="window.location.href = '{{ route("app.{$modelName}s.create") }}'">@svg('light/plus-circle', 'w-7 h-7 ml-3 text-gray-600 inline-flex')</span>
                    </h1>

                    {{-- sort tags and perPage select --}}
                    @if($models->isNotEmpty())
                        @include('laravel-livewire-tables::includes.sort-tags')
                        @include('laravel-livewire-tables::includes.per-page-select')
                    @endif
                </div>

                {{-- after title slot --}}
                @if(isset($afterTitle))
                <div class="mx-auto px-4 py-4 sm:px-6 lg:px-8">
                    @include($afterTitle)
                </div>
                @endif

                {{-- Table --}}
                <div class="mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex flex-col md:flex-row py-2">
                        @if(isset($sidePanel))
                            <div class="bg-white border w-full lg:w-1/4 md:w-1/3 rounded shadow">
                                @include($sidePanel)
                            </div>
                        @endif
                        <div class="align-middle inline-block md:border-b md:border-gray-200 md:rounded-lg md:shadow overflow-hidden w-full">
                            {{-- no items found --}}
                            @if($models->isEmpty())
                            <div class="w-full h-12 px-8 bg-white flex items-center">
                                @svg('light/sad-tear', 'w-5 h-5 mr-2') {{ $noResultsMessage }} {{$title}}
                            </div>
                            @else
                            @if(isset($noTable)) @include($noTable) @else
                                <div class="{{ $tableClass }}" dusk="table">
                                    @include('laravel-livewire-tables::includes.header')
                                    @include('laravel-livewire-tables::includes.body')
                                    @include('laravel-livewire-tables::includes.footer')
                                </div>
                            @endif
                            @endif
                        </div>
                    </div>
                </div>
                {{-- modal slot --}}
                @if(isset($modal)) @include($modal) @endif
            </main>
            {{-- Footer Pagination --}}
            @include('laravel-livewire-tables::includes.pagination')
        </div>
<script>
    document.addEventListener('turbolinks:load', function () {
        document.title = '{{ $title }}'
    })
</script>