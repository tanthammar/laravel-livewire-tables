{{-- start tr --}}
@include('laravel-livewire-tables::includes._tr-logic', ['visibility' => 'hidden sm:table-row'])
    {{-- left checkbox --}}
    @if($checkbox && $checkboxLocation === 'left')
        @include('laravel-livewire-tables::includes._checkbox-row')
    @endif

    @foreach($columns as $column)
        {{-- start td --}}
        @include('laravel-livewire-tables::includes._td-logic')
        {{-- field --}}
            @include('laravel-livewire-tables::includes._cell')
        </td>
    @endforeach

    {{-- right checkbox --}}
    @if($checkbox && $checkboxLocation === 'right')
        @include('laravel-livewire-tables::includes._checkbox-row')
    @endif
</tr>