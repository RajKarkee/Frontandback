@props([
    'jumbotron' => null,
    'height' => '60vh',
    'minHeight' => '60vh',
    'overlayOpacity' => '40',
    'textColor' => 'crisp-white',
    'pageSlug' => null
])

@php
    if ($pageSlug) {
        $isMultiSlide = \App\Helpers\JumbotronHelper::isMultiSlidePage($pageSlug);

        if ($isMultiSlide) {
            $slides = \App\Helpers\JumbotronHelper::getSlides($pageSlug);
        } else {
            $jumbotron = \App\Helpers\JumbotronHelper::getJumbotronWithFallback($pageSlug);
        }
    }

    if (!isset($isMultiSlide) && !$jumbotron) {
        $jumbotron = (object) [
            'title' => 'Insights & Articles',
            'subtitle' => 'Stay ahead with our latest thought leadership, industry analysis, and expert perspectives on accounting, taxation, and business trends.',
            'background_image_url' => 'https://images.unsplash.com/photo-1464983953574-0892a716854b?q=80&w=1600&auto=format&fit=crop'
        ];
    }
@endphp

@if(isset($isMultiSlide) && $isMultiSlide && isset($slides) && $slides->count() > 0)
    @include('components.jumbotron-slider', [
        'slides' => $slides,
        'pageSlug' => $pageSlug,
        'height' => $height,
        'minHeight' => $minHeight,
        'overlayOpacity' => $overlayOpacity,
        'textColor' => $textColor,
        'slot' => $slot ?? null
    ])
@else
<section class="hero-section relative overflow-x-hidden p-0 m-0">
    <div class="relative w-full p-0 m-0">
        <div class="relative w-full h-[{{ $height }}] min-h-[{{ $minHeight }}] overflow-hidden">
            <div class="absolute inset-0 w-full h-full bg-cover bg-center" style="background-image: url('{{ $jumbotron->background_image_url }}');"></div>
            <div class="absolute inset-0 bg-black/{{ $overlayOpacity }}"></div>
            <div class="relative z-20 flex flex-col items-center justify-center h-full text-center text-{{ $textColor }} px-4 md:px-12">
                <h1 class="hero-title">{{ $jumbotron->title }}</h1>
                <p class="hero-subtitle max-w-4xl mx-auto">
                    {{ $jumbotron->subtitle }}
                </p>
                <div class="mt-6 md:mt-8">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@push('styles')
<style>
.hero-section {
    position: relative;
    width: 100%;
}
</style>
@endpush
