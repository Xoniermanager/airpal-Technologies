<div id="health_monitoring_device">
    <div class="setting-card p-0">

        {!! getBannerImageInput(
            $sections['health_monitoring_device']->image ?? '',
            'section[image]',
            ['input' => ['test']],
            ['input' => 'monitoringDevinceBannerImage', 'preview' => 'monitoringDevincePreviewImage'],
        ) !!}

    </div>
    <div class="setting-title">
        <h5>Section Info</h5>
    </div>

    <div class="setting-card">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                @php
                    $health_monitoring_device_section_title = isset($sections['health_monitoring_device']['title'])
                        ? $sections['health_monitoring_device']['title']
                        : '';
                @endphp
                {!! getTextInput(
                    $health_monitoring_device_section_title,
                    'Title',
                    'section[title]',
                    ['div' => ['test', 'testing', 'tester']],
                    ['input' => 'helloId'],
                ) !!}
            </div>

            <div class="col-lg-6 col-md-6">
                @php
                    $health_monitoring_device_section_subtitle = isset($sections['health_monitoring_device']['subtitle'])
                        ? $sections['health_monitoring_device']['subtitle']
                        : '';
                @endphp
                {!! getTextInput(
                    $health_monitoring_device_section_subtitle,
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
                        $pageId = $sections['health_monitoring_device']['page_id'] ?? '';
                    }
                @endphp
                <input type="hidden" name="section[section_slug]" value="health_monitoring_device">
                <input type="hidden" name="page_id" value="{{ $pageId }}">

                <input type="hidden" name="section[id]"
                    value="{{ $sections['health_monitoring_device']['id'] ?? '' }}">

                <input type="hidden" name="section[button][0][id]"
                    value="{{ $sections['health_monitoring_device']->getButtons[0]['id'] ?? '' }}">



                <div class="col-lg-6">
                    @php
                        $health_monitoring_device_button_text = isset($sections['health_monitoring_device']->getButtons[0]['text'])
                            ? $sections['health_monitoring_device']->getButtons[0]['text']
                            : '';
                    @endphp
                    {!! getTextInput(
                        $health_monitoring_device_button_text,
                        'button text',
                        'section[button][0][text]',
                        'Button Text',
                    ) !!}
                </div>
                <div class="col-lg-6">
                    @php
                        $health_monitoring_device_button_link = isset($sections['health_monitoring_device']->getButtons[0]['link'])
                            ? $sections['health_monitoring_device']->getButtons[0]['link']
                            : '';
                    @endphp
                    {!! getTextInput(
                        $health_monitoring_device_button_link,
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
