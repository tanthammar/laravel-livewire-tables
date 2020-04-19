@if (is_numeric($refresh))
    <div class="flex flex-col h-screen justify-between" wire:poll.{{ $refresh }}.ms>
@elseif (is_string($refresh))
    <div class="flex flex-col h-screen justify-between" wire:poll="{{ $refresh }}">
@else
    <div class="flex flex-col h-screen justify-between">
@endif
    {{-- setup groups --}}
    @php
        if ($grouped) {
            $groups = collect($columns)->groupBy('group');
        }
    @endphp
    {{-- search field --}}
    @include('laravel-livewire-tables::includes.search')
    @include('laravel-livewire-tables::includes.offline')
    @include('laravel-livewire-tables::includes.loading')

    {{-- Main section --}}
        <main x-data="{ modal: false }" class="flex-1 relative z-0 overflow-y-auto py-6 focus:outline-none" tabindex="0">
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
                <div class="flex flex-col my-4">
                    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                        <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                            {{-- no items found --}}
                            @if($models->isEmpty())
                                <div class="h-12 px-8 bg-white flex items-center">
                                    <x-lists.no-items /> {{$title}}
                                </div>
                            @else
                                @if(isset($noTable)) @include($noTable) @else
                                    <table class="{{ $tableClass }} min-w-full">
                                        @include('laravel-livewire-tables::includes.header')
                                        @include('laravel-livewire-tables::includes.body')
                                        @include('laravel-livewire-tables::includes.footer')
                                    </table>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            {{-- modal slot --}}
            @if(isset($modal)) @include($modal) @endif
        </main>
    {{-- Footer Pagination --}}
    @include('laravel-livewire-tables::includes.pagination')
</div>
<x-title :title="$title" />
