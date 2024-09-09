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
            <div class="col-lg-12 col-md-12">
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
        </div>
    </div>

    <div class="row">
        @for ($i = 0; $i < 5; $i++)
            <div class="col-lg-4">
                <div class="setting-card">
                    <div class="add-info membership-infos">
                        <div class="row membership-content">
                            {{-- <div class="col-lg-4">
                                @php
                                    $we_are_solving_image = isset(
                                        $sections['we_are_solving']->getContent[$i]['image'],
                                    )
                                        ? $sections['we_are_solving']->getContent[$i]['image']
                                        : '';
                                @endphp
                                {!! getImageInput(
                                    $we_are_solving_image,
                                    'section[inner_section][' . $i . '][image]',
                                    ['div' => ['test', 'testing', 'tester']],
                                    ['input' => "innerImageId$i", 'preview' => "previewImage$i"],
                                ) !!}

                            </div> --}}
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
                            {{-- <div class="col-lg-12">
                                @php
                                    $we_are_solving_content = isset(
                                        $sections['we_are_solving']->getContent[$i]['content'],
                                    )
                                        ? $sections['we_are_solving']->getContent[$i]['content']
                                        : '';
                                @endphp
                                {!! getSectionTextArea(
                                    $we_are_solving_content,
                                    'section[inner_section][' . $i . '][content]',
                                
                                    'content',
                                ) !!}
                            </div> --}}
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
