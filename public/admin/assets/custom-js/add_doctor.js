
let educationCount    = 1;
let experienceCount   = 1;
let awardCount        = 1;
// document.getElementById('addEducationBtn').addEventListener('click', addEducation);
document.getElementById('addExperienceBtn').addEventListener('click', addExperience);
document.getElementById('addAwardBtn').addEventListener('click', addNewAwardAccordion);

function addNewAwardAccordion(){
    const accordion = document.getElementById('awardAccordion');
    const newEntry = document.createElement('div');
    newEntry.classList.add('accordion-item', 'award-entry');
    const headingId = `heading${awardCount}`;
    const collapseId = `collapse${awardCount}`;
    const awardSelectorId = `award${awardCount}`;

    const awardNoAwardTemplate = `noAwardTemplate${awardCount}`;

    newEntry.innerHTML = `<div class="accordions awrad-infos" id="${headingId}">
                            <div class="user-accordion-item accordion-item award-entry">
                                    <a href="#" class="accordion-wrap" data-bs-toggle="collapse"
                                    data-bs-target="#${collapseId}">Awards<span>Delete</span></a>
                                    <div class="accordion-collapse collapse show" id="${collapseId}"
                                        data-bs-parent="#awardAccordion" aria-labelledby="${headingId}">
                                        <div class="content-collapse">
                                            <div class="add-service-info">
                                                <div class="add-info">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-6">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label">Award Name</label>
                                                                <select id="${awardSelectorId}" class="form-control" name="name[]"> </select>
                                                                <script id="noAwardTemplate" type="text/x-kendo-tmpl">
                                                                    <div>
                                                                            No data found. Do you want to add new item - '#: instance.filterInput.val() #' ?
                                                                            </div>
                                                                            <br />
                                                                            # var value = instance.input.val(); #
                                                                            # var id = instance.element[0].id; #
                                                                            <button class="k-button k-button-solid-base k-button-solid k-button-md k-rounded-md" onclick="addAwardData('#: id #', '#: value #')">Add new item</button>
                                                                        </script>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label">Year <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="form-icon">
                                                                    <input type="text"
                                                                        class="form-control datetimepicker">
                                                                    <span class="icon"><i
                                                                            class="fa-regular fa-calendar-days"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label">Description <span
                                                                        class="text-danger">*</span></label>
                                                                <textarea class="form-control" rows="3"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                            accordion.appendChild(newEntry);
                            // initializeKendoMultiSelectForAward(`#${awardSelectorId}`);
                            awardCount++;
                            initializeDatePicker();

}

function addExperience(){
    // alert('hii')
    const accordion = document.getElementById('experienceAccordion');
    const newEntry = document.createElement('div');
    newEntry.classList.add('accordion-item', 'experince-entry');
    const headingId = `heading${experienceCount}`;
    const collapseId = `collapse${experienceCount}`;
    const hospitalSelectorId = `hospital${experienceCount}`;


    newEntry.innerHTML = `<div class="accordions experience-infos" id="experienceAccordion">
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
                                            <input type="text" class="form-control" name="experience[${experienceCount}][job_title]">
                                            <span class="text-danger" id="job_title_${experienceCount}_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Hospital <span
                                                    class="text-danger">*</span></label>
                                                    <select id="${hospitalSelectorId}" class="form-control" name="experience[${experienceCount}][hospital]"> </select>
                                                    <script  id="noHospitalTemplate" type="text/x-kendo-tmpl">
                                                        <div>
                                                                    No data found. Do you want to add new item - '#: instance.filterInput.val() #' ?
                                                                </div>
                                                                <br />
                                                                # var value = instance.input.val(); #
                                                                # var id = instance.element[0].id; #
                                                                <button class="k-button k-button-solid-base k-button-solid k-button-md k-rounded-md" onclick="addHospital('#: id #', '#: value #')">Add new item</button>
                                                            </script>
                                                            <span class="text-danger" id="hospital_${experienceCount}_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Location <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="experience[${experienceCount}][location]">
                                            <span class="text-danger" id="location_${experienceCount}_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Start Date <span
                                                    class="text-danger">*</span></label>
                                            <div class="form-icon">
                                                <input type="text"
                                                    class="form-control data-picker" name="experience[${experienceCount}][start_date]" autocomplete="off">
                                                <span class="icon"><i
                                                        class="fa-regular fa-calendar-days"></i></span>
                                                        <span class="text-danger" id="start_date_${experienceCount}_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">End Date <span
                                                    class="text-danger">*</span></label>
                                            <div class="form-icon">
                                                <input type="text"
                                                    class="form-control data-picker" name="experience[${experienceCount}][end_date]" autocomplete="off">
                                                <span class="icon"><i
                                                        class="fa-regular fa-calendar-days"></i></span>
                                                        <span class="text-danger" id="end_date_${experienceCount}_error"></span>
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
                                            <textarea class="form-control" rows="3" name="experience[${experienceCount}][description]"></textarea>
                                            <span class="text-danger" id="description_${experienceCount}_error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>`;
        accordion.appendChild(newEntry);
        initializeKendoMultiSelectForExperience(`#${hospitalSelectorId}`);
        experienceCount++;
        // console.log(newEntry);
        initializeDatePicker();

}

function addEducation(userEducationCount) {
    if (userEducationCount) {
        educationCount = userEducationCount;  
    } 
    const accordion = document.getElementById('educationAccordion');
    const newEntry  = document.createElement('div');
    newEntry.classList.add('accordion-item', 'education-entry');
    const headingId = `heading${educationCount}`;
    const collapseId = `collapse${educationCount}`;
    const courseSelectorId = `course${educationCount}`;
    newEntry.innerHTML = `<div class="accordions education-infos" id="educationAccordion">
                            <div class="user-accordion-item accordion-item education-entry">
                                <a href="#" class="accordion-wrap" data-bs-toggle="collapse"
                                    data-bs-target="#education1">Education ${educationCount + 1}<span onclick="deleteEducation(this)" >Delete</span></a>
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
                                                            <input type="text" class="form-control" name="education[${educationCount}][name]">
                                                            <span class="text-danger" id="name_${educationCount}_error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-wrap">
                                                                <label for="${courseSelectorId}" class="form-label">Course:</label>
                                                                <select id="${courseSelectorId}" class="form-control" name="education[${educationCount}][course]"></select>
                                                                    <script id="noCourseTemplate" type="text/x-kendo-tmpl">
                                                                        <div>
                                                                                    No data found. Do you want to add new item - '#: instance.filterInput.val() #' ?
                                                                                </div>
                                                                                <br />
                                                                                # var value = instance.input.val(); #
                                                                                # var id = instance.element[0].id; #
                                                                                <button class="k-button k-button-solid-base k-button-solid k-button-md k-rounded-md" onclick="addCourse('#: id #', '#: value #')">Add new item</button>
                                                                            </script>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-wrap">
                                                            <label class="col-form-label">Start Date <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="form-icon">
                                                                <input type="text"
                                                                    class="form-control data-picker" name="education[${educationCount}][start_date]" autocomplete="off">
                                                                    <span class="text-danger" id="start_date_${educationCount}_error"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="form-wrap">
                                                            <label class="col-form-label">End Date <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="form-icon">
                                                                <input type="text"
                                                                    class="form-control data-picker" name="education[${educationCount}][end_date]" autocomplete="off">
                                                                    <span class="text-danger" id="end_date_${educationCount}_error"></span>
                                                                    
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                           
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`;
    accordion.appendChild(newEntry);
    initializeKendoMultiSelect(`#${courseSelectorId}`);
    initializeDatePicker();
    educationCount++;
}
// delete education div
function deleteEducation(button) {
    const entry = button.closest('.accordion-item');
    entry.remove();
}
// delete experience div

function deleteExperience(button) {
    const entry = button.closest('.accordion-item');
    entry.remove();
}

// initialize datepicker for new created div
function initializeDatePicker()
{
    $(".data-picker").datepicker({
        format: "yyyy",
        startView: 'decade',
        minView: 'decade',
        viewSelect: 'decade',
        autoclose: true
    });
}
function initializeKendoMultiSelect(selector) {
    $(selector).getKendoDropDownList({
        filter: "contains",
        dataTextField: "name",
        dataValueField: "id",
        dataSource: courseDataSource,
        noDataTemplate: $("#noCourseTemplate").html()
    });
}
function initializeKendoMultiSelectForExperience(selector) {
    jQuery(selector).kendoMultiSelect({
        filter: "contains",
        dataTextField: "name",
        dataValueField: "id",
        dataSource: hospitalDataSource,
        noDataTemplate: $("#noHospitalTemplate").html()
    });
}
// function initializeKendoMultiSelectForAward(selector) {
//     jQuery(selector).kendoMultiSelect({
//         filter: "contains",
//         dataTextField: "name",
//         dataValueField: "id",
//         dataSource: awardDataSource,
//         noDataTemplate: $("#noAwardTemplate").html()
//     });
// }

// for language 

// function addLanguage(widgetId, value) {
//     var widget = jQuery("#" + widgetId).getKendoMultiSelect();
//     var dataSource = widget.dataSource;
//     dataSource.add({
//         name: value
//     });
//     dataSource.add({
//         id: dataSource.data().length + 1,
//         name: value
//     });
//     var currentValue = widget.value()
//     currentValue.push(dataSource.data().length)
//     widget.value(currentValue)
//     widget.trigger('change')
//     dataSource.sync();
// }

/*  for course  */
// function addCourse(widgetId, value) {
//     var widget = jQuery("#" + widgetId).getKendoDropDownList();
//     var dataSource = widget.dataSource;
//         dataSource.add({
//             name: value
//         });
//         dataSource.one("sync", function() {
//             widget.select(dataSource.view().length - 1);
//         });
//         dataSource.sync();
// }

// for hospital

function addHospital(widgetId, value) {
    console.log(widgetId);
    console.log('value : ' + value);
    var widget = jQuery("#" + widgetId).getKendoMultiSelect();
    var dataSource = widget.dataSource;
    dataSource.add({
        name: value
    });
    dataSource.add({
        id: dataSource.data().length + 1,
        name: value
    });
    var currentValue = widget.value()
    currentValue.push(dataSource.data().length)
    widget.value(currentValue)
    widget.trigger('change')
    dataSource.sync();
}

// for award

function addAwardData(widgetId, value) {
    console.log(widgetId);
    console.log('value : ' + value);
    var widget = jQuery("#" + widgetId).getKendoMultiSelect();
    var dataSource = widget.dataSource;
    dataSource.add({
        name: value
    });
    dataSource.add({
        id: dataSource.data().length + 1,
        name: value
    });
    var currentValue = widget.value()
    currentValue.push(dataSource.data().length)
    widget.value(currentValue)
    widget.trigger('change')
    dataSource.sync();
}


// document.addEventListener("DOMContentLoaded", function() {
    
//     var checkboxes = document.querySelectorAll(".user-accordion-item input[type='checkbox']");

//     checkboxes.forEach(function(checkbox) {
//         checkbox.addEventListener('change', function() {
//             var checkboxId = this.id;
//             var dayId = checkboxId.replace("chackbox-", ""); 
            
//             var tabLink = document.querySelector(".business-nav .tab-link[data-tab='day-" + dayId + "']");
            
//             if (this.checked) {
//                 tabLink.classList.add("active");
//             } else {
//                 tabLink.classList.remove("active");
//             }
//         });
//     });
// });
