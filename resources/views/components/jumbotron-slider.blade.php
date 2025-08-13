@props([
    'slides',
    'pageSlug',
    'height' => '60vh',
    'minHeight' => '60vh',
    'overlayOpacity' => '40',
    'textColor' => 'crisp-white',
    'slot' => null
])

@if($slides && $slides->count() > 0)
<section class="hero-section relative overflow-hidden p-0 m-0">
    <!-- Carousel Container -->
    <div id="hero-carousel-{{ $pageSlug }}" class="relative w-full h-[{{ $height }}] min-h-[{{ $minHeight }}] overflow-hidden bg-black">

        <!-- Slides -->
        @foreach($slides as $index => $slide)
        <div class="carousel-slide absolute inset-0 w-full h-full transition-opacity duration-[1500ms] ease-in-out {{ $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' }}"
             data-slide="{{ $index }}">

            <!-- Image -->
            <img
                src="{{ $slide->background_image_url }}"
                alt="{{ $slide->title ?? 'Slide' }}"
                class="w-full h-full object-contain md:object-cover transition-transform duration-[20s] ease-in-out"
            />

            <!-- Overlay -->
            <div class="absolute inset-0 bg-black/{{ $overlayOpacity }}"></div>

            <!-- Content -->
            <div class="absolute inset-0 z-20 flex flex-col items-center justify-center text-center text-{{ $textColor }} px-4 md:px-12">
                <h1 class="hero-title mb-6 opacity-0 translate-y-8 transition-all duration-[1800ms] ease-in-out delay-700"
                    data-animate="slide-{{ $index }}">{{ $slide->title }}</h1>

                <p class="hero-subtitle max-w-4xl mx-auto mb-8 opacity-0 translate-y-8 transition-all duration-[1800ms] ease-in-out delay-1000"
                   data-animate="slide-{{ $index }}">
                    {{ $slide->subtitle }}
                </p>

                @if($slide->button_text && $slide->button_link)
                <div class="opacity-0 translate-y-8 transition-all duration-[1800ms] ease-in-out delay-1300"
                     data-animate="slide-{{ $index }}">
                    <a href="{{ $slide->button_link }}" class="btn-primary inline-flex items-center">
                        {{ $slide->button_text }}
                        <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
                @endif

                @if($slot && $index === 0)
                <div class="opacity-0 translate-y-8 transition-all duration-[1800ms] ease-in-out delay-1600"
                     data-animate="slide-{{ $index }}">
                    {{ $slot }}
                </div>
                @endif
            </div>
        </div>
        @endforeach

        <!-- Indicators -->
        {{-- @if($slides->count() > 1)
        <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 z-30 flex space-x-2">
            @foreach($slides as $index => $slide)
            <button class="carousel-indicator w-3 h-3 rounded-full transition-all duration-300 {{ $index === 0 ? 'bg-white scale-110' : 'bg-white/50 hover:bg-white/75' }}"
                    data-slide-to="{{ $index }}"></button>
            @endforeach
        </div>
        @endif --}}

        <!-- Arrows -->
        @if($slides->count() > 1)
        <button class="carousel-prev absolute left-4 top-1/2 -translate-y-1/2 z-30 w-12 h-12 rounded-full bg-black/30 hover:bg-black/50 text-white flex items-center justify-center group">
            <svg class="w-6 h-6 transform group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <button class="carousel-next absolute right-4 top-1/2 -translate-y-1/2 z-30 w-12 h-12 rounded-full bg-black/30 hover:bg-black/50 text-white flex items-center justify-center group">
            <svg class="w-6 h-6 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
        @endif

        <!-- Progress Bar -->
        @if($slides->count() > 1)
        <div class="absolute bottom-0 left-0 w-full h-1 bg-black/20 z-30">
            <div class="carousel-progress h-full bg-white/80 transition-all duration-[7000ms] ease-in-out w-0"></div>
        </div>
        @endif
    </div>
</section>

@push('styles')
<style>
.hero-section img {
    transition: transform 20s ease-in-out;
}
</style>
@endpush

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.getElementById('hero-carousel-{{ $pageSlug }}');
    if (!carousel) return;

    const slides = carousel.querySelectorAll('.carousel-slide');
    const indicators = carousel.querySelectorAll('.carousel-indicator');
    const prevBtn = carousel.querySelector('.carousel-prev');
    const nextBtn = carousel.querySelector('.carousel-next');
    const progressBar = carousel.querySelector('.carousel-progress');

    let currentSlide = 0;
    let autoPlayInterval;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle('opacity-100', i === index);
            slide.classList.toggle('z-10', i === index);
            slide.classList.toggle('opacity-0', i !== index);
            slide.classList.toggle('z-0', i !== index);
            slide.querySelectorAll('[data-animate]').forEach(el => {
                el.classList.toggle('opacity-0', i !== index);
                el.classList.toggle('translate-y-8', i !== index);
            });
        });

        indicators.forEach((indicator, i) => {
            indicator.classList.toggle('bg-white', i === index);
            indicator.classList.toggle('scale-110', i === index);
            indicator.classList.toggle('bg-white/50', i !== index);
        });

        currentSlide = index;
    }

    function nextSlide() {
        showSlide((currentSlide + 1) % slides.length);
    }

    function startAutoPlay() {
        if (slides.length <= 1) return;
        progressBar.style.width = '0%';
        setTimeout(() => progressBar.style.width = '100%', 50);
        autoPlayInterval = setInterval(() => {
            nextSlide();
            progressBar.style.width = '0%';
            setTimeout(() => progressBar.style.width = '100%', 50);
        }, 7000);
    }

    prevBtn?.addEventListener('click', () => {
        clearInterval(autoPlayInterval);
        showSlide((currentSlide - 1 + slides.length) % slides.length);
        setTimeout(startAutoPlay, 5000); // Resume after 5 seconds
    });
    nextBtn?.addEventListener('click', () => {
        clearInterval(autoPlayInterval);
        nextSlide();
        setTimeout(startAutoPlay, 5000); // Resume after 5 seconds
    });
    indicators.forEach((ind, i) => ind.addEventListener('click', () => {
        clearInterval(autoPlayInterval);
        showSlide(i);
        setTimeout(startAutoPlay, 5000); // Resume after 5 seconds
    }));

    showSlide(0);
    startAutoPlay();
});
</script>
@endpush
@endif
