<div id="our_health_monitoring">
    <div class="setting-card p-0">
        {!! getBannerImageInput(
            $sections['our_health_monitoring']->image ?? '',
            'section[image]',
            ['input' => ['test', 'preview']],
            ['input' => 'ourHealthBannerImage', 'preview' => 'ourHealthPreviewImage'],
        ) !!}
    </div>
    <div class="setting-title">
        <h5>Section Info</h5>
    </div>

    <div class="setting-card">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                @php
                $our_health_monitoring_title = isset($sections['our_health_monitoring']['title'])
                        ? $sections['our_health_monitoring']['title']
                        : '';
                @endphp
                {!! getTextInput(
                    $our_health_monitoring_title,
                    'Title',
                    'section[title]',
                    ['div' => ['test', 'testing', 'tester']],
                    ['input' => 'helloId'],
                ) !!}
            </div>
        </div>
    </div>

    <div class="row">
        @for ($i = 0; $i < 8; $i++)
            <div class="col-lg-4">
                <div class="setting-card">
                    <div class="add-info membership-infos">
                        <div class="row membership-content">
                            <div class="col-lg-4">
                                @php
                                    $our_health_monitoring_image = isset(
                                        $sections['our_health_monitoring']->getContent[$i]['image'],
                                    )
                                        ? $sections['our_health_monitoring']->getContent[$i]['image']
                                        : '';
                                @endphp
                                {!! getImageInput(
                                    $our_health_monitoring_image,
                                    'section[inner_section][' . $i . '][image]',
                                    ['div' => ['test', 'testing', 'tester']],
                                    ['input' => "innerImageId$i", 'preview' => "previewImage$i"],
                                ) !!}

                            </div>
                            <div class="col-lg-8">
                                @php
                                    $our_health_monitoring_title = isset(
                                        $sections['our_health_monitoring']->getContent[$i]['title'],
                                    )
                                        ? $sections['our_health_monitoring']->getContent[$i]['title']
                                        : '';
                                @endphp
                                {!! getTextInput(
                                    $our_health_monitoring_title,
                                    'Title',
                                    'section[inner_section][' . $i . '][title]',
                                    ['div' => ['test', 'testing', 'tester']],
                                    ['input' => 'helloId'],
                                ) !!}
                            </div>
                            <div class="col-lg-12">
                                @php
                                    $our_health_monitoring_content = isset(
                                        $sections['our_health_monitoring']->getContent[$i]['content'],
                                    )
                                        ? $sections['our_health_monitoring']->getContent[$i]['content']
                                        : '';
                                @endphp
                                {!! getSectionTextArea(
                                    $our_health_monitoring_content,
                                    'section[inner_section][' . $i . '][content]',
                                
                                    'content',
                                ) !!}
                            </div>
                            <input type="hidden" name="section[inner_section][{{ $i }}][id]"
                                value="{{ $sections['our_health_monitoring']->getContent[$i]['id'] ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
    @php
    $pageId = $page->id ?? '';
    if (empty($pageId) || $pageId == '') {
        $pageId = $sections['our_health_monitoring']['page_id'] ?? '';
    }
@endphp

<input type="hidden" name="page_id" value="{{ $pageId }}">
    <input type="hidden" name="section[section_slug]" value="our_health_monitoring">
    <input type="hidden" name="section[id]" value="{{ $sections['our_health_monitoring']['id'] ?? '' }}">
    <button class="btn btn-primary prime-btn">Save</button>
</div>
