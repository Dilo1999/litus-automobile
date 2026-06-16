@php
    $size = 'w-12 h-12 sm:w-14 sm:h-14';
@endphp

@switch($icon)
    @case('body')
        <svg class="{{ $size }}" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
            <circle cx="18" cy="44" r="8"/>
            <circle cx="46" cy="44" r="8"/>
            <path d="M12 44h8M44 44h8M20 36h24l4-10H16l4 10zM28 26h8l2-8H26l2 8z"/>
        </svg>
        @break
    @case('engine')
        <svg class="{{ $size }}" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
            <path d="M18 46l10-10M36 28l10-10M28 36L46 18"/>
            <path d="M14 50l-4-4 8-8 4 4-8 8zM50 14l4 4-8 8-4-4 8-8z"/>
        </svg>
        @break
    @case('braking')
        <svg class="{{ $size }}" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
            <circle cx="32" cy="32" r="18"/>
            <circle cx="32" cy="32" r="8"/>
            <path d="M32 14v6M32 44v6M14 32h6M44 32h6"/>
        </svg>
        @break
    @case('electrical')
        <svg class="{{ $size }}" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
            <rect x="16" y="20" width="32" height="28" rx="4"/>
            <path d="M24 28h16M24 36h10M24 40h14"/>
            <path d="M32 12v8M28 16h8"/>
        </svg>
        @break
    @case('chassis')
        <svg class="{{ $size }}" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
            <rect x="28" y="10" width="8" height="16" rx="2"/>
            <path d="M20 26h24v22H20z"/>
            <path d="M24 48v6M40 48v6"/>
        </svg>
        @break
    @case('wheels')
        <svg class="{{ $size }}" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true">
            <circle cx="32" cy="32" r="18"/>
            <circle cx="32" cy="32" r="6"/>
            <path d="M32 14v36M14 32h36M19 19l26 26M45 19L19 45"/>
        </svg>
        @break
@endswitch
