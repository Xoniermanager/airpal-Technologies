<div id="how_it_works">
    <div class="setting-card p-0">
        {!! getBannerImageInput(
            $sections['how_it_works']->image ?? '',
            'how_it_works[image]',
            ['input' => ['test', 'preview']],
            ['input' => 'howItWorkBannerImage', 'preview' => 'howItWorkPreviewImage'],
        ) !!}
    </div>
    <div class="setting-title">
        <h5>Section Info</h5>
    </div>

    <div class="setting-card">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                @php
                $how_it_works_title = isset($sections['how_it_works']['title'])
                        ? $sections['how_it_works']['title']
                        : '';
                @endphp
                {!! getTextInput(
                    $how_it_works_title,
                    'Title',
                    'how_it_works[title]',
                    ['div' => ['test', 'testing', 'tester']],
                    ['input' => 'helloId'],
                ) !!}
            </div>
        </div>
    </div>

    <div class="row">
        @for ($i = 0; $i < 4; $i++)
            <div class="col-lg-4">
                <div class="setting-card">
                    <div class="add-info membership-infos">
                        <div class="row membership-content">
                            <div class="col-lg-6">
                                @php
                                    $how_it_works_image = isset($sections['how_it_works']->getContent[$i]['image'])
                                        ? $sections['how_it_works']->getContent[$i]['image']
                                        : '';
                                @endphp
                                {!! getImageInput(
                                    $how_it_works_image,
                                    'how_it_works[inner_section][' . $i . '][image]',
                                    ['div' => ['test', 'testing', 'tester']],
                                    ['input' => "innerImageId$i", 'preview' => "previewImage$i"],
                                ) !!}

                            </div>
                            <div class="col-lg-12">
                                @php
                                    $how_it_works_title = isset($sections['how_it_works']->getContent[$i]['title'])
                                        ? $sections['how_it_works']->getContent[$i]['title']
                                        : '';
                                @endphp
                                {!! getTextInput(
                                    $how_it_works_title,
                                    'Title',
                                    'how_it_works[inner_section][' . $i . '][title]',
                                    ['div' => ['test', 'testing', 'tester']],
                                    ['input' => 'helloId'],
                                ) !!}
                            </div>
                            <div class="col-lg-12">
                                @php
                                    $how_it_works_content = isset($sections['how_it_works']->getContent[$i]['content'])
                                        ? $sections['how_it_works']->getContent[$i]['content']
                                        : '';
                                @endphp
                                {!! getSectionTextArea(
                                    $how_it_works_content,
                                    'how_it_works[inner_section][' . $i . '][content]',
                                
                                    'content',
                                ) !!}
                            </div>
                            <input type="hidden" name="how_it_works[inner_section][{{ $i }}][id]" ;
                                value="{{ $sections['how_it_works']->getContent[$i]['id'] ?? '' }}">
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
    @php
        $pageId = $page->id ?? '';
        if (empty($pageId) || $pageId == '') {
            $pageId = $sections['how_it_works']['page_id'] ?? '';
        }
    @endphp
    <input type="hidden" name="page_id" value="{{ $pageId }}">
    <input type="hidden" name="how_it_works[section_slug]" value="how_it_works">
    <input type="hidden" name="how_it_works[id]" value="{{ $sections['how_it_works']['id'] ?? '' }}">
    <button class="btn btn-primary prime-btn">Save</button>
</div>
