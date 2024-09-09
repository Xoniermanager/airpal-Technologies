<div id="download_app">
    <div class="setting-card p-0">

        {!! getBannerImageInput(
            $sections['download_app']->image ?? '',
            'homepage_banner_section[image]',
            ['input' => ['test']],
            ['input' => 'uploadBannerImageDownloadApp', 'preview' => 'previewImageDownloadApp'],
        ) !!}

    </div>
    <div class="setting-title">
        <h5>Section Info</h5>
    </div>

    <div class="setting-card">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                @php
                    $download_app_section_title = isset($sections['download_app']['title'])
                        ? $sections['download_app']['title']
                        : '';
                @endphp
                {!! getTextInput(
                    $download_app_section_title,
                    'Title',
                    'homepage_banner_section[title]',
                    ['div' => ['test', 'testing', 'tester']],
                    ['input' => 'helloId'],
                ) !!}
            </div>

            <div class="col-lg-6 col-md-6">
                @php
                    $download_app_section_subtitle = isset($sections['download_app']['subtitle'])
                        ? $sections['download_app']['subtitle']
                        : '';
                @endphp
                {!! getTextInput(
                    $download_app_section_subtitle,
                    'Subtitle',
                    'homepage_banner_section[subtitle]',
                    ['div' => ['test', 'testing', 'tester']],
                    ['input' => 'subTitleId'],
                ) !!}
            </div>
        </div>
    </div>
    <div class="setting-card">
        <div class="add-info membership-infos">
            <div class="row membership-content">
                @php
                    $pageId = $page->id ?? '';
                    if (empty($pageId) || $pageId == '') {
                        $pageId = $sections['download_app']['page_id'] ?? '';
                    }
                @endphp
                <input type="hidden" name="homepage_banner_section[section_slug]" value="download_app">
                <input type="hidden" name="page_id" value="{{ $pageId }}">

                <input type="hidden" name="homepage_banner_section[id]"
                    value="{{ $sections['download_app']['id'] ?? '' }}">

                <input type="hidden" name="homepage_banner_section[button][0][id]"
                    value="{{ $sections['download_app']->getButtons[0]['id'] ?? '' }}">

                {{-- <div class="col-lg-6">
                    @php
                        $download_app_button_text = isset($sections['download_app']->getButtons[0]['text'])
                            ? $sections['download_app']->getButtons[0]['text']
                            : '';
                    @endphp
                    {!! getTextInput(
                        $download_app_button_text,
                        'button text',
                        'homepage_banner_section[button][0][text]',
                        'Button Text',
                    ) !!}
                </div> --}}
                <div class="col-lg-6">
                    @php
                        $download_app_playstore_button_link = isset($sections['download_app']->getButtons[0]['link'])
                            ? $sections['download_app']->getButtons[0]['link']
                            : '';
                    @endphp
                    {!! getTextInput(
                        $download_app_playstore_button_link,
                        'Play Store Link',
                        'homepage_banner_section[button][0][link]',
                        'Button Link',
                    ) !!}
                </div>
                <div class="col-lg-6">
                    @php
                        $download_app_store_button_link = isset($sections['download_app']->getButtons[1]['link'])
                            ? $sections['download_app']->getButtons[1]['link']
                            : '';
                    @endphp
                    {!! getTextInput(
                        $download_app_store_button_link,
                        'App Store Link',
                        'homepage_banner_section[button][1][link]',
                        'Button Link',
                    ) !!}
                </div>

            </div>
        </div>
    </div>
    <button class="btn btn-primary prime-btn">Save</button>
</div>
