@php
    $size = 'w-8 h-8 sm:w-9 sm:h-9';
@endphp

@switch($icon)
    @case('periodic')
        <svg class="{{ $size }}" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
            <rect x="12" y="14" width="40" height="36" rx="4"/>
            <path d="M22 10v8M42 10v8M12 26h40"/>
            <path d="M22 36l6 6 14-14"/>
        </svg>
        @break
    @case('accident')
        <svg class="{{ $size }}" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
            <circle cx="18" cy="44" r="7"/>
            <circle cx="46" cy="44" r="7"/>
            <path d="M14 44h8M42 44h8M20 34h24l4-10H16l4 10z"/>
            <path d="M38 18l6 6M44 18l-6 6"/>
        </svg>
        @break
    @case('overhaul')
        <svg class="{{ $size }}" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
            <path d="M18 46l10-10M36 28l10-10"/>
            <path d="M14 50l-4-4 8-8 4 4-8 8zM50 14l4 4-8 8-4-4 8-8z"/>
        </svg>
        @break
    @case('irregular')
        <svg class="{{ $size }}" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
            <circle cx="18" cy="44" r="7"/>
            <circle cx="46" cy="44" r="7"/>
            <path d="M14 44h8M42 44h8M20 34h24l4-10H16l4 10zM28 24h8l2-8H26l2 8z"/>
        </svg>
        @break
@endswitch
