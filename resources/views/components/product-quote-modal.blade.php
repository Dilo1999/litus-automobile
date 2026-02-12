@props([
    'productName' => null,
    'openButtonId' => 'open-product-quote-modal',
    'modalId' => 'product-quote-modal',
    'closeButtonId' => 'close-product-quote-modal',
    'backgroundImage' => null,
    'externalTrigger' => false,
])

<div class="modal-wrapper">
    {{-- Quote trigger button (hidden when external trigger is used) --}}
    @if(!$externalTrigger)
    <div class="mt-0">
        <button
            type="button"
            id="{{ $openButtonId }}"
            class="quote-button"
        >
            Get a Free Quote
        </button>
    </div>
    @endif

    <x-product-quote-popup
        :modal-id="$modalId"
        :close-button-id="$closeButtonId"
        :product-name="$productName"
        :background-image="$backgroundImage"
    />
</div>

{{-- Modal toggle script (product-specific) --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const openBtn = document.getElementById(@json($openButtonId));
        const closeBtn = document.getElementById(@json($closeButtonId));
        const modal = document.getElementById(@json($modalId));

        if (!closeBtn || !modal) return;

        const lockScroll = () => {
            if (!document.body.dataset.modalScrollLock) {
                document.body.dataset.modalScrollLock = '1';
                document.body.dataset.modalPrevOverflow = document.body.style.overflow || '';
                document.body.style.overflow = 'hidden';
            }
        };

        const unlockScroll = () => {
            if (document.body.dataset.modalScrollLock === '1') {
                document.body.style.overflow = document.body.dataset.modalPrevOverflow || '';
                delete document.body.dataset.modalPrevOverflow;
                delete document.body.dataset.modalScrollLock;
            }
        };

        const openModal = () => {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            lockScroll();
        };

        const closeModal = () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            unlockScroll();
        };

        if (openBtn) {
            openBtn.addEventListener('click', function (e) {
                e.preventDefault();
                openModal();
            });
        }

        closeBtn.addEventListener('click', closeModal);

        modal.addEventListener('click', function (event) {
            if (event.target === modal) {
                closeModal();
            }
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });
    });
</script>

