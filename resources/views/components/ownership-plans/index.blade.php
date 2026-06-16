@php
    $whatsapp = 'https://wa.me/9607797442';
    $phone = 'tel:+9607797442';
    $heroBg = 'https://www.litusautomobiles.com/wp-content/uploads/2026/06/bike1.webp';

    $benefits = [
        ['label' => 'Flexible ownership options', 'icon' => 'https://www.litusautomobiles.com/wp-content/uploads/2026/06/owner.png'],
        ['label' => 'Plans for different budgets', 'icon' => 'https://www.litusautomobiles.com/wp-content/uploads/2026/06/calculator.png'],
        ['label' => 'Fast transparent approval', 'icon' => 'https://www.litusautomobiles.com/wp-content/uploads/2026/06/approve.png'],
        ['label' => 'Early settlement options', 'icon' => 'https://www.litusautomobiles.com/wp-content/uploads/2026/06/earning.png'],
        ['label' => 'Islamic-compliant structure', 'icon' => 'https://www.litusautomobiles.com/wp-content/uploads/2026/06/islam-1.png'],
        ['label' => 'Dedicated support', 'icon' => 'https://www.litusautomobiles.com/wp-content/uploads/2026/06/maintenance.png'],
    ];

    $plans = [
        ['key' => 'prime', 'color' => '#d7a63f', 'name' => 'Prime', 'tagline' => 'Lowest Advance Payment', 'summary' => 'Ideal for customers who can provide additional supporting documents or have a proven Ijara repayment history.', 'features' => ['Lowest advance requirement', 'Fast approval process', 'Flexible early settlement option']],
        ['key' => 'family', 'color' => '#2563eb', 'name' => 'Family', 'tagline' => 'Family Support Makes Ownership Easier', 'summary' => 'A practical ownership solution for customers supported by an immediate family guarantor.', 'features' => ['Lower upfront commitment', 'Easier qualification pathway', 'Flexible early settlement option']],
        ['key' => 'secure', 'color' => '#059669', 'name' => 'Secure', 'tagline' => 'Lower Advance With An Employed Guarantor', 'summary' => 'A balanced option that combines affordability and accountability.', 'features' => ['Reduced advance payment', 'Flexible ownership options', 'Flexible early settlement option']],
        ['key' => 'flexi', 'color' => '#7c3aed', 'name' => 'Flexi', 'tagline' => 'Designed For More Customers', 'summary' => 'Greater accessibility for customers with different income situations and backgrounds.', 'features' => ['Flexible guarantor option', 'Accessible approval pathway', 'Flexible early settlement option']],
        ['key' => 'freedom', 'color' => '#f97316', 'name' => 'Freedom', 'tagline' => 'Own Your Bike Without A Guarantor', 'summary' => 'For customers who prefer a simpler application process and greater independence.', 'features' => ['No guarantor required', 'Simple approval process', 'Flexible early settlement option']],
        ['key' => 'premium', 'color' => '#dc2626', 'name' => 'Premium', 'tagline' => 'Lower Total Payment. Faster Ownership.', 'summary' => 'Our shortest-term ownership solution designed for lower overall financing costs.', 'features' => ['Premium 6, 8 and 12', 'Lower total payable amount', 'Faster ownership completion']],
    ];

    $drawerPlans = [
        'prime' => ['title' => 'Prime Plan', 'subtitle' => 'Lowest Advance Payment', 'body' => '<p>Prime Plan is designed for customers seeking the lowest possible advance payment while benefiting from our most competitive ownership structure.</p><h4>Key Benefits</h4><ul><li>Lowest advance payment requirement</li><li>Faster approval process</li><li>Flexible early settlement option</li><li>Ideal for customers with strong repayment credentials</li></ul><h4>Eligibility</h4><p>Applicants may provide either a 6-month bank statement or a positive Ijara repayment history with LITUS Automobiles. An immediate family guarantor is also required.</p><h4>Required Documents</h4><ul><li>Applicant ID card copy</li><li>Guarantor ID card copy</li><li>6-month bank statement or qualifying Ijara repayment history</li><li>Supporting document confirming immediate family relationship, if required</li></ul><h4>Who Is It For?</h4><p>Customers looking for the lowest advance payment option, access to flexible early settlement, and who can provide additional supporting credentials.</p>'],
        'family' => ['title' => 'Family Plan', 'subtitle' => 'Family Support Makes Ownership Easier', 'body' => '<p>Family Plan is designed for customers who have built a positive Ijara repayment history with us and can be supported by an immediate family guarantor.</p><h4>Key Benefits</h4><ul><li>Lower advance payment requirement</li><li>Easier qualification pathway</li><li>Flexible early settlement option</li><li>Designed for returning customers</li></ul><h4>Eligibility</h4><p>Applicants should have a positive Ijara repayment history with LITUS Automobiles. An immediate family guarantor is also required.</p><h4>Required Documents</h4><ul><li>Applicant ID card copy</li><li>Guarantor ID card copy</li><li>Qualifying Ijara repayment history with LITUS Automobiles</li><li>Supporting document confirming immediate family relationship, if required</li></ul><h4>Who Is It For?</h4><p>Customers who have demonstrated responsible repayment behaviour with us and would like to benefit from lower upfront costs and flexible early settlement options.</p>'],
        'secure' => ['title' => 'Secure Plan', 'subtitle' => 'Lower Advance With An Employed Guarantor', 'body' => '<p>Secure Plan offers a practical balance between affordability and accountability, making motorcycle ownership more accessible through the support of an employed guarantor.</p><h4>Key Benefits</h4><ul><li>Reduced advance payment requirement</li><li>Flexible early settlement option</li><li>Suitable for a wide range of customers</li><li>Straightforward qualification process</li></ul><h4>Eligibility</h4><p>An employed guarantor is required. The guarantor should be employed for a minimum period of three months.</p><h4>Required Documents</h4><ul><li>Applicant ID card copy</li><li>Guarantor ID card copy</li><li>Guarantor employment letter confirming minimum employment period</li></ul><h4>Who Is It For?</h4><p>Customers seeking a lower advance payment option and the flexibility of early settlement while being supported by an employed guarantor.</p>'],
        'flexi' => ['title' => 'Flexi Plan', 'subtitle' => 'Designed For More Customers', 'body' => '<p>Flexi Plan is designed to make ownership accessible to a wider range of customers, including freelancers, self-employed individuals, business owners, fishermen, contractors and customers with non-traditional income sources.</p><h4>Key Benefits</h4><ul><li>Flexible guarantor option</li><li>Flexible early settlement option</li><li>Accessible approval pathway</li><li>Designed for diverse income profiles</li></ul><h4>Eligibility</h4><p>Customers can nominate a guarantor without strict employment or family relationship requirements.</p><h4>Required Documents</h4><ul><li>Applicant ID card copy</li><li>Guarantor ID card copy</li></ul><h4>Who Is It For?</h4><p>Customers who may not meet the requirements of other plans but are looking for a practical ownership solution with greater flexibility and early settlement options.</p>'],
        'freedom' => ['title' => 'Freedom Plan', 'subtitle' => 'Own Your Bike Without A Guarantor', 'body' => '<p>Freedom Plan is designed for customers who prefer a simpler ownership process without the need for a guarantor.</p><h4>Key Benefits</h4><ul><li>No guarantor required</li><li>Simple application process</li><li>Faster ownership pathway</li><li>Greater independence and flexibility</li><li>Flexible early settlement option available</li></ul><h4>Eligibility</h4><p>Freedom Plan requires a higher advance payment compared to other ownership plans, allowing customers to proceed without a guarantor.</p><h4>Required Documents</h4><ul><li>Applicant ID card copy</li><li>Two alternative family contact numbers</li></ul><h4>Who Is It For?</h4><p>Customers who prefer a straightforward ownership process, value flexible early settlement, and can make a higher upfront contribution.</p>'],
        'premium' => ['title' => 'Premium Plan', 'subtitle' => 'Lower Total Payment. Faster Ownership.', 'body' => '<p>Premium Plan is designed for customers who want to complete ownership sooner while benefiting from a lower overall payable amount compared to longer-term ownership plans.</p><h4>Key Benefits</h4><ul><li>Lower total payable amount</li><li>Faster ownership completion</li><li>Available in Premium 6, Premium 8 and Premium 12 options</li><li>Transparent fixed payment structure</li></ul><h4>Eligibility</h4><p>Premium Plan is available with a flexible guarantor requirement and is designed for customers comfortable making a higher upfront contribution in exchange for lower overall ownership costs.</p><h4>Required Documents</h4><ul><li>Applicant ID card copy</li><li>Guarantor ID card copy</li></ul><h4>Who Is It For?</h4><p>Customers who prefer shorter ownership periods, lower overall costs and a faster path to full ownership.</p><h4>Important Information</h4><p>Unlike Prime, Family, Secure, Flexi and Freedom Plans, Premium Plans operate on a fixed ownership structure. Since the total ownership cost is already reduced and fixed at the start, flexible early settlement benefits are not applicable under Premium Plans.</p>'],
    ];
@endphp

<x-layouts.app title="Ownership Plans - Al Zaha General Trading">
    <div class="min-h-screen bg-[#f6f7fb] text-gray-900 leading-normal">
        {{-- Hero --}}
        <section
            class="ownership-hero page-hero-standard relative bg-cover bg-center text-white"
            style="background-image: linear-gradient(90deg, rgba(5,10,25,0.92), rgba(5,10,25,0.55)), url('{{ $heroBg }}');"
        >
            <div class="site-container">
                <div class="max-w-[720px] md:max-w-[720px]">
                    <p class="text-[#d7a63f] font-bold uppercase tracking-wide text-xs md:text-[13px] mb-3.5 md:mb-[30px]">Ownership Plans</p>
                    <h1 class="text-[28px] sm:text-[clamp(1.875rem,9vw,2.625rem)] md:text-[clamp(2.25rem,6vw,4.25rem)] leading-[1.08] md:leading-[1.1] font-black uppercase mb-3.5 md:mb-5">
                        <span class="block">Any Bike.</span>
                        <span class="block">Any Budget.</span>
                        <span class="block text-[#d7a63f] md:whitespace-nowrap">Anyone Can Own.</span>
                    </h1>
                    <p class="text-sm sm:text-[15px] md:text-lg text-gray-200 max-w-[650px] leading-relaxed md:leading-normal">
                        Our Islamic-compliant Ijara Plans are designed to make motorcycle ownership
                        more accessible for everyone. Whether you are a salaried employee, freelancer,
                        fisherman, business owner, contractor, or first-time rider, we have an ownership
                        solution that fits your budget and lifestyle.
                    </p>
                </div>
            </div>
        </section>

        {{-- Benefits --}}
        <div class="site-container py-6 md:py-9 md:pb-11">
            <div class="overflow-hidden w-full" id="benefitsViewport">
                <div
                    class="benefits-track grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 md:gap-4 transition-transform duration-[450ms] ease-out will-change-transform"
                    id="benefitsTrack"
                >
                    @foreach($benefits as $benefit)
                        <div class="benefits-item text-center text-[11px] sm:text-xs md:text-[13px] text-gray-700 leading-snug md:leading-[1.4] px-1.5 md:px-0">
                            <div class="w-[46px] h-[46px] md:w-[52px] md:h-[52px] rounded-full bg-[#f7edd5] flex items-center justify-center mx-auto mb-1.5 md:mb-2">
                                <img src="{{ $benefit['icon'] }}" alt="{{ $benefit['label'] }}" class="w-7 h-7 md:w-8 md:h-8 object-contain block" loading="lazy">
                            </div>
                            {{ $benefit['label'] }}
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="hidden max-md:flex justify-center gap-2 mt-3.5 md:mt-[18px]" id="benefitsDots" aria-hidden="true"></div>
        </div>

        {{-- Plans --}}
        <section class="py-12 md:py-16 lg:py-20">
            <div class="site-container">
                <div class="text-center max-w-[720px] mx-auto mb-8 md:mb-10">
                    <h2 class="text-[clamp(1.875rem,4vw,2.875rem)] font-black text-slate-900 mb-2.5">Our Ownership Plans</h2>
                    <p class="text-gray-500 text-[17px]">Choose the Ijara Plan that suits you best.</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($plans as $plan)
                        <article
                            class="plan-card group relative flex flex-col min-h-[320px] bg-white rounded-2xl px-4 py-[22px] border border-[#eef0f4] overflow-hidden transition-all duration-300 hover:-translate-y-2 hover:shadow-[0_20px_40px_rgba(15,23,42,0.14)]"
                            style="--plan-color: {{ $plan['color'] }};"
                        >
                            <div class="plan-card-bar absolute inset-x-0 top-0 h-[5px] origin-top scale-y-0 transition-transform duration-300 group-hover:scale-y-100" style="background: {{ $plan['color'] }};"></div>
                            <h3 class="text-[21px] font-black uppercase m-0" style="color: {{ $plan['color'] }};">{{ $plan['name'] }}</h3>
                            <h4 class="text-sm text-gray-900 mt-1 mb-3 font-semibold">{{ $plan['tagline'] }}</h4>
                            <p class="text-sm text-gray-500 mb-3.5">{{ $plan['summary'] }}</p>
                            <ul class="list-none p-0 m-0 mb-[18px] text-[13px] text-gray-700 space-y-2 flex-1">
                                @foreach($plan['features'] as $feature)
                                    <li class="relative pl-5">
                                        <span class="absolute left-0 font-black" style="color: {{ $plan['color'] }};">✓</span>
                                        {{ $feature }}
                                    </li>
                                @endforeach
                            </ul>
                            <div class="mt-auto pt-2">
                                <button type="button" class="plan-card-btn w-full" data-plan-open="{{ $plan['key'] }}">
                                    <span>View Details</span>
                                </button>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="mt-7 bg-white rounded-[14px] p-5 md:p-[22px] flex flex-wrap gap-4 items-center shadow-[0_8px_22px_rgba(15,23,42,0.06)] border-l-[5px] border-[#d7a63f] max-[520px]:items-start">
                    <div class="text-3xl shrink-0">⚖</div>
                    <div class="flex-1 min-w-0">
                        <strong class="block mb-1 text-slate-900">Not sure which plan is right for you?</strong>
                        <span class="text-gray-600">Our team can help you choose the ownership plan that best fits your budget and requirements.</span>
                    </div>
                    <a href="{{ $phone }}" class="inline-flex shrink-0 items-center justify-center px-[22px] py-[13px] rounded-lg font-bold text-[15px] bg-gray-900 text-white no-underline whitespace-nowrap max-[520px]:w-full max-[520px]:text-center">Call Us</a>
                </div>
            </div>
        </section>

        {{-- Help --}}
        <section class="py-12 md:py-16 lg:py-20 pt-0">
            <div class="site-container">
                <div class="text-center bg-white rounded-[18px] py-10 px-5 shadow-[0_10px_28px_rgba(15,23,42,0.08)]">
                    <h2 class="text-[34px] font-black mb-2.5">Need Help Choosing?</h2>
                    <p class="text-gray-500 mb-6">Our team is here to help you find the ownership plan that best fits your needs.</p>
                    <div class="help-actions flex flex-wrap justify-center max-w-[560px] mx-auto w-full gap-y-3 max-[520px]:flex-col max-[520px]:gap-3">
                        <a href="{{ $whatsapp }}" target="_blank" rel="noopener" class="help-btn help-btn-whatsapp max-[520px]:w-full">
                            <span>Chat on WhatsApp</span>
                        </a>
                        <a href="{{ $phone }}" class="help-btn help-btn-call max-[520px]:w-full">
                            <span>Call Us</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    {{-- Drawer --}}
    <div id="planDrawerOverlay" class="plan-drawer-overlay fixed inset-0 bg-slate-900/[0.58] z-[99998] opacity-0 invisible transition-all duration-200"></div>
    <aside id="planDrawer" class="plan-drawer fixed top-0 -right-[460px] w-[430px] max-w-[92vw] h-screen bg-white z-[99999] transition-[right] duration-300 shadow-[-18px_0_40px_rgba(15,23,42,0.22)] flex flex-col overflow-hidden">
        <div class="shrink-0 bg-white border-b border-gray-200 px-6 py-6 flex justify-between items-start gap-3.5">
            <div>
                <h3 id="drawerTitle" class="text-[25px] text-slate-900 m-0 font-bold">Plan Details</h3>
                <p id="drawerSubtitle" class="mt-1 mb-0 text-gray-500 font-bold"></p>
            </div>
            <button type="button" id="planDrawerClose" class="plan-drawer-close w-[38px] h-[38px] rounded-full bg-gray-100 border-0 cursor-pointer text-2xl leading-none shrink-0 flex items-center justify-center text-gray-700 transition-all duration-200 hover:bg-gray-200 hover:text-gray-900 hover:rotate-90 focus-visible:outline focus-visible:outline-2 focus-visible:outline-[#d7a63f] focus-visible:outline-offset-2" aria-label="Close">×</button>
        </div>
        <div class="flex-1 overflow-y-auto min-h-0">
            <div id="drawerBody" class="px-6 py-6 plan-drawer-content"></div>
        </div>
        <div class="shrink-0 grid gap-2.5 px-6 pt-4 pb-6 border-t border-gray-200 bg-white shadow-[0_-8px_24px_rgba(15,23,42,0.06)]">
            <a href="{{ $whatsapp }}" target="_blank" rel="noopener" class="inline-flex items-center justify-center px-[22px] py-[13px] rounded-lg font-bold text-[15px] bg-[#25D366] text-white no-underline text-center">Apply via WhatsApp</a>
        </div>
    </aside>

    <script>
        const litusPlans = @json($drawerPlans);
        const overlay = document.getElementById('planDrawerOverlay');
        const drawer = document.getElementById('planDrawer');

        function openPlanDrawer(planKey) {
            const plan = litusPlans[planKey];
            if (!plan) return;
            document.getElementById('drawerTitle').textContent = plan.title;
            document.getElementById('drawerSubtitle').textContent = plan.subtitle;
            document.getElementById('drawerBody').innerHTML = plan.body;
            overlay.classList.add('active');
            drawer.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closePlanDrawer() {
            overlay.classList.remove('active');
            drawer.classList.remove('active');
            document.body.style.overflow = '';
        }

        document.querySelectorAll('[data-plan-open]').forEach(btn => btn.addEventListener('click', () => openPlanDrawer(btn.dataset.planOpen)));
        overlay.addEventListener('click', closePlanDrawer);
        document.getElementById('planDrawerClose').addEventListener('click', closePlanDrawer);
        document.addEventListener('keydown', e => { if (e.key === 'Escape') closePlanDrawer(); });

        (function initBenefitsSlider() {
            const viewport = document.getElementById('benefitsViewport');
            const track = document.getElementById('benefitsTrack');
            const dotsContainer = document.getElementById('benefitsDots');
            if (!viewport || !track || !dotsContainer) return;

            const itemsPerSlide = 3;
            const totalSlides = Math.ceil(track.children.length / itemsPerSlide);
            let currentSlide = 0;
            let autoTimer = null;
            let touchStartX = 0;
            let touchDeltaX = 0;
            const mobileQuery = window.matchMedia('(max-width: 768px)');

            for (let i = 0; i < totalSlides; i++) {
                const dot = document.createElement('button');
                dot.type = 'button';
                dot.className = 'benefits-dot w-2 h-2 rounded-full border-0 p-0 bg-gray-300 cursor-pointer transition-all duration-200' + (i === 0 ? ' active' : '');
                dot.setAttribute('aria-label', 'Go to slide ' + (i + 1));
                dot.addEventListener('click', () => goToSlide(i, true));
                dotsContainer.appendChild(dot);
            }

            function isMobile() { return mobileQuery.matches; }

            function updateDots() {
                dotsContainer.querySelectorAll('.benefits-dot').forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentSlide);
                    dot.classList.toggle('bg-[#d7a63f]', index === currentSlide);
                    dot.classList.toggle('scale-110', index === currentSlide);
                    dot.classList.toggle('bg-gray-300', index !== currentSlide);
                });
            }

            function setMobileLayout(active) {
                if (active) {
                    track.classList.remove('grid', 'grid-cols-2', 'sm:grid-cols-3', 'lg:grid-cols-6', 'gap-4');
                    track.classList.add('flex', 'gap-0');
                    track.style.width = 'calc(100% * ' + track.children.length + ' / ' + itemsPerSlide + ')';
                    Array.from(track.children).forEach(item => {
                        item.classList.add('flex-shrink-0', 'box-border');
                        item.style.flex = '0 0 calc(100% / ' + track.children.length + ')';
                    });
                    dotsContainer.classList.remove('hidden');
                    dotsContainer.classList.add('flex');
                } else {
                    track.classList.add('grid', 'grid-cols-2', 'sm:grid-cols-3', 'lg:grid-cols-6', 'gap-4');
                    track.classList.remove('flex', 'gap-0');
                    track.style.width = '';
                    track.style.transform = '';
                    track.style.transition = '';
                    Array.from(track.children).forEach(item => {
                        item.classList.remove('flex-shrink-0', 'box-border');
                        item.style.flex = '';
                    });
                    dotsContainer.classList.add('hidden');
                    dotsContainer.classList.remove('flex');
                    currentSlide = 0;
                    updateDots();
                }
            }

            function goToSlide(index, pauseAuto) {
                if (!isMobile()) {
                    track.style.transform = '';
                    return;
                }
                currentSlide = (index + totalSlides) % totalSlides;
                track.style.transform = 'translateX(-' + (currentSlide * viewport.clientWidth) + 'px)';
                updateDots();
                if (pauseAuto) restartAutoPlay();
            }

            function nextSlide() { goToSlide(currentSlide + 1); }

            function restartAutoPlay() {
                if (autoTimer) clearInterval(autoTimer);
                if (!isMobile()) return;
                autoTimer = setInterval(nextSlide, 4000);
            }

            viewport.addEventListener('touchstart', e => {
                if (!isMobile()) return;
                touchStartX = e.touches[0].clientX;
                touchDeltaX = 0;
                track.style.transition = 'none';
            }, { passive: true });

            viewport.addEventListener('touchmove', e => {
                if (!isMobile()) return;
                touchDeltaX = e.touches[0].clientX - touchStartX;
                track.style.transform = 'translateX(-' + (currentSlide * viewport.clientWidth - touchDeltaX) + 'px)';
            }, { passive: true });

            viewport.addEventListener('touchend', () => {
                if (!isMobile()) return;
                track.style.transition = '';
                if (touchDeltaX > 50) goToSlide(currentSlide - 1, true);
                else if (touchDeltaX < -50) goToSlide(currentSlide + 1, true);
                else goToSlide(currentSlide);
            });

            function handleResize() {
                if (isMobile()) {
                    setMobileLayout(true);
                    goToSlide(currentSlide);
                    restartAutoPlay();
                } else {
                    if (autoTimer) clearInterval(autoTimer);
                    setMobileLayout(false);
                }
            }

            mobileQuery.addEventListener('change', handleResize);
            window.addEventListener('resize', handleResize);
            handleResize();
        })();
    </script>

    <style>
        @media (max-width: 768px) {
            .ownership-hero {
                background-image: linear-gradient(180deg, rgba(5,10,25,0.94) 0%, rgba(5,10,25,0.82) 55%, rgba(5,10,25,0.65) 100%), url('{{ $heroBg }}') !important;
                background-position: center 40% !important;
            }
            .plan-card-btn {
                background: var(--plan-color) !important;
                color: #ffffff !important;
                border-color: var(--plan-color) !important;
            }
            .plan-card-btn::after { display: none !important; }
            .help-btn-whatsapp {
                background: #25D366 !important;
                color: #ffffff !important;
                border-color: #25D366 !important;
            }
            .help-btn-call {
                background: #111827 !important;
                color: #ffffff !important;
                border-color: #111827 !important;
            }
            .help-btn::after { display: none !important; }
        }

        .plan-card:hover { border-color: color-mix(in srgb, var(--plan-color) 35%, #eef0f4); }

        .plan-card-btn {
            display: block;
            height: 40px;
            line-height: 36px;
            padding: 0 12px;
            font-size: 15px;
            font-weight: 800;
            background: transparent;
            color: var(--plan-color);
            border: 2px solid var(--plan-color);
            border-radius: 8px;
            letter-spacing: 1px;
            text-align: center;
            position: relative;
            cursor: pointer;
            overflow: hidden;
            transition: color 0.35s ease;
        }
        .plan-card-btn span { position: relative; z-index: 2; }
        .plan-card-btn::after {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 0; height: 100%;
            background: var(--plan-color);
            transition: width 0.35s ease;
            z-index: 1;
            border-radius: 6px;
        }
        .plan-card-btn:hover { color: #ffffff; }
        .plan-card-btn:hover::after { width: 100%; }

        .help-actions .help-btn {
            flex: 0 0 calc(50% - 8px);
            min-width: 0;
            box-sizing: border-box;
            display: block;
            height: 44px;
            line-height: 40px;
            padding: 0 12px;
            font-weight: 700;
            font-size: 15px;
            text-decoration: none;
            background: transparent;
            border: 2px solid;
            border-radius: 8px;
            letter-spacing: 1px;
            text-align: center;
            position: relative;
            overflow: hidden;
            transition: color 0.35s ease, transform 0.2s ease;
        }
        .help-actions .help-btn span { position: relative; z-index: 2; }
        .help-actions .help-btn::after {
            content: "";
            position: absolute;
            top: 0; left: 0;
            width: 0; height: 100%;
            transition: width 0.35s ease;
            z-index: 1;
            border-radius: 6px;
        }
        .help-actions .help-btn:hover { color: #ffffff; transform: translateY(-1px); }
        .help-actions .help-btn:hover::after { width: 100%; }
        .help-btn-whatsapp { color: #25D366; border-color: #25D366; }
        .help-btn-whatsapp::after { background: #25D366; }
        .help-btn-call { color: #111827; border-color: #111827; margin-left: 16px; }
        .help-btn-call::after { background: #111827; }
        @media (max-width: 520px) {
            .help-btn-call { margin-left: 0; }
        }

        .plan-drawer-overlay.active { opacity: 1; visibility: visible; }
        .plan-drawer.active { right: 0; }
        .plan-drawer-content h4 { margin: 22px 0 10px; color: #0f172a; font-size: 17px; font-weight: 700; }
        .plan-drawer-content p { color: #4b5563; margin-bottom: 0.75rem; }
        .plan-drawer-content ul { padding-left: 20px; margin-top: 8px; color: #374151; list-style: disc; }
        .plan-drawer-content li { margin-bottom: 8px; }
    </style>
</x-layouts.app>
