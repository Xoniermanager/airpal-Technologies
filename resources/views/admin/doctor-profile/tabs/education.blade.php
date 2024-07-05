@php
    //  $userEducationCount = 1;
    if (isset($userEducationDetails) && !empty($userEducationDetails)) {
        $userEducationCount = count($userEducationDetails);
    }

@endphp

<div class="tab-pane fade" id="education_tab">
    <div class="dashboard-header border-0 mb-0">
        <h3>Education</h3>
        <ul>
            <li>
                <a class="btn btn-primary prime-btn add-educations"
                    onclick="addEducation({{ $userEducationCount ?? '' }})">Add New
                    Education</a>
            </li>
        </ul>
    </div>
    <form id="doctorEducationform" method="post" enctype="multipart/form-data">
        @csrf
        <div id="addNewEducationTabItem"> </div>
        @forelse ($userEducationDetails as $key  => $singleEducationDetail)
            <div class="accordions education-infos" id="educationAccordion">
                <div class="user-accordion-item accordion-item education-entry">
                    <a href="#" class="accordion-wrap" data-bs-toggle="collapse"
                        data-bs-target="#education{{ $key }}">Education<span
                            onclick="deleteEducation({{ $singleEducationDetail->id }},this)">Delete</span></a>
                    <div class="accordion-collapse collapse show" id="education{{ $key }}"
                        data-bs-parent="#educationAccordion">
                        <div class="content-collapse">
                            <div class="add-service-info">
                                <div class="add-info">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Name of the
                                                    institution</label>
                                                <input type="text" class="form-control"
                                                    name="education[{{ $key }}][name]"
                                                    value="{{ $singleEducationDetail->institute_name ?? ' ' }}">
                                                <span class="text-danger"
                                                    id="education_{{ $key }}_name_error"></span>
                                            </div>
                                        </div>
                                        <script>
                                            jQuery(document).ready(function() {
                                                initializeKendoDropdownSelectForEducation('#' +
                                                    "course-id-{{ $singleEducationDetail->course_id ?? ' ' }}",
                                                    '{{ $singleEducationDetail->course_id ?? ' ' }}');
                                            });
                                        </script>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Course</label>

                                                <select id="course-id-{{ $singleEducationDetail->course_id ?? ' ' }}"
                                                    class="form-control" name="education[{{ $key }}][course]">
                                                </select>
                                                <script id="noCourseTemplate" type="text/x-kendo-tmpl">
                                                <div>
                                                    No data found. Do you want to add new item - '#: instance.filterInput.val() #' ?
                                                </div>
                                                <br />
                                                <button class="k-button k-button-solid-base k-button-solid k-button-md k-rounded-md" onclick="addCourse('#: instance.element[0].id #', '#: instance.filterInput.val() #')">Add new item</button>
                                            </script>
                                                <span class="text-danger" id="education_0_course_error"></span>
                                            </div>
                                        </div>
                                        <input type="hidden"  name="education[{{ $key }}][id]" value= {{ $singleEducationDetail->id ?? ' ' }}>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Start Date <span
                                                        class="text-danger">*</span></label>
                                                <div class="form-icon">
                                                    <input type="text" class="form-control flat-picker"
                                                        name="education[{{ $key }}][start_date]"
                                                        autocomplete="off"
                                                        value="{{ $singleEducationDetail->start_date ?? ' ' }}">
                                                    <span class="text-danger" id="start_date_0_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">End Date <span
                                                        class="text-danger">*</span></label>
                                                <div class="form-icon">
                                                    <input type="text" class="form-control flat-picker"
                                                        name="education[{{ $key }}][end_date]"
                                                        autocomplete="off"
                                                        value="{{ $singleEducationDetail->end_date ?? ' ' }}">
                                                    <span class="text-danger" id="end_date_0_error"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Education Certificates</label>
                                                <input type="file" class="form-control certificatesInput" 
                                                       id="certificatesID{{ $key }}"
                                                       name="education[{{ $key }}][certificates]"
                                                       value="{{ $singleEducationDetail->id ?? '' }}"
                                                       data-preview-id="preview{{ $key }}">
                                                <small class="text-secondary">Recommended file types: PDF, image</small>
                                                <span class="text-danger" id="education_{{ $key }}_certificates_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            @php
                                                $filePath = asset('images') . '/' . $singleEducationDetail->id;
                                                $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
                                            @endphp
                                        
                                            <div class="form-wrap" id="preview{{ $key }}">
                                                @if ($fileExtension === 'pdf')
                                                    <object data="{{ $filePath }}" type="application/pdf" width="300" height="200">
                                                        <p>It appears you don't have a PDF plugin for this browser.
                                                            <a href="{{ $filePath }}" target="_blank">Click here to download the PDF file.</a>
                                                        </p>
                                                    </object>
                                                    <a href="{{ $filePath }}" target="_blank" class="btn btn-primary prime-btn">Click to download PDF</a>
                                                @else
                                                    <img src="{{ $filePath }}" alt="certificate image" width="300" height="200" style="border-radius:20px;">
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="accordions education-infos" id="educationAccordion">
                <div class="user-accordion-item accordion-item education-entry">
                    <a href="#" class="accordion-wrap" data-bs-toggle="collapse"
                        data-bs-target="#education1">Education<span
                            onclick="deleteEducation({{ $singleEducationDetail->id ?? '' }},this)">Delete</span></a>

                    <div class="accordion-collapse collapse show" id="education1"
                        data-bs-parent="#educationAccordion">
                        <div class="content-collapse">
                            <div class="add-service-info">
                                <div class="add-info">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Name of the
                                                    institution</label>
                                                <input type="text" class="form-control" name="education[0][name]">
                                                <span class="text-danger" id="education_0_name_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Course</label>
                                                <select id="course" class="form-control"
                                                    name="education[0][course]">
                                                </select>

                                                <script id="noCourseTemplate" type="text/x-kendo-tmpl">
                                                <div>
                                                    No data found. Do you want to add new item - '#: instance.filterInput.val() #' ?
                                                </div>
                                                <br />
                                                <button class="k-button k-button-solid-base k-button-solid k-button-md k-rounded-md" onclick="addCourse('#: instance.element[0].id #', '#: instance.filterInput.val() #')">Add new item</button>
                                            </script>
                                                <span class="text-danger" id="education_0_course_error"></span>

                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Start Date <span
                                                        class="text-danger">*</span></label>
                                                <div class="form-icon">
                                                    <input type="text" class="form-control flat-picker"
                                                        name="education[0][start_date]" autocomplete="off">
                                                    <span class="text-danger"
                                                        id="education_0_start_date_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">End Date<span
                                                        class="text-danger">*</span></label>
                                                <div class="form-icon">
                                                    <input type="text" class="form-control flat-picker"
                                                        name="education[0][end_date]" autocomplete="off"
                                                        id="edu_end_timr">
                                                    <span class="text-danger" id="education_0_end_date_error"></span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-wrap">
                                                <label class="mb-2">Education Certificates</label>
                                                <input type="file" class="form-control"
                                                    name="education[0][certificates]">
                                                <small class="text-secondary">Recommended image size is <b>pdf,
                                                        image</b></small>
                                                <span class="text-danger" id="education_0_certificates_error"></span>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforelse
        <div class="modal-btn text-end">
            <input type="hidden" value="{{Request::segment(4) ?? ''}}" name="user_id" id="doctor_user_id">
            <button class="btn btn-primary prime-btn" id="doctorEducationform">Save Changes</button>
        </div>
    </form>
</div>

<style>
    img.certificates {
        height: 200px;
        object-fit: cover;
    }
</style>
