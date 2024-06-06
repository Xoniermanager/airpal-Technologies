@extends('layouts.admin.main')
@section('content')
<div class="row">
    <div class="col-sm-6">
        <div class="form-wrap">
            <label class="col-form-label">Course</label>
            {{-- <input type="text" class="form-control" name="course[]"> --}}
        
            <select id="course" class="form-control" name="course"> </select>
            <script id="noCourseTemplate" type="text/x-kendo-tmpl">
                <div>
                    No data found. Do you want to add new item - '#: instance.filterInput.val() #' ?
                </div>
                <br />
                <button class="k-button k-button-solid-base k-button-solid k-button-md k-rounded-md" onclick="addCourse('#: instance.element[0].id #', '#: instance.filterInput.val() #')">Add new item</button>
            </script>
                {{-- <script id="noCourseTemplate" type="text/x-kendo-tmpl">
                    <div>
                        No data found. Do you want to add new item - '#: instance.filterInput.val() #' ?
                    </div>
                    <br />
                    # var value = instance.input.val(); #
                    # var id = instance.element[0].id; #
                    <button class="k-button k-button-solid-base k-button-solid k-button-md k-rounded-md" onclick="addCourse('#: id #', '#: value #')">Add new item</button>
                </script> --}}
                <span class="text-danger" id="course_error"></span>
        </div>
    </div>
</div>

@endsection
@section('javascript')
<script>
    jQuery(document).ready(function(){
        // for course          
      
        

        var site_admin_base_url = 'http://127.0.0.1:8000/admin/';

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
        
        jQuery("#course").kendoDropDownList({
            filter: "startswith",
            dataTextField: "name",
            dataValueField: "id",
            dataSource: courseDataSource,
            noDataTemplate: jQuery("#noCourseTemplate").html()


            // filter: "startswith",
            // dataTextField: "name",
            // dataValueField: "id",
            // dataSource: courseDataSource,
            // noDataTemplate: jQuery("#noCourseTemplate").html()


        });


        
    });
    /*  for course  */
// function addCourse(widgetId, value) {
// var widget = jQuery("#" + widgetId).kendoDropDownList();
// var dataSource = widget.dataSource;
// // console.log(dataSource);
// // if (confirm("Are you sure?")) {
//    dataSource.add({
//        name: value
//    });
//    dataSource.one("sync", function() {
//        widget.select(dataSource.view().length - 1);
//    });
//    dataSource.sync();

// }


function addCourse(widgetId, value) {
    var widget = jQuery("#" + widgetId).getKendoDropDownList();
    var dataSource = widget.dataSource;
        dataSource.add({
            name: value
        });
        dataSource.one("sync", function() {
            widget.select(dataSource.view().length - 1);
        });
        dataSource.sync();
    }

</script>


@endsection