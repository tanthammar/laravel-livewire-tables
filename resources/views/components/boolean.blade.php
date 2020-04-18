<span @foreach ($attributes as $key=> $value)
    {{ $key }}="{{ $value }}"
    @endforeach
    >
    @php
        $value = \Arr::has($options, 'jsonKeyVal') ? ($model->{$options['column']}[$options['key']] || false) : ($model->{$options['column']} || false);
        $true_class = \Arr::get($options, 'icon.true-class', 'text-green-500');
        $false_class = \Arr::get($options, 'icon.false-class', 'text-red-500');
        $true = \Arr::get($options, 'icon.true', 'solid/toggle-on');
        $false = \Arr::get($options, 'icon.false', 'solid/toggle-off');
        $text = \Arr::get($options, 'text', '');
    @endphp
    @if($value)
        @svg($true, "h-6 w-6 mx-2 inline-flex {$true_class}")
    @else
        @svg($false, "h-6 w-6 mx-2 inline-flex {$false_class}")
    @endif
    {{ $text }}
</span>