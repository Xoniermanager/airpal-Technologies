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
        dd($data);
        if(isset($data['homepage_banner_section']))
        {

            if(isset($data['homepage_banner_section']['id']))
            {
                $sectionId = $data['homepage_banner_section']['id'];
            }
            
            dd( $data['homepage_banner_section']);
            $pageSectionData = [
                'image'     => $data['homepage_banner_section']['image'],
                'title'     => $data['homepage_banner_section']['title'],
                'subtitle'  => $data['homepage_banner_section']['subtitle'],
                'section_slug' => $data['homepage_banner_section']['section_slug']
            ];

            dd($pageSectionData);

            

            $returnSectionId = $this->saveSectionContent($pageSectionData,$sectionId= '');


            $allButtons = $data['homepage_banner_section']['button'];
            foreach($allButtons as $button)
            {
                $this->saveSectionButton($button,$sectionId);
            }
            $data['homepage_banner_section']['page_id'] = $data['page_id'] ?? '';
    
        }
        elseif(isset($data['how_it_work']))
        {
            $data['how_it_work']['page_id'] = $data['page_id'] ?? '';
            $data = $data['how_it_work'];
           
        }
        elseif(isset($data['why_airpal_app']))
        {
            $data['why_airpal_app']['page_id'] = $data['page_id'] ?? '';
            $data = $data['why_airpal_app'];
           
        }

        if(isset($data['id']))
        {
            $getPageSection = PageSection::where('id', $data['id'])->first();
        }

        if (isset($data['image']) && !empty($data['image'])) {
            if ($getPageSection->image != null) {
                unlinkFileOrImage($getPageSection->getRawOriginal('image'));
            }
            $data['image'] = uploadingImageorFile($data['image'], 'home_page', $data['section_slug']);
        }

        $sectionId = PageSection::updateOrCreate(
            ['id' => $data['id'] ?? null],
            $data
        );
        
        // for update button text and link
        if (isset($data['btntext']) || isset($data['btnlink'])) {
            $buttonPayload = [
                'text'  => $data['btntext'],
                'link'  => $data['btnlink'],
                'section_id'  => $sectionId->id,
            ];
            SectionButton::updateOrCreate(
                ['id' => $data['button_id'] ?? null],
                $buttonPayload
            );
        }

        // for create and update section content 
        // if ($data['inner_section']) {
        //     foreach ($data['inner_section'] as $data) {
        //         $data['section_id']  = $sectionId->id;
        //         SectionContent::updateOrCreate(
        //             ['id' => $data['id'] ?? null],
        //             $data
        //         );
        //     }
        // }
    }

    public function saveSection()
    {

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

    public function saveSectionContent($sectionDetails,$sectionId)
    {
        dd($sectionDetails,$sectionId);
    }

    public function saveSectionImage()
    {

    }

}
