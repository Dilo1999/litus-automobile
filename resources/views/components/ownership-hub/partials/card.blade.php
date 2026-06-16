@props([
    'label',
    'title',
    'description',
    'image',
    'items' => [],
    'btnText',
    'url',
    'accentColor' => '#d7a63f',
    'cardBg' => 'bg-white',
])

<article @class([
  'flex h-full flex-col overflow-hidden rounded-[18px] border border-[#eef0f4] shadow-[0_10px_26px_rgba(15,23,42,0.08)]',
  'bg-gray-50' => $cardBg === 'bg-gray-50',
  'bg-white' => $cardBg !== 'bg-gray-50',
])>
  <div class="relative h-[210px] bg-cover bg-center" style="background-image: url('{{ $image }}');">
    <div class="absolute inset-0 bg-gradient-to-b from-[rgba(5,10,25,0.05)] to-[rgba(5,10,25,0.45)]"></div>
  </div>
  <div class="flex flex-1 flex-col border-t-[5px] p-6" style="border-top-color: {{ $accentColor }};">
    <span class="mb-2 text-xs font-black uppercase" style="color: {{ $accentColor }};">{{ $label }}</span>
    <h3 class="mb-2.5 text-[23px] font-black leading-tight text-slate-900">{{ $title }}</h3>
    <p class="mb-4 text-[15px] text-gray-500">{{ $description }}</p>
    @if(count($items) > 0)
      <ul class="mb-5 grid gap-2 text-sm text-gray-700">
        @foreach($items as $item)
          <li class="flex items-start gap-2">
            <span class="mt-0.5 font-black" style="color: {{ $accentColor }};">✓</span>
            <span>{{ $item }}</span>
          </li>
        @endforeach
      </ul>
    @endif
    <a
      href="{{ $url }}"
      class="mt-auto inline-flex items-center justify-center rounded-lg px-[18px] py-3 text-sm font-extrabold text-white no-underline transition hover:-translate-y-px hover:brightness-95"
      style="background-color: {{ $accentColor }};"
    >
      {{ $btnText }}
    </a>
  </div>
</article>
