<div id="doctor_slider_filter">
    <div class="setting-card">

        @if (isset($sections['page_extra_sections']['app_models_testimonial']))
            @php
            $section =  $sections['page_extra_sections']['app_models_testimonial'];  
            @endphp
                <div class="row">
                    <input type="hidden" value="{{ $section->model ?? '' }}" name="extraSections[testimonials][model]">

                    <div class="col-lg-3 col-md-3">
                        <select class="form-control" name="extraSections[testimonials][no_of_records]">
                            <option value="">Select Number of records to show</option>
                            @for ($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}"
                                    {{ $section->no_of_records == $i ? 'selected' : '' }}>
                                    {{ $i }}
                                </option>
                            @endfor
                        </select>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <select class="form-control" name="extraSections[testimonials][order_with_column]">
                            <option value="">Select Order By</option>
                            <option {{ $section->order_with_column == 'username'   ? 'selected' : '' }} value="username">Username</option>
                            <option {{ $section->order_with_column == 'created_at' ? 'selected' : '' }} value="created_at">Created_at</option>
                        </select>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <label class="form-label">Select Order By</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="extraSections[testimonials][orderby]"
                                value="asc" id="sortAsc" {{ $section->order_by == 'asc' ? 'checked' : '' }}>
                            <label class="form-check-label" for="sortAsc">Ascending</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="extraSections[testimonials][orderby]"
                                value="desc" id="sortDesc" {{ $section->order_by == 'desc' ? 'checked' : '' }}>
                            <label class="form-check-label" for="sortDesc">Descending</label>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-3">
                        <label class="form-label">Select Status</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="extraSections[testimonials][status]"
                                value="1" id="statusActive" {{ $section->status == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="statusActive">Active</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="extraSections[testimonials][status]"
                                value="0" id="statusDeactive" {{ $section->status == 0 ? 'checked' : '' }}>
                            <label class="form-check-label" for="statusDeactive">Deactive</label>
                        </div>
                    </div>

                    <input type="hidden" name="extraSections[testimonials][id]" value="{{ $section->id ?? '' }}">
                    {{-- <input type="hidden" name="testimonials[page_id]" value="{{ $page->id ?? '' }}"> --}}
                </div>
            {{-- @endforeach --}}
        @else
            <div class="row">
                <input type="hidden" value="App\Models\Testimonial" name="extraSections[testimonials][model]">

                <div class="col-lg-3 col-md-3">
                    <select class="form-control" name="extraSections[testimonials][no_of_records]">
                        <option value="" >Select Number of records to show</option>
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{ $i }}">
                                {{ $i }}
                            </option>
                        @endfor
                    </select>
                </div>

                <div class="col-lg-3 col-md-3">
                    <select class="form-control" name="extraSections[testimonials][order_with_column]">
                        <option value="">Select Order By</option>
                        <option  value="username">Username</option>
                        <option  value="created_at">Created_at</option>
                    </select>
                </div>

                <div class="col-lg-3 col-md-3">
                    <label class="form-label">Select Order By</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="extraSections[testimonials][orderby]"
                            value="asc" id="sortAsc" checked>
                        <label class="form-check-label" for="sortAsc">Ascending</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="extraSections[testimonials][orderby]"
                            value="desc" id="sortDesc">
                        <label class="form-check-label" for="sortDesc">Descending</label>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3">
                    <label class="form-label">Select Status</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="extraSections[testimonials][status]"
                            value="1" id="statusActive" checked>
                        <label class="form-check-label" for="statusActive">Active</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="extraSections[testimonials][status]"
                            value="0" id="statusDeactive">
                        <label class="form-check-label" for="statusDeactive">Deactive</label>
                    </div>
                </div>

                
            </div>

        @endif

    </div>
</div>
