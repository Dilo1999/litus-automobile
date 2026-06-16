@props([
    'testimonials' => [],
    'accentColor' => '#7c3aed',
])

@if(count($testimonials) > 0)
  <div
    class="testimonial-slider relative"
    data-testimonial-slider
    data-autoplay="5000"
    style="--testimonial-accent: {{ $accentColor }};"
  >
    <div class="overflow-hidden">
      <div
        class="testimonial-slider-track flex items-stretch transition-transform duration-700 ease-in-out"
        data-testimonial-track
      >
        @foreach($testimonials as $testimonial)
          <div
            class="testimonial-slider-slide flex w-full shrink-0 px-[11px] sm:w-1/2 lg:w-1/3"
            data-testimonial-slide
          >
            <x-ownership-hub.partials.testimonial-card
              :quote="$testimonial['quote']"
              :name="$testimonial['name']"
              :role="$testimonial['role']"
              :plan="$testimonial['plan']"
              :image="$testimonial['image']"
              :rating="$testimonial['rating'] ?? 5"
              :accent-color="$accentColor"
              :compact="true"
            />
          </div>
        @endforeach
      </div>
    </div>

  @if(count($testimonials) > 1)
    <div class="mt-6 flex items-center justify-center gap-2" data-testimonial-dots aria-hidden="true"></div>
  @endif
  </div>

  @once
    <script>
      (() => {
        const initSlider = (root) => {
          const track = root.querySelector('[data-testimonial-track]');
          const slides = Array.from(root.querySelectorAll('[data-testimonial-slide]'));
          const dotsWrap = root.querySelector('[data-testimonial-dots]');
          if (!track || slides.length === 0) return;

          let index = 0;
          let timer = null;
          let visible = 1;

          const getVisible = () => {
            if (window.matchMedia('(min-width: 1024px)').matches) return Math.min(3, slides.length);
            if (window.matchMedia('(min-width: 640px)').matches) return Math.min(2, slides.length);
            return 1;
          };

          const maxIndex = () => Math.max(0, slides.length - visible);

          const renderDots = () => {
            if (!dotsWrap) return;
            dotsWrap.innerHTML = '';
            const total = maxIndex() + 1;
            for (let i = 0; i < total; i++) {
              const dot = document.createElement('button');
              dot.type = 'button';
              dot.className = 'testimonial-slider-dot h-2.5 rounded-full transition-all duration-300';
              dot.style.backgroundColor = i === index ? 'var(--testimonial-accent)' : '#d1d5db';
              dot.style.width = i === index ? '1.75rem' : '0.625rem';
              dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
              dot.addEventListener('click', () => {
                index = i;
                update();
                restart();
              });
              dotsWrap.appendChild(dot);
            }
          };

          const update = () => {
            visible = getVisible();
            if (index > maxIndex()) index = 0;
            const slide = slides[0];
            const slideWidth = slide ? slide.getBoundingClientRect().width : 0;
            track.style.transform = `translateX(-${index * slideWidth}px)`;
            renderDots();
          };

          const next = () => {
            index = index >= maxIndex() ? 0 : index + 1;
            update();
          };

          const restart = () => {
            if (timer) clearInterval(timer);
            const delay = parseInt(root.dataset.autoplay || '5000', 10);
            if (slides.length > visible) {
              timer = setInterval(next, delay);
            }
          };

          root.addEventListener('mouseenter', () => timer && clearInterval(timer));
          root.addEventListener('mouseleave', restart);
          window.addEventListener('resize', () => {
            update();
            restart();
          });

          update();
          restart();
        };

        document.querySelectorAll('[data-testimonial-slider]').forEach(initSlider);
      })();
    </script>
  @endonce
@endif
