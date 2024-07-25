<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoiceReportController extends Controller
{
    
public function invoiceReport()
{
  return view('admin.invoice-report');
}
public function invoice()
{
  return view('admin.invoice');
}
}
