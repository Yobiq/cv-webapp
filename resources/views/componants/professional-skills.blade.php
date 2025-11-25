<section class="container">
    <!-- Skillset Card-->
    <div class="card shadow border-0 rounded-4 mb-5">
        <div class="card-body p-5">
            <!-- Professional skills list-->
            <div class="mb-5">
                <div class="d-flex align-items-center mb-4">
                    <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 me-3"><i class="bi bi-tools"></i></div>
                    <h2 class="text-primary fw-bolder mb-4">Vaardigheden</h2>
                </div>
                <div class="row row-cols-1 row-cols-md-3 mb-4">
                    @forelse(($skills ?? []) as $skill)
                        <div class="col mb-4 mb-md-4">
                            <div class="d-flex align-items-center bg-light rounded-4 p-3 h-100">{{ $skill }}</div>
                        </div>
                    @empty
                        <p class="text-muted">Er zijn geen vaardigheden opgegeven.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
