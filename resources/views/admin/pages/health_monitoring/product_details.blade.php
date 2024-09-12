<div id="prodcut_details">

    <div class="setting-title">
        <h5>Section Info</h5>
    </div>

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
                            
                            {{-- <input type="hidden" name="section[inner_section][{{ $i }}][id]"
                                value="{{ $sections['prodcut_details']->getContent[$i]['id'] ?? '' }}"> --}}
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
