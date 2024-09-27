<div id="research">
    <div class="row">
        <div class="col-lg-9">
            <div class="setting-card">
                <div class="add-info membership-infos">
                    <div class="row membership-content">

                        <div class="col-lg-12 col-md-6">
                            @php
                                $research_section_title = isset($sections['research']['title'])
                                    ? $sections['research']['title']
                                    : '';
                            @endphp
                            {!! getTextInput(
                                $research_section_title,
                                'Title',
                                'section[title]',
                                ['div' => ['test', 'testing', 'tester']],
                                ['input' => 'helloId'],
                            ) !!}
                        </div>
                        @php
                            $pageId = $page->id ?? '';
                            if (empty($pageId) || $pageId == '') {
                                $pageId = $sections['research']['page_id'] ?? '';
                            }
                        @endphp
                        <input type="hidden" name="section[section_slug]" value="research">
                        <input type="hidden" name="page_id" value="{{ $pageId }}">

                        <input type="hidden" name="section[id]" value="{{ $sections['research']['id'] ?? '' }}">

                        <input type="hidden" name="section[button][0][id]"
                            value="{{ $sections['research']->getButtons[0]['id'] ?? '' }}">



                        <div class="col-lg-6">
                            @php
                                $research_button_text = isset($sections['research']->getButtons[0]['text'])
                                    ? $sections['research']->getButtons[0]['text']
                                    : '';
                            @endphp
                            {!! getTextInput($research_button_text, 'button text', 'section[button][0][text]', 'Button Text') !!}
                        </div>
                        <div class="col-lg-6">
                            @php
                                $research_button_link = isset($sections['research']->getButtons[0]['link'])
                                    ? $sections['research']->getButtons[0]['link']
                                    : '';
                            @endphp
                            {!! getTextInput($research_button_link, 'button link', 'section[button][0][link]', 'Button Link') !!}
                        </div>


                        <div class="row">
                            @for ($i = 0; $i < 3; $i++)
                                <div class="col-lg-6">
                                    <div class="setting-card">
                                        <div class="add-info membership-infos">
                                            <div class="row membership-content">

                                                <div class="col-lg-12">
                                                    @php
                                                        $research_title = isset(
                                                            $sections['research']->getContent[$i]['title'],
                                                        )
                                                            ? $sections['research']->getContent[$i]['title']
                                                            : '';
                                                    @endphp
                                                    {!! getTextInput(
                                                        $research_title,
                                                        'Title',
                                                        'section[inner_section][' . $i . '][title]',
                                                        ['div' => ['test', 'testing', 'tester']],
                                                        ['input' => 'helloId'],
                                                    ) !!}
                                                </div>
                                                <div class="col-lg-12">
                                                    @php
                                                        $research_content = isset(
                                                            $sections['research']->getContent[$i]['content'],
                                                        )
                                                            ? $sections['research']->getContent[$i]['content']
                                                            : '';
                                                    @endphp
                                                    {!! getSectionTextArea(
                                                        $research_content,
                                                        'section[inner_section][' . $i . '][content]',
                                                    
                                                        'content',
                                                    ) !!}
                                                </div>
                                                <input type="hidden"
                                                    name="section[inner_section][{{ $i }}][id]" ;
                                                    value="{{ $sections['research']->getContent[$i]['id'] ?? '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <button class="btn btn-primary prime-btn mt-4">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="setting-card p-0">

                {!! getBannerImageInput(
                    $sections['research']->image ?? '',
                    'section[image]',
                    ['input' => ['test']],
                    ['input' => 'researchUploadBannerImage', 'preview' => 'researchPreviewImage'],
                ) !!}

            </div>
        </div>
    </div>

</div>
