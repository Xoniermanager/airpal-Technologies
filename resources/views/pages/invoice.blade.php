<!DOCTYPE html>
<html lang="zxx">
<head>
@include('include.head')
</head>
<body>
    <div class="main-wrapper">
    @include('include.header')
<div class="breadcrumb-bar-two">
<div class="container">
<div class="row align-items-center inner-banner">
<div class="col-md-12 col-12 text-center">
<h2 class="breadcrumb-title">Invoice View</h2>
<nav aria-label="breadcrumb" class="page-breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page">Invoice View</li>
</ol>
</nav>
</div>
</div>
</div>
</div>


<div class="content">
<div class="container">
<div class="row">
<div class="col-lg-8 offset-lg-2">
<div class="invoice-content">
<div class="invoice-item">
<div class="row">
<div class="col-md-6">
<div class="invoice-logo">
<img src="{{URL::asset('assets/img/logo.png')}}" alt="logo">
</div>
</div>
<div class="col-md-6">
<p class="invoice-details">
<strong>Order:</strong> #00124 <br>
<strong>Issued:</strong> 20/07/2024
</p>
</div>
</div>
</div>

<div class="invoice-item">
<div class="row">
<div class="col-md-6">
<div class="invoice-info">
<strong class="customer-text">Invoice From</strong>
<p class="invoice-details invoice-details-two">
Dr. Darren Elder <br>
806 Twin Willow Lane, Old Forge,<br>
Newyork, USA <br>
</p>
</div>
</div>
<div class="col-md-6">
<div class="invoice-info invoice-info2">
<strong class="customer-text">Invoice To</strong>
<p class="invoice-details">
Walter Roberson <br>
299 Star Trek Drive, Panama City, <br>
Florida, 32405, USA <br>
</p>
</div>
</div>
</div>
</div>


<div class="invoice-item">
<div class="row">
<div class="col-md-12">
<div class="invoice-info">
<strong class="customer-text">Payment Method</strong>
<p class="invoice-details invoice-details-two">
Physical Payment
</p>
</div>
</div>
</div>
</div>


<div class="invoice-item invoice-table-wrap">
<div class="row">
<div class="col-md-12">
<div class="table-responsive">
<table class="invoice-table table table-bordered">
<thead>
<tr>
<th>Description</th>
<th class="text-center">Quantity</th>
<th class="text-center">VAT</th>
<th class="text-end">Total</th>
</tr>
</thead>
<tbody>
<tr>
<td>General Consultation</td>
<td class="text-center">1</td>
<td class="text-center">$0</td>
<td class="text-end">$100</td>
</tr>
<tr>
<td>Video Call Booking</td>
<td class="text-center">1</td>
<td class="text-center">$0</td>
<td class="text-end">$250</td>
</tr>
</tbody>
</table>
</div>
</div>
<div class="col-md-6 col-xl-4 ms-auto">
<div class="table-responsive">
<table class="invoice-table-two table">
<tbody>
<tr>
<th>Subtotal:</th>
<td><span>$350</span></td>
</tr>
<tr>
<th>Discount:</th>
<td><span>-10%</span></td>
</tr>
<tr>
<th>Total Amount:</th>
<td><span>$315</span></td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
 

</div>
</div>
</div>
</div>
</div>

@include('include.footer') 