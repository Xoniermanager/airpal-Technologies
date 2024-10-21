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
                    $health_monitoring_device_section_content = isset($sections['health_monitoring_device']['content'])
                        ? $sections['health_monitoring_device']['content']
                        : '';
                @endphp
                {!! getContentInput(
                    $health_monitoring_device_section_content,
                    'Content',
                    'section[content]',
                    ['div' => ['test', 'testing', 'tester']],
                    ['input' => 'contentId'],
                ) !!}
            </div>

            <div class="row">

                @for ($i = 0; $i < 1; $i++)
                    <div class="col-lg-6">
                        <div class="setting-card">
                            <div class="add-info membership-infos">
                                <div class="row membership-content">
                                    <div class="col-lg-12">
        
                                        @php
                                            $section_list_title =
                                                isset($sections['health_monitoring_device']->getListing[$i]) &&
                                                isset($sections['health_monitoring_device']->getListing[$i]->title)
                                                    ? $sections['health_monitoring_device']->getListing[$i]->title
                                                    : '';
        
                                            $section_list_icon =
                                                isset($sections['health_monitoring_device']->getListing[$i]) &&
                                                isset($sections['health_monitoring_device']->getListing[$i]->icon)
                                                    ? $sections['health_monitoring_device']->getListing[$i]->icon
                                                    : '';
                                        @endphp
        
                                        {!! getTextInput(
                                            $section_list_title ?? '',
                                            'UL Title',
                                            'section[ul][' . $i . '][title]',
                                            ['div' => ['test', 'testing', 'tester']],
                                            ['input' => 'helloId'],
                                        ) !!}
        
                                        {!! getTextInput(
                                            $section_list_icon ?? '',
                                            'UL Icon',
                                            'section[ul][' . $i . '][icon]',
                                            ['div' => ['test', 'testing', 'tester']],
                                            ['input' => 'helloId'],
                                        ) !!}
        
                                        <input type="hidden" name="section[ul][{{ $i }}][id]"
                                            value="{{ $sections['health_monitoring_device']->getListing[$i]->id ?? '' }}">
                                    </div>
        
                                    <div class="col-lg-10">
        
                                        @for ($k = 0; $k < 2; $k++)
                                            @php
                                                $list_item_title =
                                                    isset($sections['health_monitoring_device']->getListing[$i]) &&
                                                    isset($sections['health_monitoring_device']->getListing[$i]->listItems[$k]) &&
                                                    isset($sections['health_monitoring_device']->getListing[$i]->listItems[$k]->title)
                                                        ? $sections['health_monitoring_device']->getListing[$i]->listItems[$k]->title
                                                        : '';
                                            @endphp
        
                                            <input type="hidden"
                                                name="section[ul][{{ $i }}][li][{{ $k }}][id]"
                                                value="{{ $sections['health_monitoring_device']->getListing[$i]->listItems[$k]->id ?? '' }}">
        
        
                                            {!! getTextInput(
                                                $list_item_title ?? '',
                                                'Li title',
                                                'section[ul][' . $i . '][li][' . $k . '][title]',
                                                ['div' => ['test', 'testing', 'tester']],
                                                ['input' => 'helloId'],
                                            ) !!}
                                        @endfor
        
                                    </div>
        
                                    <input type="hidden" name="section[ul][{{ $i }}][section_id]]" value="{{ $sections['health_monitoring_device']->id }}">
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
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
    <button class="btn btn-primary prime-btn">Save</button>
</div>
