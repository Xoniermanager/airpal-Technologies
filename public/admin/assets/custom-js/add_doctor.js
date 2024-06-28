
// document.getElementById('addEducationBtn').addEventListener('click', addEducation);
// document.getElementById('addExperienceBtn').addEventListener('click', addExperience);
//document.getElementById('addAwardBtn').addEventListener('click', addNewAwardAccordion);

// function addAward(userAwardCount){

//     if(userAwardCount)
//         {
//             awardCount = userAwardCount;
//         }

// alert(awardCount);
//     const accordion = document.getElementById('awardAccordion');
//     const newEntry = document.createElement('div');
//     newEntry.classList.add('accordion-item', 'award-entry');
//     const headingId = `heading${awardCount}`;
//     const collapseId = `collapse${awardCount}`;
//     const awardSelectorId = `award${awardCount}`;

//     const awardNoAwardTemplate = `noAwardTemplate${awardCount}`;

//     newEntry.innerHTML = `<div class="accordions award-infos" id="${headingId}">
//                             <div class="user-accordion-item accordion-item award-entry">
//                                     <a href="#" class="accordion-wrap" data-bs-toggle="collapse"
//                                     data-bs-target="#${collapseId}">Awards<span onclick="deleteAwards('',this)">Delete</span></a>
//                                     <div class="accordion-collapse collapse show" id="${collapseId}"
//                                         data-bs-parent="#awardAccordion" aria-labelledby="${headingId}">
//                                         <div class="content-collapse">
//                                             <div class="add-service-info">
//                                                 <div class="add-info">
//                                                     <div class="row align-items-center">
//                                                         <div class="col-md-6">
//                                                             <div class="form-wrap">
//                                                                 <label class="col-form-label">Award Name</label>
//                                                                 <select id="${awardSelectorId}" class="form-control" name="awards[${awardCount}][name]"> </select>
//                                                                 <script id="noAwardTemplate" type="text/x-kendo-tmpl">
//                                                                     <div>
//                                                                             No data found. Do you want to add new item - '#: instance.filterInput.val() #' ?
//                                                                             </div>
//                                                                             <br />
//                                                                             # var value = instance.filterInput.val(); #
//                                                                             # var id = instance.element[0].id; #
//                                                                             <button class="k-button k-button-solid-base k-button-solid k-button-md k-rounded-md" onclick="addAwardData('#: id #', '#: value #')">Add new item</button>
//                                                                         </script>

//                                                                         <span class="text-danger" id="awards_${experienceCount}_name_error"></span>
//                                                             </div>
//                                                         </div>
//                                                         <div class="col-md-6">
//                                                             <div class="form-wrap">
//                                                                 <label class="col-form-label">Year <span
//                                                                         class="text-danger">*</span></label>
//                                                                 <div class="form-icon">
//                                                                     <input type="text"
//                                                                         class="form-control flat-picker" name = "awards[${awardCount}][year]" >
//                                                                     <span class="icon"><i
//                                                                             class="fa-regular fa-calendar-days"></i></span>
//                                                                 </div>
//                                                                 <span class="text-danger" id="awards_${experienceCount}_year_error"></span>
//                                                             </div>
//                                                         </div>
//                                                         <div class="col-lg-12">
//                                                             <div class="form-wrap">
//                                                                 <label class="col-form-label">Description <span
//                                                                         class="text-danger">*</span></label>
//                                                                 <textarea class="form-control" rows="3" name = "awards[${awardCount}][description]"></textarea>
//                                                                 <span class="text-danger" id="awards_${experienceCount}_description_error"></span>
//                                                             </div>
//                                                         </div>
//                                                     </div>
//                                                 </div>
//                                             </div>
//                                         </div>
//                                     </div>
//                                 </div>
//                             </div>`;
//                             awardCount++;
//                             accordion.appendChild(newEntry);
//                             initializeKendoDropdownSelectForAward(`#${awardSelectorId}`);
//                             initializeFlatDatePicker();
                    

// }
// function addExperience(experienceCount){


//     if (experienceCount) {
//         experienceCount = experienceCount;  
//     } 


//     const accordion = document.getElementById('experienceAccordion');
//     const newEntry = document.createElement('div');
//     newEntry.classList.add('accordion-item', 'experince-entry');
//     const headingId = `heading${experienceCount}`;
//     const collapseId = `collapse${experienceCount}`;
//     const hospitalSelectorId = `hospital${experienceCount}`;


//     newEntry.innerHTML = `<div class="accordions experience-infos" id="experienceAccordion">
//             <div class="user-accordion-item accordion-item experince-entry">
//                 <a href="#" class="accordion-wrap" data-bs-toggle="collapse"
//                     data-bs-target="#experience1">Experience<span onclick="deleteExperience('',this)">Delete</span></a>
//                 <div class="accordion-collapse collapse show" id="experience1"
//                     data-bs-parent="#experienceAccordion">
//                     <div class="content-collapse">
//                         <div class="add-service-info">
//                             <div class="add-info">
//                                 <div class="row align-items-center">

//                                     <div class="col-lg-4 col-md-6">
//                                         <div class="form-wrap">
//                                             <label class="col-form-label">Title</label>
//                                             <input type="text" class="form-control" name="experience[${experienceCount}][job_title]">
//                                             <span class="text-danger" id="experience_${experienceCount}_job_title_error"></span>
//                                         </div>
//                                     </div>
//                                     <div class="col-lg-4 col-md-6">
//                                         <div class="form-wrap">
//                                             <label class="col-form-label">Hospital <span
//                                                     class="text-danger">*</span></label>
//                                                     <select id="${hospitalSelectorId}" class="form-control" name="experience[${experienceCount}][hospital]"> </select>
//                                                     <script  id="noHospitalTemplate" type="text/x-kendo-tmpl">
//                                                         <div>
//                                                                     No data found. Do you want to add new item - '#: instance.filterInput.val() #' ?
//                                                                 </div>
//                                                                 <br />
//                                                                 # var value = instance.filterInput.val(); #
//                                                                 # var id = instance.element[0].id; #
//                                                                 <button class="k-button k-button-solid-base k-button-solid k-button-md k-rounded-md" onclick="addHospital('#: id #', '#: value #')">Add new item</button>
//                                                             </script>
//                                                             <span class="text-danger" id="experience_${experienceCount}_hospital_error"></span>
//                                         </div>
//                                     </div>

//                                     <div class="col-md-4">
//                                         <div class="form-wrap">
//                                             <label class="col-form-label">Location <span
//                                                     class="text-danger">*</span></label>
//                                             <input type="text" class="form-control" name="experience[${experienceCount}][location]">
//                                             <span class="text-danger" id="experience_${experienceCount}_location_error"></span>
//                                         </div>
//                                     </div>

//                                     <div class="col-lg-4 col-md-6">
//                                         <div class="form-wrap">
//                                             <label class="col-form-label">Start Date <span
//                                                     class="text-danger">*</span></label>
//                                             <div class="form-icon">
//                                                 <input type="text"
//                                                     class="form-control flat-picker" name="experience[${experienceCount}][start_date]" autocomplete="off">
//                                                 <span class="icon"><i
//                                                         class="fa-regular fa-calendar-days"></i></span>
//                                                         <span class="text-danger" id="experience_${experienceCount}_start_date_error"></span>
//                                             </div>
//                                         </div>
//                                     </div>
//                                     <div class="col-lg-4 col-md-6">
//                                         <div class="form-wrap">
//                                             <label class="col-form-label">End Date <span
//                                                     class="text-danger">*</span></label>
//                                             <div class="form-icon">
//                                                 <input type="text"
//                                                     class="form-control flat-picker" name="experience[${experienceCount}][end_date]" autocomplete="off">
//                                                 <span class="icon"><i
//                                                         class="fa-regular fa-calendar-days"></i></span>
//                                                         <span class="text-danger" id="experience_${experienceCount}_end_date_error"></span>
//                                             </div>
//                                         </div>
//                                     </div>
//                                     <div class="col-lg-4 col-md-6">
//                                         <div class="form-wrap">
//                                             <label class="col-form-label">&nbsp;</label>
//                                             <div class="form-check">
//                                                 <label class="form-check-label">
//                                                     <input class="form-check-input"
//                                                         type="checkbox" name="working_status[]">
//                                                     I Currently Working Here
//                                                 </label>
//                                             </div>
//                                         </div>
//                                     </div>

//                                     <div class="col-lg-12">
//                                         <div class="form-wrap">
//                                             <label class="col-form-label">Job Description
//                                                 <span class="text-danger">*</span></label>
//                                             <textarea class="form-control" rows="3" name="experience[${experienceCount}][description]"></textarea>
//                                             <span class="text-danger" id="_end_date_${experienceCount}_description_error"></span>
//                                         </div>
//                                     </div>
//                                 </div>
//                             </div>
//                         </div>
//                     </div>
//                 </div>
//             </div>
//         </div>`;
//         experienceCount++;
//         accordion.appendChild(newEntry);
//         initializeKendoMultiSelectForExperience(`#${hospitalSelectorId}`);
//         initializeFlatDatePicker();
     

// }
// function addEducation(userEducationCount) {
//     if (userEducationCount) {
//         educationCount = userEducationCount;  
//     } 
//     const accordion = document.getElementById('educationAccordion');
//     const newEntry  = document.createElement('div');
//     newEntry.classList.add('accordion-item', 'education-entry');
//     const headingId = `heading${educationCount}`;
//     const collapseId = `collapse${educationCount}`;
//     const courseSelectorId = `course${educationCount}`;
//     newEntry.innerHTML = `<div class="accordions education-infos" id="educationAccordion">
//                             <div class="user-accordion-item accordion-item education-entry">
//                                 <a href="#" class="accordion-wrap" data-bs-toggle="collapse"
//                                     data-bs-target="#education-1">Education ${educationCount + 1}<span onclick="deleteEducation('',this)" >Delete</span></a>
//                                 <div class="accordion-collapse collapse show" id="education-1"
//                                     data-bs-parent="#educationAccordion">
//                                     <div class="content-collapse">
//                                         <div class="add-service-info">
//                                             <div class="add-info">
//                                                 <div class="row align-items-center">
//                                                     <div class="col-md-6">
//                                                         <div class="form-wrap">
//                                                             <label class="col-form-label">Name of the
//                                                                 institution</label>
//                                                             <input type="text" class="form-control" name="education[${educationCount}][name]">
//                                                             <span class="text-danger" id="education_${educationCount}_name_error"></span>
//                                                         </div>
//                                                     </div>
//                                                     <div class="col-md-6">
//                                                         <div class="form-wrap">
//                                                                 <label for="${courseSelectorId}" class="form-label" >Course:</label>
                                               
//                                             <select id="${courseSelectorId}" class="form-control" name="education[${educationCount}][course]"> </select>
//                                             <script id="noCourseTemplate" type="text/x-kendo-tmpl">
//                                                 <div>
//                                                     No data found. Do you want to add new item - '#: instance.filterInput.val() #' ?
//                                                 </div>
//                                                 <br />
//                                                 <button class="k-button k-button-solid-base k-button-solid k-button-md k-rounded-md" onclick="addCourse('#: instance.element[0].id #', '#: instance.filterInput.val() #')">Add new item</button>
//                                             </script>
//                                                             </select>
//                                                             <span class="text-danger" id="education_${educationCount}_course_error"></span>
//                                                         </div>
//                                                     </div>
//                                                     <div class="col-lg-6 col-md-6">
//                                                         <div class="form-wrap">
//                                                             <label class="col-form-label">Start Date <span
//                                                                     class="text-danger">*</span></label>
//                                                             <div class="form-icon">
//                                                                 <input type="text"
//                                                                     class="form-control flat-picker" name="education[${educationCount}][start_date]" autocomplete="off">
//                                                                     <span class="text-danger" id="education_${educationCount}_start_date_error"></span>
//                                                             </div>
//                                                         </div>
//                                                     </div>
//                                                     <div class="col-lg-6 col-md-6">
//                                                         <div class="form-wrap">
//                                                             <label class="col-form-label">End Date <span
//                                                                     class="text-danger">*</span></label>
//                                                             <div class="form-icon">
//                                                                 <input type="text"
//                                                                     class="form-control flat-picker" name="education[${educationCount}][end_date]" autocomplete="off">
//                                             <span class="text-danger" id="education_${educationCount}_end_date_error"></span>
                                                                    
//                                                             </div>
//                                                         </div>
//                                                     </div>

//                                                 </div>
//                                             </div>
                                           
                                            
//                                         </div>
//                                     </div>
//                                 </div>
//                             </div>
//                         </div>`;
//     educationCount++;
//     accordion.appendChild(newEntry);
//     initializeKendoDropdownSelectForEducation(`#${courseSelectorId}`);
//     initializeFlatDatePicker();

// }


/*
================================================================================
                    Start : Manage Doctor Personal Profiles Details From Kendo 
================================================================================
*/

function addItemToMultiSelect(widgetId, value) {
    var widget = jQuery("#" + widgetId).getKendoMultiSelect();
    var dataSource = widget.dataSource;

    dataSource.add({
        name: value
    });

    dataSource.one("sync", function() {
        widget.select(dataSource.data().length - 1);
    });

    var currentValue = widget.value();
    currentValue.push(dataSource.data().total - 1);
    widget.value(currentValue);

    widget.trigger('change');
    dataSource.sync();
}


// Todo manage it 
// function addLanguage(widgetId, value) {
//     var widget = jQuery("#" + widgetId).getKendoMultiSelect();
//     var dataSource = widget.dataSource;
//     dataSource.add({
//         name: value
//     });
//     dataSource.add({
//         id: dataSource.data().length - 1,
//         name: value
//     });
//     var currentValue = widget.value()
//     currentValue.push(dataSource.data().length)
//     widget.value(currentValue)
//     widget.trigger('change')
//     dataSource.sync();
// }
// function addSpeciality(widgetId, value) {
//     var widget = jQuery("#" + widgetId).getKendoMultiSelect();
//     var dataSource = widget.dataSource;
//     dataSource.add({
//         name: value
//     });
//     dataSource.one("sync", function() {
//         widget.select(dataSource.data().length + 1);
//     });
//     var currentValue = widget.value()
//     currentValue.push(dataSource.data().length)
//     widget.value(currentValue)
//     widget.trigger('change')
//     dataSource.sync();
// }
// function addService(widgetId, value) {
//     var widget = jQuery("#" + widgetId).getKendoMultiSelect();
//     var dataSource = widget.dataSource;
//     dataSource.add({
//         name: value
//     });
//     dataSource.one("sync", function() {
//         widget.select(dataSource.data().length + 1);
//     });
//     var currentValue = widget.value()
//     currentValue.push(dataSource.data().length)
//     widget.value(currentValue)
//     widget.trigger('change')
//     dataSource.sync();
// }

/*
================================================================================
                    Start : Manage Doctor Personal Profiles Details From Kendo End
================================================================================
*/



/*
============================================================================
                    Start : Manage Flat Date Picker 
============================================================================
*/
function initializeFlatDatePicker() {
    const datepickers = document.querySelectorAll('.flat-picker');
    datepickers.forEach(picker => {
        flatpickr(picker, {
            enableTime: false,
            dateFormat: "Y-m-d"
        });
    });
}
/*
============================================================================
                    Start : Manage Flat Date Picker End
============================================================================
*/


/*
============================================================================
                    Start : Manage Awards in kendo list
============================================================================
*/

// Add awards section  div/container

let awardCount        = 1;

const addAward = (function() {
    let awardCount;
    return function(userAwardCount) {
        if (awardCount === undefined && userAwardCount !== undefined) {
            awardCount = userAwardCount + 1;
        }
        const accordion = document.getElementById('addNewAwardTabItem');
        const newEntry = document.createElement('div');
        newEntry.classList.add('accordion-item', 'award-entry');
        const headingId = `heading${awardCount}`;
        const collapseId = `collapse${awardCount}`;
        const awardSelectorId = `award${awardCount}`;

        const awardNoAwardTemplate = `noAwardTemplate${awardCount}`;

        newEntry.innerHTML = `<div class="accordions award-infos" id="${headingId}">
                                <div class="user-accordion-item accordion-item award-entry">
                                        <a href="#" class="accordion-wrap" data-bs-toggle="collapse"
                                        data-bs-target="#${collapseId}">Awards<span onclick="deleteAwards('',this)">Delete</span></a>
                                        <div class="accordion-collapse collapse show" id="${collapseId}"
                                            data-bs-parent="#awardAccordion" aria-labelledby="${headingId}">
                                            <div class="content-collapse">
                                                <div class="add-service-info">
                                                    <div class="add-info">
                                                        <div class="row align-items-center">
                                                            <div class="col-md-6">
                                                                <div class="form-wrap">
                                                                    <label class="col-form-label">Award Name</label>
                                                                    <select id="${awardSelectorId}" class="form-control" name="awards[${awardCount}][name]"> </select>
                                                                    <script id="noAwardTemplate" type="text/x-kendo-tmpl">
                                                                        <div>
                                                                                No data found. Do you want to add new item - '#: instance.filterInput.val() #' ?
                                                                                </div>
                                                                                <br />
                                                                                # var value = instance.filterInput.val(); #
                                                                                # var id = instance.element[0].id; #
                                                                                <button class="k-button k-button-solid-base k-button-solid k-button-md k-rounded-md" onclick="addAwardData('#: id #', '#: value #')">Add new item</button>
                                                                            </script>

                                                                            <span class="text-danger" id="awards_${awardCount}_name_error"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-wrap">
                                                                    <label class="col-form-label">Year <span
                                                                            class="text-danger">*</span></label>
                                                                    <div class="form-icon">
                                                                        <input type="text"
                                                                            class="form-control flat-picker" name="awards[${awardCount}][year]">
                                                                        <span class="icon"><i
                                                                                class="fa-regular fa-calendar-days"></i></span>
                                                                    </div>
                                                                    <span class="text-danger" id="awards_${awardCount}_year_error"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <div class="form-wrap">
                                                                    <label class="col-form-label">Description <span
                                                                            class="text-danger">*</span></label>
                                                                    <textarea class="form-control" rows="3" name="awards[${awardCount}][description]"></textarea>
                                                                    <span class="text-danger" id="awards_${awardCount}_description_error"></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label">Education Certificates</label>
                                                                <input type="file" class="form-control" id="certificatesID"
                                                                    name="awards[${awardCount}][certificates]"
                                                                    >
                                                                <small class="text-secondary">Recommended image size is <b> pdf, image
                                                                    </b></small>
                                                                <span class="text-danger" id="awards_${awardCount}_certificates_error"></span>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
        awardCount++;
        accordion.appendChild(newEntry);
        initializeKendoDropdownSelectForAward(`#${awardSelectorId}` ,awardNoAwardTemplate);
        initializeFlatDatePicker();
    };
})();

// Get all Awards and list them in kendo ui
var site_admin_base_url = 'http://127.0.0.1:8000/admin/';  // TODO : from env file

// Initialize Awards list 
function initializeKendoDropdownSelectForAward(selector,selectedAward = '',awardNoAwardTemplate = ''
) {
    jQuery(selector).kendoDropDownList({
        filter: "startswith",
        dataTextField: "name",
        dataValueField: "id",
        dataSource: awardDataSource,
        value: selectedAward , 
        noDataTemplate: jQuery("#noAwardTemplate").html(),
    });
}

    awardDataSource    = new kendo.data.DataSource({
        batch: true,
        transport: {
            read: {
                url: site_admin_base_url + "award",
                dataType: "json"
            },
            create: {
                url: site_admin_base_url + "award/ajax-create",
                dataType: "json"
            },
            parameterMap: function(options, operation) {
                if (operation !== "read" && options.models) {
                    return {
                        models: kendo.stringify(options.models)
                    };
                }
            }
        },
        schema: {
            model: {
                id: "id",
                fields: {
                    id: {
                        type: "number"
                    },
                    name: {
                        type: "string"
                    }
                }
            }
        }
    });

// Add new Awards using kendo ajax
    function addAwardData(widgetId, value) {
        var widget = jQuery("#" + widgetId).getKendoDropDownList();
        var dataSource = widget.dataSource;
        dataSource.add({
            id:dataSource.data().length + 1,
            name: value
        });
        dataSource.one("sync", function() {
            widget.select(dataSource.data().length + 1);
        });
        dataSource.sync();
        dataSource.add({
            name: value
        });
        dataSource.sync();
    }

// delete awards section (div container)
    function deleteAwards(awardId='',button) {
        const entry = button.closest('.accordion-item');
        if (!awardId) {
            console.error('Experience ID not found');
            const entry = button.closest('.accordion-item');
            entry.remove();
            return;
        }
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'http://127.0.0.1:8000/admin/doctor/delete-award', // Adjust this URL to your route
                    type: 'get',
                    data: {
                        id: awardId
                    },
                    success: function(response) {
                        if (response.success) {
                            entry.remove();
                            Swal.fire("Deleted!", "Experience deleted successfully.", "success");
                        } else {
                            Swal.fire("Error!", "Error deleting experience.", "error");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                        Swal.fire("Error!", "An error occurred while deleting the experience.", "error");
                    }
                });
            }
        });
    }

/*
============================================================================
                    End : Manage Awards in kendo list
============================================================================
*/






/*
============================================================================
                    Start : Manage Education in kendo list
============================================================================
*/

let educationCount    = 1;
// Get all Education and list them in kendo ui

const addEducation = (function() {
    // Initialize the counter
    let educationCount;

    // Return the actual function that will be called
    return function(userEducationCount) {
        // If educationCount is not yet set and a user-provided count is given, set the educationCount to it
        if (educationCount === undefined && userEducationCount !== undefined) {
            educationCount = userEducationCount + 1;
        }

        const accordion = document.getElementById('addNewEducationTabItem');
        console.log(accordion);
        const newEntry  = document.createElement('div');
        newEntry.classList.add('accordion-item', 'education-entry');
        const headingId = `heading${educationCount}`;
        const collapseId = `collapse${educationCount}`;
        const courseSelectorId = `course${educationCount}`;
        newEntry.innerHTML = `<div class="accordions education-infos" id="educationAccordion${educationCount}">
                                <div class="user-accordion-item accordion-item education-entry">
                                    <a href="#" class="accordion-wrap" data-bs-toggle="collapse"
                                        data-bs-target="#${collapseId}">Education<span onclick="deleteEducation('',this)" >Delete</span></a>
                                    <div class="accordion-collapse collapse show" id="${collapseId}"
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
                                                                <span class="text-danger" id="education_${educationCount}_name_error"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-wrap">
                                                                    <label for="${courseSelectorId}" class="form-label" >Course:</label>
                                                   
                                                <select id="${courseSelectorId}" class="form-control" name="education[${educationCount}][course]"> </select>
                                                <script id="noCourseTemplate" type="text/x-kendo-tmpl">
                                                    <div>
                                                        No data found. Do you want to add new item - '#: instance.filterInput.val() #' ?
                                                    </div>
                                                    <br />
                                                    <button class="k-button k-button-solid-base k-button-solid k-button-md k-rounded-md" onclick="addCourse('#: instance.element[0].id #', '#: instance.filterInput.val() #')">Add new item</button>
                                                </script>
                                                                </select>
                                                                <span class="text-danger" id="education_${educationCount}_course_error"></span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label">Start Date <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="form-icon">
                                                                    <input type="text"
                                                                        class="form-control flat-picker" name="education[${educationCount}][start_date]" autocomplete="off">
                                                                        <span class="text-danger" id="education_${educationCount}_start_date_error"></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="form-wrap">
                                                                <label class="col-form-label">End Date <span
                                                                        class="text-danger">*</span></label>
                                                                <div class="form-icon">
                                                                    <input type="text"
                                                                        class="form-control flat-picker" name="education[${educationCount}][end_date]" autocomplete="off">
                                                                        <span class="text-danger" id="education_${educationCount}_end_date_error"></span>
                                                                        
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6">
                                                            <div class="form-wrap">
                                                            <label class="mb-2">Education Certificates</label>
                                                            <input type="file" class="form-control certificatesInput"   name="education[${educationCount}][certificates]">
                                                            <small class="text-secondary">Recommended image size is <b>pdf, image</b></small>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                               
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
        educationCount++;
        accordion.appendChild(newEntry);
        initializeKendoDropdownSelectForEducation(`#${courseSelectorId}`);
        initializeFlatDatePicker();
    };
})();


var site_admin_base_url = 'http://127.0.0.1:8000/admin/';  // TODO : from env file

// Initialize Education list
    function initializeKendoDropdownSelectForEducation(selector, selectedEducation='') {
        $(selector).kendoDropDownList({
            filter: "startswith",
            dataTextField: "name",
            dataValueField: "id",
            dataSource: courseDataSource,
            value: selectedEducation ,
            noDataTemplate: $("#noCourseTemplate").html()
        });
    }
    courseDataSource   = new kendo.data.DataSource({
        batch: true,
        transport: {
            read: {
                url: site_admin_base_url + "course",
                dataType: "json"
            },
            create: {
                url: site_admin_base_url + "course/ajax-create",
                dataType: "json"
            },
            parameterMap: function(options, operation) {
                if (operation !== "read" && options.models) {
                    return { models: kendo.stringify(options.models)};
                }
            }
        },
        schema: {
            model: {
                id: "id",
                fields: {
                    id: { type: "number" },
                    name: { type: "string" }
                }
            }
        }
    });


// Add new Education using kendo ajax
    function addCourse(widgetId, value) {
        var widget = jQuery("#" + widgetId).getKendoDropDownList();
        var dataSource = widget.dataSource;
        dataSource.add({
            id:dataSource.data().length + 1,
            name: value
        });
        dataSource.one("sync", function() {
            widget.select(dataSource.data().length + 1);
        });
        dataSource.sync();
        dataSource.add({
            name: value
        });
        dataSource.sync();
    
    };

    jQuery("#course").kendoDropDownList({
        filter: "startswith",
        dataTextField: "name",
        dataValueField: "id",
        dataSource: courseDataSource,
        noDataTemplate: jQuery("#noCourseTemplate").html()

    });

    // Delete Experience 
    function deleteEducation(educationId='',button) {
        const entry = button.closest('.accordion-item');
        if (!educationId) {
            console.error('Experience ID not found');
            const entry = button.closest('.accordion-item');
            entry.remove();
            return;
        }
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'http://127.0.0.1:8000/admin/doctor/delete-education', // Adjust this URL to your route
                    type: 'get',
                    data: {
                        id: educationId
                    },
                    success: function(response) {
                        if (response.success) {
                            entry.remove();
                            Swal.fire("Deleted!", "Experience deleted successfully.", "success");
                        } else {
                            Swal.fire("Error!", "Error deleting experience.", "error");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                        Swal.fire("Error!", "An error occurred while deleting the experience.", "error");
                    }
                });
            }
        });
    }

/*
============================================================================
                    End : Manage Education in kendo list
============================================================================
*/





/*
============================================================================
                    Start : Manage Hospitals/Experience in kendo list
============================================================================
*/

let experienceCount   = 1;

const addExperience = (function() {
    let experienceCount;

    return function(userExperienceCount) {
        if (experienceCount === undefined && userExperienceCount !== undefined) {
            experienceCount = userExperienceCount + 1;
        }

        const accordion = document.getElementById('addNewExperienceTabItem');
        const newEntry = document.createElement('div');
        newEntry.classList.add('accordion-item', 'experince-entry');
        const headingId = `heading${experienceCount}`;
        const collapseId = `collapse${experienceCount}`;
        const hospitalSelectorId = `hospital${experienceCount}`;

        newEntry.innerHTML = `<div class="accordions experience-infos" id="experienceAccordion">
                <div class="user-accordion-item accordion-item experince-entry">
                    <a href="#" class="accordion-wrap" data-bs-toggle="collapse"
                        data-bs-target="#${collapseId}">Experience<span onclick="deleteExperience('',this)">Delete</span></a>
                    <div class="accordion-collapse collapse show" id="${collapseId}"
                        data-bs-parent="#experienceAccordion">
                        <div class="content-collapse">
                            <div class="add-service-info">
                                <div class="add-info">
                                    <div class="row align-items-center">

                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Title</label>
                                                <input type="text" class="form-control" name="experience[${experienceCount}][job_title]">
                                                <span class="text-danger" id="experience_${experienceCount}_job_title_error"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Hospital <span
                                                        class="text-danger">*</span></label>
                                                        <select id="${hospitalSelectorId}" class="form-control" name="experience[${experienceCount}][hospital]"> </select>
                                                        <script id="noHospitalTemplate" type="text/x-kendo-tmpl">
                                                            <div>
                                                                No data found. Do you want to add new item - '#: instance.filterInput.val() #' ?
                                                            </div>
                                                            <br />
                                                            # var value = instance.filterInput.val(); #
                                                            # var id = instance.element[0].id; #
                                                            <button class="k-button k-button-solid-base k-button-solid k-button-md k-rounded-md" onclick="addHospital('#: id #', '#: value #')">Add new item</button>
                                                        </script>
                                                        <span class="text-danger" id="experience_${experienceCount}_hospital_error"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Location <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="experience[${experienceCount}][location]">
                                                <span class="text-danger" id="experience_${experienceCount}_location_error"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Start Date <span
                                                        class="text-danger">*</span></label>
                                                <div class="form-icon">
                                                    <input type="text"
                                                        class="form-control flat-picker" name="experience[${experienceCount}][start_date]" autocomplete="off">
                                                    <span class="icon"><i
                                                            class="fa-regular fa-calendar-days"></i></span>
                                                            <span class="text-danger" id="experience_${experienceCount}_start_date_error"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">End Date <span
                                                        class="text-danger">*</span></label>
                                                <div class="form-icon">
                                                    <input type="text"
                                                        class="form-control flat-picker" name="experience[${experienceCount}][end_date]" autocomplete="off">
                                                    <span class="icon"><i
                                                            class="fa-regular fa-calendar-days"></i></span>
                                                            <span class="text-danger" id="experience_${experienceCount}_end_date_error"></span>
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
                                                <span class="text-danger" id="_end_date_${experienceCount}_description_error"></span>
                                            </div>
                                        </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Education Certificates</label>
                                            <input type="file" class="form-control" id="certificatesID"
                                                name="experience[${experienceCount}][certificates]"
                                                >
                                            <small class="text-secondary">Recommended image size is <b> pdf, image
                                                </b></small>
                                            <span class="text-danger" id="education_${experienceCount}_certificates_error"></span>
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
            </div>`;
        experienceCount++;
        accordion.appendChild(newEntry);
        initializeKendoMultiSelectForExperience(`#${hospitalSelectorId}`);
        initializeFlatDatePicker();
    };
})();


// Get all hospitals and list them in kendo ui


// Initialize hospitals list
hospitalDataSource = new kendo.data.DataSource({
    batch: true,
    transport: {
        read: {
            url: "http://127.0.0.1:8000/admin/hospital",
            dataType: "json"
        },
        create: {
            url: "http://127.0.0.1:8000/admin/hospital/ajax-create",
            dataType: "json"
        },
        parameterMap: function(options, operation) {
            if (operation !== "read" && options.models) {
                return {
                    models: kendo.stringify(options.models)
                };
            }
        }
    },
    schema: {
        model: {
            id: "id",
            fields: {
                id: {
                    type: "number"
                },
                name: {
                    type: "string"
                }
            }
        }
    }
});
function initializeKendoMultiSelectForExperience(selector,selectedHospital='') {
    jQuery(selector).kendoDropDownList({
        filter: "startswith",
        dataTextField: "name",
        dataValueField: "id",
        dataSource: hospitalDataSource,
        value: selectedHospital,
        noDataTemplate: jQuery("#noHospitalTemplate").html()
    });
}

// Add new hospital using kendo ajax
function addHospital(widgetId, value) {

    var widget = jQuery("#" + widgetId).getKendoDropDownList();
    var dataSource = widget.dataSource;
    dataSource.add({
        id:dataSource.data().length + 1,
        name: value
    });
    dataSource.one("sync", function() {
        widget.select(dataSource.data().length + 1);
    });
    dataSource.sync();
    dataSource.add({
        name: value
    });
    dataSource.sync();
}
 // delete Experience

 function deleteExperience(experienceId='', button) {
    const entry = button.closest('.accordion-item');
    if (!experienceId) {
        console.error('Experience ID not found');
        const entry = button.closest('.accordion-item');
        entry.remove();
        return;
    }
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: 'http://127.0.0.1:8000/admin/doctor/delete-experience', // Adjust this URL to your route
                type: 'get',
                data: {
                    id: experienceId
                },
                success: function(response) {
                    if (response.success) {
                        entry.remove();
                        Swal.fire("Deleted!", "Experience deleted successfully.", "success");
                    } else {
                        Swal.fire("Error!", "Error deleting experience.", "error");
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', status, error);
                    Swal.fire("Error!", "An error occurred while deleting the experience.", "error");
                }
            });
        }
    });
}
/*
============================================================================
                    End : Manage Hospitals/Experience in kendo list
============================================================================
*/