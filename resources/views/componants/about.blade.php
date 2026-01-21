@php
    $aboutData = $about ?? [];
    $descriptions = $aboutData['descriptions'] ?? [
        'Ik houd van het maken van slimme software die werk makkelijker en efficiënter maakt.',
        'Ik heb ervaring met verschillende programmeertalen en frameworks, waaronder Java, React, Node.js, Laravel, en meer.',
        'Ik ben een echte teamspeler en ik hou van samenwerken met anderen om complexe problemen op te lossen.',
    ];
@endphp

<!-- Modern About Section -->
<section class="modern-about-section">
    <div class="about-container">
        <!-- Main Content Row -->
        <div class="about-main-content">
            <!-- Photo Card (Left) -->
            <div class="photo-card">
                <div class="photo-card-content">
                    <h2 class="photo-name">{{ $aboutData['name'] ?? 'Eyobiel Goitom' }}</h2>
                    <p class="photo-role">{{ $aboutData['role'] ?? 'Founder · EG Web Solutions' }}</p>
                    <div class="accent-line"></div>
                    <div class="photo-container">
                        <img src="{{ asset($aboutData['photo'] ?? 'assets/m12.png') }}" alt="{{ $aboutData['name'] ?? 'Eyobiel Goitom' }}" class="profile-photo">
                    </div>
                </div>
            </div>

            <!-- Bio Section (Right) -->
            <div class="bio-section">
                <div class="spinning-icon">
                    <img src="{{ asset('assets/circle.png') }}" alt="Spinning Icon" class="spinning-icon-img">
                </div>
                <h1 class="bio-title">{{ $aboutData['title'] ?? 'Ik help merken groeien met elegante én functionele digitale ervaringen.' }}</h1>
                <div class="bio-content">
                    @forelse($descriptions as $paragraph)
                        <p class="bio-text">{{ $paragraph }}</p>
                    @empty
                        <p class="bio-text">Ik houd van het maken van slimme software die werk makkelijker en efficiënter maakt.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Tools Section -->
        <div class="tools-section">
            <div class="tools-divider"></div>
            <div class="tools-bar">
                <div class="tool-icon" title="Java">
                    <img src="{{ asset('assets/java.png') }}" alt="Java" class="tool-icon-img">
                </div>
                <div class="tool-icon" title="CSS3">
                    <img src="{{ asset('assets/css3.png') }}" alt="CSS3" class="tool-icon-img">
                </div>
                <div class="tool-icon" title="HTML5">
                    <img src="{{ asset('assets/html5.png') }}" alt="HTML5" class="tool-icon-img">
                </div>
                <div class="tool-icon" title="React">
                    <img src="{{ asset('assets/react.png') }}" alt="React" class="tool-icon-img">
                </div>
                <div class="tool-icon" title="Laravel">
                    <img src="{{ asset('assets/Laravel.png') }}" alt="Laravel" class="tool-icon-img">
                </div>
                <div class="tool-icon" title="Figma">
                    <img src="{{ asset('assets/figma.png') }}" alt="Figma" class="tool-icon-img">
                </div>
                <div class="tool-icon" title="Shopify">
                    <img src="{{ asset('assets/shopify.png') }}" alt="Shopify" class="tool-icon-img">
                </div>
                <div class="tool-icon" title="WordPress">
                    <img src="{{ asset('assets/wordpress.png') }}" alt="WordPress" class="tool-icon-img">
                </div>
            </div>
        </div>
    </div>
</section>
