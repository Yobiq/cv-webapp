@php
    $experienceItems = $experiences ?? [];
    $resumeData = $resumeMeta ?? [];
    $downloadPath = $resumeData['download_path'] ?? null;
    $downloadLabel = $resumeData['download_label'] ?? __('messages.download_cv');
@endphp

<!-- Experience Section-->
<section class="container pt-4">
    <div class="text-center mb-5">
        <h2 class="text-gradient fw-bolder mb-3">{{ __('messages.experience') }}</h2>
        <div class="section-divider mx-auto mb-4"></div>
        <div class="download-button-container mt-4">
            @if($downloadPath)
                <a class="btn btn-download px-4 py-3" href="{{ asset($downloadPath) }}" download>
                    <div class="btn-download-content">
                        <div class="d-inline-block bi bi-download me-2"></div>
                        <span>{{ $downloadLabel }}</span>
                    </div>
                </a>
            @else
                <a class="btn btn-download px-4 py-3" href="{{ route('contact') }}">
                    <div class="btn-download-content">
                        <div class="d-inline-block bi bi-envelope me-2"></div>
                        <span>{{ $downloadLabel }}</span>
                    </div>
                </a>
            @endif
        </div>
        @if(!empty($resumeData['note']))
            <p class="text-muted small mt-3">{{ $resumeData['note'] }}</p>
        @endif
    </div>

    <div class="experience-timeline">
        @forelse($experienceItems as $index => $item)
            <div class="card shadow border-0 rounded-4 mb-5" style="animation-delay: {{ $index * 0.2 }}s">
                <div class="card-body p-5">
                    <div class="row align-items-center gx-5">
                        <div class="col text-center text-lg-start mb-4 mb-lg-0">
                            <div class="experience-meta p-4 rounded-4">
                                <div class="text-primary fw-bolder mb-2">{{ $item['duration'] ?? '' }}</div>
                                <div class="small fw-bolder">{{ $item['title'] ?? '' }}</div>
                                <div class="small text-muted">{{ $item['designation'] ?? '' }}</div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="experience-details">
                                @if(!empty($item['highlights']))
                                    <ul class="mb-0 ps-3">
                                        @foreach($item['highlights'] as $highlight)
                                            <li class="mb-2">{{ $highlight }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="mb-0">{{ $item['details'] ?? '' }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-muted">Er is momenteel geen ervaring beschikbaar.</p>
        @endforelse
    </div>
</section>

<style>
    .section-divider {
        height: 3px;
        width: 60px;
        background: linear-gradient(90deg, var(--color-primary), var(--color-primary-alt));
        border-radius: 2px;
    }

    .experience-timeline {
        position: relative;
    }

    .experience-timeline::before {
        content: '';
        position: absolute;
        left: 20px;
        top: 0;
        height: 100%;
        width: 2px;
        background: linear-gradient(to bottom, var(--color-primary) 0%, var(--color-primary-alt) 100%);
        opacity: 0.3;
        border-radius: 1px;
        display: none;
    }

    @media (min-width: 992px) {
        .experience-timeline::before {
            display: block;
        }
    }

    .download-button-container {
        display: flex;
        justify-content: center;
        margin-bottom: 1.5rem;
    }

    .btn-download {
        background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-alt) 100%);
        color: #fff;
        border: none;
        border-radius: 12px;
        font-weight: 500;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(var(--color-primary-rgb, 95, 46, 234), 0.2);
        text-decoration: none;
    }

    .btn-download:hover,
    .btn-download:focus {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(var(--color-primary-rgb, 95, 46, 234), 0.3);
        color: #fff;
    }

    .btn-download::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.2) 50%, rgba(255,255,255,0) 100%);
        transition: all 0.6s;
    }

    .btn-download:hover::before {
        left: 100%;
    }

    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
        animation: fadeInUp 0.6s ease-out;
        animation-fill-mode: both;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 24px rgba(var(--color-primary-rgb, 95, 46, 234), 0.15) !important;
    }

    .experience-meta {
        background: var(--color-bg-alt);
        transition: background-color var(--transition-speed);
    }

    .experience-details {
        color: var(--color-text);
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
