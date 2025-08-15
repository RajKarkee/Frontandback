@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="h3 mb-4">About Page Management</h1>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- About Main Content Form -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Main About Content</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.about.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <!-- Our Story Section -->
                                <div class="col-md-6">
                                    <h6 class="fw-bold mb-3">Our Story Section</h6>
                                    <div class="mb-3">
                                        <label for="our_story_title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="our_story_title"
                                            name="our_story_title"
                                            value="{{ old('our_story_title', $about->our_story_title ?? '') }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="our_story_content" class="form-label">Description</label>
                                        <textarea class="form-control" id="our_story_content" name="our_story_content" rows="9" required>{{ old('our_story_content', $about->our_story_content ?? '') }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="our_story_image" class="form-label">Image</label>
                                        <input type="file" class="form-control" id="our_story_image"
                                            name="our_story_image" accept="image/*">
                                        @if ($about && $about->our_story_image)
                                            <div class="mt-2">
                                                <img src="{{ asset('storage/' . $about->our_story_image) }}"
                                                    alt="Current image" class="img-thumbnail" style="max-width: 200px;">
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <!-- Mission & Vision -->
                                <div class="col-md-6">
                                    <h6 class="fw-bold mb-3">Our Core Values</h6>
                                    <div class="mb-3">
                                        <label for="core_values_title" class="form-label">Core Values Title</label>
                                        <input type="text" class="form-control" id="core_values_title"
                                            name="core_values_title"
                                            value="{{ old('core_values_title', $about->core_values_title ?? '') }}"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="core_values_subtitle" class="form-label">Core Values Description</label>
                                        <textarea class="form-control" id="core_values_subtitle" name="core_values_subtitle" rows="3" required>{{ old('core_values_subtitle', $about->core_values_subtitle ?? '') }}</textarea>
                                    </div>
                                    <h6 class="fw-bold mt-3">Our Leadership Team</h6>
                                    <div class="mb-3">
                                        <label for="leadership_title" class="form-label">Leadership Title</label>
                                        <input type="text" class="form-control" id="leadership_title"
                                            name="leadership_title"
                                            value="{{ old('leadership_title', $about->leadership_title ?? '') }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="leadership_subtitle" class="form-label">Leadership Subtitle</label>
                                        <textarea class="form-control" id="leadership_subtitle" name="leadership_subtitle" rows="3" required>{{ old('leadership_subtitle', $about->leadership_subtitle ?? '') }}</textarea>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-6">
                                        <h6 class="fw-bold mt-3">Expertise Section</h6>
                                        <div class="mb-3">
                                            <label for="expertise_title" class="form-label">Expertise Title</label>
                                            <input type="text" class="form-control" id="expertise_title"
                                                name="expertise_title"
                                                value="{{ old('expertise_title', $about->expertise_title ?? '') }}"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="expertise_subtitle" class="form-label">Expertise Subtitle</label>
                                            <textarea class="form-control" id="expertise_subtitle" name="expertise_subtitle" rows="3" required>{{ old('expertise_subtitle', $about->expertise_subtitle ?? '') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="fw-bold mt-3">Why Choose Us Section</h6>
                                        <div class="mb-3">
                                            <label for="why_choose_us_title" class="form-label">Why Choose Us Title</label>
                                            <input type="text" class="form-control" id="why_choose_us_title"
                                                name="why_choose_us_title"
                                                value="{{ old('why_choose_us_title', $about->why_choose_us_title ?? '') }}"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="why_choose_us_subtitle" class="form-label">Why Choose Us
                                                Subtitle</label>
                                            <textarea class="form-control" id="why_choose_us_subtitle" name="why_choose_us_subtitle" rows="3" required>{{ old('why_choose_us_subtitle', $about->why_choose_us_subtitle ?? '') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Save Main Content</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Core Values Section -->
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Core Values</h5>
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#addCoreValueModal">
                            Add Core Value
                        </button>
                    </div>
                    <div class="card-body">
                        @if ($about && $about->coreValues->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Sort Order</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($about->coreValues as $coreValue)
                                            <tr>
                                                <td>{{ $coreValue->title }}</td>
                                                <td>{{ Str::limit($coreValue->description, 50) }}</td>
                                                <td>{{ $coreValue->sort_order }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        onclick="editCoreValue({{ $coreValue->id }}, '{{ $coreValue->title }}', '{{ addslashes($coreValue->description) }}', '{{ addslashes($coreValue->icon_svg) }}', {{ $coreValue->sort_order }})">
                                                        Edit
                                                    </button>
                                                    {{-- <a href="{{ route('admin.about.core-values.toggle', $coreValue->id) }}"
                                                   class="btn btn-sm btn-warning">
                                                    {{ $coreValue->is_active ? 'Deactivate' : 'Activate' }}
                                                </a> --}}
                                                    <form
                                                        action="{{ route('admin.about.core-values.delete', $coreValue->id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Are you sure?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-muted">No core values added yet.</p>
                        @endif
                    </div>
                </div>

                <!-- Team Members Section -->
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Team Members</h5>
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#addTeamMemberModal">
                            Add Team Member
                        </button>
                    </div>
                    <div class="card-body">
                        @if ($about && $about->teamMembers->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Sort Order</th>

                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($about->teamMembers as $member)
                                            <tr>
                                                <td>
                                                    @if ($member->image)
                                                        <img src="{{ asset('storage/' . $member->image) }}"
                                                            alt="{{ $member->name }}" class="img-thumbnail"
                                                            style="width: 50px; height: 50px; object-fit: cover;">
                                                    @else
                                                        <div class="bg-light d-flex align-items-center justify-content-center"
                                                            style="width: 50px; height: 50px;">
                                                            <i class="fas fa-user"></i>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>{{ $member->name }}</td>
                                                <td>{{ $member->position }}</td>
                                                <td>{{ $member->sort_order }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        onclick="editTeamMember({{ $member->id }}, '{{ $member->name }}', '{{ $member->position }}', '{{ addslashes($member->bio) }}', '{{ $member->linkedin_url }}', '{{ $member->twitter_url }}', '{{ $member->email }}', {{ $member->sort_order }})">
                                                        Edit
                                                    </button>
                                                    {{-- <a href="{{ route('admin.about.team-members.toggle', $member->id) }}"
                                                   class="btn btn-sm btn-warning">
                                                    {{ $member->is_active ? 'Deactivate' : 'Activate' }}
                                                </a> --}}
                                                    <form
                                                        action="{{ route('admin.about.team-members.delete', $member->id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Are you sure?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-muted">No team members added yet.</p>
                        @endif
                    </div>
                </div>

                <!-- Expertise Areas Section -->
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Expertise Areas</h5>
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#addExpertiseAreaModal">
                            Add Expertise Area
                        </button>
                    </div>
                    <div class="card-body">
                        @if ($about && $about->expertiseAreas->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Icon</th>
                                            <th>Sort Order</th>

                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($about->expertiseAreas as $area)
                                            <tr>
                                                <td>{{ $area->title }}</td>
                                                <td>{{ Str::limit($area->description, 50) }}</td>
                                                <td>{{ $area->icon }}</td>
                                                <td>{{ $area->sort_order }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        onclick="editExpertiseArea({{ $area->id }}, '{{ $area->title }}', '{{ addslashes($area->description) }}', '{{ $area->icon }}', {{ $area->sort_order }})">
                                                        Edit
                                                    </button>
                                                    {{-- <a href="{{ route('admin.about.expertise-areas.toggle', $area->id) }}"
                                                   class="btn btn-sm btn-warning">
                                                    {{ $area->is_active ? 'Deactivate' : 'Activate' }}
                                                </a> --}}
                                                    <form
                                                        action="{{ route('admin.about.expertise-areas.delete', $area->id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Are you sure?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-muted">No expertise areas added yet.</p>
                        @endif
                    </div>
                </div>

                <!-- Why Choose Us Section -->
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Why Choose Us</h5>
                        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#addWhyChooseUsModal">
                            Add Why Choose Us Item
                        </button>
                    </div>
                    <div class="card-body">
                        @if ($about && $about->whyChooseUsItems->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Icon</th>
                                            <th>Sort Order</th>

                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($about->whyChooseUsItems as $item)
                                            <tr>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ Str::limit($item->description, 50) }}</td>
                                                <td>{{ $item->icon }}</td>
                                                <td>{{ $item->sort_order }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-primary"
                                                        onclick="editWhyChooseUs({{ $item->id }}, '{{ $item->title }}', '{{ addslashes($item->description) }}', '{{ $item->icon }}', {{ $item->sort_order }})">
                                                        Edit
                                                    </button>
                                                    <form
                                                        action="{{ route('admin.about.why-choose-us.delete', $item->id) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Are you sure?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-muted">No why choose us items added yet.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals for Adding/Editing Items -->
    @include('admin.about.modals')

@endsection

@push('scripts')
    <script>
        function editCoreValue(id, title, description, iconSvg, sortOrder) {
            document.getElementById('edit_core_value_id').value = id;
            document.getElementById('edit_core_value_title').value = title;
            document.getElementById('edit_core_value_description').value = description;
            document.getElementById('edit_core_value_icon_svg').value = iconSvg;
            document.getElementById('edit_core_value_sort_order').value = sortOrder;

            const form = document.getElementById('editCoreValueForm');
            form.action = form.action.replace(/\/\d+$/, '/' + id);

            new bootstrap.Modal(document.getElementById('editCoreValueModal')).show();
        }

        function editTeamMember(id, name, position, bio, linkedinUrl, twitterUrl, email, sortOrder) {
            document.getElementById('edit_team_member_id').value = id;
            document.getElementById('edit_team_member_name').value = name;
            document.getElementById('edit_team_member_position').value = position;
            document.getElementById('edit_team_member_bio').value = bio;
            document.getElementById('edit_team_member_linkedin_url').value = linkedinUrl;
            document.getElementById('edit_team_member_twitter_url').value = twitterUrl;
            document.getElementById('edit_team_member_email').value = email;
            document.getElementById('edit_team_member_sort_order').value = sortOrder;

            const form = document.getElementById('editTeamMemberForm');
            form.action = form.action.replace(/\/\d+$/, '/' + id);

            new bootstrap.Modal(document.getElementById('editTeamMemberModal')).show();
        }

        function editExpertiseArea(id, title, description, icon, sortOrder) {
            document.getElementById('edit_expertise_area_id').value = id;
            document.getElementById('edit_expertise_area_title').value = title;
            document.getElementById('edit_expertise_area_description').value = description;
            document.getElementById('edit_expertise_area_icon').value = icon;
            document.getElementById('edit_expertise_area_sort_order').value = sortOrder;

            const form = document.getElementById('editExpertiseAreaForm');
            form.action = form.action.replace(/\/\d+$/, '/' + id);

            new bootstrap.Modal(document.getElementById('editExpertiseAreaModal')).show();
        }

        function editWhyChooseUs(id, title, description, icon, sortOrder) {
            document.getElementById('edit_why_choose_us_id').value = id;
            document.getElementById('edit_why_choose_us_title').value = title;
            document.getElementById('edit_why_choose_us_description').value = description;
            document.getElementById('edit_why_choose_us_icon').value = icon;
            document.getElementById('edit_why_choose_us_sort_order').value = sortOrder;

            const form = document.getElementById('editWhyChooseUsForm');
            form.action = form.action.replace(/\/\d+$/, '/' + id);

            new bootstrap.Modal(document.getElementById('editWhyChooseUsModal')).show();
        }
    </script>
@endpush
