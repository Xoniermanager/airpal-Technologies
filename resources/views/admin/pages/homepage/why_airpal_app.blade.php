<div id="why_airpal_app">
    <div class="setting-title">
        <h5>Section Info</h5>
    </div>

    <div class="setting-card">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                @php $why_airpal_app_title = isset($sections['why_airpal_app']['title'])
                        ? $sections['why_airpal_app']['title']
                        : '';
                @endphp
                {!! getTextInput(
                    $why_airpal_app_title,
                    'Title',
                    'why_airpal_app[title]',
                    ['div' => ['test', 'testing', 'tester']],
                    ['input' => 'helloId'],
                ) !!}
            </div>
        </div>
    </div>

    <div class="row">
        @for ($i = 0; $i < 5; $i++)
            <div class="col-lg-4">
                <div class="setting-card">
                    <div class="add-info membership-infos">
                        <div class="row membership-content">
                            <div class="col-lg-4">
                                @php
                                    $why_airpal_app_image = isset($sections['why_airpal_app']->getContent[$i]['image'])
                                        ? $sections['why_airpal_app']->getContent[$i]['image']
                                        : '';
                                @endphp
                                {!! getImageInput(
                                    $why_airpal_app_image,
                                    'why_airpal_app[inner_section][' . $i . '][image]',
                                    ['div' => ['test', 'testing', 'tester']],
                                    ['input' => "innerImageIdWhy$i", 'preview' => "previewImageWhy$i"],
                                ) !!}

                            </div>
                            <div class="col-lg-8">
                                @php
                                    $why_airpal_app_title = isset($sections['why_airpal_app']->getContent[$i]['title'])
                                        ? $sections['why_airpal_app']->getContent[$i]['title']
                                        : '';
                                @endphp
                                {!! getTextInput(
                                    $why_airpal_app_title,
                                    'Title',
                                    'why_airpal_app[inner_section][' . $i . '][title]',
                                    ['div' => ['test', 'testing', 'tester']],
                                    ['input' => 'helloId'],
                                ) !!}
                            </div>

                            <input type="hidden" name="why_airpal_app[inner_section][{{ $i }}][id]" ;
                                value="{{ $sections['why_airpal_app']->getContent[$i]['id'] ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
    @php
        $pageId = $page->id ?? '';
        if (empty($pageId) || $pageId == '') {
            $pageId = $sections['why_airpal_app']['page_id'] ?? '';
        }
    @endphp
    <input type="hidden" name="page_id" value="{{ $pageId }}">
    <input type="hidden" name="why_airpal_app[section_slug]" value="why_airpal_app">
    <input type="hidden" name="why_airpal_app[id]" value="{{ $sections['why_airpal_app']['id'] ?? '' }}">
    <button class="btn btn-primary prime-btn">Save</button>
</div>
