<div id="about_our_company">
    <div class="setting-card p-0">

        {!! getBannerImageInput(
            $sections['about_our_company']->image ?? '',
            'section[image]',
            ['input' => ['test']],
            ['input' => 'AboutOurCompanyuploadBannerImage', 'preview' => 'AboutOurCompanypreviewImage'],
        ) !!}

    </div>
    <div class="setting-title">
        <h5>Section Info</h5>
    </div>

    <div class="setting-card">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                @php
                    $about_our_company_section_title = isset($sections['about_our_company']['title'])
                        ? $sections['about_our_company']['title']
                        : '';
                @endphp
                {!! getTextInput(
                    $about_our_company_section_title,
                    'Title',
                    'section[title]',
                    ['div' => ['test', 'testing', 'tester']],
                    ['input' => 'helloId'],
                ) !!}
            </div>

            <div class="col-lg-6 col-md-6">
                @php
                    $about_our_company_section_subtitle = isset($sections['about_our_company']['subtitle'])
                        ? $sections['about_our_company']['subtitle']
                        : '';
                @endphp
                {!! getTextInput(
                    $about_our_company_section_subtitle,
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
                        $pageId = $sections['about_our_company']['page_id'] ?? '';
                    }
                @endphp
                <input type="hidden" name="section[section_slug]" value="about_our_company">
                <input type="hidden" name="page_id" value="{{ $pageId }}">

                <input type="hidden" name="section[id]"
                    value="{{ $sections['about_our_company']['id'] ?? '' }}">

                <input type="hidden" name="section[button][0][id]"
                    value="{{ $sections['about_our_company']->getButtons[0]['id'] ?? '' }}">



                <div class="col-lg-6">
                    @php
                        $about_our_company_button_text = isset($sections['about_our_company']->getButtons[0]['text'])
                            ? $sections['about_our_company']->getButtons[0]['text']
                            : '';
                    @endphp
                    {!! getTextInput(
                        $about_our_company_button_text,
                        'button text',
                        'section[button][0][text]',
                        'Button Text',
                    ) !!}
                </div>
                <div class="col-lg-6">
                    @php
                        $about_our_company_button_link = isset($sections['about_our_company']->getButtons[0]['link'])
                            ? $sections['about_our_company']->getButtons[0]['link']
                            : '';
                    @endphp
                    {!! getTextInput(
                        $about_our_company_button_link,
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
