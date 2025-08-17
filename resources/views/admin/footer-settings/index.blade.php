@extends('admin.layouts.app')

@section('title', 'Footer Settings Management')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 mb-2">
            <div class="page-title-box" style="display: flex; justify-content: space-between; align-items: center;">
                <h4 class="page-title">Footer Settings Management</h4>
                <div class="page-title-right">
                    <a href="{{ route('admin.footer-settings.edit') }}" class="btn btn-primary">
                        <i class="fas fa-edit"></i> Edit Settings
                    </a>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Current Footer Settings</h5>

                    <!-- Company Information Section -->
                    <div class="mb-4">
                        <h6 class="text-primary">Company Information</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong>Company Name:</strong> {{ $footerSetting->company_name ?? 'Not set' }}</p>
                                <p><strong>Address:</strong> {{ $footerSetting->address ?? 'Not set' }}</p>
                            </div>
                            <div class="col-md-6">
                                <p><strong>Email:</strong> {{ $footerSetting->email ?? 'Not set' }}</p>
                                <p><strong>Phone:</strong> {{ $footerSetting->phone ?? 'Not set' }}</p>
                            </div>
                        </div>
                        @if($footerSetting->copyright_text)
                            <div class="row">
                                <div class="col-12">
                                    <p><strong>Copyright Text:</strong></p>
                                    <p class="text-muted">{{ $footerSetting->copyright_text }}</p>
                                </div>
                            </div>
                        @endif
                    </div>

                    <hr>

                    <!-- Social Media Links Section -->
                    <div class="mb-4">
                        <h6 class="text-primary">Social Media Links</h6>
                        <div class="row">
                            @if($footerSetting->social_links && is_array($footerSetting->social_links))
                                @foreach($footerSetting->social_links as $platform => $url)
                                    @if($url)
                                        <div class="col-md-3 mb-3">
                                            <div class="card border-secondary">
                                                <div class="card-body">
                                                    <h6 class="card-title">
                                                        @if($platform === 'facebook')
                                                            <i class="fab fa-facebook text-primary"></i>
                                                        @elseif($platform === 'twitter')
                                                            <i class="fab fa-twitter text-info"></i>
                                                        @elseif($platform === 'linkedin')
                                                            <i class="fab fa-linkedin text-primary"></i>
                                                        @elseif($platform === 'instagram')
                                                            <i class="fab fa-instagram text-danger"></i>
                                                        @else
                                                            <i class="fas fa-link"></i>
                                                        @endif
                                                        {{ ucfirst($platform) }}
                                                    </h6>
                                                    <p class="card-text small">
                                                        <a href="{{ $url }}" target="_blank" class="text-decoration-none">
                                                            {{ $url }}
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <div class="col-12">
                                    <p class="text-muted">No social media links configured</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <hr>

                    <!-- Quick Links Section -->
                    <div class="mb-4">
                        <h6 class="text-primary">Quick Links</h6>
                        <div class="row">
                            @if($footerSetting->quick_links && is_array($footerSetting->quick_links))
                                @foreach($footerSetting->quick_links as $index => $link)
                                    <div class="col-md-3 mb-2">
                                        <div class="card border-info">
                                            <div class="card-body p-2">
                                                <h6 class="card-title small mb-1">{{ $link['label'] ?? 'N/A' }}</h6>
                                                <p class="card-text small mb-0">
                                                    <a href="{{ $link['url'] ?? '#' }}" class="text-decoration-none">
                                                        {{ $link['url'] ?? 'N/A' }}
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12">
                                    <p class="text-muted">No quick links configured</p>
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="text-end">
                        <small class="text-muted">
                            Last updated: {{ $footerSetting->updated_at ? $footerSetting->updated_at->format('M j, Y g:i A') : 'Never' }}
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
