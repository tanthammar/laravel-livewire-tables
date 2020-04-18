{{-- start tr --}}
@include('laravel-livewire-tables::includes._tr-logic', ['visibility' => 'sm:hidden'])

    {{-- left checkbox --}}
    @if($checkbox && $checkboxLocation === 'left')
        @include('laravel-livewire-tables::includes._checkbox-row')
    @endif
    
    {{-- start td --}}
    @include('laravel-livewire-tables::includes._td-logic')
        @foreach($columns as $column)
        <div class="w-full">

            {{-- label --}}
            <div class="italic text-gray-500 text-xs">
                {{ $column->text }}
            </div>

            {{-- field --}}
            <div>
                @include('laravel-livewire-tables::includes._cell')
            </div>
        </div>
        @endforeach
    </td>

    {{-- right checkbox --}}
    @if($checkbox && $checkboxLocation === 'right')
        @include('laravel-livewire-tables::includes._checkbox-row')
    @endif
</tr>