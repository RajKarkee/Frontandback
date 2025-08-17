@extends('admin.layouts.app')

@section('title', 'Edit Footer Settings')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-2">
                <div class="page-title-box" style="display: flex; justify-content: space-between; align-items: center;">
                    <h4 class="page-title">Edit Footer Settings</h4>
                    <div class="page-title-right">
                        <a href="{{ route('admin.footer-settings.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back to Footer Settings
                        </a>
                    </div>
                </div>
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form action="{{ route('admin.footer-settings.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <!-- Company Information Section -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Company Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="company_name" class="form-label">Company Name</label>
                                <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                                    id="company_name" name="company_name"
                                    value="{{ old('company_name', $footerSetting->company_name) }}"
                                    placeholder="Enter company name">
                                @error('company_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Company Address</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3"
                                    placeholder="Enter company address">{{ old('address', $footerSetting->address) }}</textarea>
                                @error('address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ old('email', $footerSetting->email) }}"
                                            placeholder="info@company.com">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                            id="phone" name="phone" value="{{ old('phone', $footerSetting->phone) }}"
                                            placeholder="+1-234-567-8900">
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="copyright_text" class="form-label">Copyright Text</label>
                                <input type="text" class="form-control @error('copyright_text') is-invalid @enderror"
                                    id="copyright_text" name="copyright_text"
                                    value="{{ old('copyright_text', $footerSetting->copyright_text) }}"
                                    placeholder="© 2024 Company Name. All rights reserved.">
                                @error('copyright_text')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Social Media Links Section -->
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Social Media Links</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="facebook" class="form-label">
                                    <i class="fab fa-facebook text-primary me-2"></i>Facebook
                                </label>
                                <input type="url"
                                    class="form-control @error('social_links.facebook') is-invalid @enderror" id="facebook"
                                    name="social_links[facebook]"
                                    value="{{ old('social_links.facebook', $footerSetting->social_links['facebook'] ?? '') }}"
                                    placeholder="https://facebook.com/yourpage">
                                @error('social_links.facebook')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="twitter" class="form-label">
                                    <i class="fab fa-twitter text-info me-2"></i>Twitter
                                </label>
                                <input type="url"
                                    class="form-control @error('social_links.twitter') is-invalid @enderror" id="twitter"
                                    name="social_links[twitter]"
                                    value="{{ old('social_links.twitter', $footerSetting->social_links['twitter'] ?? '') }}"
                                    placeholder="https://twitter.com/yourprofile">
                                @error('social_links.twitter')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="linkedin" class="form-label">
                                    <i class="fab fa-linkedin text-primary me-2"></i>LinkedIn
                                </label>
                                <input type="url"
                                    class="form-control @error('social_links.linkedin') is-invalid @enderror"
                                    id="linkedin" name="social_links[linkedin]"
                                    value="{{ old('social_links.linkedin', $footerSetting->social_links['linkedin'] ?? '') }}"
                                    placeholder="https://linkedin.com/company/yourcompany">
                                @error('social_links.linkedin')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="instagram" class="form-label">
                                    <i class="fab fa-instagram text-danger me-2"></i>Instagram
                                </label>
                                <input type="url"
                                    class="form-control @error('social_links.instagram') is-invalid @enderror"
                                    id="instagram" name="social_links[instagram]"
                                    value="{{ old('social_links.instagram', $footerSetting->social_links['instagram'] ?? '') }}"
                                    placeholder="https://instagram.com/yourprofile">
                                @error('social_links.instagram')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Quick Links Section -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Quick Links</h5>
                        </div>
                        <div class="card-body">
                            <div id="quick-links-container">
                                @if (old('quick_links'))
                                    @foreach (old('quick_links') as $index => $link)
                                        <div class="quick-link-item border rounded p-3 mb-3"
                                            data-index="{{ $index }}">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label">Title</label>
                                                    <input type="text"
                                                        class="form-control @error('quick_links.' . $index . '.label') is-invalid @enderror"
                                                        name="quick_links[{{ $index }}][label]"
                                                        value="{{ $link['label'] ?? '' }}" placeholder="e.g., About Us">
                                                    @error('quick_links.' . $index . '.label')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">URL</label>
                                                    <input type="text"
                                                        class="form-control @error('quick_links.' . $index . '.url') is-invalid @enderror"
                                                        name="quick_links[{{ $index }}][url]"
                                                        value="{{ $link['url'] ?? '' }}" placeholder="/about">
                                                    @error('quick_links.' . $index . '.url')
                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="text-end mt-2">
                                                <button type="button" class="btn btn-sm btn-danger remove-quick-link">
                                                    <i class="fas fa-trash"></i> Remove
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                @elseif($footerSetting->quick_links && is_array($footerSetting->quick_links))
                                    @foreach ($footerSetting->quick_links as $index => $link)
                                        <div class="quick-link-item border rounded p-3 mb-3"
                                            data-index="{{ $index }}">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" class="form-control"
                                                        name="quick_links[{{ $index }}][label]"
                                                        value="{{ $link['label'] ?? '' }}" placeholder="e.g., About Us">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">URL</label>
                                                    <input type="text" class="form-control"
                                                        name="quick_links[{{ $index }}][url]"
                                                        value="{{ $link['url'] ?? '' }}" placeholder="/about">
                                                </div>
                                            </div>
                                            <div class="text-end mt-2">
                                                <button type="button" class="btn btn-sm btn-danger remove-quick-link">
                                                    <i class="fas fa-trash"></i> Remove
                                                </button>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <button type="button" class="btn btn-sm btn-success" id="add-quick-link">
                                <i class="fas fa-plus"></i> Add Quick Link
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-12">
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let quickLinkIndex = {{ $footerSetting->quick_links ? count($footerSetting->quick_links) : 0 }};

            // Add Quick Link
            document.getElementById('add-quick-link').addEventListener('click', function() {
                const quickLinksContainer = document.getElementById('quick-links-container');

                const quickLinkHtml = `
                    <div class="quick-link-item border rounded p-3 mb-3" data-index="${quickLinkIndex}">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control"
                                       name="quick_links[${quickLinkIndex}][label]"
                                       placeholder="e.g., About Us">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">URL</label>
                                <input type="text" class="form-control"
                                       name="quick_links[${quickLinkIndex}][url]"
                                       placeholder="/about">
                            </div>
                        </div>
                        <div class="text-end mt-2">
                            <button type="button" class="btn btn-sm btn-danger remove-quick-link">
                                <i class="fas fa-trash"></i> Remove
                            </button>
                        </div>
                    </div>
                `;

                quickLinksContainer.insertAdjacentHTML('beforeend', quickLinkHtml);
                quickLinkIndex++;
            });

            // Remove Quick Link
            document.addEventListener('click', function(e) {
                if (e.target.closest('.remove-quick-link')) {
                    e.target.closest('.quick-link-item').remove();
                }
            });
        });
    </script>
@endpush
