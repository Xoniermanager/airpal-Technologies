
<div class="tab-pane fade" id="address_tab">
    <div class="dashboard-header border-0 mb-0">
        <h3>Address</h3>
    </div>
    <form id="doctorAddressform" method="post" enctype="multipart/form-data">
        @csrf 
        <div class="accordions address-infos" id="addressAccordion">
            <div class="user-accordion-item accordion-item address-entry">
                <a href="#" class="accordion-wrap" data-bs-toggle="collapse"
                    data-bs-target="#address1">address</a>
                <div class="accordion-collapse collapse show" id="address1"
                    data-bs-parent="#addressAccordion">
                    <div class="content-collapse">
                        <div class="add-service-info">
                            <div class="add-info">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Street</label>
                                            <input type="text" class="form-control" name="street" placeholder="eg.'hudson 11' " value="{{$singleDoctorDetails->doctorAddress->address ?? ''}}"> 
                                            <span class="text-danger" id="street_error"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">Country</label>  
                                            <select class="form-control select" name="country" id="country">
                                                <option value="">Select Country </option>
                                                @forelse ($countries as $country )
                                                <option value="{{ $country->id }}"
                                                    @if(isset($singleDoctorDetails) && isset($singleDoctorDetails->doctorAddress) && $singleDoctorDetails->doctorAddress->country_id == $country->id)
                                                        selected
                                                    @endif>
                                                    {{ $countryName = $country->name }}
                                                </option>
                                                @empty
                                                <option>Not avaiable please create it first</option>  
                                                @endforelse
                                            </select> 
                                            <span class="text-danger" id="country_error"></span>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">State<span
                                                    class="text-danger">*</span></label>
                                            <div class="form-icon">
                                                <select  class="form-control select" id="states" name="states">
                                                    <option value=" ">Select State </option>
                                                    @forelse ($states as $state )
                                                    <option value="{{ $state->id }}"
                                                        @if(isset($singleDoctorDetails) && isset($singleDoctorDetails->doctorAddress) && $singleDoctorDetails->doctorAddress->state_id == $state->id)
                                                            selected
                                                        @endif>
                                                        {{ $state->name }}
                                                    </option>
                                                     @empty
                                                     <option>Not avaiable please create it first</option>  
                                                     @endforelse
                                                </select> 
                                                    <span class="text-danger" id="states_error"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">City<span
                                                    class="text-danger">*</span></label>
                                            <div class="form-icon">
                                                <input type="text"
                                                class="form-control" name="city" autocomplete="off" id="city"  placeholder="eg.'Vanaras' " value = "{{$singleDoctorDetails->doctorAddress->city ?? ''}}">
                                                    <span class="text-danger" id="city_error"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-wrap">
                                            <label class="col-form-label">pincode<span
                                                    class="text-danger">*</span></label>
                                            <div class="form-icon">
                                                <input type="number"
                                                    class="form-control" name="pincode" id="pincode" placeholder="eg.'11312' "  value="{{$singleDoctorDetails->doctorAddress->pin_code ?? ''}}">
                                                    <span class="text-danger" id="pincode_error"></span>
                                            </div>
                                        </div>
                                    </div>

                                    @php
                                        $address = $singleDoctorDetails->doctorAddress->address ?? '';
                                        $city = $singleDoctorDetails->doctorAddress->city ?? '';
                                        $fullAddress = $address . ' ' . $city . ' india';
                                        $encodedAddress = str_replace(' ', '+', $fullAddress);
                                    @endphp

                                    <a href="https://www.google.com/maps?q={{ $encodedAddress }}" target="_blank">
                                        <p><i class="fas fa-map-marker-alt"></i> Click Here Google Map Address</p>  
                                    </a>
                                    <iframe src="https://www.google.com/maps?q={{ $encodedAddress }}&output=embed" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>

                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-btn text-end">
            <input type="hidden" value="{{(Request::segment(4) ?? " ")}}" name="user_id" id="doctor_user_id">
            <button class="btn btn-primary prime-btn">Save Changes</button>
        </div>
    </form>
</div>
