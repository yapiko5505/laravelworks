@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach

        @if(empty($errors->first('file')))
            <li>ファイルがあれば、再度選択してください。</li>
        @endif
    </ul>
    
@endif
