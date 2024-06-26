<div class="tab-pane fade" id="experience_tab">
    <div class="dashboard-header border-0 mb-0">
        <h3>Experience</h3>
        <ul>
            <li>
                <a class="btn btn-primary prime-btn add-experiences" id="addExperienceBtn">Add New
                    Experience</a>
            </li>
        </ul>
    </div>
    <form id="doctorExperienceForm" method="post" enctype="multipart/form-data">
        @csrf
        @forelse ($userExperiencesDetails as $singleExperiencesDetails)
        <div class="accordions experience-infos" id="experienceAccordion">
            <div class="user-accordion-item accordion-item experince-entry">
                <a href="#" class="accordion-wrap" data-bs-toggle="collapse"
                    data-bs-target="#experience1">Experience<span onclick="deleteExperience(this)">Delete</span></a>
                <div class="accordion-collapse collapse show" id="experience1"
                    data-bs-parent="#experienceAccordion">
                    <div class="content-collapse">
                        <div class="add-service-info">
                            <div class="add-info">
                                <div class="row align-items-center">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Title</label>
                                            <input type="text" class="form-control" name="experience[0][job_title]" value="{{$singleExperiencesDetails->job_title ?? " "}}">
                                            <span class="text-danger" id="job_title_0_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Hospital <span
                                                    class="text-danger">*</span></label>
                                            <select id="hospital" class="form-control" name="experience[0][hospital]"> </select>
                                            <script id="noHospitalTemplate" type="text/x-kendo-tmpl">
                                                <div>
                                                            No data found. Do you want to add new item - '#: instance.filterInput.val() #' ?
                                                        </div>
                                                        <br />
                                                        # var value = instance.input.val(); #
                                                        # var id = instance.element[0].id; #
                                                        <button class="k-button k-button-solid-base k-button-solid k-button-md k-rounded-md" onclick="addHospital('#: id #', '#: value #')">Add new item</button>
                                                    </script>
                                                    <span class="text-danger" id="hospital_0_error"></span>

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Location <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="experience[0][location]" value="{{$singleExperiencesDetails->location ?? " "}}">
                                            <span class="text-danger" id="location_0_error"></span>

                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Start Date <span
                                                    class="text-danger">*</span></label>
                                            <div class="form-icon">
                                                <input type="text"
                                                    class="form-control data-picker" name="experience[0][start_date]"autocomplete="off" value="{{$singleExperiencesDetails->start_date ?? " "}}">
                                                    <span class="text-danger" id="start_date_0_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">End Date <span
                                                    class="text-danger">*</span></label>
                                            <div class="form-icon">
                                                <input type="text"
                                                    class="form-control data-picker" name="experience[0][end_date]"autocomplete="off" value="{{$singleExperiencesDetails->end_date ?? " "}}">
                                                    <span class="text-danger" id="end_date_0_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">&nbsp;</label>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input"
                                                        type="checkbox" name="working_status[]">
                                                    I Currently Working Here
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Job Description
                                                <span class="text-danger">*</span></label>
                                            <textarea class="form-control" rows="3" name="experience[0][description]">{{$singleExperiencesDetails->job_desription ?? " "}}</textarea>
                                            <span class="text-danger" id="description_0_error"></span>
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
        <div class="accordions experience-infos" id="experienceAccordion">
            <div class="user-accordion-item accordion-item experince-entry">
                <a href="#" class="accordion-wrap" data-bs-toggle="collapse"
                    data-bs-target="#experience1">Experience<span onclick="deleteExperience(this)">Delete</span></a>
                <div class="accordion-collapse collapse show" id="experience1"
                    data-bs-parent="#experienceAccordion">
                    <div class="content-collapse">
                        <div class="add-service-info">
                            <div class="add-info">
                                <div class="row align-items-center">

                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Title</label>
                                            <input type="text" class="form-control" name="experience[0][job_title]">
                                            <span class="text-danger" id="job_title_0_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Hospital <span
                                                    class="text-danger">*</span></label>
                                            <select id="hospital" class="form-control" name="experience[0][hospital]"> </select>
                                            <script id="noHospitalTemplate" type="text/x-kendo-tmpl">
                                                <div>
                                                            No data found. Do you want to add new item - '#: instance.filterInput.val() #' ?
                                                        </div>
                                                        <br />
                                                        # var value = instance.input.val(); #
                                                        # var id = instance.element[0].id; #
                                                        <button class="k-button k-button-solid-base k-button-solid k-button-md k-rounded-md" onclick="addHospital('#: id #', '#: value #')">Add new item</button>
                                                    </script>
                                                    <span class="text-danger" id="hospital_0_error"></span>

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Location <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="experience[0][location]">
                                            <span class="text-danger" id="location_0_error"></span>

                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Start Date <span
                                                    class="text-danger">*</span></label>
                                            <div class="form-icon">
                                                <input type="text"
                                                    class="form-control data-picker" name="experience[0][start_date]"autocomplete="off" id="experience_start_time">
                                                    <span class="text-danger" id="start_date_0_error"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">End Date <span
                                                    class="text-danger">*</span></label>
                                            <div class="form-icon">
                                                <input type="text"
                                                    class="form-control data-picker" name="experience[0][end_date]"autocomplete="off" id="experience_end_time">
                                                    <span class="text-danger" id="end_date_0_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">&nbsp;</label>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input class="form-check-input"
                                                        type="checkbox" name="experience[0][working_status]" onchange="disabled_end_time()" id="is_cuurently_working">
                                                    I Currently Working Here
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Job Description
                                                <span class="text-danger">*</span></label>
                                            <textarea class="form-control" rows="3" name="experience[0][description]"></textarea>
                                            <span class="text-danger" id="description_0_error"></span>
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
            <input type="hidden" value="{{(Request::segment(4) ?? " ")}}" name="user_id" id="doctor_experience_user_id">
            <button class="btn btn-primary prime-btn">Save
                Changes</button>
        </div>
    </form>
</div>