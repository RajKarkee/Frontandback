@extends('layouts.app')

@section('title', 'Our Offices - Chartered Insights')
@section('meta_description', 'Visit Chartered Insights offices across Nepal. Find our locations in Kathmandu, Pokhara, and Chitwan with contact details, directions, and office hours.')

@section('content')
<!-- Hero Section -->
<x-jumbotron page-slug="offices" />

@includeIf('front.cache.office.index')

<!-- Office Services -->
@includeIf('front.cache.offices.services')



<!-- Contact CTA -->
<section class="section">
    <div class="container-custom">
        <div class="text-center fade-in">
            <h2 class="section-title">Visit Us Today</h2>
            <p class="section-subtitle max-w-3xl mx-auto mb-8">
                Whether you need a quick consultation or comprehensive business advisory services, our team is ready to help. Visit any of our offices or contact us to schedule an appointment.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact') }}" class="btn-primary">
                    Contact Us
                    <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
                <a href="{{ route('services') }}" class="btn-outline">
                    Our Services
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.office-card {
    background: white;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.office-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
}

.office-card.main-office {
    border: 3px solid #00BFB2;
}

.office-image-container {
    position: relative;
}

.office-image {
    width: 100%;
    height: 250px;
    object-fit: cover;
}

.office-badge {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: #00BFB2;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 1rem;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
}

.office-content {
    padding: 2rem;
}

.office-title {
    font-size: 1.5rem;
    font-weight: bold;
    color: #015A77;
    margin-bottom: 1rem;
    font-family: 'Montserrat', sans-serif;
}

.office-description {
    color: #666;
    margin-bottom: 1.5rem;
    line-height: 1.6;
}

.office-details {
    margin-bottom: 1.5rem;
}

.office-details.compact .office-detail-item {
    margin-bottom: 1rem;
}

.office-detail-item {
    display: flex;
    align-items: flex-start;
    margin-bottom: 1.5rem;
}

.office-icon {
    width: 1.25rem;
    height: 1.25rem;
    color: #00BFB2;
    margin-right: 0.75rem;
    flex-shrink: 0;
    margin-top: 0.125rem;
}

.office-detail-item h4 {
    font-weight: 600;
    color: #015A77;
    margin-bottom: 0.25rem;
    font-size: 0.9rem;
}

.office-detail-item p {
    color: #666;
    font-size: 0.9rem;
    line-height: 1.4;
}

.office-actions {
    display: flex;
    gap: 0.75rem;
    flex-wrap: wrap;
}

.map-container {
    background: white;
    border-radius: 1rem;
    overflow: hidden;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.map-placeholder {
    padding: 4rem 2rem;
    text-align: center;
    background: #f8f9fa;
}

.service-highlight:hover {
    transform: translateY(-2px);
    transition: all 0.3s ease;
}

@media (max-width: 768px) {
    .office-card.main-office .grid {
        grid-template-columns: 1fr;
    }

    .office-actions {
        flex-direction: column;
    }
}
</style>
@endpush

@push('scripts')
{{-- <script>
function showParkingModal() {
    @if($offices->whereNotNull('parking_info')->count() > 0)
    var parkingModal = new bootstrap.Modal(document.getElementById('parkingModal'));
    parkingModal.show();
    @else
    alert('Parking information will be available soon!');
    @endif
}

function showTransportModal() {
    @if($offices->whereNotNull('transportation')->count() > 0)
    var transportModal = new bootstrap.Modal(document.getElementById('transportModal'));
    transportModal.show();
    @else
    alert('Transportation information will be available soon!');
    @endif
}
</script> --}}
@endpush
