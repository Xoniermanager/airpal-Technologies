<div class="col-sm-12" id="home_banner">
    <h3 class="page-title">Header Banner Section</h3>
    <div class="card">
        <form id="save_home_header_banner_detail" enctype="multipart/form-data">
            @csrf
            <div class="setting-card p-0">

                {!! getBannerImageInput(
                    $sections['home_banner']->image,
                    'homepage_banner_section[image]',
                    ['input' => ['test', 'preview']],
                    ['input' => 'uploadBannerImage', 'preview' => 'previewImage'],
                ) !!}

            </div>
            <div class="setting-title">
                <h5>Section Info</h5>
            </div>

            <div class="setting-card">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        @php
                            // dd($sections);
                            $home_banner_section_title = isset($sections['home_banner']['title'])
                                ? $sections['home_banner']['title']
                                : '';
                        @endphp
                        {!! getTextInput(
                            $home_banner_section_title,
                            'Title',
                            'homepage_banner_section[title]',
                            ['div' => ['test', 'testing', 'tester']],
                            ['input' => 'helloId'],
                        ) !!}
                    </div>

                    <div class="col-lg-6 col-md-6">
                        @php
                            $home_banner_section_subtitle = isset($sections['home_banner']['subtitle'])
                                ? $sections['home_banner']['subtitle']
                                : '';
                        @endphp
                        {!! getTextInput(
                            $home_banner_section_subtitle,
                            'Subtitle',
                            'homepage_banner_section[subtitle]',
                            ['div' => ['test', 'testing', 'tester']],
                            ['input' => 'subTitleId'],
                        ) !!}
                    </div>
                </div>
            </div>
            <div class="setting-card">
                <div class="add-info membership-infos">
                    <div class="row membership-content">

                        <input type="hidden" name="page_id" value="{{ $page->id ?? '' }}">

                        <input type="hidden" name="homepage_banner_section[button][0][id]"
                            value="{{ $sections['home_banner']->getButtons[0]['id'] ?? '' }}">

                        <input type="hidden" name="homepage_banner_section[id]"
                            value="{{ $sections['home_banner']['id'] ?? '' }}">

                        <input type="hidden" name="homepage_banner_section[section_slug]" value="home_banner">

                        <div class="col-lg-6">
                            @php
                                $home_banner_button_text = isset($sections['home_banner']->getButtons[0]['text'])
                                    ? $sections['home_banner']->getButtons[0]['text']
                                    : '';
                            @endphp
                            {!! getTextInput(
                                $home_banner_button_text,
                                'button text',
                                'homepage_banner_section[button][0][text]',
                                'Button Text',
                            ) !!}
                        </div>
                        <div class="col-lg-6">
                            @php
                                $home_banner_button_link = isset($sections['home_banner']->getButtons[0]['link'])
                                    ? $sections['home_banner']->getButtons[0]['link']
                                    : '';
                            @endphp
                            {!! getTextInput(
                                $home_banner_button_link,
                                'button link',
                                'homepage_banner_section[button][0][link]',
                                'Button Link',
                            ) !!}
                        </div>
                    </div>
                </div>
            </div>
            <button>Save</button>
        </form>
    </div>
</div>
