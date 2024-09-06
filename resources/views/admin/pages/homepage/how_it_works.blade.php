                         {{-- How it Work Section --}}
                         <div class="col-sm-12" id="how_it_workss">
                             <h3 class="page-title">How it Work Section</h3>
                             <div class="card">
                                 <form id="save_home_header_banner_detail" method="post" enctype="multipart/form-data">
                                     @csrf
                                     <div class="setting-card p-0">
                                         {{-- {!! getImageInput() !!} --}}
                                         <div class="avatar-upload">
                                             <div class="avatar-edit">
                                                 <input type='file' name="how_it_works[image]" />
                                                 <label for="imageUpload"></label>
                                             </div>
                                             <div class="avatar-preview">
                                                 <div id="imagePreview"
                                                     style="background-image: url({{ asset('assets/img/doctors-dashboard/no-apt-3.png') }});">
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="setting-title">
                                         <h5>Section Info</h5>
                                     </div>

                                     <div class="setting-card">
                                         <div class="row">
                                             <div class="col-lg-12 col-md-12">
                                                 @php $how_it_works_title = isset(
                                                         $sections['how_it_works']['title'],
                                                     )
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
                                         @for ($i = 0; $i < 5; $i++)
                                             <div class="col-lg-4">
                                                 <div class="setting-card">
                                                     <div class="add-info membership-infos">
                                                         <div class="row membership-content">
                                                             <div class="col-lg-4">
                                                                 @php
                                                                     $how_it_works_image = isset( $sections['how_it_works']->getContent[$i]['image'])
                                                                         ? $sections['how_it_works']->getContent[$i]['image']: '';
                                                                 @endphp
                                                                 {!! getImageInput(
                                                                     $how_it_works_image,
                                                                     'Title',
                                                                     'how_it_works[inner_section]['.$i.'][image]',
                                                                     ['div' => ['test', 'testing', 'tester']],
                                                                     ['input' => 'innerImageIdOne'],
                                                                 ) !!}

                                                             </div>
                                                             <div class="col-lg-8">
                                                                @php
                                                                    $how_it_works_title = isset( $sections['how_it_works']->getContent[$i]['title'])
                                                                    ? $sections['how_it_works']->getContent[$i]['title']: '';
                                                                @endphp
                                                                 {!! getTextInput(
                                                                     $how_it_works_title,
                                                                     'Title',
                                                                     'how_it_works[inner_section]['.$i.'][title]',
                                                                     ['div' => ['test', 'testing', 'tester']],
                                                                     ['input' => 'helloId'],
                                                                 ) !!}
                                                             </div>
                                                             <div class="col-lg-12">
                                                                @php
                                                                $how_it_works_content = isset( $sections['how_it_works']->getContent[$i]['content'])
                                                                    ? $sections['how_it_works']->getContent[$i]['content']: '';
                                                             @endphp
                                                                 {!! getSectionTextArea(
                                                                    $how_it_works_content,
                                                                     'content',
                                                                     'how_it_works[inner_section]['.$i.'][content]',
                                                                     'content',
                                                                 ) !!}
                                                             </div>
                                                             {{-- <input type = "hidden"
                                                                 name = 'how_it_works[inner_section][][id]'
                                                                 value="{{ $sections['how_it_works']->getContent[$i]['id'] ?? '' }}"> --}}
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         @endfor


                                         {{-- <div class="col-lg-4">
                                             <div class="setting-card">
                                                 <div class="add-info membership-infos">
                                                     <div class="row membership-content">
                                                         <div class="col-lg-4">
                                                             {!! getImageInput(
                                                                 $sections['how_it_works']->getContent[1]['image'],
                                                                 'Title',
                                                                 'how_it_works[inner_section][1][image]',
                                                                 ['div' => ['test', 'testing', 'tester']],
                                                                 ['input' => 'helloId'],
                                                             ) !!}

                                                         </div>
                                                         <div class="col-lg-8">
                                                             {!! getTextInput(
                                                                 $sections['how_it_works']->getContent[1]['title'],
                                                                 'Title',
                                                                 'how_it_works[inner_section][1][title]',
                                                                 ['div' => ['test', 'testing', 'tester']],
                                                                 ['input' => 'helloId'],
                                                             ) !!}
                                                         </div>
                                                         <input type = "hidden"
                                                             name = "how_it_works[inner_section][1][id]"
                                                             value="{{ $sections['how_it_works']->getContent[1]['id'] }}">
                                                         <div class="col-lg-12">
                                                             {!! getSectionTextArea(
                                                                 $sections['how_it_works']->getContent[1]['content'],
                                                                 'content',
                                                                 'how_it_works[inner_section][1][content]',
                                                                 'content',
                                                             ) !!}
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col-lg-4">
                                             <div class="setting-card">
                                                 <div class="add-info membership-infos">
                                                     <div class="row membership-content">
                                                         <div class="col-lg-4">
                                                             {!! getImageInput(
                                                                 $sections['how_it_works']->getContent[2]['image'],
                                                                 'Title',
                                                                 'how_it_works[inner_section][2][image]',
                                                                 ['div' => ['test', 'testing', 'tester']],
                                                                 ['input' => 'helloId'],
                                                             ) !!}

                                                         </div>
                                                         <div class="col-lg-8">
                                                             {!! getTextInput(
                                                                 $sections['how_it_works']->getContent[2]['title'],
                                                                 'Title',
                                                                 'how_it_works[inner_section][2][title]',
                                                                 ['div' => ['test', 'testing', 'tester']],
                                                                 ['input' => 'helloId'],
                                                             ) !!}
                                                         </div>
                                                         <input type = "hidden"
                                                             name = "how_it_works[inner_section][2][id]"
                                                             value="{{ $sections['how_it_works']->getContent[2]['id'] }}">

                                                         <div class="col-lg-12">
                                                             {!! getSectionTextArea(
                                                                 $sections['how_it_works']->getContent[2]['content'],
                                                                 'content',
                                                                 'how_it_works[inner_section][2][content]',
                                                                 'content',
                                                             ) !!}
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="col-lg-4">
                                             <div class="setting-card">
                                                 <div class="add-info membership-infos">
                                                     <div class="row membership-content">
                                                         <div class="col-lg-4">
                                                             {!! getImageInput(
                                                                 $sections['how_it_works']->getContent[3]['image'],
                                                                 'Title',
                                                                 'how_it_works[inner_section][3][image]',
                                                                 ['div' => ['test', 'testing', 'tester']],
                                                                 ['input' => 'helloId'],
                                                             ) !!}

                                                         </div>
                                                         <div class="col-lg-8">
                                                             {!! getTextInput(
                                                                 $sections['how_it_works']->getContent[3]['title'],
                                                                 'Title',
                                                                 'how_it_works[inner_section][3][title]',
                                                                 ['div' => ['test', 'testing', 'tester']],
                                                                 ['input' => 'helloId'],
                                                             ) !!}
                                                         </div>
                                                         <input type = "hidden"
                                                             name = "how_it_works[inner_section][3][id]"
                                                             value="{{ $sections['how_it_works']->getContent[3]['id'] }}">
                                                         <div class="col-lg-12">
                                                             {!! getSectionTextArea(
                                                                 $sections['how_it_works']->getContent[3]['content'],
                                                                 'content',
                                                                 'how_it_works[inner_section][3][content]',
                                                                 'content',
                                                             ) !!}
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div>
                                         </div> --}}
                                     </div>

                                     <input type="hidden" name="page_id"
                                         value="{{ $sections['home_banner']['page_id'] ?? '' }}">
                                     <input type="hidden" name="how_it_works[section_slug]" value="how_it_works">
                                     <button class="btn btn-primary prime-btn">Save</button>
                                 </form>
                             </div>
                         </div>
