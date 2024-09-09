<?php

namespace App\Http\Services;

use App\Models\Page;
use App\Models\PageContent;
use App\Models\PageSection;
use App\Models\SectionButton;
use App\Models\SectionContent;
use App\Models\PageExtraSection;
use App\Http\Repositories\FavoriteDoctorRepository;
use App\Models\ExtraSectionFilter;

class FrontendPagesServices
{

    public function getPageSectionsWithAttribute($pageId)
    {
        return PageSection::where('page_id', $pageId)->with('getButtons', 'getContent', 'getImages')->get();
    }

    public function saveHomepageSections($data)
    {    

        $pageId = $data['page_id'];
        if(isset($data['section']))
        {
            $sectionId = isset($data['section']['id']) ? $data['section']['id'] : '';
            $sectionBannerImage = '';
  
            if($data->hasFile('section.image'))
            {
                $sectionBannerImage = $data->file('section')['image'];
            }
            
            $pageSectionData = [
                'title'             => $data['section']['title'],
                'subtitle'          => $data['section']['subtitle']?? '',
                'content'           => $data['section']['content']?? '',
                'section_slug'      => $data['section']['section_slug'],
                'page_id'           => $pageId
            ];
        
            $sectionDetails =  $this->saveSection($pageSectionData,$sectionBannerImage,$sectionId);
            $sectionId = $sectionDetails->id;

            if(isset($data['section']['button']))
            {
                $allButtons = $data['section']['button'];
                foreach($allButtons as $button)
                {
                    $this->saveSectionButton($button,$sectionId);
                }

            }

            if(isset($data['section']['inner_section'])){

                $allContentSections = $data['section']['inner_section'];
                
                $howItWorksCounter = 0;
                
                foreach($allContentSections as $contentSection)
                {
                    $contentInnerImage = '';
                    if($data->hasFile("section.inner_section.{$howItWorksCounter}.image"))
                    {
                        $contentInnerImage = 'tester';
                        $contentInnerImage = $data->file('section')['inner_section'][$howItWorksCounter]['image'];
                        
                    }
                    $this->saveSectionContent($contentSection,$sectionId,$contentInnerImage);
                    $howItWorksCounter++;
                }
            }
        }
        if(isset($data['top_doctors'])){

        $this->saveTopDoctors($data['top_doctors']);

        }



        // if(isset($data['how_it_works']))
        // {
        
        //     $sectionId = isset($data['how_it_works']['id']) ? $data['how_it_works']['id'] : '';
        //     $sectionBannerImage = '';
            
        //     if($data->hasFile('how_it_works.image'))
        //     {
 
        //         $sectionBannerImage = $data->file('how_it_works')['image'];
        //     }
            
        //     $pageSectionData = [
        //         'title'             => $data['how_it_works']['title'],
        //         'subtitle'          => $data['how_it_works']['subtitle'] ?? '',
        //         'section_slug'      => $data['how_it_works']['section_slug'],
        //         'page_id'           => $pageId
        //     ];

        //     $sectionDetails  =  $this->saveSection($pageSectionData,$sectionBannerImage,$sectionId);
        //     $sectionId       =  $sectionDetails->id;

        //     $allContentSections = $data['how_it_works']['inner_section'];

        //     $howItWorksCounter = 0;
            
        //     foreach($allContentSections as $contentSection)
        //     {
        //         $contentInnerImage = '';
        //         if($data->hasFile("how_it_works.inner_section.{$howItWorksCounter}.image"))
        //         {
        //             $contentInnerImage = 'tester';
        //             $contentInnerImage = $data->file('how_it_works')['inner_section'][$howItWorksCounter]['image'];
                    
        //         }
        //         $this->saveSectionContent($contentSection,$sectionId,$contentInnerImage);
        //         $howItWorksCounter++;
        //     }

        
        // }

        // if(isset($data['why_airpal_app']))
        // {
        
        //     $sectionId = isset($data['why_airpal_app']['id']) ? $data['why_airpal_app']['id'] : '';
        //     $sectionBannerImage = '';
            
        //     if($data->hasFile('why_airpal_app.image'))
        //     {
 
        //         $sectionBannerImage = $data->file('why_airpal_app')['image'];
        //     }
            
        //     $pageSectionData = [
        //         'title'             => $data['why_airpal_app']['title'],
        //         'subtitle'          => $data['why_airpal_app']['subtitle'] ?? '',
        //         'section_slug'      => $data['why_airpal_app']['section_slug'],
        //         'page_id'           => $pageId
        //     ];

        //     $sectionDetails  =  $this->saveSection($pageSectionData,$sectionBannerImage,$sectionId);
        //     $sectionId       =  $sectionDetails->id;

        //     $allContentSections = $data['why_airpal_app']['inner_section'];

        //     $whyAirpalAppCounter = 0;
            
        //     foreach($allContentSections as $contentSection)
        //     {
        //         $contentInnerImage = '';
        //         if($data->hasFile("why_airpal_app.inner_section.{$whyAirpalAppCounter}.image"))
        //         {
        //             $contentInnerImage = 'tester';
        //             $contentInnerImage = $data->file('why_airpal_app')['inner_section'][$whyAirpalAppCounter]['image'];
                    
        //         }
        //         $this->saveSectionContent($contentSection,$sectionId,$contentInnerImage);
        //         $whyAirpalAppCounter++;
        //     }

        
        // }

        return $this->getPageSectionsWithAttribute($pageId);
    }


    public function saveTopDoctors($data )
    {
        $payload = [
            'model'             =>  $data['model'],
            'order_by'          =>  $data['orderby'] ?? '',
            'no_of_records'     =>  $data['no_of_records'] ?? '',
            'status'            =>  $data['status']?? '',
            'page_id'           =>  $data['page_id']
        ];
        $pageExtraSection = PageExtraSection::create($payload);

        if($pageExtraSection)
        {
            foreach($data['filter'] as $filter)
            {
            $pageExtraSection = [
                'key'  => $filter['key'],
                'value' => $filter['value'],
                'page_extra_sections_id'=> $pageExtraSection->id,
            ];
            $sectionData = ExtraSectionFilter::create($pageExtraSection);   

            }

        }


        
    //   $sectionId = isset($data['id']) ? $data['id'] : ''

            // if($sectionId)
            // {
            //     $sectionData = PageExtraSection::find($sectionId);
            //     $sectionData->update($data);
            // }
            // else
            // {
            //     // $payload = [
            //     //     'model'             =>  $data['model'],
            //     //     'orderby'           =>  $data['orderby']?? '',
            //     //     'no_of_records'     =>  $data['no_of_records']?? '',
            //     //     'status'            =>  $data['status']?? '',,
            //     //     'page_id'           =>  $data['page_id']
            //     // ];

            //     // dd($payload);
            //     // $pageExtraSection = PageExtraSection::create($payload);
            //     if($pageExtraSection)
            //     {
            //         ExtraSectionFilter::create();
            //     }

            // }


    }

    public function saveSection($sectionAttributes,$sectionBannerImage,$sectionId)
    {
        // First of all lets check if this request is for create or update of section,
        if(!empty($sectionId))
        {
            $sectionData = PageSection::find($sectionId);
 

            if(!empty($sectionBannerImage))
            {
                if (isset($sectionData['image']) && !$sectionData['image'])
                {     
                    unlinkFileOrImage($sectionData->getRawOriginal('image'));
                }
                $sectionData['image'] = uploadingImageorFile($sectionBannerImage, 'section-banner', $sectionData->section_slug);
            }
            $sectionData->update($sectionAttributes);
        }
        else
        {
            $sectionData = PageSection::create($sectionAttributes);

            // Now lets check if image is also provided to upload
            if(!empty($bannerImage))
            {
                $sectionData['image'] = uploadingImageorFile($sectionBannerImage, 'section-banner', $sectionData->section_slug);
            }
            $sectionData->update();
        }
        return $sectionData;
    }

    public function saveSectionButton($button,$sectionId)
    {
        if(isset($button['id']) && $button['id'] > 0)
        {
            $buttonId = $button['id'];
            unset($button['id']);
            SectionButton::find($buttonId)->update($button);
        }
        else
        {
            $button['section_id'] = $sectionId;
            SectionButton::create($button);
        }
    }

    public function saveSectionContent($contentSection,$sectionId,$contentInnerImage)
    {
        if(isset($contentSection['id']) && $contentSection['id'] > 0)
        {
            $contentSectionId = $contentSection['id'];
            unset($contentSection['id']);
            $sectionDetails = SectionContent::find($contentSectionId);
            $sectionDetails->update($contentSection);
        }
        else
        {
            $contentSection['section_id'] = $sectionId;
            $sectionDetails = SectionContent::create($contentSection);
        }

        // Lets now upload the image if it is provided to upload
        if(!empty($contentInnerImage))
        {   
            $uploadedImagePath = uploadingImageorFile($contentInnerImage, 'section-content', $sectionDetails->id);
            
            // If already image exists in section content unlink the image
            if (isset($sectionDetails->image) && !empty($sectionDetails->image))
            {     
                unlinkFileOrImage($sectionDetails->getRawOriginal('image'));
            }
            $sectionDetails->image = $uploadedImagePath;
            $sectionDetails->save();
        }
    }



}
