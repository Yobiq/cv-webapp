@extends('app')

@section('content')
    <div class="container py-5">
        <div class="resume-header text-center mb-5">
            <h1 class="display-4 fw-bold mb-3">{{ __('messages.cv') }}</h1>
            <div class="resume-download-section mt-5">
                @php
                    $resumeData = $resumeMeta ?? [];
                    $downloadPath = $resumeData['download_path'] ?? null;
                    $downloadLabel = $resumeData['download_label'] ?? __('messages.download_cv');
                    $passwordEnabled = $resumeData['password_enabled'] ?? false;
                @endphp
                
                @if(!$isAuthenticated && $passwordEnabled)
                    <div class="password-form-container">
                        <div class="password-card">
                            <div class="password-icon mb-4">
                                <i class="bi bi-lock-fill"></i>
                            </div>
                            <h3 class="mb-3">CV Beveiligd</h3>
                            <p class="text-muted mb-4">Voer het wachtwoord in om toegang te krijgen tot het CV.</p>
                            
                            @if(session('success'))
                                <div class="alert alert-success mb-3">
                                    {{ session('success') }}
                                </div>
                            @endif
                            
                            @if($errors->any())
                                <div class="alert alert-danger mb-3">
                                    <ul class="mb-0">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            
                            <form method="POST" action="{{ route('resume.verify') }}" class="password-form">
                                @csrf
                                <div class="mb-4">
                                    <label for="password" class="form-label">Wachtwoord</label>
                                    <input type="password" 
                                           name="password" 
                                           id="password" 
                                           class="form-control form-control-lg" 
                                           required 
                                           autofocus
                                           placeholder="Voer wachtwoord in">
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg w-100">
                                    <i class="bi bi-unlock me-2"></i>
                                    Toegang Verkrijgen
                                </button>
                            </form>
                        </div>
                    </div>
                @elseif($downloadPath)
                    <div class="resume-buttons d-flex gap-3 justify-content-center flex-wrap">
                        <a class="btn btn-preview-cv px-5 py-3" href="{{ route('resume.preview') }}" target="_blank" rel="noopener">
                            <i class="bi bi-eye me-2"></i>
                            Preview CV
                        </a>
                        <a class="btn btn-download-cv px-5 py-3" href="{{ route('resume.download') }}">
                            <i class="bi bi-download me-2"></i>
                            {{ $downloadLabel }}
                        </a>
                    </div>
                @else
                    <p class="text-muted">{{ __('messages.no_cv_available') }}</p>
                @endif
            </div>
        </div>
         </div>
@endsection

<style>
    .resume-header {
        position: relative;
        min-height: 60vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    
    .resume-download-section {
        margin-top: 3rem;
    }
    
    .resume-buttons {
        gap: 1.5rem;
    }
    
    .btn-preview-cv,
    .btn-download-cv {
        border-radius: 16px;
        font-weight: 600;
        font-size: 1.2rem;
        padding: 1.25rem 3rem;
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        border: 2px solid transparent;
    }
    
    .btn-preview-cv {
        background: var(--color-card-bg);
        color: var(--color-text);
        border-color: rgba(var(--color-primary-rgb, 95, 46, 234), 0.3);
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
    }
    
    .btn-preview-cv:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 24px rgba(var(--color-primary-rgb, 95, 46, 234), 0.2);
        border-color: var(--color-primary);
        background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-alt) 100%);
        color: #fff;
    }
    
    .btn-download-cv {
        background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-alt) 100%);
        color: #fff;
        box-shadow: 0 4px 16px rgba(var(--color-primary-rgb, 95, 46, 234), 0.2);
    }
    
    .btn-download-cv:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 24px rgba(var(--color-primary-rgb, 95, 46, 234), 0.3);
        color: #fff;
    }
    
    .btn-preview-cv:active,
    .btn-download-cv:active {
        transform: translateY(-1px);
    }
    
    @media (max-width: 576px) {
        .resume-buttons {
            flex-direction: column;
            width: 100%;
            max-width: 300px;
        }
        
        .btn-preview-cv,
        .btn-download-cv {
            width: 100%;
            justify-content: center;
        }
    }
    
    /* Animaties voor page load */
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
    
    .resume-header {
        animation: fadeInUp 0.6s ease-out;
    }
    
    .password-form-container {
        max-width: 450px;
        margin: 0 auto;
    }
    
    .password-card {
        background: var(--color-card-bg);
        border-radius: 24px;
        padding: 3rem;
        box-shadow: 0 12px 35px rgba(31, 38, 135, 0.12);
        border: 1px solid rgba(95, 46, 234, 0.05);
    }
    
    body.darkmode .password-card {
        border-color: rgba(148, 163, 184, 0.25);
        box-shadow: 0 18px 45px rgba(15,23,42,0.6);
    }
    
    .password-icon {
        font-size: 4rem;
        color: var(--color-primary);
        display: flex;
        justify-content: center;
    }
    
    .password-form .form-control {
        border-radius: 14px;
        border-color: rgba(148, 163, 184, 0.6);
        box-shadow: 0 1px 2px rgba(15,23,42,0.03);
        padding: 0.75rem 1rem;
    }
    
    body.darkmode .password-form .form-control {
        background-color: #020617;
        border-color: rgba(148,163,184,0.6);
        color: #e5e7eb;
    }
    
    .password-form .form-control:focus {
        border-color: var(--color-primary);
        box-shadow: 0 0 0 3px rgba(95, 46, 234, 0.1);
    }
    
    @media (max-width: 576px) {
        .password-card {
            padding: 2rem 1.5rem;
        }
    }
</style>
