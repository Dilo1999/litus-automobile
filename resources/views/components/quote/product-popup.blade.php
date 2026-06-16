@props([
    'modalId' => 'product-quote-modal',
    'closeButtonId' => 'close-product-quote-modal',
    'productName' => null,
    'backgroundImage' => null,
])


<div
    id="{{ $modalId }}"
    class="quote-popup quote-popup-wrapper fixed inset-0 z-[9999] hidden flex items-center justify-center p-4 overflow-y-auto bg-black/40 quote-popup-backdrop"
    aria-hidden="true"
>
    @if($backgroundImage)
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ $backgroundImage }}');"></div>
        <div class="absolute inset-0 bg-black/75 backdrop-blur-sm"></div>
    @endif

    <div class="quote-popup-container relative w-full max-w-xl mx-auto my-auto max-h-[calc(100vh-2rem)] flex flex-col shadow-2xl overflow-hidden">
        <button
            type="button"
            id="{{ $closeButtonId }}"
            class="quote-popup-close absolute right-5 top-5"
            aria-label="Close"
        >
            ×
        </button>

        <div class="quote-popup-content px-6 pt-8 pb-6 md:px-10 md:pt-12 md:pb-10 overflow-y-auto flex-1">
            <div class="mb-6">
                <p class="quote-popup-subtitle">Free Estimation</p>
                <h2 class="quote-popup-title">Get a Free Quote</h2>
            </div>

            <form action="{{ route('quote.store') }}" method="POST" class="mt-6 space-y-4">
                @csrf
                @if ($errors->hasAny(['name', 'email', 'contact_number', 'product', 'message']))
                    <div class="p-3 rounded-lg text-sm text-red-800 bg-red-50 border border-red-200">
                        Please fix the errors below and try again.
                    </div>
                @endif
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <input
                            type="text"
                            name="name"
                            placeholder="Name"
                            required
                            class="form-input {{ $errors->has('name') ? 'error' : '' }}"
                            value="{{ old('name') }}"
                        >
                        @error('name')
                            <p class="quote-error-message">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input
                            type="email"
                            name="email"
                            placeholder="Email"
                            required
                            class="form-input {{ $errors->has('email') ? 'error' : '' }}"
                            value="{{ old('email') }}"
                        >
                        @error('email')
                            <p class="quote-error-message">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <input
                        type="text"
                        name="contact_number"
                        placeholder="Contact Number"
                        required
                        class="form-input {{ $errors->has('contact_number') ? 'error' : '' }}"
                        value="{{ old('contact_number') }}"
                    >
                    @error('contact_number')
                        <p class="quote-error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="form-label">Product</label>
                    <input
                        type="text"
                        class="form-input"
                        value="{{ $productName }}"
                        readonly
                    >
                    <input type="hidden" name="product" value="{{ $productName }}">
                </div>
                @error('product')
                    <p class="quote-error-message">{{ $message }}</p>
                @enderror

                <div>
                    <textarea
                        name="message"
                        rows="4"
                        placeholder="Your Message"
                        required
                        class="form-textarea {{ $errors->has('message') ? 'error' : '' }}"
                    >{{ old('message') }}</textarea>
                    @error('message')
                        <p class="quote-error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6 flex justify-end">
                    <button
                        type="submit"
                        class="submit-button"
                    >
                        Send
                        <span class="submit-arrow" aria-hidden="true">→</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap');
    
    .quote-popup-wrapper {
        --color-dark: #1a1a1a;
        --color-gold: #c19b46;
        --color-gold-dim: #a8843a;
        --color-cream: #1a1a1a;
        --color-gray: #57534e;
        --color-light: #fafaf9;
        --font-serif: 'Playfair Display', serif;
        --font-sans: 'Inter', sans-serif;
    }
    
    .quote-popup-backdrop {
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        animation: quotePopupFadeIn 0.25s ease-out;
    }
    
    @keyframes quotePopupFadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }
    
    .quote-popup-container {
        background: #FFFFFF;
        border: 1px solid #e7e5e4;
        border-radius: 0;
        animation: quotePopupSlideIn 0.3s ease-out;
        position: relative;
        box-shadow: 0 20px 40px rgba(0,0,0,0.12);
    }
    
    @keyframes quotePopupSlideIn {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    .quote-popup-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(to right, transparent, var(--color-gold), transparent);
    }
    
    .quote-popup-content {
        position: relative;
        z-index: 1;
    }
    
    .quote-popup-close {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #F4F4F4;
        border: 1px solid #e7e5e4;
        color: var(--color-gold);
        font-size: 1.5rem;
        font-weight: 300;
        cursor: pointer;
        transition: all 0.3s ease;
        z-index: 10;
    }
    
    .quote-popup-close:hover {
        background: rgba(193, 155, 70, 0.2);
        border-color: rgba(193, 155, 70, 0.4);
        transform: rotate(90deg);
    }
    
    .quote-popup-title {
        font-family: var(--font-serif);
        font-size: 2rem;
        font-weight: 600;
        color: var(--color-cream);
        letter-spacing: -0.01em;
        margin-bottom: 0.5rem;
    }
    
    .quote-popup-subtitle {
        font-family: var(--font-sans);
        font-size: 0.75rem;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: var(--color-gold);
    }
    
    .quote-popup .form-input,
    .quote-popup .form-textarea {
        font-family: var(--font-sans);
        width: 100%;
        background: #FFFFFF;
        border: 1px solid #e7e5e4;
        padding: 0.875rem 1rem;
        font-size: 0.9rem;
        color: var(--color-cream);
        transition: all 0.3s ease;
    }
    
    .quote-popup .form-input::placeholder,
    .quote-popup .form-textarea::placeholder {
        color: var(--color-gray);
        opacity: 0.8;
    }
    
    .quote-popup .form-input:focus,
    .quote-popup .form-textarea:focus {
        outline: none;
        background: #FFFFFF;
        border-color: var(--color-gold);
    }
    
    .quote-popup .form-input:read-only {
        background: #F4F4F4;
        color: var(--color-gold);
        cursor: not-allowed;
    }
    
    .quote-popup .form-input.error,
    .quote-popup .form-textarea.error {
        border-color: #dc2626;
    }
    
    .quote-popup .quote-error-message {
        font-family: var(--font-sans);
        font-size: 0.75rem;
        color: #dc2626;
        margin-top: 0.25rem;
    }
    
    .quote-popup .form-textarea {
        resize: none;
        min-height: 100px;
    }
    
    .quote-popup .form-label {
        font-family: var(--font-sans);
        font-size: 0.7rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: var(--color-gold);
        margin-bottom: 0.5rem;
        display: block;
    }
    
    .quote-popup .submit-button {
        font-family: var(--font-sans);
        background: linear-gradient(135deg, var(--color-gold) 0%, var(--color-gold-dim) 100%);
        color: var(--color-dark);
        font-weight: 600;
        font-size: 0.85rem;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        padding: 0.875rem 2rem;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .quote-popup .submit-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(193, 155, 70, 0.4);
    }
    
    .quote-popup .submit-arrow {
        transition: transform 0.3s ease;
    }
    
    .quote-popup .submit-button:hover .submit-arrow {
        transform: translateX(3px);
    }
    
    .quote-popup .quote-product-search-wrap {
        position: relative;
    }
    
    .quote-popup .quote-product-results {
        position: absolute;
        left: 0;
        right: 0;
        top: 100%;
        margin-top: 2px;
        max-height: 220px;
        overflow-y: auto;
        background: #FFFFFF;
        border: 1px solid #e7e5e4;
        z-index: 20;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    
    .quote-popup .quote-product-results:empty {
        display: none;
    }
    
    .quote-popup .quote-product-result-item {
        font-family: var(--font-sans);
        padding: 0.6rem 1rem;
        font-size: 0.9rem;
        color: var(--color-cream);
        cursor: pointer;
        border-bottom: 1px solid #e7e5e4;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .quote-popup .quote-product-result-item:hover {
        background: #F4F4F4;
    }
    
    .quote-popup .quote-product-result-item .add-icon {
        color: var(--color-gold);
        font-size: 1rem;
    }
    
    .quote-popup .quote-selected-products {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-top: 0.5rem;
    }
    
    .quote-popup .quote-selected-chip {
        display: inline-flex;
        align-items: center;
        gap: 0.35rem;
        padding: 0.35rem 0.6rem;
        font-size: 0.8rem;
        background: #F4F4F4;
        border: 1px solid #e7e5e4;
        color: var(--color-cream);
        font-family: var(--font-sans);
    }
    
    .quote-popup .quote-selected-chip button {
        background: none;
        border: none;
        color: var(--color-gold);
        cursor: pointer;
        padding: 0 0.15rem;
        font-size: 1rem;
        line-height: 1;
    }
    
    .quote-popup .quote-selected-chip button:hover {
        color: var(--color-cream);
    }
    
    @media (max-width: 768px) {
        .quote-popup .quote-popup-title {
            font-size: 1.75rem;
        }
        .quote-popup .form-input,
        .quote-popup .form-textarea {
            padding: 0.75rem 0.875rem;
            font-size: 0.875rem;
        }
    }
</style>

