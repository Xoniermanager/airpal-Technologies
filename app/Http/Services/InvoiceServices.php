<?php

namespace App\Http\Services;

use App\Http\Repositories\BookingRepository;
use App\Http\Repositories\FavoriteDoctorRepository;

class InvoiceServices
{
    private $bookingRepository;
    
    public function __construct(BookingRepository $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    public function getAllPatientInvoice($patientId)
    {
        return $this->bookingRepository->gettingPatientInvoices($patientId)->paginate(10);
    }
}