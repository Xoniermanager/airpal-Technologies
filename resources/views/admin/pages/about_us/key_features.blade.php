<div id="key_features">
    {{-- <div class="setting-card p-0">
        {!! getBannerImageInput(
            $sections['key_features']->image ?? '',
        'section[image]',
        ['input' => ['test', 'preview']],
        ['input' => 'keyFeaturesBannerImage', 'preview' => 'keyFeaturesPreviewImage'],
        ) !!}
    </div> --}}
    <div class="setting-title">
        <h5>Section Info</h5>
    </div>

    <div class="setting-card">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                @php
                    $key_features_title = isset($sections['key_features']['title'])
                        ? $sections['key_features']['title']
                        : '';
                @endphp
                {!! getTextInput(
                    $key_features_title,
                    'Title',
                    'section[title]',
                    ['div' => ['test', 'testing', 'tester']],
                    ['input' => 'helloId'],
                ) !!}
            </div>
        </div>
    </div>

    <div class="row">
        @for ($i = 0; $i < 6; $i++)
            <div class="col-lg-4">
                <div class="setting-card">
                    <div class="add-info membership-infos">
                        <div class="row membership-content">
                            <div class="col-lg-4">
                                @php
                                    $key_features_image = isset($sections['key_features']->getContent[$i]['image'])
                                        ? $sections['key_features']->getContent[$i]['image']
                                        : '';
                                @endphp
                                {!! getImageInput(
                                    $key_features_image,
                                    'section[inner_section][' . $i . '][image]',
                                    ['div' => ['test', 'testing', 'tester']],
                                    ['input' => "innerImageId$i", 'preview' => "previewImage$i"],
                                ) !!}

                            </div>
                            <div class="col-lg-8">
                                @php
                                    $key_features_title = isset($sections['key_features']->getContent[$i]['title'])
                                        ? $sections['key_features']->getContent[$i]['title']
                                        : '';
                                @endphp
                                {!! getTextInput(
                                    $key_features_title,
                                    'Title',
                                    'section[inner_section][' . $i . '][title]',
                                    ['div' => ['test', 'testing', 'tester']],
                                    ['input' => 'helloId'],
                                ) !!}
                            </div>
                            <div class="col-lg-12">
                                @php
                                    $key_features_content = isset($sections['key_features']->getContent[$i]['content'])
                                        ? $sections['key_features']->getContent[$i]['content']
                                        : '';
                                @endphp
                                {!! getSectionTextArea(
                                    $key_features_content,
                                    'section[inner_section][' . $i . '][content]',
                                
                                    'content',
                                ) !!}
                            </div>
                            <input type="hidden" name="section[inner_section][{{ $i }}][id]"
                                value="{{ $sections['key_features']->getContent[$i]['id'] ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
    @php
        $pageId = $page->id ?? '';
        if (empty($pageId) || $pageId == '') {
            $pageId = $sections['section']['page_id'] ?? '';
        }
    @endphp
    <input type="hidden" name="page_id" value="{{ $pageId }}">
    <input type="hidden" name="section[section_slug]" value="key_features">
    <input type="hidden" name="section[id]" value="{{ $sections['key_features']['id'] ?? '' }}">
    <button class="btn btn-primary prime-btn">Save</button>
</div>
