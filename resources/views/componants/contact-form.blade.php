@php
    $contactData = $contact ?? [];
    $socialLinks = $socials ?? [];
@endphp

<section class="py-5">
    <div class="container px-5">
        <div class="contact-shell rounded-4 py-5 px-4 px-md-5">
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
                        <p class="text-muted mb-4">Vul het formulier in en je ontvangt binnen één werkdag een reactie via e-mail.</p>

                        @if(session('status'))
                            <div class="alert alert-success small mb-3">
                                {{ session('status') }}
                            </div>
                        @endif

                        @if($errors->any())
                            <div class="alert alert-danger small mb-3">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('contact.send') }}" class="contact-form">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Naam</label>
                                <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" name="email" id="email" class="form-control" required value="{{ old('email') }}">
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Onderwerp</label>
                                <input type="text" name="subject" id="subject" class="form-control" required value="{{ old('subject') }}">
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Bericht</label>
                                <textarea name="message" id="message" rows="4" class="form-control" required>{{ old('message') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                <i class="bi bi-send me-2"></i>
                                {{ __('messages.send_message') }}
                            </button>
                        </form>
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
    .contact-shell {
        background: #f8fafc;
    }

    body.darkmode .contact-shell {
        background: transparent;
    }

    .contact-card {
        background: #fff;
        border-radius: 24px;
        padding: 32px;
        box-shadow: 0 12px 35px rgba(31, 38, 135, 0.12);
        border: 1px solid rgba(95, 46, 234, 0.05);
    }

    body.darkmode .contact-card {
        background: var(--color-card-bg);
        border-color: rgba(148, 163, 184, 0.25);
        box-shadow: 0 18px 45px rgba(15,23,42,0.6);
    }

    .contact-form .form-control {
        border-radius: 14px;
        border-color: rgba(148, 163, 184, 0.6);
        box-shadow: 0 1px 2px rgba(15,23,42,0.03);
    }

    body.darkmode .contact-form .form-control {
        background-color: #020617;
        border-color: rgba(148,163,184,0.6);
        color: #e5e7eb;
    }

    body.darkmode .contact-form .form-control::placeholder {
        color: #64748b;
    }

    .contact-form .form-control:focus {
        border-color: rgba(59,130,246,0.9);
        box-shadow: 0 0 0 1px rgba(59,130,246,0.3);
    }

    .contact-title {
        font-weight: 700;
        margin-bottom: 1.5rem;
        color: #1f1c2c;
    }

    body.darkmode .contact-title {
        color: #e5e7eb;
    }

    .contact-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 1rem;
        padding: 0.5rem 0;
        color: #454056;
    }

    body.darkmode .contact-item {
        color: #e5e7eb;
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
