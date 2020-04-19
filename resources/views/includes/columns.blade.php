<tr class="{{ $trClass }}">
@if(isset($customHead))
{{-- custom thead replaces fields loop --}}
{{ $customHead }}
@else

@if($checkbox && $checkboxLocation === 'left')
    @include('laravel-livewire-tables::includes.checkbox-all')
@endif

@if($grouped)
    {{-- grouped cell --}}
    @foreach($groups as $group)
        <th class="{{ $thClass }}" colspan="{{ $group->pluck('colspan')[0] ?? 1 }}">
            @foreach ($group as $column)
            @if (!$column->hideOnDesktop)
            <div class="w-full {{ $column->align }}">
                @include('laravel-livewire-tables::includes.th-link')
            </div> 
            @endif
            @endforeach
        </th>
    @endforeach
@else
    {{-- single cell --}}
    @foreach($columns as $column)
        <th class="{{ $thClass }}" colspan="{{ $column->thColspan }}">
            @include('laravel-livewire-tables::includes.th-link')
        </th>
    @endforeach
@endif

{{-- extra slot for additional th after looped fields --}}
{{ isset($thead) ? $thead : null }}

@if($checkbox && $checkboxLocation === 'right')
    @include('laravel-livewire-tables::includes.checkbox-all')
@endif

@if($arrow)
    <th class="{{ $thClass }}"></th>
@endif
@endif
</tr>
