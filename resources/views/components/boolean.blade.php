<span @foreach ($attributes as $key=> $value)
    {{ $key }}="{{ $value }}"
    @endforeach
    >
    @php
        $value = $options['jsonKeyVal'] ? ($model->{$options['column']}[$options['key']] || false) :($model->{$options['column']} || false);
        $true_class = $options['icon']['true-class'] ? $options['icon']['true-class'] : 'text-green-500';
        $false_class = $options['icon']['false-class'] ? $options['icon']['false-class'] : 'text-red-500';
        $true = $options['icon']['true'] ? $options['icon']['true'] : 'solid/toggle-on';
        $false = $options['icon']['false'] ? $options['icon']['false'] : 'solid/toggle-off';
        $text = $options['text'] ?? '';
        if($value) {
            echo $true;
        } else {
            echo $false;
        }
        echo $text;
    @endphp
    @if($value)
        @svg($svg_true, "h-8 w-8 mx-2 inline-flex {$true_class}")
    @else
        @svg($svg_false, "h-8 w-8 mx-2 inline-flex {$false_class}")
    {{ $text }}
    @endif
</span>