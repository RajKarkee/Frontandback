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
                        </div>
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
