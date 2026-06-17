@props([
    'title',
    'excerpt',
    'image',
    'date',
    'filterLabel',
    'url',
    'accentColor' => '#d7a63f',
])

<article class="flex h-full flex-col overflow-hidden rounded-[18px] border border-[#eef0f4] bg-white shadow-[0_10px_26px_rgba(15,23,42,0.08)]">
  <a href="{{ $url }}" class="relative block h-[180px] bg-cover bg-center no-underline" style="background-image: url('{{ $image }}');">
    <div class="absolute inset-0 bg-gradient-to-b from-[rgba(5,10,25,0.05)] to-[rgba(5,10,25,0.45)]"></div>
  </a>
  <div class="flex flex-1 flex-col border-t-[5px] p-5" style="border-top-color: {{ $accentColor }};">
    <div class="mb-3 flex items-center justify-between gap-3">
      <span class="text-[11px] font-black uppercase" style="color: {{ $accentColor }};">{{ $filterLabel }}</span>
      <time class="text-xs text-gray-400">{{ $date }}</time>
    </div>
    <h3 class="mb-2 text-lg font-black leading-snug text-slate-900">
      <a href="{{ $url }}" class="text-inherit no-underline hover:underline">{{ $title }}</a>
    </h3>
    <p class="mb-4 flex-1 text-sm leading-relaxed text-gray-500">{{ $excerpt }}</p>
    <a
      href="{{ $url }}"
      class="mt-auto inline-flex items-center text-sm font-extrabold no-underline transition hover:underline"
      style="color: {{ $accentColor }};"
    >
      Read more →
    </a>
  </div>
</article>
