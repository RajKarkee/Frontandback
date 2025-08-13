@extends('admin.layouts.app')

@section('title', 'View Office')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
<li class="breadcrumb-item"><a href="{{ route('admin.offices.index') }}">Offices</a></li>
<li class="breadcrumb-item active">{{ $office->name }}</li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">{{ $office->name }}</h5>
                    <div>
                        <span class="badge bg-{{ $office->status === 'active' ? 'success' : ($office->status === 'opening-soon' ? 'warning' : 'secondary') }}">
                            {{ ucfirst(str_replace('-', ' ', $office->status)) }}
                        </span>
                        @if($office->is_headquarters)
                            <span class="badge bg-primary">Headquarters</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        @if($office->image)
                            <div class="mb-4">
                                <img src="{{ Storage::url($office->image) }}" alt="{{ $office->name }}"
                                     class="img-fluid rounded" style="max-height: 400px; width: 100%; object-fit: cover;">
                            </div>
                        @endif

                        @if($office->description)
                            <div class="mb-4">
                                <h6 class="text-muted mb-2">Description</h6>
                                <div class="border rounded p-3" style="background-color: #f8f9fa;">
                                    {!! nl2br(e($office->description)) !!}
                                </div>
                            </div>
                        @endif

                        @if($office->services)
                            <div class="mb-4">
                                <h6 class="text-muted mb-2">Services Offered</h6>
                                <div class="border rounded p-3" style="background-color: #f0f8ff;">
                                    {!! nl2br(e($office->services)) !!}
                                </div>
                            </div>
                        @endif

                        @if($office->facilities)
                            <div class="mb-4">
                                <h6 class="text-muted mb-2">Facilities</h6>
                                <div class="border rounded p-3" style="background-color: #f5f5f5;">
                                    {!! nl2br(e($office->facilities)) !!}
                                </div>
                            </div>
                        @endif

                        @if($office->directions)
                            <div class="mb-4">
                                <h6 class="text-muted mb-2">Directions</h6>
                                <div class="border rounded p-3" style="background-color: #fff8f0;">
                                    {!! nl2br(e($office->directions)) !!}
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Office Information</h6>
                            </div>
                            <div class="card-body">
                                <table class="table table-borderless table-sm">
                                    <tr>
                                        <td><strong>Type:</strong></td>
                                        <td>
                                            @if($office->type)
                                                <span class="badge bg-info">{{ ucfirst(str_replace('-', ' ', $office->type)) }}</span>
                                            @else
                                                <span class="text-muted">Not specified</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Country:</strong></td>
                                        <td>{{ $office->country ?? 'Not specified' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Region:</strong></td>
                                        <td>{{ $office->region ?? 'Not specified' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Timezone:</strong></td>
                                        <td>{{ $office->timezone ?? 'Not specified' }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Languages:</strong></td>
                                        <td>
                                            @if($office->languages)
                                                @foreach(explode(',', $office->languages) as $language)
                                                    <span class="badge bg-light text-dark me-1">{{ trim($language) }}</span>
                                                @endforeach
                                            @else
                                                <span class="text-muted">Not specified</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Sort Order:</strong></td>
                                        <td>{{ $office->sort_order }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Created:</strong></td>
                                        <td>{{ $office->created_at->format('M d, Y g:i A') }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Updated:</strong></td>
                                        <td>{{ $office->updated_at->format('M d, Y g:i A') }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Address</h6>
                            </div>
                            <div class="card-body">
                                @if($office->address_line_1 || $office->address_line_2 || $office->city || $office->state || $office->postal_code)
                                    <address class="mb-0">
                                        @if($office->address_line_1)
                                            {{ $office->address_line_1 }}<br>
                                        @endif
                                        @if($office->address_line_2)
                                            {{ $office->address_line_2 }}<br>
                                        @endif
                                        @if($office->city || $office->state || $office->postal_code)
                                            {{ $office->city }}{{ $office->city && ($office->state || $office->postal_code) ? ', ' : '' }}
                                            {{ $office->state }} {{ $office->postal_code }}<br>
                                        @endif
                                        @if($office->country)
                                            {{ $office->country }}
                                        @endif
                                    </address>
                                @else
                                    <span class="text-muted">No address provided</span>
                                @endif
                            </div>
                        </div>

                        <div class="card mt-3">
                            <div class="card-header">
                                <h6 class="card-title mb-0">Contact Information</h6>
                            </div>
                            <div class="card-body">
                                @if($office->phone)
                                    <p class="mb-2">
                                        <i class="fas fa-phone text-muted me-2"></i>
                                        <a href="tel:{{ $office->phone }}">{{ $office->phone }}</a>
                                    </p>
                                @endif
                                @if($office->email)
                                    <p class="mb-2">
                                        <i class="fas fa-envelope text-muted me-2"></i>
                                        <a href="mailto:{{ $office->email }}">{{ $office->email }}</a>
                                    </p>
                                @endif
                                @if($office->fax)
                                    <p class="mb-2">
                                        <i class="fas fa-fax text-muted me-2"></i>
                                        {{ $office->fax }}
                                    </p>
                                @endif
                                @if($office->website)
                                    <p class="mb-0">
                                        <i class="fas fa-globe text-muted me-2"></i>
                                        <a href="{{ $office->website }}" target="_blank">Visit Website</a>
                                    </p>
                                @endif
                                @if(!$office->phone && !$office->email && !$office->fax && !$office->website)
                                    <span class="text-muted">No contact information provided</span>
                                @endif
                            </div>
                        </div>

                        @if($office->business_hours)
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h6 class="card-title mb-0">Business Hours</h6>
                                </div>
                                <div class="card-body">
                                    <div style="white-space: pre-line;">{{ $office->business_hours }}</div>
                                </div>
                            </div>
                        @endif

                        @if($office->latitude && $office->longitude)
                            <div class="card mt-3">
                                <div class="card-header">
                                    <h6 class="card-title mb-0">Location</h6>
                                </div>
                                <div class="card-body">
                                    <p class="mb-2">
                                        <strong>Latitude:</strong> {{ $office->latitude }}<br>
                                        <strong>Longitude:</strong> {{ $office->longitude }}
                                    </p>
                                    <a href="https://maps.google.com/?q={{ $office->latitude }},{{ $office->longitude }}"
                                       target="_blank" class="btn btn-sm btn-outline-primary">
                                        <i class="fas fa-map-marker-alt"></i> View on Google Maps
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <hr>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('admin.offices.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to Offices
                    </a>
                    <div>
                        <a href="{{ route('admin.offices.edit', $office) }}" class="btn btn-primary">
                            <i class="fas fa-edit"></i> Edit Office
                        </a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this office?</p>
                <p><strong>{{ $office->name }}</strong></p>
                <p class="text-muted">This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('admin.offices.destroy', $office) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Office</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
