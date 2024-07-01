@php
    //  $userEducationCount = 1;
    if(isset($userExperiencesDetails)&& !empty($userExperiencesDetails))
    {
        $userExperienceCount = count($userExperiencesDetails);
    }
   
@endphp

<div class="tab-pane fade" id="experience_tab">
    <div class="dashboard-header border-0 mb-0">
        <h3>Experience</h3>
        <ul>
            <li>
                <a class="btn btn-primary prime-btn add-experiences" id="addExperienceBtn" onclick="addExperience({{$userExperienceCount ?? '' }})">Add New
                    Experience</a>
            </li>
        </ul>
    </div>
    <form id="doctorExperienceForm" method="post" enctype="multipart/form-data">
        @csrf
        <div id="addNewExperienceTabItem" ></div>
        @forelse ($userExperiencesDetails as $key => $singleExperiencesDetails)

        <div class="accordions experience-infos" id="experienceAccordion">
            <div class="user-accordion-item accordion-item experince-entry">
                <a href="#" class="accordion-wrap" data-bs-toggle="collapse"
                    data-bs-target="#experience{{$key}}">Experience<span onclick="deleteExperience({{$singleExperiencesDetails->id}},this)">Delete</span></a>
                <div class="accordion-collapse collapse show" id="experience{{$key}}"
                    data-bs-parent="#experienceAccordion">
                    <div class="content-collapse">
                        <div class="add-service-info">
                            <div class="add-info">
                                <div class="row align-items-center">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Title

   
                                            </label>
                                            <input type="text" class="form-control" name="experience[{{$key}}][job_title]" value="{{$singleExperiencesDetails->job_title ?? " "}}">
                                            <span class="text-danger" id="experience_{{$key}}_job_title_error"></span>
                                        </div>
                                    </div>
                                    <script>
                                        jQuery(document).ready(function(){
                                            initializeKendoMultiSelectForExperience('#'+"hospital-id-{{$singleExperiencesDetails->hospital_id ?? ' '}}", '{{$singleExperiencesDetails->hospital_id ?? ' '}}');
                                        });
                                    </script>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Hospital <span
                                                    class="text-danger">*</span></label>
                                            <select id="hospital-id-{{$singleExperiencesDetails->hospital_id ?? ' '}}" class="form-control" name="experience[{{$key}}][hospital]"> </select>
                                            <script id="noHospitalTemplate" type="text/x-kendo-tmpl">
                                                <div>
                                                        No data found. Do you want to add new item - '#: instance.filterInput.val() #' ?
                                                        </div>
                                                        <br />
                                                        # var value = instance.filterInput.val() #
                                                        # var id = instance.element[0].id; #
                                                        <button class="k-button k-button-solid-base k-button-solid k-button-md k-rounded-md" onclick="addHospital('#: id #', '#: value #')">Add new item</button>                             
                                            </script>
                                                    <span class="text-danger" id="experience_{{$key}}_hospital_error"></span>
                                        </div>
                                    </div>
                                    <input type="hidden"  name="experience[{{ $key }}][id]" value= {{ $singleExperiencesDetails->id ?? ' ' }}>
                                    <div class="col-md-4">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Location <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="experience[{{$key}}][location]" value="{{$singleExperiencesDetails->location ?? " "}}">
                                            <span class="text-danger" id="experience_{{$key}}_location_error"></span>

                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Start Date <span
                                                    class="text-danger">*</span></label>
                                            <div class="form-icon">
                                                <input type="text"
                                                    class="form-control flat-picker" name="experience[{{$key}}][start_date]"autocomplete="off" value="{{$singleExperiencesDetails->start_date ?? " "}}">
                                                    <span class="icon"><i class="fa-regular fa-calendar-days"></i></span>
                                                    <span class="text-danger" id="experience_{{$key}}_start_date_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">End Date <span
                                                    class="text-danger">*</span></label>
                                            <div class="form-icon">
                                                <input type="text"
                                                    class="form-control flat-picker" name="experience[{{$key}}][end_date]"autocomplete="off" value="{{$singleExperiencesDetails->end_date ?? " "}}">
                                                    <span class="icon"><i class="fa-regular fa-calendar-days"></i></span>
                                                    <span class="text-danger" id="experience_{{$key}}_end_date_error"></span>
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
                                            <textarea class="form-control" rows="3" name="experience[{{$key}}][description]">{{$singleExperiencesDetails->job_description ?? " "}}</textarea>
                                            <span class="text-danger" id="experience_{{$key}}_description_error "></span>
                                        </div>
                                    </div>

                                    {{-- <div class="col-lg-6 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Education Certificates</label>
                                            <input type="file" class="form-control" id="certificatesID"
                                                name="experience[{{ $key }}][certificates]"
                                                value= "{{ $singleExperiencesDetails->certificates ?? ' ' }}">
                                            <small class="text-secondary">Recommended image size is <b> pdf, image
                                                </b></small>
                                            <span class="text-danger" id="education_{{ $key }}_certificates_error"></span>
                                        </div>
                                        <div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">

                                        @php
                                            $filePath =
                                                asset('images') . '/' . $singleExperiencesDetails->certificates;
                                            $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
                                        @endphp
                                        @if ($fileExtension === 'pdf')
                                            <div class="form-wrap">
                                                <object data="{{ $filePath }}" type="application/pdf"
                                                    width="300" height="200" id="certificates">
                                                </object>
                                            </div>
                                            <a href="{{$filePath}}" target="_blank"
                                                class="btn btn-primary prime-btn"> click to download pdf</a>
                                        @else
                                            <div class="form-wrap">
                                                <img src="{{ $filePath }}" alt="certificate image"
                                                    width="300" height="200" class="certificates">
                                            </div>
                                        @endif
                                        </div> --}}
                                    

                                        <div class="col-lg-6 col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Experience Certificates</label>
                                                <input type="file" class="form-control certificatesInput" 
                                                       id="experience_certificatesID{{ $key }}"
                                                       name="experience[{{ $key }}][certificates]"
                                                       value="{{ $singleExperiencesDetails->certificates ?? '' }}"
                                                       data-preview-id="experience_preview{{ $key }}">
                                                <small class="text-secondary">Recommended file types: PDF, image</small>
                                                <span class="text-danger" id="experience_{{ $key }}_certificates_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            @php
                                                $filePath = asset('images') . '/' . $singleExperiencesDetails->certificates;
                                                $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);
                                            @endphp
                                        
                                            <div class="form-wrap" id="experience_preview{{ $key }}">
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
        <div class="accordions experience-infos" id="experienceAccordion">
            <div class="user-accordion-item accordion-item experince-entry">
                <a href="#" class="accordion-wrap" data-bs-toggle="collapse"
                    data-bs-target="#experience1">Experience<span onclick="deleteExperience('',this)">Delete</span></a>
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
                                            <span class="text-danger" id="experience_0_job_title_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Hospital <span
                                                    class="text-danger">*</span></label>
                                            <select id="hospital" class="form-control" name="experience[0][hospital]"> </select>
                                            <div class="demo-hint">e.g. 'AIIMS'</div>
                                            <script id="noHospitalTemplate" type="text/x-kendo-tmpl">
                                                <div>
                                                    No data found. Do you want to add new item - '#: instance.filterInput.val() #' ?
                                                </div>
                                                <br />
                                                <button class="k-button k-button-solid-base k-button-solid k-button-md k-rounded-md" onclick="addHospital('#: instance.element[0].id #', '#: instance.filterInput.val() #')">Add new hospital</button>
                                            </script>
                                            <span class="text-danger" id="experience_0_hospital_error"></span>

                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Location <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="experience[0][location]">
                                            <span class="text-danger" id="experience_0_location_error"></span>

                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Start Date <span
                                                    class="text-danger">*</span></label>
                                            <div class="form-icon">
                                                <input type="text"
                                                    class="form-control flat-picker" name="experience[0][start_date]"autocomplete="off" >
                                                    <span class="icon"><i class="fa-regular fa-calendar-days"></i></span>
                                                    <span class="text-danger" id="experience_0_start_date_error"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">End Date <span
                                                    class="text-danger ">*</span></label>
                                            <div class="form-icon">
                                                <input type="text"
                                                    class="form-control flat-picker" name="experience[0][end_date]"autocomplete="off" id="experience_end_time">
                                                    <span class="icon"><i class="fa-regular fa-calendar-days"></i></span>
                                                    <span class="text-danger" id="experience_0_end_date_error"></span>
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
                                            <span class="text-danger" id="experience_0_description_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Education Certificates</label>
                                            <input type="file" class="form-control" id="certificatesID"
                                                name="experience[0][certificates]"
                                                value= "{{ $singleExperiencesDetails->certificates ?? ' ' }}">
                                            <small class="text-secondary">Recommended image size is <b> pdf, image
                                                </b></small>
                                            <span class="text-danger" id="education_0_certificates_error"></span>
                                        </div>
                                        <div>
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