<tbody class="{{ $tbodyClass }}">
{{-- custom tbody --}}
        @if(isset($tbody)) @include($tbody) @else
            @if(isset($tbodyDesktop)) @include($tbodyDesktop) @else
                {{-- desktop view --}}
                @foreach ($models as $model)
                    @include('laravel-livewire-tables::includes.tbody-desktop')
                @endforeach
            @endif
            @if(isset($tbodyMobile)) @include($tbodyMobile) @else
                {{-- mobile view --}}
                @foreach ($models as $model)
                    @include('laravel-livewire-tables::includes.tbody-mobile')
                @endforeach
            @endif
        @endif
</tbody>