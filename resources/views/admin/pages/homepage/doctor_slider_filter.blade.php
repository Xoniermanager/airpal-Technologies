<div id="doctor_slider_filter">
    <div class="setting-card">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <select class="form-control"> 
                    <option value="">Select option</option>
                    <option value="App\Models\Testimonial">Testimonial</option>
                    <option value="App\Models\user">Top Doctors</option>
                </select>
            </div>
            <div class="col-lg-6 col-md-6">
                <select class="form-control"> 
                    <option value="">Select Number of records want to show</option>
                    @for ($i=1; $i<=10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-lg-6 col-md-6 mt-3">
                <label class="form-label">Select order by</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sort_order" value="asc" id="sortAsc" checked>
                    <label class="form-check-label" for="sortAsc">Ascending</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sort_order" value="desc" id="sortDesc">
                    <label class="form-check-label" for="sortDesc">Descending</label>
                </div>
            </div>

            <!-- Status Radio Buttons -->
            <div class="col-lg-6 col-md-6 mt-3">
                <label class="form-label">Select status</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="active" id="statusActive" checked>
                    <label class="form-check-label" for="statusActive">Active</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value="deactive" id="statusDeactive">
                    <label class="form-check-label" for="statusDeactive">Deactive</label>
                </div>
            </div>

            <input type="hidden" name="homepage_banner_section[section_slug]" value="home_banner">
            <input type="hidden" name="homepage_banner_section[id]" value="{{ $sections['home_banner']['id'] ?? '' }}">
            <input type="hidden" name="homepage_banner_section[button][0][id]" value="{{ $sections['home_banner']->getButtons[0]['id'] ?? '' }}">
        </div>
    </div>

    <button class="btn btn-primary prime-btn mt-3">Save</button>
</div>
