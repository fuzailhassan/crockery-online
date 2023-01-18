@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-sm00']) }}>
    <a class="text-gray-700 dark:text-gray-400">
        {{ $value ?? $slot }}
    </a>
</label>
