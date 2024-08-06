<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Requests\{StoreServiceRequest,UpdateServiceRequest};
use App\Http\Services\DoctorService;

class ServiceController extends Controller
{
    private $doctor_service_services;

    public function __construct(DoctorService $doctor_service_services){
        $this->doctor_service_services = $doctor_service_services;
    }
    public function index()
    {
        $services = Service::paginate(10);
        return view("admin.service.index")->with("services", $services);
    }
    public function store(StoreServiceRequest $request)
    {
        if ($this->doctor_service_services->addService($request->validated())) {
            return response()->json([
                'message' => 'Add Successfully!',
                'data'   =>  view('admin.service.service-list', [
                  'services' => $this->doctor_service_services->getServicePaginated()
                ])->render()
            ]);
        }
    }
    public function update(UpdateServiceRequest $request, $id)
    {
        // dd($request->all());
        if ($this->doctor_service_services->updateService($request->validated(),$id)) {
            return response()->json([
                'message' => 'update Successfully!',
                'data'   =>  view('admin.service.service-list', [
                  'services' => $this->doctor_service_services->getServicePaginated()
                ])->render()
            ]);
        }
    }
    public function delete($id)
    {
        if ($this->doctor_service_services->deleteService($id)) {
            return response()->json([
                'message' => 'update Successfully!',
                'data'   =>  view('admin.service.service-list', [
                  'services' => $this->doctor_service_services->getServicePaginated()
                ])->render()
            ]);
        }
    }

    public function getServiceAjaxCall()
    {
    $service = $this->doctor_service_services->getServiceAjaxCall();
    return json_encode($service);
    }

    public function storeServiceByAjaxCall(Request $request)
    {
        $data =  json_decode($request->all()['models'])[0];
       return $this->doctor_service_services->addService(['name'=> $data->name ]);


    }
}
