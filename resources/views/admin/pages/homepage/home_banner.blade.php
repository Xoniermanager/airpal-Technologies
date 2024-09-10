<div id="home_banner">
    <div class="setting-card p-0">

        {!! getBannerImageInput(
            $sections['home_banner']->image ?? '',
            'section[image]',
            ['input' => ['test']],
            ['input' => 'uploadBannerImage', 'preview' => 'previewImage'],
        ) !!}

    </div>
    <div class="setting-title">
        <h5>Section Info</h5>
    </div>

    <div class="setting-card">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                @php
                    $home_banner_section_title = isset($sections['home_banner']['title'])
                        ? $sections['home_banner']['title']
                        : '';
                @endphp
                {!! getTextInput(
                    $home_banner_section_title,
                    'Title',
                    'section[title]',
                    ['div' => ['test', 'testing', 'tester']],
                    ['input' => 'helloId'],
                ) !!}
            </div>

            <div class="col-lg-6 col-md-6">
                @php
                    $home_banner_section_subtitle = isset($sections['home_banner']['subtitle'])
                        ? $sections['home_banner']['subtitle']
                        : '';
                @endphp
                {!! getTextInput(
                    $home_banner_section_subtitle,
                    'Subtitle',
                    'section[subtitle]',
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
                        $pageId = $sections['home_banner']['page_id'] ?? '';
                    }
                @endphp
                <input type="hidden" name="section[section_slug]" value="home_banner">
                <input type="hidden" name="page_id" value="{{ $pageId }}">

                <input type="hidden" name="section[id]"
                    value="{{ $sections['home_banner']['id'] ?? '' }}">

                <input type="hidden" name="section[button][0][id]"
                    value="{{ $sections['home_banner']->getButtons[0]['id'] ?? '' }}">



                <div class="col-lg-6">
                    @php
                        $home_banner_button_text = isset($sections['home_banner']->getButtons[0]['text'])
                            ? $sections['home_banner']->getButtons[0]['text']
                            : '';
                    @endphp
                    {!! getTextInput(
                        $home_banner_button_text,
                        'button text',
                        'section[button][0][text]',
                        'Button Text',
                    ) !!}
                </div>
                <div class="col-lg-6">
                    @php
                        $home_banner_button_link = isset($sections['home_banner']->getButtons[0]['link'])
                            ? $sections['home_banner']->getButtons[0]['link']
                            : '';
                    @endphp
                    {!! getTextInput(
                        $home_banner_button_link,
                        'button link',
                        'section[button][0][link]',
                        'Button Link',
                    ) !!}
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-primary prime-btn">Save</button>
</div>
