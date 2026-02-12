<footer class="footer-wrapper">
    {{-- Top Divider --}}
    <div class="footer-divider">
        <div class="footer-divider-line"></div>
    </div>

    {{-- Main Content --}}
    <div class="footer-content">
        <div class="footer-grid">
            {{-- Logo & About --}}
            <div class="footer-col footer-col-brand">
                <a href="{{ url('/') }}" class="footer-logo-link" aria-label="Al Zaha General Trading - Home">
                    <img src="{{ asset('images/background/Logo-L-web.png') }}" alt="Al Zaha General Trading" class="footer-logo-img">
                </a>
                <p class="footer-about">
                    At Al Zaha General Trading LLC, we are driven by our commitment to efficiency, transparency, and trust, providing businesses with a reliable sourcing partner for large-scale orders.
                </p>
            </div>

            {{-- Contact Details --}}
            <div class="footer-col footer-col-contact">
                <h3 class="footer-section-title">Contact</h3>
                <ul class="footer-contact-list">
                    <li class="contact-item">
                        <span class="contact-label">Office address</span>
                        <p class="contact-value">
                            18B street, Umm Ramool-215,<br>
                            Al Rashidiya, Dubai
                        </p>
                    </li>
                    <li class="contact-item">
                        <span class="contact-label">Phone</span>
                        <p class="contact-value">
                            <a href="tel:+971043967075" class="contact-link">+971 04 396 7075</a>
                        </p>
                    </li>
                    <li class="contact-item">
                        <span class="contact-label">Email</span>
                        <p class="contact-value">
                            <a href="mailto:sales@alzahageneraltrading.com" class="contact-link">sales@alzahageneraltrading.com</a>
                        </p>
                    </li>
                </ul>
            </div>

            {{-- Let's Talk CTA --}}
            <div class="footer-col footer-col-cta">
                <h3 class="footer-cta-title">Let's Talk</h3>
                <p class="footer-cta-desc">Have a project in mind? We’d love to hear from you.</p>
                <a href="{{ route('contact') }}#contact-form" class="cta-button">
                    Get in Touch
                </a>
            </div>
        </div>
    </div>

    {{-- Bottom Section --}}
    <div class="footer-bottom">
        <div class="footer-bottom-inner">
            <p class="copyright">
                Copyright &copy; {{ date('Y') }} AL ZAHA General Trading LLC. | Developed by LITUS IT</a>
            </p>
            <div class="social-links">
                <a href="#" class="social-link" aria-label="Facebook">
                    <svg fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"/>
                    </svg>
                </a>
                <a href="#" class="social-link" aria-label="Instagram">
                    <svg fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 0 1 1.772 1.153 4.902 4.902 0 0 1 1.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 0 1-1.153 1.772 4.902 4.902 0 0 1-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 0 1-1.772-1.153 4.902 4.902 0 0 1-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 0 1 1.153-1.772A4.902 4.902 0 0 1 5.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 0 0-.748-1.15 3.098 3.098 0 0 0-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 1 1 0 10.27 5.135 5.135 0 0 1 0-10.27zm0 1.802a3.333 3.333 0 1 0 0 6.666 3.333 3.333 0 0 0 0-6.666zm5.338-3.205a1.2 1.2 0 1 1 0 2.4 1.2 1.2 0 0 1 0-2.4z" clip-rule="evenodd"/>
                    </svg>
                </a>
                <a href="#" class="social-link" aria-label="LinkedIn">
                    <svg fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</footer>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Inter:wght@300;400;500;600&display=swap');

    .footer-wrapper {
        --color-dark: #1a1a1a;
        --color-gold: #c19b46;
        --color-gold-dim: #a8843a;
        --color-cream: #1a1a1a;
        --color-gray: #57534e;
        --font-serif: 'Playfair Display', serif;
        --font-sans: 'Inter', sans-serif;
    }

    .footer-wrapper {
        background: #FFFFFF;
        color: var(--color-cream);
        font-family: var(--font-sans);
        position: relative;
        overflow: hidden;
        border-top: 1px solid #e7e5e4;
        margin-top: 4rem;
    }

    /* Top Gold Divider */
    .footer-divider {
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 1.5rem;
        padding-top: 1.5rem;
    }

    .footer-divider-line {
        height: 1px;
        background: linear-gradient(to right, transparent 0%, var(--color-gold) 20%, var(--color-gold) 80%, transparent 100%);
        opacity: 0.9;
    }

    /* Main Content */
    .footer-content {
        max-width: 1280px;
        margin: 0 auto;
        padding: 3rem 1.5rem 2.5rem;
    }

    .footer-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 2.5rem 2rem;
        align-items: start;
    }

    @media (min-width: 640px) {
        .footer-grid {
            grid-template-columns: 1fr 1fr;
        }
        .footer-col-cta {
            grid-column: span 2;
        }
    }

    @media (min-width: 1024px) {
        .footer-grid {
            grid-template-columns: 1.1fr 1fr minmax(200px, 0.9fr);
            gap: 3rem 2.5rem;
            align-items: start;
        }
        .footer-col-cta {
            grid-column: span 1;
            text-align: right;
        }
    }

    .footer-col {
        min-width: 0;
    }

    /* Logo & Brand */
    .footer-col-brand {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .footer-logo-link {
        display: inline-block;
        line-height: 0;
    }

    .footer-logo-img {
        height: 2.5rem;
        width: auto;
        max-width: 100%;
        object-fit: contain;
        display: block;
    }

    .footer-about {
        font-size: 0.9375rem;
        line-height: 1.65;
        color: var(--color-gray);
        font-weight: 400;
        max-width: 36ch;
        margin: 0;
    }

    /* Contact Section */
    .footer-col-contact {
        display: flex;
        flex-direction: column;
        gap: 1.25rem;
    }

    .footer-section-title {
        font-size: 0.6875rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.12em;
        color: var(--color-gold);
        margin: 0;
    }

    .footer-contact-list {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        gap: 1.125rem;
    }

    .contact-item {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
        margin: 0;
    }

    .contact-label {
        font-weight: 500;
        font-size: 0.8125rem;
        color: var(--color-cream);
    }

    .contact-value {
        font-size: 0.9375rem;
        line-height: 1.5;
        color: var(--color-gray);
        font-weight: 400;
        margin: 0;
    }

    .contact-link {
        color: var(--color-gray);
        text-decoration: none;
        transition: color 0.2s ease;
    }

    .contact-link:hover {
        color: var(--color-gold);
    }

    /* CTA Section */
    .footer-col-cta {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        align-items: flex-start;
    }

    @media (min-width: 1024px) {
        .footer-col-cta {
            align-items: flex-end;
        }
    }

    .footer-cta-title {
        font-family: var(--font-serif);
        font-size: 1.75rem;
        font-weight: 500;
        color: var(--color-cream);
        margin: 0;
        letter-spacing: -0.02em;
        line-height: 1.2;
    }

    .footer-cta-desc {
        font-size: 0.9375rem;
        color: var(--color-gray);
        font-weight: 400;
        margin: 0;
        line-height: 1.5;
        max-width: 24ch;
    }

    @media (min-width: 1024px) {
        .footer-cta-desc {
            text-align: right;
            margin-left: auto;
        }
    }

    .cta-button {
        background: linear-gradient(135deg, var(--color-gold) 0%, var(--color-gold-dim) 100%);
        color: var(--color-dark);
        font-weight: 600;
        font-size: 0.8125rem;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        padding: 0.875rem 1.75rem;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.25s ease;
        display: inline-block;
        text-decoration: none;
        text-align: center;
    }

    .cta-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(193, 155, 70, 0.35);
    }

    /* Bottom Section */
    .footer-bottom {
        border-top: 1px solid #e7e5e4;
        background: #F4F4F4;
    }

    .footer-bottom-inner {
        max-width: 1280px;
        margin: 0 auto;
        padding: 1.25rem 1.5rem;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        gap: 1rem;
    }

    .copyright {
        font-size: 0.8125rem;
        color: var(--color-gray);
        font-weight: 400;
        margin: 0;
        text-align: left;
    }

    .social-links {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .social-link {
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #FFFFFF;
        border: 1px solid #e7e5e4;
        border-radius: 8px;
        color: var(--color-gold);
        transition: all 0.25s ease;
    }

    .social-link:hover {
        background: rgba(193, 155, 70, 0.12);
        border-color: var(--color-gold);
        transform: translateY(-2px);
    }

    .social-link svg {
        width: 18px;
        height: 18px;
    }

    /* Mobile */
    @media (max-width: 639px) {
        .footer-wrapper {
            margin-top: 2rem;
        }
        .footer-divider {
            padding: 0.75rem 1rem 0;
        }
        .footer-divider-line {
            margin: 0;
        }
        .footer-content {
            padding: 1.25rem 1rem 1.5rem;
        }
        .footer-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
            max-width: 400px;
            margin: 0 auto;
        }
        .footer-col-brand {
            gap: 0.5rem;
            text-align: center;
        }
        .footer-logo-link {
            display: inline-flex;
            justify-content: center;
        }
        .footer-logo-img {
            height: 2rem;
        }
        .footer-about {
            font-size: 0.8125rem;
            line-height: 1.5;
            max-width: none;
            text-align: center;
        }
        .footer-col-contact {
            gap: 0.75rem;
            text-align: center;
        }
        .footer-section-title {
            font-size: 0.6875rem;
        }
        .footer-contact-list {
            gap: 0.625rem;
        }
        .contact-item {
            text-align: center;
        }
        .contact-value {
            font-size: 0.8125rem;
        }
        .contact-item:first-child .contact-value br {
            display: none;
        }
        .footer-col-cta {
            align-items: center;
            gap: 0.75rem;
            padding-top: 0.25rem;
            border-top: 1px solid #e7e5e4;
        }
        .footer-cta-title {
            font-size: 1.375rem;
            text-align: center;
        }
        .footer-cta-desc {
            font-size: 0.8125rem;
            text-align: center;
            max-width: none;
        }
        .cta-button {
            width: 100%;
            max-width: 280px;
            padding: 0.75rem 1.25rem;
            font-size: 0.75rem;
        }
        .footer-bottom-inner {
            padding: 0.875rem 1rem;
            gap: 0.75rem;
        }
        .copyright {
            font-size: 0.6875rem;
            line-height: 1.4;
            order: 2;
            width: 100%;
            text-align: center;
        }
        .social-links {
            order: 1;
            width: 100%;
            justify-content: center;
        }
        .social-link {
            width: 36px;
            height: 36px;
        }
        .social-link svg {
            width: 16px;
            height: 16px;
        }
    }
</style>
