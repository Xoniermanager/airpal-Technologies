<div id="prodcut_details">

    <div class="setting-title">
        <h5>Section Info</h5>
    </div>

    {!! getTextInput(
        // $product_details, 
        '',
        'Section Title',
        'section[inner_section][' . $i . '][title]',
        ['div' => ['test', 'testing', 'tester']],
        ['input' => 'helloId'],
    ) !!}

    <div class="row">
        @for ($i = 0; $i < 3; $i++)
            <div class="col-lg-6">
                <div class="setting-card">
                    <div class="add-info membership-infos">
                        <div class="row membership-content">
                            <div class="col-lg-12">
                                {{-- <input type="hidden" name="section[ul][{{ $i }}][id]" value="{{ $sections['product_details'][$i]->id ?? '' }}"> --}}
                                <input type="hidden" name="section[ul][{{ $i }}][id]" value="{{ $sections['product_details'][$i]->id ?? '' }}">

                                @php
                                $section_list_title = (isset($sections['product_details'][$i]) && isset($sections['product_details'][$i]->title)) 
                                    ? $sections['product_details'][$i]->title 
                                    : '';

                                $section_list_icon = (isset($sections['product_details'][$i]) && isset($sections['product_details'][$i]->icon)) 
                                    ? $sections['product_details'][$i]->icon 
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
                
                            </div>

                            <div class="col-lg-10">

                            @for ($k = 0; $k < 4; $k++)

                            @php
                                    $list_item_title = (isset($sections['product_details'][$i]) && 
                                                        isset($sections['product_details'][$i]->listItems[$k]) && 
                                                        isset($sections['product_details'][$i]->listItems[$k]->title)) 
                                        ? $sections['product_details'][$i]->listItems[$k]->title 
                                        : '';
                            @endphp

                            {{-- <input type="hidden" name="section[ul][{{ $i }}][li][{{ $k }}][id]" value="{{ $sections[product_details][$i]->listItems[$k]->id  ?? ''}}"> --}}
                            <input type="hidden" name="section[ul][{{ $i }}][li][{{ $k }}][id]" value="{{ $sections['product_details'][$i]->listItems[$k]->id ?? '' }}">


                                {!! getTextInput(
                                    $list_item_title ?? '',
                                    'Li Icon',
                                    'section[ul][' . $i . '][li][' . $k . '][title]',
                                    ['div' => ['test', 'testing', 'tester']],
                                    ['input' => 'helloId'],
                                ) !!}
                            @endfor

                            </div>
                           
                            <input type="hidden" name="section[ul][{{ $i }}][section_lists_id]]" value="1">
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>

    <div class="row">
        @for ($i = 0; $i < 4; $i++)
            <div class="col-lg-6">
                <div class="setting-card">
                    <div class="add-info membership-infos">
                        <div class="row membership-content">
                            <div class="col-lg-8">
                                {{-- @php
                                    $product_details = isset(
                                        $sections['product_details']->getContent[$i]['title'],
                                    )
                                        ? $sections['product_details']->getContent[$i]['title']
                                        : '';
                                @endphp --}}
                                {!! getTextInput(
                                    // $product_details, 
                                    '',
                                    'Title',
                                    'section[inner_section][' . $i . '][title]',
                                    ['div' => ['test', 'testing', 'tester']],
                                    ['input' => 'helloId'],
                                ) !!}
                            </div>
                            <div class="col-lg-12">
                                {{-- @php
                                    $key_features_content = isset($sections['key_features']->getContent[$i]['content'])
                                        ? $sections['key_features']->getContent[$i]['content']
                                        : '';
                                @endphp --}}
                                {!! getSectionTextArea(
                                    '',
                                    'section[inner_section][' . $i . '][content]',
                                
                                    'content',
                                ) !!}


                            </div>
                            <div class="col-lg-6">
                                {{-- @php
                                    $home_banner_button_text = isset($sections['home_banner']->getButtons[0]['text'])
                                        ? $sections['home_banner']->getButtons[0]['text']
                                        : '';
                                @endphp --}}
                                {!! getTextInput(
                                    // $home_banner_button_text,
                                    '',
                                    'button text',
                                    'section[button][0][text]',
                                    'Button Text',
                                ) !!}
                            </div>
                            <div class="col-lg-6">
                                {{-- @php
                                    $home_banner_button_link = isset($sections['home_banner']->getButtons[0]['link'])
                                        ? $sections['home_banner']->getButtons[0]['link']
                                        : '';
                                @endphp --}}
                                {!! getTextInput(
                                    // $home_banner_button_link,
                                    '',
                                    'button link',
                                    'section[button][0][link]',
                                    'Button Link',
                                ) !!}
                            </div>
                            {{-- <input type="hidden" name="section[inner_section][{{ $i }}][id]"
                                value="{{ $sections['product_details']->getContent[$i]['id'] ?? '' }}"> --}}
                            <input type="hidden" name="section[inner_section][{{ $i }}][id]"
                                value="">
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
    
    @php
        $pageId = $page->id ?? '';
        if (empty($pageId) || $pageId == '') {
            $pageId = $sections['prodcut_details']['page_id'] ?? '';
        }
    @endphp

    <input type="hidden" name="page_id" value="{{ $pageId }}">
    <input type="hidden" name="section[section_slug]" value="prodcut_details">
    <input type="hidden" name="section[id]" value="{{ $sections['prodcut_details']['id'] ?? '' }}">
    <button class="btn btn-primary prime-btn">Save</button>
</div>
