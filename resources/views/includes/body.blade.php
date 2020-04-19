<tbody class="{{ $tbodyClass }}">
{{-- custom tbody --}}
        @if(isset($tbody)) @include($tbody) @else
            {{-- custom desktop view --}}
            @if(isset($tbodyDesktop)) 
                @each($tbodyDesktop, $models, 'model', 'view.empty') 
            @else
                @each('laravel-livewire-tables::includes.tbody-desktop', $models, 'model', 'view.empty')
            @endif
            {{-- custom mobile view --}}
            @if(isset($tbodyMobile)) 
                @each($tbodyMobile, $models, 'model', 'view.empty') 
            @else
                @each('laravel-livewire-tables::includes.tbody-mobile', $models, 'model', 'view.empty')
            @endif
        @endif
</tbody>