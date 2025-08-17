@extends('admin.layouts.app')

@section('title', 'Home Settings Management')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box" style="display: flex; justify-content: space-between; align-items: center;">
                <h4 class="page-title">Home Settings Management</h4>
                <div class="page-title-right">
                    <a href="{{ route('admin.home-settings.edit') }}" class="btn btn-primary">
                        <i class="mdi mdi-pencil"></i> Edit Settings
                    </a>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Current Home Settings</h5>

                    <!-- Key Statistics Section -->
                    <div class="mb-4">
                        <h6 class="text-primary">Key Statistics</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Section Title:</strong> {{ $homeSetting->key_statistics_title ?? 'Not set' }}</p>
                            </div>
                        </div>
                        <div class="row">
                            @if($homeSetting->statistics && is_array($homeSetting->statistics))
                                @foreach($homeSetting->statistics as $index => $statistic)
                                    <div class="col-md-4 mb-3">
                                        <div class="card border-secondary">
                                            <div class="card-body">
                                                <h5 class="card-title text-primary">{{ $statistic['number'] ?? 'N/A' }}</h5>
                                                <p class="card-text">{{ $statistic['label'] ?? 'N/A' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12">
                                    <p class="text-muted">No statistics configured</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <hr>

                    <!-- Why Choose Us Section -->
                    <div class="mb-4">
                        <h6 class="text-primary">Why Choose Us</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Section Title:</strong> {{ $homeSetting->why_choose_us_title ?? 'Not set' }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Image:</strong>
                                    @if($homeSetting->why_choose_us_image)
                                        <span class="text-success">Uploaded</span>
                                        <small class="text-muted d-block">{{ $homeSetting->why_choose_us_image }}</small>
                                    @else
                                        <span class="text-muted">Not set</span>
                                    @endif
                                </p>
                                <p><strong>Image Alt Text:</strong> {{ $homeSetting->why_choose_us_image_alt ?? 'Not set' }}</p>
                            </div>
                        </div>
                        @if($homeSetting->why_choose_us_image)
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <div class="card">
                                        <img src="{{ asset('storage/' . $homeSetting->why_choose_us_image) }}" class="card-img-top" alt="{{ $homeSetting->why_choose_us_image_alt }}" style="height: 200px; object-fit: cover;">
                                        <div class="card-body">
                                            <small class="text-muted">Current section image</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="row">
                            @if($homeSetting->features && is_array($homeSetting->features))
                                @foreach($homeSetting->features as $index => $feature)
                                    <div class="col-md-6 mb-3">
                                        <div class="card border-info">
                                            <div class="card-body">
                                                <h6 class="card-title">{{ $feature['title'] ?? 'N/A' }}</h6>
                                                <p class="card-text">{{ $feature['description'] ?? 'N/A' }}</p>
                                                @if(isset($feature['icon']))
                                                    <small class="text-muted">Icon: {{ $feature['icon'] }}</small>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12">
                                    <p class="text-muted">No features configured</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="text-end">
                        <small class="text-muted">
                            Last updated: {{ $homeSetting->updated_at ? $homeSetting->updated_at->format('M j, Y g:i A') : 'Never' }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
