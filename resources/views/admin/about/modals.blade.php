<!-- Add Core Value Modal -->
<div class="modal fade" id="addCoreValueModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Core Value</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.about.core-values.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="core_value_title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="core_value_title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="core_value_description" class="form-label">Description</label>
                        <textarea class="form-control" id="core_value_description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="core_value_icon_svg" class="form-label">Icon SVG (optional)</label>
                        <textarea class="form-control" id="core_value_icon_svg" name="icon_svg" rows="3" placeholder="Paste SVG code here"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="core_value_sort_order" class="form-label">Sort Order</label>
                        <input type="number" class="form-control" id="core_value_sort_order" name="sort_order" value="0" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Core Value</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Core Value Modal -->
<div class="modal fade" id="editCoreValueModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Core Value</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editCoreValueForm" action="{{ route('admin.about.core-values.update', 0) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit_core_value_id" name="id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_core_value_title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="edit_core_value_title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_core_value_description" class="form-label">Description</label>
                        <textarea class="form-control" id="edit_core_value_description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit_core_value_icon_svg" class="form-label">Icon SVG (optional)</label>
                        <textarea class="form-control" id="edit_core_value_icon_svg" name="icon_svg" rows="3" placeholder="Paste SVG code here"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit_core_value_sort_order" class="form-label">Sort Order</label>
                        <input type="number" class="form-control" id="edit_core_value_sort_order" name="sort_order" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Core Value</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Team Member Modal -->
<div class="modal fade" id="addTeamMemberModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Team Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.about.team-members.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="team_member_name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="team_member_name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="team_member_position" class="form-label">Position</label>
                                <input type="text" class="form-control" id="team_member_position" name="position" required>
                            </div>
                            <div class="mb-3">
                                <label for="team_member_image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="team_member_image" name="image" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label for="team_member_sort_order" class="form-label">Sort Order</label>
                                <input type="number" class="form-control" id="team_member_sort_order" name="sort_order" value="0" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="team_member_linkedin_url" class="form-label">LinkedIn URL</label>
                                <input type="url" class="form-control" id="team_member_linkedin_url" name="linkedin_url">
                            </div>
                            <div class="mb-3">
                                <label for="team_member_twitter_url" class="form-label">Twitter URL</label>
                                <input type="url" class="form-control" id="team_member_twitter_url" name="twitter_url">
                            </div>
                            <div class="mb-3">
                                <label for="team_member_email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="team_member_email" name="email">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="team_member_bio" class="form-label">Bio</label>
                        <textarea class="form-control" id="team_member_bio" name="bio" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Team Member</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Team Member Modal -->
<div class="modal fade" id="editTeamMemberModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Team Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editTeamMemberForm" action="{{ route('admin.about.team-members.update', 0) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit_team_member_id" name="id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_team_member_name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="edit_team_member_name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_team_member_position" class="form-label">Position</label>
                                <input type="text" class="form-control" id="edit_team_member_position" name="position" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_team_member_image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="edit_team_member_image" name="image" accept="image/*">
                            </div>
                            <div class="mb-3">
                                <label for="edit_team_member_sort_order" class="form-label">Sort Order</label>
                                <input type="number" class="form-control" id="edit_team_member_sort_order" name="sort_order" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_team_member_linkedin_url" class="form-label">LinkedIn URL</label>
                                <input type="url" class="form-control" id="edit_team_member_linkedin_url" name="linkedin_url">
                            </div>
                            <div class="mb-3">
                                <label for="edit_team_member_twitter_url" class="form-label">Twitter URL</label>
                                <input type="url" class="form-control" id="edit_team_member_twitter_url" name="twitter_url">
                            </div>
                            <div class="mb-3">
                                <label for="edit_team_member_email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="edit_team_member_email" name="email">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_team_member_bio" class="form-label">Bio</label>
                        <textarea class="form-control" id="edit_team_member_bio" name="bio" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Team Member</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Expertise Area Modal -->
<div class="modal fade" id="addExpertiseAreaModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Expertise Area</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.about.expertise-areas.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="expertise_area_title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="expertise_area_title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="expertise_area_description" class="form-label">Description</label>
                        <textarea class="form-control" id="expertise_area_description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="expertise_area_icon" class="form-label">Icon Class (e.g., fas fa-chart-line)</label>
                        <input type="text" class="form-control" id="expertise_area_icon" name="icon" placeholder="fas fa-chart-line">
                    </div>
                    <div class="mb-3">
                        <label for="expertise_area_sort_order" class="form-label">Sort Order</label>
                        <input type="number" class="form-control" id="expertise_area_sort_order" name="sort_order" value="0" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Expertise Area</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Expertise Area Modal -->
<div class="modal fade" id="editExpertiseAreaModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Expertise Area</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editExpertiseAreaForm" action="{{ route('admin.about.expertise-areas.update', 0) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit_expertise_area_id" name="id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_expertise_area_title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="edit_expertise_area_title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_expertise_area_description" class="form-label">Description</label>
                        <textarea class="form-control" id="edit_expertise_area_description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit_expertise_area_icon" class="form-label">Icon Class (e.g., fas fa-chart-line)</label>
                        <input type="text" class="form-control" id="edit_expertise_area_icon" name="icon" placeholder="fas fa-chart-line">
                    </div>
                    <div class="mb-3">
                        <label for="edit_expertise_area_sort_order" class="form-label">Sort Order</label>
                        <input type="number" class="form-control" id="edit_expertise_area_sort_order" name="sort_order" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Expertise Area</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Why Choose Us Modal -->
<div class="modal fade" id="addWhyChooseUsModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Why Choose Us Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form action="{{ route('admin.about.why-choose-us.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="why_choose_us_title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="why_choose_us_title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="why_choose_us_description" class="form-label">Description</label>
                        <textarea class="form-control" id="why_choose_us_description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="why_choose_us_icon" class="form-label">Icon Class (e.g., fas fa-check-circle)</label>
                        <input type="text" class="form-control" id="why_choose_us_icon" name="icon" placeholder="fas fa-check-circle">
                    </div>
                    <div class="mb-3">
                        <label for="why_choose_us_sort_order" class="form-label">Sort Order</label>
                        <input type="number" class="form-control" id="why_choose_us_sort_order" name="sort_order" value="0" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Why Choose Us Item</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Why Choose Us Modal -->
<div class="modal fade" id="editWhyChooseUsModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Why Choose Us Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editWhyChooseUsForm" action="{{ route('admin.about.why-choose-us.update', 0) }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit_why_choose_us_id" name="id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_why_choose_us_title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="edit_why_choose_us_title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_why_choose_us_description" class="form-label">Description</label>
                        <textarea class="form-control" id="edit_why_choose_us_description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit_why_choose_us_icon" class="form-label">Icon Class (e.g., fas fa-check-circle)</label>
                        <input type="text" class="form-control" id="edit_why_choose_us_icon" name="icon" placeholder="fas fa-check-circle">
                    </div>
                    <div class="mb-3">
                        <label for="edit_why_choose_us_sort_order" class="form-label">Sort Order</label>
                        <input type="number" class="form-control" id="edit_why_choose_us_sort_order" name="sort_order" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update Why Choose Us Item</button>
                </div>
            </form>
        </div>
    </div>
</div>
