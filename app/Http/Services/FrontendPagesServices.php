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
        
            $sectionDetails =  $this->saveSection($pageSectionData,$sectionBannerImage,$sectionId);
            $sectionId = $sectionDetails->id;

            $allButtons = $data['homepage_banner_section']['button'];
            foreach($allButtons as $button)
            {
                $this->saveSectionButton($button,$sectionId);
            }
        }
        // banner section ends here

         //  how it works section
        if(isset($data['how_it_works']))
        {
        
            $sectionId = isset($data['how_it_works']['id']) ? $data['how_it_works']['id'] : '';
            $sectionBannerImage = '';
            
            if($data->hasFile('how_it_works.image'))
            {
 
                $sectionBannerImage = $data->file('how_it_works')['image'];
            }
            
            $pageSectionData = [
                'title'             => $data['how_it_works']['title'],
                'subtitle'          => $data['how_it_works']['subtitle'] ?? '',
                'section_slug'      => $data['how_it_works']['section_slug'],
                'page_id'           => $pageId
            ];

            $sectionDetails  =  $this->saveSection($pageSectionData,$sectionBannerImage,$sectionId);
            $sectionId       =  $sectionDetails->id;

            $allContentSections = $data['how_it_works']['inner_section'];

            $howItWorksCounter = 0;
            
            foreach($allContentSections as $contentSection)
            {
                $contentInnerImage = '';
                if($data->hasFile("how_it_works.inner_section.{$howItWorksCounter}.image"))
                {
                    $contentInnerImage = 'tester';
                    $contentInnerImage = $data->file('how_it_works')['inner_section'][$howItWorksCounter]['image'];
                    
                }
                $this->saveSectionContent($contentSection,$sectionId,$contentInnerImage);
                $howItWorksCounter++;
            }

        
        }

        return $this->getPageSectionsWithAttribute($pageId);
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
        $uploadedImagePath = '';
        // Lets first upload the image if it is provided to upload
        if(!empty($contentInnerImage))
        {   
            $uploadedImagePath = uploadingImageorFile($contentInnerImage, 'section-banner', $contentSection['title'] ?? 'test');
        }

        if(isset($contentSection['id']) && $contentSection['id'] > 0)
        {
            $contentSectionId = $contentSection['id'];
            unset($contentSection['id']);
            $sectionDetails = SectionContent::find($contentSectionId);
            // If already image exists in section content unlink the image
            if (isset($contentSection->image) && !empty($contentSection->image) && !empty($uploadedImagePath))
            {     
                unlinkFileOrImage($contentSection->getRawOriginal('image'));
                $contentSection['image'] = $uploadedImagePath;
            }
            $sectionDetails->update($contentSection);
        }
        else
        {
            $contentSection['image'] = $uploadedImagePath;
            $contentSection['section_id'] = $sectionId;
            SectionContent::create($contentSection);
        }
    }



}
