<!-- Education Section-->
<section class="container">
    <h2 class="text-primary fw-bolder mb-4">Opleiding</h2>

    @forelse(($education ?? []) as $item)
        <div class="card shadow border-0 rounded-4 mb-5">
            <div class="card-body p-5">
                <div class="row align-items-center gx-5">
                    <div class="col text-center text-lg-start mb-4 mb-lg-0">
                        <div class="bg-light p-4 rounded-4">
                            <div class="text-secondary fw-bolder mb-2">{{ $item['duration'] ?? '' }}</div>
                            <div class="mb-2">
                                <div class="small fw-bolder">{{ $item['institution'] ?? '' }}</div>
                            </div>
                            <div class="fst-italic">
                                <div class="small text-muted">{{ $item['field'] ?? '' }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div>{!! nl2br(e($item['details'] ?? '')) !!}</div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p class="text-muted">Er zijn momenteel geen opleidingsgegevens beschikbaar.</p>
    @endforelse
</section>
