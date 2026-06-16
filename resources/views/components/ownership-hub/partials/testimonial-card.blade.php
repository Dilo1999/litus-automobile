@props([
    'quote',
    'name',
    'role' => '',
    'plan' => '',
    'image' => null,
    'rating' => 5,
    'accentColor' => '#7c3aed',
    'compact' => false,
])

@php
    $rating = max(1, min(5, (int) $rating));
    $starColor = $rating >= 4 ? $accentColor : '#9ca3af';
@endphp

<article @class([
    'flex h-full w-full flex-col overflow-hidden rounded-[18px] border border-[#eef0f4] bg-white shadow-[0_10px_26px_rgba(15,23,42,0.08)]',
    'h-[212px] p-5' => $compact,
    'p-6 md:p-7' => ! $compact,
])>
  <div @class(['mb-4 flex gap-1', 'mb-3' => $compact]) aria-label="{{ $rating }} out of 5 stars">
    @for($i = 1; $i <= 5; $i++)
      <svg
        @class([
            $compact ? 'h-3.5 w-3.5' : 'h-4 w-4',
            'opacity-25' => $i > $rating,
        ])
        style="color: {{ $starColor }};"
        fill="currentColor"
        viewBox="0 0 20 20"
        aria-hidden="true"
      >
        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
      </svg>
    @endfor
  </div>

  <blockquote @class([
      'flex-1 text-gray-600',
      'mb-4 line-clamp-3 text-[14px] leading-snug' => $compact,
      'mb-6 text-[15px] leading-relaxed' => ! $compact,
  ])>
    <span @class([
        'font-black leading-none',
        'text-xl' => $compact,
        'text-2xl' => ! $compact,
    ]) style="color: {{ $accentColor }};">&ldquo;</span>
    {{ $quote }}
  </blockquote>

  <div @class([
      'mt-auto flex items-center gap-3 border-t border-gray-100',
      'pt-3.5' => $compact,
      'pt-5' => ! $compact,
  ])>
    @if($image)
      <img
        src="{{ $image }}"
        alt="{{ $name }}"
        @class(['shrink-0 rounded-full object-cover', 'h-10 w-10' => $compact, 'h-12 w-12' => ! $compact])
      >
    @else
      <div
        @class([
            'flex shrink-0 items-center justify-center rounded-full font-black text-white',
            'h-10 w-10 text-xs' => $compact,
            'h-12 w-12 text-sm' => ! $compact,
        ])
        style="background-color: {{ $accentColor }};"
      >
        {{ strtoupper(substr($name, 0, 1)) }}
      </div>
    @endif
    <div class="min-w-0">
      <p @class(['font-black text-slate-900', 'truncate text-[13px]' => $compact, 'text-sm' => ! $compact])>{{ $name }}</p>
      @if($role)
        <p @class(['text-gray-500', 'truncate text-[11px]' => $compact, 'text-xs' => ! $compact])>{{ $role }}</p>
      @endif
      @if($plan)
        <p @class(['font-semibold text-gray-400', 'mt-0.5 truncate text-[11px]' => $compact, 'mt-0.5 text-xs' => ! $compact])>{{ $plan }}</p>
      @endif
    </div>
  </div>
</article>
