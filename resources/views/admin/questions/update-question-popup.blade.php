<div class="modal-dialog modal-dialog-centered min-w-600px" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit question</h5>
            <button type="button" class="btn-close close-form-add" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="editQuestionForm" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ auth()->user()->id }}" name="doctor">
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <div class="mb-3">
                            <label class="mb-2">Specialty</label>
                            <div>
                                <select class="form-control select" name="specialty" id="specialty">
                                    <option value="">Select Specialty</option>
                                    @forelse ($specialties as $specialty)
                                        <option {{ $questionDetails->specialty_id == $specialty->id ? 'selected' : '' }}  value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                                    @empty
                                        <option>Not found</option>
                                    @endforelse

                                </select>
                            </div>
                            <span class="text-danger" id="specialty-error"></span>

                        </div>
                    </div>

                    <div class="col-6 col-sm-6">
                        <div class="mb-3" id="answer-type-div">
                            <label class="mb-2">Answer Type</label>
                            <select class="form-control select answer_type" name="answer_type">
                                <option value="">Select Answer Type</option>
                                <option {{ $questionDetails->answer_type == 'text' ? 'selected' : '' }}
                                    value="text">text</option>
                                <option {{ $questionDetails->answer_type == 'optional' ? 'selected' : '' }}
                                    value="optional">optional</option>
                                <option {{ $questionDetails->answer_type == 'multiple' ? 'selected' : '' }}
                                    value="multiple">multiple</option>
                            </select>
                            <span class="text-danger" id="anser-type-error"></span>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12">
                        <div class="mb-3" id="question-div">
                            <label class="mb-2">Question</label>
                            <textarea type="text" name="question" class="form-control" id="question"> {{ $questionDetails->question }} </textarea>
                            <span class="text-danger" id="question-error"></span>
                        </div>
                    </div>

                    <div class="col-md-6">
                            <div class="{{ $questionDetails->answer_type }}-hide-show show-add-more-options">
                                <a class="btn btn-primary btn-sm addMoreBtn" onclick="add_options('1')"><i
                                        class="fa fa-plus fs-5"></i> Add Option</a>
                            </div>
                    </div>
                    <div class="col-12 col-sm-12">
                        <div class="text box p-0 mt-0">
                            <div class="col-12 col-sm-12">
                                <div class="mb-3" id="question-div">
                                    <label class="mb-2 text-dark">Answer</label>
                                    <textarea xtype="text"  class="form-control min-h-100px" id="answer"></textarea>
                                    <span class="text-danger" id="answer-error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="row addMoreOptionsEdit">
                            @foreach ($questionDetails->options as $key => $option)
                                <div class="col-md-6 option-details">
                                    <div class="row panel panel-body">
                                        <div class="col-md-10 form-group"><label for="">Option</label>
                                            
                                            <input class="form-control" type="text"
                                                name="options[{{ $key }}][value]"
                                                value="{{ $option->options }}"><span class="text-danger"
                                                id="options_'{{ $key }}'_value_error"></span>
                                            <div>
                                            <input type="hidden"  name="options[{{ $key }}][option_id]" value="{{ $option->id }}"></div>
                                        </div>

                                        <div class="col-md-2 form-group mt-4"><a
                                                onclick="remove_options(this, {{ $option->id }})"
                                                class="btn btn-danger btn-sm float-right"> <i
                                                    class="fa fa-minus"></i></a></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <span class="text-danger" id="options_error"></span>
                <input type="hidden" id="id" name="id" value="{{ $questionDetails->id }}">
                <button type="submit" class="btn btn-primary w-100"  data-bs-dismiss="modal">Update</button>
            </form>
        </div>
    </div>
</div>
