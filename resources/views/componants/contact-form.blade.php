@php
    $contactData = $contact ?? [];
    $socialLinks = $socials ?? [];
@endphp

<section class="py-5">
    <div class="container px-5">
        <div class="bg-light rounded-4 py-5 px-4 px-md-5">
            <div class="text-center mb-5">
                <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                <h1 class="fw-bolder">{{ __('messages.get_in_touch') }}</h1>
                <p class="lead fw-normal text-muted mb-0">{{ __('messages.lets_work_together') }}</p>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-lg-6">
                    <div class="contact-card h-100">
                        <h3 class="contact-title">Contactgegevens</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="contact-item">
                                <i class="bi bi-envelope me-2"></i>
                                <a href="mailto:{{ $contactData['email'] ?? 'musabe.coucou@outlook.com' }}" class="contact-link">
                                    {{ $contactData['email'] ?? 'musabe.coucou@outlook.com' }}
                                </a>
                            </li>
                            <li class="contact-item">
                                <i class="bi bi-telephone me-2"></i>
                                <a href="tel:{{ $contactData['phone'] ?? '' }}" class="contact-link">
                                    {{ $contactData['phone'] ?? '+31 6 0000 0000' }}
                                </a>
                            </li>
                            <li class="contact-item">
                                <i class="bi bi-geo-alt me-2"></i>
                                <span>{{ $contactData['location'] ?? 'Zwolle, Nederland' }}</span>
                            </li>
                            <li class="contact-item">
                                <i class="bi bi-clock me-2"></i>
                                <span>{{ $contactData['availability'] ?? 'Beschikbaar voor freelance en vaste opdrachten' }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-card h-100">
                        <h3 class="contact-title">Samenwerken?</h3>
                        <p class="text-muted">Stuur een e-mail met een korte omschrijving van je project of vraag en ik reageer binnen één werkdag.</p>
                        <a class="btn btn-primary btn-lg w-100" href="mailto:{{ $contactData['email'] ?? 'musabe.coucou@outlook.com' }}">
                            <i class="bi bi-send me-2"></i>
                            {{ __('messages.send_message') }}
                        </a>
                    </div>
                </div>
            </div>

            @if(!empty($socialLinks))
                <div class="text-center mt-5">
                    <p class="text-muted mb-3">Connect via social media</p>
                    <div class="d-flex justify-content-center flex-wrap gap-3">
                        @foreach($socialLinks as $social)
                            <a href="{{ $social['url'] }}" class="contact-social" target="_blank" rel="noopener" aria-label="{{ $social['label'] }}">
                                <i class="bi {{ $social['icon'] }}"></i>
                                <span class="visually-hidden">{{ $social['label'] }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

<style>
    .contact-card {
        background: #fff;
        border-radius: 24px;
        padding: 32px;
        box-shadow: 0 12px 35px rgba(31, 38, 135, 0.12);
        border: 1px solid rgba(95, 46, 234, 0.05);
    }

    .contact-title {
        font-weight: 700;
        margin-bottom: 1.5rem;
        color: #1f1c2c;
    }

    .contact-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 1rem;
        padding: 0.5rem 0;
        color: #454056;
    }

    .contact-link {
        color: inherit;
        text-decoration: none;
    }

    .contact-link:hover {
        color: var(--color-primary);
        text-decoration: underline;
    }

    .contact-social {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--color-primary), var(--color-primary-alt));
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .contact-social:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 25px rgba(95, 46, 234, 0.3);
        color: #fff;
    }

    @media (max-width: 768px) {
        .contact-card {
            padding: 24px;
        }
    }
</style>
