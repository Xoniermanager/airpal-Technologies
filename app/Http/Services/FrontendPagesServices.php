<?php

namespace App\Http\Services;

use App\Models\Page;
use App\Models\PageContent;
use App\Models\PageSection;
use App\Models\SectionButton;
use App\Http\Repositories\FavoriteDoctorRepository;
use App\Models\SectionContent;

class FrontendPagesServices
{

    public function getPageSectionsWithAttribute($pageId)
    {
        return PageSection::where('page_id', $pageId)->with('getButtons', 'getContent', 'getImages')->get();
    }

    public function saveHomepageSections($data)
    {
        $pageId = $data['page_id'];
        // var_dump($data->hasFile('homepage_banner_section.image'));
        // var_dump($data->hasFile('homepage_banner_section.content.content_image'));
        // var_dump($data->file('homepage_banner_section')['image']);
        // var_dump($data->file('homepage_banner_section')['content']['content_image']);
        if(isset($data['homepage_banner_section']))
        {

            $sectionId = isset($data['homepage_banner_section']['id']) ? $data['homepage_banner_section']['id'] : '';
            $sectionBannerImage = '';
            
            if($data->hasFile('homepage_banner_section.image'))
            {
                $sectionBannerImage = $data->file('homepage_banner_section')['image'];
            }

            $pageSectionData = [
                'title'             => $data['homepage_banner_section']['title'],
                'subtitle'          => $data['homepage_banner_section']['subtitle'],
                'section_slug'      => $data['homepage_banner_section']['section_slug'],
                'page_id'           => $pageId
            ];

            // If the page is not refreshed and section id is not even if it is created
            if(empty($sectionId))
            {
                // Lets check it again if section already exists
                $sectionData = PageSection::where([
                    'page_id'       =>  $pageSectionData['page_id'],
                    'section_slug'  =>  $pageSectionData['section_slug']
                ])->first();

                if($sectionData)
                {
                    $sectionId = $sectionData->id;
                }
            }

            $sectionDetails =  $this->saveSection($pageSectionData,$sectionBannerImage,$sectionId);

            // $sectionDetails = $this->saveSectionContent();
            $sectionId = $sectionDetails->id;

            $allButtons = $data['homepage_banner_section']['button'];
            foreach($allButtons as $button)
            {
                $this->saveSectionButton($button,$sectionId);
            }
        }
        // banner section ends here

        // How it works section starts here
        // if(isset($data['how_it_work']))
        // {
        //     $data['how_it_work']['page_id'] = $data['page_id'] ?? '';
        //     $data = $data['how_it_work'];
           
        // }
        // elseif(isset($data['why_airpal_app']))
        // {
        //     $data['why_airpal_app']['page_id'] = $data['page_id'] ?? '';
        //     $data = $data['why_airpal_app'];
           
        // }
        return $this->getPageSectionsWithAttribute($pageId);
    }

    public function saveSection($sectionAttributes,$sectionBannerImage,$sectionId)
    {
        // First of all lets check if this request is for create or update of section,
        if(!empty($sectionId))
        {
            $sectionData = PageSection::find($sectionId);
        
            // Now lets check if image is also provided to upload
            if(!empty($sectionBannerImage))
            {
                
                if ($sectionData->image != null) 
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

    public function saveSectionContent($sectionDetails, $bannerImage='', $sectionId='',)
    {
        
    }

    public function saveSectionImage()
    {

    }

}
