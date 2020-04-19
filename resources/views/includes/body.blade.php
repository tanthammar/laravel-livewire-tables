<tbody class="{{ $tbodyClass }}">
{{-- custom tbody --}}
        @if(isset($tbody)) @include($tbody) @else

                {{-- desktop view --}}
                @foreach ($models as $model)
                    @if(isset($tbodyDesktop)) @include($tbodyDesktop) @else
                    @include('laravel-livewire-tables::includes.tbody-desktop')
                    @endif
                @endforeach
            
                {{-- mobile view --}}
                @foreach ($models as $model)
                    @if(isset($tbodyMobile)) @include($tbodyMobile) @else
                    @include('laravel-livewire-tables::includes.tbody-mobile')
                    @endif
                @endforeach
        @endif
</tbody>