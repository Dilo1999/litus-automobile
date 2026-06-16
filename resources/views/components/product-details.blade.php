@props([
    'product',
    'productName' => '',
    'imageUrl' => '',
    'inStock' => false,
])

<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap');
    
    :root {
        --color-dark: #1a1a1a;
        --color-gold: #c19b46;
        --color-gold-dim: #a8843a;
        --color-cream: #1a1a1a;
        --color-gray: #57534e;
        --color-light: #fafaf9;
        --font-serif: 'Playfair Display', serif;
        --font-sans: 'Inter', sans-serif;
    }
    
    * {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    
    .product-wrapper {
        font-family: var(--font-sans);
        background: #F4F4F4;
        min-height: 100vh;
    }
    
    /* Image Section */
    .image-section {
        background: #FFFFFF;
        border: 1px solid #e7e5e4;
        border-radius: 0;
        padding: 4rem;
        animation: fadeIn 0.8s ease-out;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        transition: box-shadow 0.4s ease, border-color 0.4s ease, transform 0.4s ease;
        overflow: hidden;
    }

    .image-section:hover {
        box-shadow: 0 28px 70px rgba(0, 0, 0, 0.18), 0 10px 28px rgba(193, 155, 70, 0.22);
        border-color: rgba(193, 155, 70, 0.6);
        transform: translateY(-6px);
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    .image-container {
        aspect-ratio: 1;
        background: #FFFFFF;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }
    
    .product-image {
        max-width: 95%;
        max-height: 95%;
        object-fit: contain;
        filter: none;
        transition: none;
    }
    
    /* Description Section */
    .description-section {
        background: #FFFFFF;
        border: 1px solid #e7e5e4;
        padding: 3rem;
        animation: fadeIn 0.8s ease-out 0.1s both;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
        position: relative;
        overflow: hidden;
    }
    
    .description-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, transparent, var(--color-gold) 50%, transparent);
        opacity: 0.6;
    }
    
    .section-heading {
        font-family: var(--font-serif);
        font-size: 1.75rem;
        font-weight: 600;
        color: var(--color-cream);
        margin-bottom: 2rem;
        letter-spacing: -0.01em;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }
    
    .section-heading::before {
        content: '';
        width: 4px;
        height: 28px;
        background: var(--color-gold);
        border-radius: 2px;
    }
    
    .description-text {
        font-size: 1rem;
        line-height: 1.8;
        color: var(--color-gray);
        font-weight: 300;
    }
    
    .description-intro {
        background: linear-gradient(135deg, rgba(193, 155, 70, 0.08), rgba(193, 155, 70, 0.02));
        border-left: 3px solid var(--color-gold);
        padding: 1.5rem 1.75rem;
        margin-bottom: 2.5rem;
        border-radius: 0 4px 4px 0;
        position: relative;
    }
    
    .description-intro::after {
        content: '✦';
        position: absolute;
        top: 1.5rem;
        right: 1.75rem;
        color: var(--color-gold);
        opacity: 0.3;
        font-size: 1.5rem;
    }
    
    .intro-title {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 1.05rem;
        font-weight: 600;
        color: var(--color-dark);
        margin-bottom: 0.75rem;
    }
    
    .intro-title svg {
        color: var(--color-gold);
        width: 20px;
        height: 20px;
        flex-shrink: 0;
    }
    
    .intro-subtitle {
        font-size: 0.9rem;
        color: var(--color-gray);
        line-height: 1.6;
    }
    
    .specs-list {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.25rem;
        margin-bottom: 2rem;
    }
    
    .spec-item {
        display: grid;
        grid-template-columns: auto 1fr;
        gap: 1rem;
        align-items: start;
        padding: 1.25rem;
        background: #fafaf9;
        border: 1px solid #f5f5f4;
        border-radius: 4px;
        transition: all 0.3s ease;
    }
    
    .spec-item:hover {
        background: rgba(193, 155, 70, 0.05);
        border-color: rgba(193, 155, 70, 0.2);
        transform: translateX(4px);
    }
    
    .spec-icon {
        width: 40px;
        height: 40px;
        background: white;
        border: 1.5px solid rgba(193, 155, 70, 0.25);
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    
    .spec-icon svg {
        width: 20px;
        height: 20px;
        color: var(--color-gold);
    }
    
    .spec-content {
        display: flex;
        flex-direction: column;
        gap: 0.35rem;
    }
    
    .spec-label {
        font-size: 0.8rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        color: var(--color-gold);
    }
    
    .spec-value {
        font-size: 0.95rem;
        color: var(--color-dark);
        line-height: 1.6;
        font-weight: 400;
    }
    
    .description-highlight {
        background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        border: 1px solid rgba(193, 155, 70, 0.3);
        border-radius: 4px;
        padding: 1.75rem;
        margin-top: 2rem;
        position: relative;
        overflow: hidden;
    }
    
    .description-highlight::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--color-gold), transparent);
    }
    
    .description-highlight::after {
        content: '';
        position: absolute;
        bottom: -50%;
        right: -10%;
        width: 200px;
        height: 200px;
        background: radial-gradient(circle, rgba(193, 155, 70, 0.15), transparent);
        border-radius: 50%;
    }
    
    .highlight-content {
        display: flex;
        align-items: start;
        gap: 1rem;
        position: relative;
        z-index: 1;
    }
    
    .highlight-icon {
        width: 44px;
        height: 44px;
        background: rgba(193, 155, 70, 0.2);
        border: 1.5px solid rgba(193, 155, 70, 0.4);
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    
    .highlight-icon svg {
        width: 22px;
        height: 22px;
        color: var(--color-gold);
    }
    
    .highlight-text {
        flex: 1;
    }
    
    .highlight-text p {
        font-size: 0.95rem;
        line-height: 1.7;
        color: #e7e5e4;
        margin: 0;
    }
    
    /* Features Grid */
    .features-grid {
        margin-top: 2.5rem;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.25rem;
    }
    
    .feature-box {
        background: #F4F4F4;
        border: 1px solid #e7e5e4;
        padding: 1.75rem;
        transition: all 0.3s ease;
    }
    
    .feature-box:hover {
        background: rgba(193, 155, 70, 0.08);
        border-color: rgba(193, 155, 70, 0.25);
        transform: translateY(-2px);
    }
    
    .feature-icon {
        width: 40px;
        height: 40px;
        background: rgba(193, 155, 70, 0.12);
        border: 1px solid rgba(193, 155, 70, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1rem;
    }
    
    .feature-icon svg {
        color: var(--color-gold);
        width: 20px;
        height: 20px;
    }
    
    .feature-title {
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--color-cream);
        margin-bottom: 0.4rem;
    }
    
    .feature-desc {
        font-size: 0.8rem;
        color: var(--color-gray);
        line-height: 1.5;
    }
    
    /* Sidebar */
    .sidebar {
        animation: fadeIn 0.8s ease-out 0.2s both;
    }
    
    .sidebar-card {
        background: #FFFFFF;
        border: 1px solid #e7e5e4;
        padding: 2.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    }
    
    /* Top Gold Line */
    .sidebar-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(to right, transparent, var(--color-gold), transparent);
    }
    
    .availability-label {
        font-size: 0.7rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.15em;
        color: var(--color-gold);
        margin-bottom: 0.75rem;
        display: block;
    }
    
    .stock-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.6rem;
        padding: 0.65rem 1.25rem;
        font-size: 0.8rem;
        font-weight: 600;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        margin-bottom: 2rem;
    }
    
    .stock-badge.in-stock {
        background: rgba(16, 185, 129, 0.1);
        color: #059669;
        border: 1px solid rgba(5, 150, 105, 0.3);
    }
    
    .stock-badge.out-of-stock {
        background: rgba(239, 68, 68, 0.1);
        color: #dc2626;
        border: 1px solid rgba(220, 38, 38, 0.3);
    }
    
    .status-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        animation: pulse 2s ease-in-out infinite;
    }
    
    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.5; }
    }
    
    .stock-badge.in-stock .status-dot {
        background: #10b981;
        box-shadow: 0 0 10px #10b981;
    }
    
    .stock-badge.out-of-stock .status-dot {
        background: #ef4444;
        box-shadow: 0 0 10px #ef4444;
    }
    
    /* Feature List */
    .feature-list {
        margin-bottom: 2rem;
    }
    
    .feature-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem 0;
        border-bottom: 1px solid #e7e5e4;
        transition: all 0.3s ease;
    }
    
    .feature-item:last-child {
        border-bottom: none;
    }
    
    .feature-item:hover {
        padding-left: 0.5rem;
    }
    
    .feature-item svg {
        color: var(--color-gold);
        flex-shrink: 0;
        width: 18px;
        height: 18px;
    }
    
    .feature-item span {
        font-size: 0.9rem;
        color: var(--color-gray);
        font-weight: 400;
    }
    
    /* Quote Button */
    .quote-button {
        width: 100%;
        background: #E9C068;
        color: var(--color-dark);
        font-weight: 600;
        font-size: 0.85rem;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        padding: 1rem 2rem;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-bottom: 2rem;
    }
    
    .quote-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(233, 192, 104, 0.4);
    }
    
    /* Bottom Note */
    .bottom-note {
        padding-top: 2rem;
        border-top: 1px solid #e7e5e4;
    }
    
    .note-text {
        font-size: 0.85rem;
        line-height: 1.6;
        color: var(--color-gray);
        font-weight: 300;
    }
    
    /* Responsive */
    @media (max-width: 1024px) {
        .section-heading {
            font-size: 1.5rem;
        }
        
        .image-section,
        .description-section,
        .sidebar-card {
            padding: 2rem;
        }
        
        .spec-item {
            grid-template-columns: auto 1fr;
            gap: 0.875rem;
        }
    }
    
    @media (max-width: 768px) {
        .image-section {
            padding: 2rem;
        }
        
        .features-grid {
            grid-template-columns: 1fr;
        }
        
        .description-intro {
            padding: 1.25rem 1.5rem;
        }
        
        .spec-item {
            padding: 1rem;
        }
        
        .spec-icon {
            width: 36px;
            height: 36px;
        }
        
        .spec-icon svg {
            width: 18px;
            height: 18px;
        }
    }
    
    @media (max-width: 640px) {
        .section-heading {
            font-size: 1.35rem;
        }
        
        .section-heading::before {
            height: 24px;
        }
        
        .image-section,
        .description-section,
        .sidebar-card {
            padding: 1.5rem;
        }
        
        .description-intro {
            padding: 1rem 1.25rem;
        }
        
        .intro-title {
            font-size: 0.95rem;
        }
        
        .intro-subtitle {
            font-size: 0.85rem;
        }
        
        /* Display specs as 2 columns on mobile */
        .specs-list {
            grid-template-columns: repeat(2, 1fr);
            gap: 0.75rem;
        }
        
        .spec-item {
            padding: 0.875rem;
            grid-template-columns: 1fr;
            gap: 0.5rem;
            text-align: center;
        }
        
        .spec-icon {
            margin: 0 auto 0.5rem;
        }
        
        .spec-label {
            font-size: 0.7rem;
        }
        
        .spec-value {
            font-size: 0.8rem;
        }
        
        .description-highlight {
            padding: 1.25rem;
        }
        
        .highlight-icon {
            width: 38px;
            height: 38px;
        }
        
        .highlight-icon svg {
            width: 20px;
            height: 20px;
        }
        
        .highlight-text p {
            font-size: 0.875rem;
        }
    }
</style>

<section class="product-wrapper py-12 md:py-16">
    <div class="site-container">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 md:gap-10 items-start">
            
            {{-- Left: Image & Details --}}
            <div class="lg:col-span-7 space-y-8">
                
                {{-- Product Image --}}
                <div class="image-section">
                    <div class="image-container">
                        <img
                            src="{{ $imageUrl }}"
                            alt="{{ $productName }}"
                            class="product-image"
                            loading="lazy"
                            decoding="async"
                        >
                    </div>
                </div>

                {{-- Description --}}
                <div class="description-section">
                    <h2 class="section-heading">Description</h2>
                    
                    @if($product->description)
                        @php
                            $description = $product->description;
                            $lines = array_filter(array_map('trim', explode("\n", $description)));
                            
                            // Extract product title/intro if first line is short and doesn't contain colon
                            $firstLine = reset($lines);
                            $hasTitle = strlen($firstLine) < 150 && !str_contains($firstLine, ':');
                            $productTitle = $hasTitle ? array_shift($lines) : null;
                            
                            // Parse specs (lines with colons) and other content
                            $specs = [];
                            $regularContent = [];
                            
                            foreach ($lines as $line) {
                                if (str_contains($line, ':')) {
                                    $parts = explode(':', $line, 2);
                                    if (count($parts) === 2 && strlen(trim($parts[0])) > 0) {
                                        $specs[] = [
                                            'label' => trim($parts[0]),
                                            'value' => trim($parts[1])
                                        ];
                                    }
                                } elseif (strlen($line) > 10) {
                                    $regularContent[] = $line;
                                }
                            }
                        @endphp
                        
                        {{-- Product Title/Intro --}}
                        @if($productTitle)
                            <div class="description-intro">
                                <div class="intro-title">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                                    </svg>
                                    {{ $productTitle }}
                                </div>
                            </div>
                        @endif
                        
                        {{-- Specifications List (Generic for all products) --}}
                        @if(count($specs) > 0)
                            <div class="specs-list">
                                @foreach($specs as $spec)
                                    <div class="spec-item">
                                        <div class="spec-icon">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <div class="spec-content">
                                            <div class="spec-label">{{ $spec['label'] }}</div>
                                            <div class="spec-value">{{ $spec['value'] }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        
                        {{-- Regular Content (paragraphs, bullet points, etc.) --}}
                        @if(count($regularContent) > 0)
                            <div class="description-text" style="margin-top: {{ count($specs) > 0 ? '2rem' : '0' }}">
                                @foreach($regularContent as $content)
                                    <p style="margin-bottom: 1rem; line-height: 1.8;">{{ $content }}</p>
                                @endforeach
                            </div>
                        @endif
                        
                        {{-- Fallback: Display full description as-is if no structure detected --}}
                        @if(count($specs) === 0 && count($regularContent) === 0 && !$productTitle)
                            <div class="description-text">
                                {!! nl2br(e($description)) !!}
                            </div>
                        @endif
                        
                    @else
                        <div class="description-intro">
                            <div class="intro-title">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                No Description Available
                            </div>
                            <div class="intro-subtitle">
                                No detailed description is available for this product yet. Please contact us for more information about specifications, features, and availability.
                            </div>
                        </div>
                    @endif

                    <div class="features-grid">
                        <div class="feature-box">
                            <div class="feature-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                                </svg>
                            </div>
                            <div class="feature-title">Quality sourcing</div>
                            <div class="feature-desc">Trusted supply for bulk orders</div>
                        </div>

                        <div class="feature-box">
                            <div class="feature-icon">
                                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                            <div class="feature-title">Fast response</div>
                            <div class="feature-desc">Get a quote quickly from our team</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right: Sidebar --}}
            <aside class="lg:col-span-5 lg:sticky lg:top-24 sidebar">
                <div class="sidebar-card relative">
                    <div>
                        <span class="availability-label">Availability</span>
                        <div class="stock-badge {{ $inStock ? 'in-stock' : 'out-of-stock' }}">
                            <span class="status-dot"></span>
                            {{ $inStock ? 'In Stock' : 'Out of Stock' }}
                        </div>
                    </div>

                    <div class="feature-list">
                        <div class="feature-item">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V7a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v6m16 0v4a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-4m16 0H4"/>
                            </svg>
                            <span>Bulk orders supported</span>
                        </div>
                        <div class="feature-item">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6M7 20h10a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H9l-2 2H7a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2z"/>
                            </svg>
                            <span>Invoice & documentation available</span>
                        </div>
                        <div class="feature-item">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span>Quick turnaround on quotes</span>
                        </div>
                    </div>

                    <button
                        type="button"
                        id="open-quote-modal-product"
                        class="quote-button"
                    >
                        Get a Free Quote
                    </button>

                    <div class="bottom-note">
                        <p class="note-text">
                            Need a custom price for volume? Request a quote and we'll get back with availability and the best offer.
                        </p>
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>

<x-product-quote-modal
    :product-name="$productName"
    open-button-id="open-quote-modal-product"
    modal-id="quote-modal-product"
    close-button-id="close-quote-modal-product"
    external-trigger="true"
/>