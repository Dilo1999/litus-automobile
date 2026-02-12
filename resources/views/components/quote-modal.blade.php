@props([
    'productName' => null,
    'openButtonId' => 'open-quote-modal',
    'modalId' => 'quote-modal',
    'closeButtonId' => 'close-quote-modal',
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

    <x-quote-popup
        :modal-id="$modalId"
        :close-button-id="$closeButtonId"
        :product-name="$productName"
        :background-image="$backgroundImage"
    />
</div>

{{-- Modal toggle script --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const openBtn = document.getElementById(@json($openButtonId));
        const closeBtn = document.getElementById(@json($closeButtonId));
        const modal = document.getElementById(@json($modalId));
        const openTriggers = openBtn ? [openBtn] : document.querySelectorAll('[data-open-quote-modal]');

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
            const iconBar = document.getElementById('logo-marquee');
            const scrollBottom = window.scrollY + window.innerHeight;
            const docHeight = document.documentElement.scrollHeight;
            const threshold = 250;

            if (iconBar && scrollBottom > docHeight - threshold) {
                const scrollToMiddle = Math.max(0, docHeight / 2 - window.innerHeight / 2);
                window.scrollTo({ top: scrollToMiddle, behavior: 'smooth' });
            }

            modal.classList.remove('hidden');
            modal.classList.add('flex');
            lockScroll();
        };

        const closeModal = () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            unlockScroll();
        };

        openTriggers.forEach(function (el) {
            el.addEventListener('click', function (e) {
                e.preventDefault();
                openModal();
            });
        });
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

        document.addEventListener('open-quote-modal', function (event) {
            if (event.detail && event.detail.modalId === modal.id) {
                openModal();
            }
        });
    });
</script>

{{-- Product search and multi-select --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchUrl = @json(route('quote.products.search'));
        const fields = document.querySelectorAll('.quote-product-field');
        let debounceTimer = null;

        function initProductField(container) {
            const initialProduct = (container.dataset.initialProduct || '').trim();
            const modalId = container.dataset.modalId;
            const searchInput = container.querySelector('.quote-product-search-input');
            const resultsList = container.querySelector('.quote-product-results-list');
            const selectedList = container.querySelector('.quote-selected-products-list');
            const valueInput = container.querySelector('.quote-product-value-input');
            if (!searchInput || !resultsList || !selectedList || !valueInput) return;

            let selected = [];
            if (initialProduct) {
                initialProduct.split(',').forEach(function (part) {
                    part = part.trim();
                    if (part) selected.push({ id: null, name: part });
                });
                if (selected.length) renderSelected();
            }

            function renderSelected() {
                selectedList.innerHTML = selected.map(function (p, i) {
                    return '<span class="quote-selected-chip">' +
                        escapeHtml(p.name) +
                        '<button type="button" data-index="' + i + '" aria-label="Remove">×</button></span>';
                }).join('');
                valueInput.value = selected.map(function (p) { return p.name; }).join(', ');
                selectedList.querySelectorAll('button').forEach(function (btn) {
                    btn.addEventListener('click', function () {
                        selected.splice(parseInt(btn.dataset.index, 10), 1);
                        renderSelected();
                    });
                });
            }

            function escapeHtml(s) {
                const div = document.createElement('div');
                div.textContent = s;
                return div.innerHTML;
            }

            function addProduct(product) {
                if (selected.some(function (p) { return (p.id && p.id === product.id) || (p.name === product.name); })) return;
                selected.push({ id: product.id, name: product.name });
                renderSelected();
            }

            searchInput.addEventListener('input', function () {
                clearTimeout(debounceTimer);
                const q = searchInput.value.trim();
                if (q.length < 2) {
                    resultsList.innerHTML = '';
                    return;
                }
                debounceTimer = setTimeout(function () {
                    fetch(searchUrl + '?q=' + encodeURIComponent(q))
                        .then(function (r) { return r.json(); })
                        .then(function (data) {
                            resultsList.innerHTML = (data.products || []).map(function (p) {
                                return '<div class="quote-product-result-item" role="option" data-id="' + (p.id || '') + '" data-name="' + escapeHtml(p.name) + '">' +
                                    '<span class="add-icon">+</span> ' + escapeHtml(p.name) + '</div>';
                            }).join('');
                            resultsList.querySelectorAll('.quote-product-result-item').forEach(function (el) {
                                el.addEventListener('click', function () {
                                    addProduct({ id: el.dataset.id ? parseInt(el.dataset.id, 10) : null, name: el.dataset.name });
                                    searchInput.value = '';
                                    resultsList.innerHTML = '';
                                });
                            });
                        })
                        .catch(function () { resultsList.innerHTML = ''; });
                }, 250);
            });

            searchInput.addEventListener('blur', function () {
                setTimeout(function () { resultsList.innerHTML = ''; }, 200);
            });
        }        fields.forEach(initProductField);
    });
</script>
