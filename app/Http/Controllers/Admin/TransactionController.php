<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //   
    
public function transactionsList()
{
  return view('admin.transactions-list');
  
}
}