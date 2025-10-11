@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li class="text-danger" style="font-size: 14px; padding: 0 10px;">{{ $message }}</li>
        @endforeach
    </ul>
@endif
