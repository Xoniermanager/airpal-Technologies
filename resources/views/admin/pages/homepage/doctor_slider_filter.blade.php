<div id="doctor_slider_filter">
    <div class="setting-card">
        <div class="row">
            <input type="hidden" value="App\Models\User" name="top_doctors[model]">

            <!-- Number of Records Dropdown -->
            <div class="col-lg-6 col-md-6">
                <select class="form-control" name="top_doctors[no_of_records]">
                    <option value="">Select Number of records to show</option>
                    @for ($i=1; $i<=10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <!-- Sort Order Radio Buttons -->
            <div class="col-lg-6 col-md-6 mt-3">
                <label class="form-label">Select Order By</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="top_doctors[orderby]" value="asc" id="sortAsc" checked>
                    <label class="form-check-label" for="sortAsc">Ascending</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="top_doctors[orderby]" value="desc" id="sortDesc">
                    <label class="form-check-label" for="sortDesc">Descending</label>
                </div>
            </div>

            <!-- Status Radio Buttons -->
            <div class="col-lg-6 col-md-6 mt-3">
                <label class="form-label">Select Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="top_doctors[status]" value="1" id="statusActive" checked>
                    <label class="form-check-label" for="statusActive">Active</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="top_doctors[status]" value="0" id="statusDeactive">
                    <label class="form-check-label" for="statusDeactive">Deactive</label>
                </div>
            </div>

            <!-- Dynamic Fields (Name and Value) -->
            <div class="col-lg-6 col-md-6 mt-3">
                <div id="field-container">
                    <div class="field-group d-flex align-items-center">
                        <input type="text" name="top_doctors[filter][0][key]" class="form-control me-2" placeholder="Name" required>
                        <input type="text" name="top_doctors[filter][0][value]" class="form-control me-2" placeholder="Value" required>
                        <button type="button" class="btn btn-danger remove-field">-</button>
                    </div>
                </div>
                <button type="button" id="add-more" class="btn btn-primary mt-3">+</button>
            </div>

            @php
            $pageId = $page->id ?? '';
            if (empty($pageId) || $pageId == '') {
                $pageId = $sections['top_doctors']['page_id'] ?? '';
            }
        @endphp
        <input type="hidden" name="top_doctors[section_slug]" value="top_doctors">
        <input type="hidden" name="top_doctors[page_id]" value="{{ $pageId }}">

            <!-- Hidden Fields -->
            {{-- <input type="hidden" name="top_doctors[section_slug]" value="top_doctors">
            <input type="hidden" name="top_doctors[id]" value="{{ $sections['home_banner']['id'] ?? '' }}"> --}}
        </div>
    </div>

    <button class="btn btn-primary prime-btn mt-3">Save</button>
</div>

<!-- Script to Add/Remove Fields -->
<script>
    $(document).ready(function () {
        // Add more fields
        let counter = 1;
        $('#add-more').click(function () {
            $('#field-container').append(`
                <div class="field-group d-flex align-items-center mt-2">
                    <input type="text" name="top_doctors[filter][${counter}][key]" class="form-control me-2" placeholder="Name" required>
                    <input type="text" name="top_doctors[filter][${counter}][value]" class="form-control me-2" placeholder="Value" required>
                    <button type="button" class="btn btn-danger remove-field">-</button>
                </div>
            `);
            counter += 1;
        });

        // Remove field group
        $(document).on('click', '.remove-field', function () {
            $(this).closest('.field-group').remove();
        });
    });
</script>
