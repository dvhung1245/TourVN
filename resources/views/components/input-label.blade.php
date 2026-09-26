@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-white/90 drop-shadow-sm']) }}>
    {{ $value ?? $slot }}
</label>
