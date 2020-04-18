<tbody class="{{ $tbodyClass }}">
    @if($models->isEmpty())
        <tr class="{{ $trClass }}">
            <td class="{{ $tdClass }}" colspan="{{ collect($columns)->count() }}">{{ $noResultsMessage }}</td>
        </tr>
    @else
        {{-- custom tbody --}}
        @if(isset($tbody)) {{$tbody}} @else
            {{-- custom desktop view --}}
            @if(isset($tbodyDesktop)) {{$tbodyDesktop}} @else
                @foreach($models as $model)
                    {{-- desktop view --}}
                    @include('laravel-livewire-tables::includes._tbody-desktop')
                @endforeach
            @endif
            {{-- custom mobile view --}}
            @if(isset($tbodyMobile)) {{$tbodyMobile}} @else
                @foreach($models as $model)
                    {{-- mobile view --}}
                    @include('laravel-livewire-tables::includes._tbody-mobile')
                @endforeach
            @endif
        @endif
    @endif
</tbody>