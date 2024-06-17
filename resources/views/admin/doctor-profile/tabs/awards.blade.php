@php
    if(isset($userAwardsDetails)&& !empty($userAwardsDetails)){ $userAwardCount = count($userAwardsDetails); }
@endphp
<div class="tab-pane fade" id="awards">
    <div class="dashboard-header border-0 mb-0">
        <h3>Awards</h3>
        <ul>
            <li>
                <a class="btn btn-primary prime-btn add-awrads" onclick="addAward({{$userAwardCount ?? '' }})">Add New Award</a>
            </li>
        </ul>
    </div>
    <form id="doctorAwardForm" method="post" enctype="multipart/form-data">
        @csrf
        @forelse ($userAwardsDetails as $key  => $singleAwardDetail)
            <div class="accordions awrad-infos" id="awardAccordion">

                <div class="user-accordion-item accordion-item award-entry">
                    <a href="#" class="accordion-wrap" data-bs-toggle="collapse"
                        data-bs-target="#award-{{$key}}">Awards<span onclick="deleteAwards({{ $singleAwardDetail->id ?? ' ' }},this)" >Delete</span></a>
                    <div class="accordion-collapse collapse show" id="award-{{$key}}" data-bs-parent="#awardAccordion">
                        <div class="content-collapse">
                            <div class="add-service-info">
                                <div class="add-info">
                                    <div class="row align-items-center">
                                        <script>
                                            jQuery(document).ready(function() {
                                                initializeKendoDropdownSelectForAward('#' + "award-id-{{ $singleAwardDetail->award_id ?? ' ' }}",
                                                    '{{ $singleAwardDetail->award_id ?? ' ' }}');
                                            });
                                        </script>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Award Name</label>
                                                {{-- <input type="text" class="form-control" name="name[]"> --}}
                                                {{-- <p id="doctorAwardsIds"  style="display: none;"> {{$awardsIds ?? ''}}</p> --}}
                                                </p>
                                                <select id="award-id-{{ $singleAwardDetail->award_id ?? ' ' }}"
                                                    class="form-control" name="awards[{{ $key }}][name]">
                                                </select>
                                                <script id="noAwardTemplate{{ $singleAwardDetail->award_id ?? ' ' }}" type="text/x-kendo-tmpl">
                                                       <div>
                                                            No data found. Do you want to add new item - '#: instance.filterInput.val() #' ?
                                                        </div>
                                                        <br />
                                                        # var value = instance.filterInput.val(); #
                                                        # var id = instance.element[0].id; #
                                                        <button class="k-button k-button-solid-base k-button-solid k-button-md k-rounded-md" onclick="addAwardData{{ $singleAwardDetail->award_id ?? ' ' }}('#: id #', '#: value #')">Add new item</button>
                                                </script>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Year <span
                                                        class="text-danger">*</span></label>
                                                <div class="form-icon">
                                                    <input type="text" class="form-control flat-picker"
                                                        name="awards[{{ $key}}][year]" id="datepicker"
                                                        value="{{ $singleAwardDetail->year }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Description <span
                                                        class="text-danger">*</span></label>
                                                <textarea class="form-control" rows="3" name="awards[{{ $key }}][description]"> {{ $singleAwardDetail->description }}</textarea>
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
            <div class="accordions awrad-infos" id="awardAccordion">

                <div class="user-accordion-item accordion-item award-entry">
                    <a href="#" class="accordion-wrap" data-bs-toggle="collapse"
                        data-bs-target="#award-1">Awards<span onclick="deleteAwards({{ $singleAwardDetail->id ?? ' ' }},this)" >Delete</span></a>
                    <div class="accordion-collapse collapse show" id="award-1" data-bs-parent="#awardAccordion">
                        <div class="content-collapse">
                            <div class="add-service-info">
                                <div class="add-info">
                                    <div class="row align-items-center">
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Award Name</label>
                                                {{-- <input type="text" class="form-control" name="name[]"> --}}
                                                <select id="award" class="form-control" name="awards[0][name]">
                                                </select>
                                                <script id="noAwardTemplate{{ $singleAwardDetail->award_id ?? ' ' }}" type="text/x-kendo-tmpl">
                                                       <div>
                                                            No data found. Do you want to add new item - '#: instance.filterInput.val() #' ?
                                                        </div>
                                                        <br />
                                                        # var value = instance.filterInput.val(); #
                                                        # var id = instance.element[0].id; #
                                                        <button class="k-button k-button-solid-base k-button-solid k-button-md k-rounded-md" onclick="addAwardData('#: id #', '#: value #')">Add new item</button>
                                                    </script>
                                                    <span class="text-danger" id="awards_0_name_error"></span>

                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Year <span
                                                        class="text-danger">*</span></label>
                                                <div class="form-icon">
                                                    <input type="text" class="form-control flat-picker" name="awards[0][year]"
                                                        >
                                                        <span class="text-danger" id="awards_0_year_error"></span>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-wrap">
                                                <label class="col-form-label">Description <span
                                                        class="text-danger">*</span></label>
                                                <textarea class="form-control" rows="3" name="awards[0][description]"></textarea>
                                                <span class="text-danger" id="awards_0_description_error"></span>

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
            <input type="hidden" value="{{ Request::segment(4) ?? ' ' }}" name="user_id" id="doctor_user_id">
            <button type="submit" class="btn btn-primary prime-btn">Save
                Changes</button>
        </div>
    </form>
</div>
