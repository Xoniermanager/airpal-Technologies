<div id="how_it_works" class="container py-4">
    <div class="row align-items-start setting-card p-3 d-flex flex-wrap align-items-center">
        <!-- Left Column: Section Title and Inner Sections -->
        <div class="col-lg-12 col-md-6">
            <div class="setting-card mb-4">
                {{-- <div class="setting-title mb-3">
                    <h5>Section Info</h5>
                </div> --}}
                @php
                    $how_it_works_title = $sections['how_it_works']['title'] ?? '';
                @endphp
                {!! getTextInput(
                    $how_it_works_title,
                    'Title',
                    'section[title]',
                    ['div' => ['class' => 'mb-3']],
                    ['input' => ['class' => 'form-control', 'id' => 'helloId']],
                ) !!}
            </div>
        </div>
        <div class="row">

            <div class="col-lg-9">
                <!-- Grid View for Inner Sections -->
                <div class="row">
                    @for ($i = 0; $i < 4; $i++)
                        <div class="col-lg-6 mb-4"> <!-- Adjusted column size for better layout -->
                            <div class="setting-card">
                                <div class="add-info membership-infos">
                                    <div class="row membership-content">
                                        <div class="col-lg-4">
                                            @php
                                                $how_it_works_image = isset(
                                                    $sections['how_it_works']->getContent[$i]['image'],
                                                )
                                                    ? $sections['how_it_works']->getContent[$i]['image']
                                                    : '';
                                            @endphp
                                            {!! getImageInput(
                                                $how_it_works_image,
                                                'section[inner_section][' . $i . '][image]',
                                                ['div' => ['class' => 'mb-2']],
                                                ['input' => "innerImageId$i", 'preview' => "previewImage$i"],
                                            ) !!}
                                        </div>

                                        <div class="col-lg-8">
                                            @php
                                                $how_it_works_title = isset(
                                                    $sections['how_it_works']->getContent[$i]['title'],
                                                )
                                                    ? $sections['how_it_works']->getContent[$i]['title']
                                                    : '';
                                            @endphp
                                            {!! getTextInput(
                                                $how_it_works_title,
                                                'Title',
                                                'section[inner_section][' . $i . '][title]',
                                                ['div' => ['class' => 'mb-2']],
                                                ['input' => ['class' => 'form-control', 'id' => 'titleId' . $i]],
                                            ) !!}

                                        </div>

                                        <div class="col-lg-12">
                                            @php
                                                $how_it_works_content = isset(
                                                    $sections['how_it_works']->getContent[$i]['content'],
                                                )
                                                    ? $sections['how_it_works']->getContent[$i]['content']
                                                    : '';
                                            @endphp
                                            {!! getSectionTextArea($how_it_works_content, 'section[inner_section][' . $i . '][content]', 'content') !!}
                                        </div>

                                        <input type="hidden" name="section[inner_section][{{ $i }}][id]"
                                            value="{{ $sections['how_it_works']->getContent[$i]['id'] ?? '' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>

            <!-- Right Column: Image Upload -->
            <div class="col-lg-3 col-md-6">
                <div class="setting-card p-0">
                    {!! getBannerImageInput(
                        $sections['how_it_works']->image ?? '',
                        'section[image]',
                        ['input' => ['test', 'preview']],
                        ['input' => 'howItWorkBannerImage', 'preview' => 'howItWorkPreviewImage'],
                    ) !!}
                </div>
            </div>
        </div>



        <!-- Hidden Inputs for Page and Section IDs -->
        @php
            $pageId = $page->id ?? ($sections['how_it_works']['page_id'] ?? '');
        @endphp
        <input type="hidden" name="page_id" value="{{ $pageId }}">
        <input type="hidden" name="section[section_slug]" value="how_it_works">
        <input type="hidden" name="section[id]" value="{{ $sections['how_it_works']['id'] ?? '' }}">

        <!-- Save Button -->
        <div class="col-lg-3 col-md-6">
            <button class="btn btn-primary prime-btn mt-4">Save</button>
        </div>
    </div>


</div>
