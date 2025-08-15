<!-- Service Process -->
<section class="section">
    <div class="container-custom">
        <div class="section-header fade-in">
            <h2 class="section-title">Our Service Process</h2>
            <p class="section-subtitle">
                A structured approach that ensures quality, efficiency, and exceptional results for every engagement.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-{{ min(count($serviceProcesses), 4) }} gap-8">
            @foreach($serviceProcesses as $index => $process)
            <div class="text-center fade-in {{ $index > 0 ? 'fade-in-delay-' . $index : '' }}">
                <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4"
                     style="background-color: {{ $process->color }};">
                    @if($process->icon)
                        <i class="{{ $process->icon }} text-xl text-crisp-white"></i>
                    @else
                        <span class="text-2xl font-bold text-crisp-white">{{ $process->step_number }}</span>
                    @endif
                </div>
                <h4 class="text-xl font-montserrat font-semibold text-deep-chartered-blue mb-2">{{ $process->title }}</h4>
                <p class="text-report-black">{{ $process->description }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
