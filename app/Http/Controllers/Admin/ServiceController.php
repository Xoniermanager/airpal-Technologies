<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Requests\{StoreServiceRequest,UpdateServiceRequest};
use App\Http\Services\DoctorServiceServices;

class ServiceController extends Controller
{
    private $doctor_service_services;

    public function __construct(DoctorServiceServices $doctor_service_services){
        $this->doctor_service_services = $doctor_service_services;
    }
    public function index()
    {
        $services = Service::paginate(10);
        return view("admin.service.index")->with("services", $services);
    }
    public function store(StoreServiceRequest $request)
    {
        // dd($request->all());
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
}
