<div id="instant_banner">
    <div class="setting-card p-0">

        {!! getBannerImageInput(
            $sections['instant_banner']->image ?? '',
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
                    $instant_banner_section_title = isset($sections['instant_banner']['title'])
                        ? $sections['instant_banner']['title']
                        : '';
                @endphp
                {!! getTextInput(
                    $instant_banner_section_title,
                    'Title',
                    'section[title]',
                    ['div' => ['test', 'testing', 'tester']],
                    ['input' => 'helloId'],
                ) !!}
            </div>

            <div class="col-lg-6 col-md-6">
                @php
                    $instant_banner_section_subtitle = isset($sections['instant_banner']['subtitle'])
                        ? $sections['instant_banner']['subtitle']
                        : '';
                @endphp
                {!! getTextInput(
                    $instant_banner_section_subtitle,
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
                        $pageId = $sections['instant_banner']['page_id'] ?? '';
                    }
                @endphp
                <input type="hidden" name="section[section_slug]" value="instant_banner">
                <input type="hidden" name="page_id" value="{{ $pageId }}">

                <input type="hidden" name="section[id]"
                    value="{{ $sections['instant_banner']['id'] ?? '' }}">

                <input type="hidden" name="section[button][0][id]"
                    value="{{ $sections['instant_banner']->getButtons[0]['id'] ?? '' }}">



                {{-- <div class="col-lg-6">
                    @php
                        $instant_banner_button_text = isset($sections['instant_banner']->getButtons[0]['text'])
                            ? $sections['instant_banner']->getButtons[0]['text']
                            : '';
                    @endphp
                    {!! getTextInput(
                        $instant_banner_button_text,
                        'button text',
                        'section[button][0][text]',
                        'Button Text',
                    ) !!}
                </div>
                <div class="col-lg-6">
                    @php
                        $instant_banner_button_link = isset($sections['instant_banner']->getButtons[0]['link'])
                            ? $sections['instant_banner']->getButtons[0]['link']
                            : '';
                    @endphp
                    {!! getTextInput(
                        $instant_banner_button_link,
                        'button link',
                        'section[button][0][link]',
                        'Button Link',
                    ) !!}
                </div> --}}
            </div>
        </div>
    </div>
    <button class="btn btn-primary prime-btn">Save</button>
</div>
