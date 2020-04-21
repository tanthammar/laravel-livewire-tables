<div class="{{ $tbodyClass }}" dusk="tbody">
    @foreach ($models as $model)
        {{-- custom tbody --}}
        @if(isset($tbody)) @include($tbody) @else
            @if($hasRowPanel)
                <div 
                dusk="tr" 
                class="cursor-pointer {{ $trClass }}" 
                wire:key="{{ $model->uuid }}" 
                wire:click.stop="selectModel('{{ $model->uuid }}')">
            @else
                <div 
                dusk="tr" 
                x-on:click.stop="window.location.href='{{route("app.{$modelName}s.show", [$modelName => $model->{$model->getRouteKeyName()}])}}'"
                class="cursor-pointer {{ $trClass }}" 
                wire:key="{{ $model->{$model->getRouteKeyName()} }}">
            @endif
                {{-- default view --}}
                @if(empty($tbodyDesktop) && empty($tbodyMobile))
                    @include('laravel-livewire-tables::includes.body-tr')

                {{-- custom desktop view --}}
                @elseif(filled($tbodyDesktop) && empty($tbodyMobile))
                        <span class="hidden md:display-contents">@include($tbodyDesktop)</span>
                        <span class="display-contents md:hidden">@include('laravel-livewire-tables::includes.body-tr')</span>

                {{-- custom mobile view --}}
                @elseif(empty($tbodyDesktop) && filled($tbodyMobile))
                        <span class="display-contents md:hidden">@include($tbodyMobile)</span>
                        <span class="hidden md:display-contents">@include('laravel-livewire-tables::includes.body-tr')</span>
                @endif
            </div>
            @if($hasRowPanel && $selectedID == $model->uuid)
            <div class="display-block full-width">
                {{-- <td colspan="{{ count(array_dot($groups), COUNT_RECURSIVE) }}"> --}}
                    @include($rowPanel)
                {{-- </td> --}}
            </div>
            @endif
        @endif
    @endforeach
</div>