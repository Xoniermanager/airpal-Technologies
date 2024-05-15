<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctordashboardController extends Controller
{
    // 
    public function doctorDashboard()
    {
      return view('doctor.doctor-dashboard');
      
    } 
      
    public function doctorAccounts()
    {
      return view('doctor.doctor-accounts');
      
    }
    public function doctorTiming()
    {
      return view('doctor.doctor-timing');
      
    } 
    public function doctorAppointmentDetails()
    {
    return view('doctor.doctor-appointment-details');

    }    
    public function doctorAppointments()
    {
    return view('doctor.doctor-appointments');

    } 

    public function doctorProfile()
    {
    return view('doctor.doctor-profile');
    } 
    public function doctorChangepass()
    {
    return view('doctor.doctor-change-password');
    } 
    public function doctorRequest()
    {
    return view('doctor.doctor-request');
    } 
    public function doctorSpecialities()
    {
    return view('doctor.doctor-specialities');
    } 
    public function doctorInvoices()
    {
    return view('doctor.doctor-invoices');
    } 

    public function doctorReviews()
    {
    return view('doctor.doctor-reviews');
    } 

    public function doctorSocial()
    {
    return view('doctor.doctor-social');
    } 

    public function doctorPatient()
    {
    return view('doctor.doctor-patients');
    } 

    




}
