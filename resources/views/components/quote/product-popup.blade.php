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

