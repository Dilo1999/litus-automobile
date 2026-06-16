@props([
    'modalId' => 'quote-modal',
    'closeButtonId' => 'close-quote-modal',
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
                <h2 class="quote-popup-title">Request A Quote</h2>
            </div>

            <form action="{{ route('quote.store') }}" method="POST" class="mt-6 space-y-4">
                @csrf
                @if ($errors->hasAny(['name', 'email', 'contact_number', 'country', 'product', 'message']))
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
                    <label for="{{ $modalId }}-country" class="form-label">Country</label>
                    <select
                        name="country"
                        id="{{ $modalId }}-country"
                        class="form-input {{ $errors->has('country') ? 'error' : '' }}"
                    >
                        <option value="">Select country</option>
                        @foreach([
                            'United Arab Emirates', 'Saudi Arabia', 'Qatar', 'Kuwait', 'Bahrain', 'Oman', 'Iraq', 'Jordan', 'Lebanon', 'Egypt', 'Yemen', 'Syria', 'Palestine',
                            'India', 'Pakistan', 'Bangladesh', 'Sri Lanka', 'Nepal', 'Afghanistan',
                            'United Kingdom', 'Germany', 'France', 'Italy', 'Spain', 'Netherlands', 'Belgium', 'Turkey', 'Russia', 'Poland', 'Switzerland', 'Austria', 'Sweden', 'Norway', 'Denmark', 'Finland', 'Ireland', 'Portugal', 'Greece', 'Romania', 'Czech Republic', 'Hungary', 'Ukraine',
                            'United States', 'Canada', 'Mexico', 'Brazil', 'Argentina', 'Chile', 'Colombia', 'Peru', 'Venezuela', 'Ecuador',
                            'South Africa', 'Nigeria', 'Kenya', 'Morocco', 'Algeria', 'Tunisia', 'Ghana', 'Ethiopia', 'Tanzania', 'Uganda',
                            'China', 'Japan', 'South Korea', 'Indonesia', 'Malaysia', 'Singapore', 'Thailand', 'Vietnam', 'Philippines', 'Australia', 'New Zealand',
                            'Other',
                        ] as $country)
                            <option value="{{ $country }}" {{ old('country') === $country ? 'selected' : '' }}>{{ $country }}</option>
                        @endforeach
                    </select>
                    @error('country')
                        <p class="quote-error-message">{{ $message }}</p>
                    @enderror
                </div>

                <div class="quote-product-field" data-initial-product="{{ old('product', $productName ?? '') }}" data-modal-id="{{ $modalId }}">
                    <label for="{{ $modalId }}-product-search" class="form-label">Products</label>
                    <div class="quote-product-search-wrap">
                        <input
                            type="text"
                            id="{{ $modalId }}-product-search"
                            class="form-input quote-product-search-input"
                            placeholder="Search products..."
                            autocomplete="off"
                        >
                        <div class="quote-product-results quote-product-results-list" data-results-for="{{ $modalId }}" role="listbox"></div>
                    </div>
                    <div class="quote-selected-products quote-selected-products-list" data-selected-for="{{ $modalId }}"></div>
                    <input type="hidden" name="product" class="quote-product-value-input" data-value-for="{{ $modalId }}" value="{{ old('product') }}">
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