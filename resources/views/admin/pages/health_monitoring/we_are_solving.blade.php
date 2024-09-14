<div id="we_are_solving">
    <div class="setting-card p-0">
        {!! getBannerImageInput(
            $sections['we_are_solving']->image ?? '',
            'section[image]',
            ['input' => ['test', 'preview']],
            ['input' => 'weAreSolvingBannerImage', 'preview' => 'weAreSolvingPreviewImage'],
        ) !!}
    </div>
    <div class="setting-title">
        <h5>Section Info</h5>
    </div>

    <div class="setting-card">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                @php
                $we_are_solving_title = isset($sections['we_are_solving']['title'])
                        ? $sections['we_are_solving']['title']
                        : '';
                @endphp
                {!! getTextInput(
                    $we_are_solving_title,
                    'Title',
                    'section[title]',
                    ['div' => ['test', 'testing', 'tester']],
                    ['input' => 'helloId'],
                ) !!}
            </div>
            <div class="col-lg-6 col-md-6">
                @php
                    $we_are_solving_section_subtitle = isset($sections['we_are_solving']['subtitle'])
                        ? $sections['we_are_solving']['subtitle']
                        : '';
                @endphp
                {!! getTextInput(
                    $we_are_solving_section_subtitle,
                    'Subtitle',
                    'section[subtitle]',
                    ['div' => ['test', 'testing', 'tester']],
                    ['input' => 'subTitleId'],
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
                            <div class="col-lg-8">
                                @php
                                    $we_are_solving_title = isset(
                                        $sections['we_are_solving']->getContent[$i]['title'],
                                    )
                                        ? $sections['we_are_solving']->getContent[$i]['title']
                                        : '';
                                @endphp
                                {!! getTextInput(
                                    $we_are_solving_title,
                                    'Title',
                                    'section[inner_section][' . $i . '][title]',
                                    ['div' => ['test', 'testing', 'tester']],
                                    ['input' => 'helloId'],
                                ) !!}
                            </div>
                            <input type="hidden" name="section[inner_section][{{ $i }}][id]"
                                value="{{ $sections['we_are_solving']->getContent[$i]['id'] ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
    @php
    $pageId = $page->id ?? '';
    if (empty($pageId) || $pageId == '') {
        $pageId = $sections['we_are_solving']['page_id'] ?? '';
    }
@endphp

<input type="hidden" name="page_id" value="{{ $pageId }}">
    <input type="hidden" name="section[section_slug]" value="we_are_solving">
    <input type="hidden" name="section[id]" value="{{ $sections['we_are_solving']['id'] ?? '' }}">
    <button class="btn btn-primary prime-btn">Save</button>
</div>
