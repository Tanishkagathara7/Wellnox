@props([
    'finishes' => []
])

<section id="finishes" class="section-padding section-bg-light available-finishes-section">
    <div class="container">
        <div class="row align-items-end mb-4">
            <div class="col-lg-6">
                <span class="section-eyebrow">AVAILABLE FINISHES</span>
                <h2 class="section-heading">A Finish for Every Style</h2>
            </div>
            <div class="col-lg-6 text-lg-end mt-2 mt-lg-0">
                <p class="section-subtext mb-0">Choose from a range of premium finishes to match your interior design.</p>
            </div>
        </div>

        <!-- 5 Interactive Finish Cards -->
        <div class="row g-2 g-md-3 g-lg-4">
            @foreach($finishes as $index => $finish)
                <div class="col">
                    <div class="finish-card {{ $index === 0 ? 'active' : '' }}" 
                         data-key="{{ $finish['key'] }}"
                         data-name="{{ $finish['name'] }}"
                         data-desc="{{ $finish['description'] }}"
                         data-img="{{ asset($finish['image']) }}"
                         data-tag="{{ $finish['tag'] }}">
                        <div class="finish-img-box">
                            <img src="{{ asset($finish['image']) }}" alt="{{ $finish['name'] }}" loading="lazy">
                        </div>
                        <h4 class="finish-label">{{ $finish['name'] }}</h4>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Interactive Finish Dynamic Viewer Banner -->
        @if(!empty($finishes))
            <div class="finish-detail-banner mt-4">
                <div class="row align-items-center">
                    <div class="col-md-3 text-center">
                        <img id="selected-finish-img" src="{{ asset($finishes[0]['image']) }}" alt="Selected Finish" style="max-height: 110px; width: auto;" class="img-fluid">
                    </div>
                    <div class="col-md-6 border-start-md ps-md-4 mt-3 mt-md-0">
                        <span id="selected-finish-tag" class="spec-badge mb-2">{{ $finishes[0]['tag'] }}</span>
                        <h4 id="selected-finish-title" class="font-serif mb-2">{{ $finishes[0]['name'] }}</h4>
                        <p id="selected-finish-desc" class="text-muted small mb-0">{{ $finishes[0]['description'] }}</p>
                    </div>
                    <div class="col-md-3 text-md-end mt-3 mt-md-0">
                        <a href="{{ asset('assets/images/catalog/wellnox_Drainer_New_Catalog.pdf') }}" target="_blank" rel="noopener noreferrer" class="btn-pill-outline-dark">
                            <i class="bi bi-file-earmark-pdf"></i>
                            <span>View in Catalog</span>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
