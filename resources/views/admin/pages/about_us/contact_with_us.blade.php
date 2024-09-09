<div id="contact_with_us">
    <div class="setting-card p-0">

        {!! getBannerImageInput(
            $sections['contact_with_us']->image ?? '',
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
                    $contact_with_us_section_title = isset($sections['contact_with_us']['title'])
                        ? $sections['contact_with_us']['title']
                        : '';
                @endphp
                {!! getTextInput(
                    $contact_with_us_section_title,
                    'Title',
                    'section[title]',
                    ['div' => ['test', 'testing', 'tester']],
                    ['input' => 'helloId'],
                ) !!}
            </div>

            <div class="col-lg-6 col-md-6">
                @php
                    $contact_with_us_section_subtitle = isset($sections['contact_with_us']['subtitle'])
                        ? $sections['contact_with_us']['subtitle']
                        : '';
                @endphp
                {!! getTextInput(
                    $contact_with_us_section_subtitle,
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
                        $pageId = $sections['contact_with_us']['page_id'] ?? '';
                    }
                @endphp
                <input type="hidden" name="section[section_slug]" value="contact_with_us">
                <input type="hidden" name="page_id" value="{{ $pageId }}">

                <input type="hidden" name="section[id]"
                    value="{{ $sections['contact_with_us']['id'] ?? '' }}">

                <input type="hidden" name="section[button][0][id]"
                    value="{{ $sections['contact_with_us']->getButtons[0]['id'] ?? '' }}">



                <div class="col-lg-6">
                    @php
                        $contact_with_us_button_text = isset($sections['contact_with_us']->getButtons[0]['text'])
                            ? $sections['contact_with_us']->getButtons[0]['text']
                            : '';
                    @endphp
                    {!! getTextInput(
                        $contact_with_us_button_text,
                        'button text',
                        'section[button][0][text]',
                        'Button Text',
                    ) !!}
                </div>
                <div class="col-lg-6">
                    @php
                        $contact_with_us_button_link = isset($sections['contact_with_us']->getButtons[0]['link'])
                            ? $sections['contact_with_us']->getButtons[0]['link']
                            : '';
                    @endphp
                    {!! getTextInput(
                        $contact_with_us_button_link,
                        'button link',
                        'section[button][0][link]',
                        'Button Link',
                    ) !!}
                </div>
            </div>
        </div>
    </div>
    <button>Save</button>
</div>
