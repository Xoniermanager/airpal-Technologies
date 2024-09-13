<div id="product_details">

    <div class="setting-title">
        {{-- <h5>Section Info</h5> --}}
    </div>

    @php
        $product_details = isset($sections['product_details']['title']) ? $sections['product_details']['title'] : '';
    @endphp

    {!! getTextInput(
        $product_details,
        'Section Title',
        'section[title]',
        ['div' => ['test', 'testing', 'tester']],
        ['input' => 'helloId'],
    ) !!}

    @php
        $product_details = isset($sections['product_details']['subtitle'])
            ? $sections['product_details']['subtitle']
            : '';
    @endphp

    {!! getTextInput(
        $product_details,
        'Section Title',
        'section[subtitle]',
        ['div' => ['test', 'testing', 'tester']],
        ['input' => 'helloId'],
    ) !!}

    @php
        $product_details = isset($sections['product_details']['content'])
            ? $sections['product_details']['content']
            : '';
    @endphp

    {!! getTextInput(
        $product_details,
        'Section content',
        'section[content]',
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

                                @php
                                    $section_list_title =
                                        isset($sections['product_details']->section_list[$i]) &&
                                        isset($sections['product_details']->section_list[$i]->title)
                                            ? $sections['product_details']->section_list[$i]->title
                                            : '';

                                    $section_list_icon =
                                        isset($sections['product_details']->section_list[$i]) &&
                                        isset($sections['product_details']->section_list[$i]->icon)
                                            ? $sections['product_details']->section_list[$i]->icon
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
                                    value="{{ $sections['product_details']->section_list[$i]->id ?? '' }}">
                            </div>

                            <div class="col-lg-10">

                                @for ($k = 0; $k < 4; $k++)
                                    @php
                                        $list_item_title =
                                            isset($sections['product_details']->section_list[$i]) &&
                                            isset($sections['product_details']->section_list[$i]->listItems[$k]) &&
                                            isset($sections['product_details']->section_list[$i]->listItems[$k]->title)
                                                ? $sections['product_details']->section_list[$i]->listItems[$k]->title
                                                : '';
                                    @endphp

                                    <input type="hidden"
                                        name="section[ul][{{ $i }}][li][{{ $k }}][id]"
                                        value="{{ $sections['product_details']->section_list[$i]->listItems[$k]->id ?? '' }}">


                                    {!! getTextInput(
                                        $list_item_title ?? '',
                                        'Li Icon',
                                        'section[ul][' . $i . '][li][' . $k . '][title]',
                                        ['div' => ['test', 'testing', 'tester']],
                                        ['input' => 'helloId'],
                                    ) !!}
                                @endfor

                            </div>

                            <input type="hidden" name="section[ul][{{ $i }}][section_lists_id]]"
                                value="1">
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
                                @php
                                    $section_content_title = isset(
                                        $sections['product_details']->getContent[$i]['title'],
                                    )
                                        ? $sections['product_details']->getContent[$i]['title']
                                        : '';
                                @endphp
                                {!! getTextInput(
                                    $section_content_title,
                                    'Title',
                                    'section[inner_section][' . $i . '][title]',
                                    ['div' => ['test', 'testing', 'tester']],
                                    ['input' => 'helloId'],
                                ) !!}
                            </div>
                            <div class="col-lg-12">
                                @php
                                    $section_content_content = isset(
                                        $sections['product_details']->getContent[$i]['content'],
                                    )
                                        ? $sections['product_details']->getContent[$i]['content']
                                        : '';
                                @endphp
                                {!! getSectionTextArea(
                                    $section_content_content,
                                    'section[inner_section][' . $i . '][content]',
                                
                                    'content',
                                ) !!}
                            </div>
                            <input type="hidden" name="section[inner_section][{{ $i }}][id]"
                                value="{{ $sections['product_details']->getContent[$i]['id'] }}">


                            <div class="col-lg-6">
                                @php
                                    $section_banner_button_text = isset($sections['product_details']->getButtons[$i])
                                        ? $sections['product_details']->getButtons[$i]->text
                                        : '';
                                @endphp
                                {!! getTextInput($section_banner_button_text, 'button text', 'section[button][' . $i . '][text]', 'Button Text') !!}
                            </div>
                            <div class="col-lg-6">
                                @php
                                    $section_banner_button_link = isset($sections['product_details']->getButtons[$i])
                                        ? $sections['product_details']->getButtons[$i]->link
                                        : '';
                                @endphp
                                {!! getTextInput($section_banner_button_link, 'button link', 'section[button][' . $i . '][link]', 'Button Link') !!}
                            </div>

                            <input type="hidden" name="section[button][{{ $i }}][id]"
                                value="{{ $sections['product_details']->getButtons[$i]['id'] }}">
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>


    @php
        $pageId = $page->id ?? '';
        if (empty($pageId) || $pageId == '') {
            $pageId = $sections['product_details']['page_id'] ?? '';
        }
    @endphp

    <input type="hidden" name="page_id" value="{{ $pageId }}">
    <input type="hidden" name="section[section_slug]" value="product_details">
    <input type="hidden" name="section[id]" value="{{ $sections['product_details']['id'] ?? '' }}">
    <button class="btn btn-primary prime-btn">Save</button>
</div>
