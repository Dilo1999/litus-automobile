<x-layout :title="$product->name ?? $product->title">
    @php
        $accent = '#c19b46';
        $accentHover = '#a8843a';
        $productName = $product->name ?? $product->title;
        $imageUrl = $product->image
            ? asset('storage/' . $product->image)
            : 'https://via.placeholder.com/800x800/f5f5f5/e5e5e5?text=No+Image';
        $inStock = (int) ($product->stock ?? 0) > 0;
        $categoryName = $product->category ?? null;
        $subCategoryName = $product->sub_category ?? null;
        $brandName = $product->brand ?? null;
    @endphp

    <div class="min-h-screen" style="background-color: #F4F4F4;">
        {{-- Hero (extends under nav so transparent nav shows cityscape) --}}
        <section class="relative text-stone-800 overflow-hidden min-h-[320px] md:min-h-[380px] lg:min-h-[440px]" style="margin-top: -4rem; padding-top: 4rem;">
            <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ asset('images/background/dubai-1-1536x1024.webp') }}');"></div>
            <div class="absolute inset-0" style="background: linear-gradient(to bottom, rgba(255,255,255,0.35) 0%, rgba(244,244,244,0.45) 100%);"></div>
            <div class="relative z-10 site-container py-12 md:py-16 lg:py-20 flex flex-col items-center justify-center text-center min-h-[320px] md:min-h-[380px] lg:min-h-[440px]">
                <div class="max-w-3xl product-hero-alt">
                    {{-- Eyebrow --}}
                    <div class="hero-eyebrow">
                        <span class="hero-eyebrow__line hero-eyebrow__line--left"></span>
                        <p class="hero-eyebrow__text">Product Details</p>
                        <span class="hero-eyebrow__line hero-eyebrow__line--right"></span>
                    </div>

                    {{-- Title --}}
                    <h1 class="hero-title-alt">
                        {{ $productName }}
                    </h1>

                    {{-- Ornament --}}
                    <div class="hero-ornament-alt">
                        <span class="hero-ornament__line"></span>
                        <svg width="18" height="18" viewBox="0 0 20 20" fill="none" class="hero-ornament__icon">
                            <path d="M10 2 L11.8 7.6 H17.6 L13.1 11 L14.9 16.6 L10 13.2 L5.1 16.6 L6.9 11 L2.4 7.6 H8.2 Z" fill="#c19b46"/>
                        </svg>
                        <span class="hero-ornament__line"></span>
                    </div>

                    {{-- Tags --}}
                    <div class="hero-tags-alt">
                        @if(!empty($categoryName))
                            <a href="{{ route('home', ['category' => [$categoryName]]) }}" class="product-tag group">
                                <span class="product-tag__icon">
                                    <svg class="h-4 w-4 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M4 6h16M4 12h10M4 18h6"/>
                                    </svg>
                                </span>
                                <span class="truncate product-tag__label">
                                    {{ $categoryName }}
                                    @if(!empty($subCategoryName))
                                        <span class="text-stone-500 font-medium">› {{ $subCategoryName }}</span>
                                    @endif
                                </span>
                            </a>
                        @endif

                        @if(!empty($brandName))
                            <span class="product-tag">
                                <span class="product-tag__icon">
                                    <svg class="h-4 w-4 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="3" width="18" height="18" rx="2"/>
                                        <path d="M9 9h6M9 13h6M9 17h4"/>
                                    </svg>
                                </span>
                                <span class="truncate product-tag__label">{{ $brandName }}</span>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        @if ($errors->any())
            <div class="site-container mt-4">
                <div class="rounded-xl bg-rose-50 border border-rose-200 px-4 py-3 text-sm text-rose-800">
                    <p class="font-medium">Please fix the following errors:</p>
                    <ul class="mt-1 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        {{-- Content (scroll target when opening from catalog) --}}
        <x-product-details
            :product="$product"
            :product-name="$productName"
            :image-url="$imageUrl"
            :in-stock="$inStock"
        />
    </div>

    <style>
        #open-quote-modal-product { background-color: {{ $accent }}; }
        #open-quote-modal-product:hover { background-color: {{ $accentHover }}; }

        .product-hero-alt {
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }
        .hero-eyebrow {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            margin-bottom: 0.85rem;
            opacity: 0;
            transform: translateY(10px);
            animation: heroFadeUp 0.6s cubic-bezier(0.22,1,0.36,1) 0.1s forwards;
        }
        .hero-eyebrow__line {
            height: 1px;
            width: 3rem;
            background: linear-gradient(to right, transparent, #c19b46);
            opacity: 0.7;
        }
        .hero-eyebrow__line--right {
            background: linear-gradient(to right, #c19b46, transparent);
        }
        .hero-eyebrow__text {
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.32em;
            text-transform: uppercase;
            color: #c19b46;
        }
        .hero-title-alt {
            font-family: 'Playfair Display', Georgia, serif;
            font-size: clamp(2.1rem, 5vw, 3.4rem);
            font-weight: 600;
            line-height: 1.08;
            color: #1a1a1a;
            text-shadow: 0 1px 10px rgba(255,255,255,0.4);
            max-width: 820px;
            margin: 0 auto;
            opacity: 0;
            transform: translateY(16px);
            animation: heroFadeUp 0.7s cubic-bezier(0.22,1,0.36,1) 0.22s forwards;
        }
        .hero-ornament-alt {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin: 1rem 0 1.25rem;
            opacity: 0;
            transform: scaleX(0.6);
            animation: heroScaleIn 0.6s cubic-bezier(0.22,1,0.36,1) 0.4s forwards;
        }
        .hero-ornament__line {
            height: 1px;
            width: 2.5rem;
            background: linear-gradient(to right, rgba(193,155,70,0.1), #c19b46, rgba(193,155,70,0.1));
        }
        .hero-ornament__icon {
            opacity: 0.9;
            filter: drop-shadow(0 0 10px rgba(193,155,70,0.4));
        }
        .hero-tags-alt {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            margin-top: 0.25rem;
            opacity: 0;
            transform: translateY(10px);
            animation: heroFadeUp 0.6s cubic-bezier(0.22,1,0.36,1) 0.55s forwards;
        }
        .product-tag {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            border-radius: 999px;
            padding: 0.35rem 1rem 0.35rem 0.4rem;
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #57534e;
            border: 1px solid rgba(193,155,70,0.55);
            background: linear-gradient(135deg, rgba(255,255,255,0.96) 0%, rgba(255,251,240,0.98) 100%);
            box-shadow: 0 2px 10px rgba(193,155,70,0.22);
            text-decoration: none;
            transition: background 0.25s, border-color 0.25s, transform 0.25s, box-shadow 0.25s;
        }
        .product-tag__label {
            max-width: 11rem;
        }
        .product-tag__icon {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 1.75rem;
            width: 1.75rem;
            border-radius: 999px;
            background: linear-gradient(135deg, #c19b46 0%, #a8843a 100%);
            box-shadow: inset 0 1px 0 rgba(255,255,255,0.35), 0 1px 3px rgba(0,0,0,0.16);
            flex-shrink: 0;
        }
        .product-tag svg {
            width: 0.9rem;
            height: 0.9rem;
            color: #ffffff;
        }
        .product-tag:hover {
            background: linear-gradient(135deg, rgba(255,255,255,1) 0%, rgba(255,252,243,1) 100%);
            border-color: rgba(193,155,70,0.9);
            transform: translateY(-2px);
            box-shadow: 0 6px 22px rgba(193,155,70,0.32);
        }

        @keyframes heroFadeUp {
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes heroScaleIn {
            to { opacity: 1; transform: scaleX(1); }
        }

        @media (max-width: 640px) {
            .hero-eyebrow__line {
                width: 2.25rem;
            }
            .hero-title-alt {
                font-size: clamp(1.7rem, 8vw, 2.4rem);
            }
            .product-tag__label {
                max-width: 9rem;
            }
        }
    </style>
</x-layout>

