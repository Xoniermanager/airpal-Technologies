<div id="home_banner" class="container py-4">
    <!-- Unified Container for Image and Content -->
    <div class="row">
        <div class="col-12">
            <div class="setting-card p-3 d-flex flex-wrap align-items-center" style="border-radius: 15px; overflow: hidden;">
                
                <!-- Left: Banner Image Upload (Image will blend with the form content) -->
                <div class="col-lg-6 col-md-12 p-0">
                    {!! getBannerImageInput(
                        $sections['home_banner']->image ?? '',
                        'section[image]',
                        ['input' => ['class' => 'img-fluid w-100', 'id' => 'uploadBannerImage']],
                        ['input' => 'uploadBannerImage', 'preview' => 'previewImage'],
                    ) !!}
                </div>

                <!-- Right: Section Info and Inputs -->
                <div class="col-lg-6 col-md-12 p-4">
                    {{-- <div class="setting-title mb-4">
                        <h5>Section Info</h5>
                    </div> --}}

                    <div class="row">
                        <!-- Title Input -->
                        <div class="col-12 mb-3">
                            @php
                                $home_banner_section_title = $sections['home_banner']['title'] ?? '';
                            @endphp
                            {!! getTextInput(
                                $home_banner_section_title,
                                'Title',
                                'section[title]',
                                ['div' => ['class' => 'form-group']],
                                ['input' => ['class' => 'form-control', 'id' => 'helloId']]
                            ) !!}
                        </div>

                        <!-- Subtitle Input -->
                        <div class="col-12 mb-3">
                            @php
                                $home_banner_section_subtitle = $sections['home_banner']['subtitle'] ?? '';
                            @endphp
                            {!! getTextInput(
                                $home_banner_section_subtitle,
                                'Subtitle',
                                'section[subtitle]',
                                ['div' => ['class' => 'form-group']],
                                ['input' => ['class' => 'form-control', 'id' => 'subTitleId']]
                            ) !!}
                        </div>

                        <!-- Button Text Input -->
                        <div class="col-12 mb-3">
                            @php
                                $home_banner_button_text = $sections['home_banner']->getButtons[0]['text'] ?? '';
                            @endphp
                            {!! getTextInput(
                                $home_banner_button_text,
                                'Button Text',
                                'section[button][0][text]',
                                ['div' => ['class' => 'form-group']],
                                ['input' => ['class' => 'form-control']]
                            ) !!}
                        </div>

                        <!-- Button Link Input -->
                        <div class="col-12 mb-3">
                            @php
                                $home_banner_button_link = $sections['home_banner']->getButtons[0]['link'] ?? '';
                            @endphp
                            {!! getTextInput(
                                $home_banner_button_link,
                                'Button Link',
                                'section[button][0][link]',
                                ['div' => ['class' => 'form-group']],
                                ['input' => ['class' => 'form-control']]
                            ) !!}
                        </div>
                    </div>

                    <!-- Hidden Inputs -->
                    @php
                        $pageId = $page->id ?? ($sections['home_banner']['page_id'] ?? '');
                    @endphp
                    <input type="hidden" name="section[section_slug]" value="home_banner">
                    <input type="hidden" name="page_id" value="{{ $pageId }}">
                    <input type="hidden" name="section[id]" value="{{ $sections['home_banner']['id'] ?? '' }}">
                    <input type="hidden" name="section[button][0][id]"
                        value="{{ $sections['home_banner']->getButtons[0]['id'] ?? '' }}">

                    <!-- Save Button -->
                    <div class="text-end">
                        <button class="btn btn-primary prime-btn mt-4">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<style>
/* .setting-card {
    background-color: #f8f9fa;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
} */

#uploadBannerImage {
    object-fit: cover;
    height: 100%;
    width: 100%;
}

.setting-title h5 {
    font-weight: bold;
    color: #333;
}

.prime-btn {
    background-color: #007bff;
    border-color: #007bff;
    padding: 10px 20px;
}

.prime-btn:hover {
    background-color: #0056b3;
    border-color: #004085;
}

.form-control {
    border-radius: 5px;
    border: 1px solid #ced4da;
}


</style>