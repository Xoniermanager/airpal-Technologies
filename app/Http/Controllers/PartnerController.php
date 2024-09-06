<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Services\PartnersServices;

class PartnerController extends Controller
{
    private $partnerServices;
    public function __construct(PartnersServices $partnerServices)
    {
        $this->partnerServices = $partnerServices;
    }
    public function index()
    {
        $partnerList = $this->partnerServices->partnerList();
        return view('admin.generals.our-partners.index',['partnerList' => $partnerList ?? '']);
    }
    public function getPartners()
    {
        return view('admin.generals.partners.list');
    }
    public function showPartnerForm()
    {
        return view('admin.generals.partners.add');
    }
    public function editPartnerForm($id)
    {
        $partner = $this->partnerServices->getPartner($id);
        return view('admin.generals.partners.edit',['partner'=>$partner]);
    }
    public function savePartner(Request $request)
    {
        $partnerDetails =   $request->all();
        $createdDetails = $this->partnerServices->savePartner($partnerDetails);
        if ($createdDetails) {
            return response()->json([
                "success"  =>  true,
                'message'  =>  'Saved Successfully!',
                'data'     =>  $createdDetails
            ]);
        } else {
            return response()->json([
                "success" =>   false,
                'message' =>  'Saved Successfully!',
                'data'    =>  $createdDetails
            ]);
        }
    }
    public function updatePartner(Request $request ,$id)
    {
        $partnerDetails  = $request->all();
        $createdDetails  = $this->partnerServices->updatePartner($partnerDetails,$id);
        if ($createdDetails) {
            return response()->json([
                "success"  =>  true,
                'message'  =>  'Saved Successfully!',
                'data'     =>  $createdDetails
            ]);
        } else {
            return response()->json([
                "success" =>   false,
                'message' =>  'Something went wrong',
                'data'    =>  ''
            ]);
        }
    }
    public function deletePartner($id)
    {
        $createdDetails     = $this->partnerServices->deletePartner($id);
        if ($createdDetails) {
            return response()->json([
                "success"  =>  true,
                'message'  =>  'Deleted Successfully!',
                'data'     =>  $createdDetails
            ]);
        } else {
            return response()->json([
                "success" =>   false,
                'message' =>  'Something went wrong',
                'data'    =>  ''
            ]);
        }
    }
}
