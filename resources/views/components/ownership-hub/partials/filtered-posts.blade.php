@props([
    'filters' => [],
    'posts' => [],
    'accentColor' => '#d7a63f',
    'softColor' => '#f8efd9',
    'allLabel' => 'All',
    'ariaLabel' => 'Filter posts',
])

@if(count($posts) > 0)
  <div data-hub-filter-root style="--hub-filter-accent: {{ $accentColor }}; --hub-filter-soft: {{ $softColor }};">
    <div class="mb-6 flex flex-wrap items-center gap-2.5" role="tablist" aria-label="{{ $ariaLabel }}">
      <button
        type="button"
        data-hub-filter="all"
        class="hub-filter-btn is-active inline-flex items-center justify-center rounded-full px-4 py-2.5 text-xs font-extrabold uppercase tracking-wide transition md:text-[13px]"
      >
        {{ $allLabel }}
      </button>
      @foreach($filters as $filter)
        <button
          type="button"
          data-hub-filter="{{ $filter['filter_key'] }}"
          class="hub-filter-btn inline-flex items-center justify-center rounded-full px-4 py-2.5 text-xs font-extrabold uppercase tracking-wide transition md:text-[13px]"
        >
          {{ $filter['title'] }}
        </button>
      @endforeach
    </div>

    <div class="grid grid-cols-1 gap-[22px] sm:grid-cols-2 lg:grid-cols-3" data-hub-posts>
      @foreach($posts as $post)
        <div data-hub-post="{{ $post['filter'] }}">
          <x-ownership-hub.partials.blog-post-card
            :title="$post['title']"
            :excerpt="$post['excerpt']"
            :image="$post['image']"
            :date="$post['date']"
            :filter-label="$post['filter_label']"
            :url="$post['url']"
            :accent-color="$accentColor"
          />
        </div>
      @endforeach
    </div>

    <p
      data-hub-empty
      class="hidden rounded-[18px] border border-dashed border-[#e5e7eb] bg-white px-6 py-10 text-center text-sm text-gray-500"
    >
      No posts found for this category yet.
    </p>
  </div>
@endif
