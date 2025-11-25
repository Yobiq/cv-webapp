@php
    $projectItems = $projects ?? [];
@endphp

<!-- Modern Projects Section -->
<section class="modern-projects-section">
    <div class="projects-container">
        <!-- Header Section -->
        <div class="projects-header">
            <div class="header-content">
                <div class="header-logo">
                    <img src="{{ asset('assets/work.png') }}" alt="MC" class="logo-img">
                </div>
                <div class="header-info">
                    <h1 class="header-title">{{ __('messages.projects') }}</h1>
                </div>
                <div class="header-status">
                    <div class="status-badge">
                        <div class="status-dot"></div>
                        <span class="status-text">What I'm working on</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Projects Grid -->
        <div class="projects-grid">
            @forelse($projectItems as $project)
                <div class="project-card">
                    <div class="project-image-container">
                        @if(!empty($project['thumbnail']))
                            <img src="{{ asset($project['thumbnail']) }}" alt="{{ $project['title'] ?? 'Project thumbnail' }}" class="project-image">
                        @else
                            <div class="project-image-placeholder">{{ __('messages.no_image') }}</div>
                        @endif

                        @if(!empty($project['preview_link']))
                            <a class="project-link-btn" href="{{ $project['preview_link'] }}" target="_blank" rel="noopener">
                                <i class="bi bi-box-arrow-up-right"></i>
                            </a>
                        @endif
                    </div>
                    <div class="project-content">
                        <h3 class="project-title">{{ $project['title'] ?? '' }}</h3>
                        <div class="project-tech">
                            @php $tech = $project['technologies'] ?? []; @endphp
                            @foreach(array_slice($tech, 0, 4) as $label)
                                <span class="tech-badge">{{ $label }}</span>
                            @endforeach
                            @if(count($tech) > 4)
                                <span class="tech-badge more-badge">+{{ count($tech) - 4 }}</span>
                            @endif
                        </div>
                        <p class="project-description">{{ $project['summary'] ?? '' }}</p>
                        @if(!empty($project['preview_link']))
                            <a class="view-details-btn" href="{{ $project['preview_link'] }}" target="_blank" rel="noopener">
                                {{ __('messages.view_project') }}
                            </a>
                        @endif
                    </div>
                </div>
            @empty
                <p class="text-center text-muted w-100">{{ __('messages.no_projects_found') }}</p>
            @endforelse
        </div>
    </div>
</section>

<style>
/* Modern Projects Section */
.modern-projects-section {
    background-color: #181824;
    min-height: 100vh;
    padding: 60px 0;
    transition: background-color 0.3s ease;
}

/* Light mode */
body:not(.darkmode) .modern-projects-section {
    background-color: #f8f9fa;
}

.projects-container {
    max-width: 1100px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Header Section */
.projects-header {
    margin-bottom: 60px;
}

.header-content {
    display: flex;
    align-items: center;
    gap: 18px;
    background-color: rgba(32, 32, 40, 0.32);
    border-radius: 38px;
    padding: 20px 30px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(10px);
}

/* Light mode header */
body:not(.darkmode) .header-content {
    background-color: rgba(255, 255, 255, 0.8);
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.05);
}

.header-logo {
    flex-shrink: 0;
}

.logo-img {
    width: 56px;
    height: 56px;
    border-radius: 50%;
    border: 2px solid #23272b;
    object-fit: cover;
}

/* Light mode logo */
body:not(.darkmode) .logo-img {
    border-color: #e9ecef;
}

.header-info {
    flex: 1;
}

.header-title {
    font-size: 2rem;
    font-weight: 600;
    color: #ffffff;
    margin: 0;
    letter-spacing: 0.03em;
}

/* Light mode title */
body:not(.darkmode) .header-title {
    color: #212529;
}

.header-status {
    flex-shrink: 0;
}

.status-badge {
    display: flex;
    align-items: center;
    gap: 8px;
    background-color: rgba(59, 130, 246, 0.1);
    border: 1px solid rgba(59, 130, 246, 0.2);
    border-radius: 18px;
    padding: 8px 18px;
}

.status-dot {
    width: 8px;
    height: 8px;
    background-color: #3b82f6;
    border-radius: 50%;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
}

.status-text {
    font-size: 0.9rem;
    font-weight: 500;
    color: #3b82f6;
}

/* Projects Grid */
.projects-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 32px;
}

/* Project Cards */
.project-card {
    background-color: #23272b;
    border: 1px solid #2d323a;
    border-radius: 18px;
    overflow: hidden;
    transition: all 0.18s cubic-bezier(0.4, 0, 0.2, 1);
    cursor: pointer;
    min-height: 340px;
    display: flex;
    flex-direction: column;
}

/* Light mode project cards */
body:not(.darkmode) .project-card {
    background-color: #ffffff;
    border-color: #e9ecef;
}

.project-card:hover {
    transform: translateY(-4px) scale(1.02);
    border-color: #3b82f6;
    box-shadow: 0 12px 48px rgba(59, 130, 246, 0.2);
}

.project-image-container {
    position: relative;
    width: 100%;
    height: 180px;
    overflow: hidden;
}

.project-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.project-card:hover .project-image {
    transform: scale(1.05);
}

.project-image-placeholder {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #3b82f6, #8b5cf6);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    font-size: 0.9rem;
    font-weight: 500;
}

.project-link-btn {
    position: absolute;
    top: 12px;
    right: 12px;
    width: 36px;
    height: 36px;
    background-color: rgba(59, 130, 246, 0.9);
    color: #ffffff;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    opacity: 0;
    transform: translateY(-10px);
}

.project-card:hover .project-link-btn {
    opacity: 1;
    transform: translateY(0);
}

.project-link-btn:hover {
    background-color: #3b82f6;
    transform: scale(1.1);
}

.project-content {
    padding: 24px 22px 18px 22px;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.project-title {
    font-size: 1.18rem;
    font-weight: 700;
    color: #ffffff;
    margin: 0 0 12px 0;
    line-height: 1.3;
}

body:not(.darkmode) .project-title {
    color: #212529;
}

.project-tech {
    margin-bottom: 16px;
    display: flex;
    flex-wrap: wrap;
    gap: 6px;
}

.tech-badge {
    background-color: rgba(59, 130, 246, 0.1);
    color: #3b82f6;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 0.8rem;
    font-weight: 500;
    border: 1px solid rgba(59, 130, 246, 0.2);
    transition: all 0.3s ease;
}

.more-badge {
    background-color: rgba(108, 117, 125, 0.1);
    color: #6c757d;
    border-color: rgba(108, 117, 125, 0.2);
}

.project-description {
    color: #b0b6be;
    font-size: 1.01rem;
    line-height: 1.5;
    margin: 0 0 20px 0;
    flex: 1;
}

body:not(.darkmode) .project-description {
    color: #6c757d;
}

.view-details-btn {
    background: linear-gradient(135deg, #3b82f6, #8b5cf6);
    color: #ffffff;
    border: none;
    border-radius: 12px;
    padding: 10px 20px;
    font-size: 0.9rem;
    font-weight: 600;
    transition: all 0.3s ease;
    align-self: flex-start;
    text-decoration: none;
}

.view-details-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
    color: #fff;
}

@media (max-width: 600px) {
    .projects-grid {
        grid-template-columns: 1fr;
        gap: 24px;
    }

    .header-content {
        flex-direction: column;
        text-align: center;
        gap: 12px;
        padding: 16px 20px;
    }

    .header-title {
        font-size: 1.6rem;
    }

    .projects-container {
        padding: 0 15px;
    }

    .project-content {
        padding: 20px 18px 16px 18px;
    }

    .project-title {
        font-size: 1.1rem;
    }

    .project-description {
        font-size: 0.95rem;
    }
}

@media (max-width: 480px) {
    .project-content {
        padding: 18px 16px 14px 16px;
    }

    .project-title {
        font-size: 1rem;
    }

    .project-description {
        font-size: 0.9rem;
    }
}
</style>
