<div id="download_app" class="container py-4">
    <div class="setting-card">
        <div class="row align-items-center">
            <!-- Left Column: Form Inputs -->
            <div class="col-lg-7 col-md-6">
                <div class="p-4">
                    <div class="setting-title mb-4">
                        <h5>Section Info</h5>
                    </div>
                    <div class="row">
                        <!-- Title -->
                        <div class="col-lg-12 mb-3">
                            @php
                                $download_app_section_title = $sections['download_app']['title'] ?? '';
                            @endphp
                            {!! getTextInput(
                                $download_app_section_title,
                                'Title',
                                'section[title]',
                                ['div' => ['class' => 'mb-3']],
                                ['input' => ['class' => 'form-control', 'id' => 'helloId']]
                            ) !!}
                        </div>

                        <!-- Subtitle -->
                        <div class="col-lg-12 mb-3">
                            @php
                                $download_app_section_subtitle = $sections['download_app']['subtitle'] ?? '';
                            @endphp
                            {!! getTextInput(
                                $download_app_section_subtitle,
                                'Subtitle',
                                'section[subtitle]',
                                ['div' => ['class' => 'mb-3']],
                                ['input' => ['class' => 'form-control', 'id' => 'subTitleId']]
                            ) !!}
                        </div>

                        <!-- Play Store Link -->
                        <div class="col-lg-12 mb-3">
                            @php
                                $download_app_playstore_button_link = $sections['download_app']->getButtons[0]['link'] ?? '';
                            @endphp
                            {!! getTextInput(
                                $download_app_playstore_button_link,
                                'Play Store Link',
                                'section[button][0][link]',
                                ['div' => ['class' => 'mb-3']],
                                ['input' => ['class' => 'form-control']]
                            ) !!}
                        </div>

                        <!-- App Store Link -->
                        <div class="col-lg-12 mb-3">
                            @php
                                $download_app_store_button_link = $sections['download_app']->getButtons[1]['link'] ?? '';
                            @endphp
                            {!! getTextInput(
                                $download_app_store_button_link,
                                'App Store Link',
                                'section[button][1][link]',
                                ['div' => ['class' => 'mb-3']],
                                ['input' => ['class' => 'form-control']]
                            ) !!}
                        </div>
                    </div>

                    <!-- Hidden Inputs -->
                    @php
                        $pageId = $page->id ?? ($sections['download_app']['page_id'] ?? '');
                    @endphp
                    <input type="hidden" name="section[section_slug]" value="download_app">
                    <input type="hidden" name="page_id" value="{{ $pageId }}">
                    <input type="hidden" name="section[id]" value="{{ $sections['download_app']['id'] ?? '' }}">
                    <input type="hidden" name="section[button][0][id]" value="{{ $sections['download_app']->getButtons[0]['id'] ?? '' }}">

                    <!-- Save Button -->
                    <button class="btn btn-primary prime-btn mt-4">Save</button>
                </div>
            </div>

            <!-- Right Column: Image Upload -->
            <div class="col-lg-5 col-md-6">
                <div class="p-0">
                    {!! getBannerImageInput(
                        $sections['download_app']->image ?? '',
                        'section[image]',
                        ['input' => ['class' => 'img-fluid w-100', 'id' => 'uploadBannerImageDownloadApp']],
                        ['input' => 'uploadBannerImageDownloadApp', 'preview' => 'previewImageDownloadApp']
                    ) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<style>.setting-card {
    background-color: #f8f9fa;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.img-fluid {
    object-fit: cover;
    height: auto;
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
    border-radius: 5px;
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