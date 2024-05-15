<!DOCTYPE html>
<html lang="zxx">

<head>
@include('include.head')
</head>

<body>
 <div class="main-wrapper">
@include('patients.include.header')
<div class="breadcrumb-bar-two">
<div class="container">
<div class="row align-items-center inner-banner">
<div class="col-md-12 col-12 text-center">
<h2 class="breadcrumb-title">Favourites</h2>
<nav aria-label="breadcrumb" class="page-breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{ route('patients.patient-dashboard.index') }}">Home</a></li>
<li class="breadcrumb-item" aria-current="page">Favourites</li>
</ol>
</nav>
</div>
</div>
</div>
</div>


<div class="content doctor-content">
<div class="container">
<div class="row">

<div class="col-lg-4 col-xl-3 theiaStickySidebar">
@include('patients.include.sidebar')
</div>

<div class="col-lg-8 col-xl-9">
<div class="dashboard-header">
<h3>Favourites</h3>
<ul class="header-list-btns">
<li>
<div class="input-block dash-search-input">
<input type="text" class="form-control" placeholder="Search">
<span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
</div>
</li>
</ul>
</div>

<div class="row">
<div class="col-md-6 col-lg-4">
<div class="profile-widget patient-favour">
<div class="fav-head">
<a href="javascript:void(0)" class="fav-btn favourite-btn">
<span class="favourite-icon favourite"><i class="fa-solid fa-heart"></i></span>
</a>
<div class="doc-img"> 
<img class="img-fluid" alt="User Image" src="../assets/img/doctors/doctor-thumb-21.jpg">
 
</div>
<div class="pro-content">
<h3 class="title">
 Dr.Edalin Hendry 
<i class="fas fa-check-circle verified"></i>
</h3>
<p class="speciality">MDS - Periodontology and Oral Implantology, BDS</p>
<div class="rating">
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<span class="d-inline-block average-rating">5.0</span>
</div>
<ul class="available-info">
<li>
<span><i class="fa-solid fa-calendar-day"></i></span>Next Availability : 23 Mar 2024
</li>
<li>
<span><i class="fas fa-map-marker-alt"></i></span>Location : Newyork, USA
</li>
</ul>
<div class="last-book">
<p>Last Book on 21 Jan 2023</p>
</div>
</div>
</div>
<div class="fav-footer">
<div class="row row-sm"> 
<div class="col-md-12">
<a href="#" class="btn book-btn">Book Now</a>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-6 col-lg-4">
<div class="profile-widget patient-favour">
<div class="fav-head">
<a href="javascript:void(0)" class="fav-btn favourite-btn">
<span class="favourite-icon favourite"><i class="fa-solid fa-heart"></i></span>
</a>
<div class="doc-img"> 
<img class="img-fluid" alt="User Image" src="../assets/img/doctors/doctor-thumb-13.jpg">
 
</div>
<div class="pro-content">
<h3 class="title">
 Dr.Shanta Nesmith
<i class="fas fa-check-circle verified"></i>
</h3>
<p class="speciality">DO - Doctor of Osteopathic Medicine</p>
<div class="rating">
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star"></i>
<span class="d-inline-block average-rating">(35)</span>
</div>
<ul class="available-info">
<li>
<span><i class="fa-solid fa-calendar-day"></i></span>Next Availability : 27 Mar 2024
</li>
<li>
<span><i class="fas fa-map-marker-alt"></i></span>Location : Los Angeles, USA
</li>
</ul>
<div class="last-book">
<p>Last Book on 18 Jan 2023</p>
</div>
</div>
</div>
<div class="fav-footer">
<div class="row row-sm"> 
<div class="col-md-12">
<a href="#" class="btn book-btn">Book Now</a>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-6 col-lg-4">
<div class="profile-widget patient-favour">
<div class="fav-head">
<a href="javascript:void(0)" class="fav-btn favourite-btn">
<span class="favourite-icon favourite"><i class="fa-solid fa-heart"></i></span>
</a>
<div class="doc-img"> 
<img class="img-fluid" alt="User Image" src="../assets/img/doctors/doctor-thumb-14.jpg">
 
</div>
<div class="pro-content">
<h3 class="title">
 Dr.John Ewel 
<i class="fas fa-check-circle verified"></i>
</h3>
<p class="speciality">DPM - Doctor of Podiatric Medicine</p>
<div class="rating">
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star"></i>
<span class="d-inline-block average-rating">5.0</span>
</div>
<ul class="available-info">
<li>
<span><i class="fa-solid fa-calendar-day"></i></span>Next Availability : 02 Apr 2024
</li>
<li>
<span><i class="fas fa-map-marker-alt"></i></span>Location : Dallas, USA
</li>
</ul>
<div class="last-book">
<p>Last Book on 28 Jan 2023</p>
</div>
</div>
</div>
<div class="fav-footer">
<div class="row row-sm"> 
<div class="col-md-12">
<a href="#" class="btn book-btn">Book Now</a>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-6 col-lg-4">
<div class="profile-widget patient-favour">
<div class="fav-head">
<a href="javascript:void(0)" class="fav-btn favourite-btn">
<span class="favourite-icon favourite"><i class="fa-solid fa-heart"></i></span>
</a>
<div class="doc-img"> 
<img class="img-fluid" alt="User Image" src="../assets/img/doctors/doctor-thumb-15.jpg">
 
</div>
<div class="pro-content">
<h3 class="title">
 Dr.Susan Fenimore 
<i class="fas fa-check-circle verified"></i>
</h3>
<p class="speciality">BSG - Bachelor of Science in Genetic Counseling</p>
<div class="rating">
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star"></i>
<span class="d-inline-block average-rating">4.0</span>
</div>
<ul class="available-info">
<li>
<span><i class="fa-solid fa-calendar-day"></i></span>Next Availability : 11 Apr 2024
</li>
<li>
<span><i class="fas fa-map-marker-alt"></i></span>Location : Chicago, USA
</li>
</ul>
<div class="last-book">
<p>Last Book on 08 Feb 2023</p>
</div>
</div>
</div>
<div class="fav-footer">
<div class="row row-sm"> 
<div class="col-md-12">
<a href="#" class="btn book-btn">Book Now</a>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-6 col-lg-4">
<div class="profile-widget patient-favour">
<div class="fav-head">
<a href="javascript:void(0)" class="fav-btn favourite-btn">
<span class="favourite-icon favourite"><i class="fa-solid fa-heart"></i></span>
</a>
<div class="doc-img"> 
<img class="img-fluid" alt="User Image" src="../assets/img/doctors/doctor-thumb-16.jpg">
 
</div>
<div class="pro-content">
<h3 class="title">
 Dr.Juliet Rios
<i class="fas fa-check-circle verified"></i>
</h3>
<p class="speciality">ND - Doctor of Naturopathic Medicine</p>
<div class="rating">
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star"></i>
<span class="d-inline-block average-rating">5.0</span>
</div>
<ul class="available-info">
<li>
<span><i class="fa-solid fa-calendar-day"></i></span>Next Availability :18 Apr 2024
</li>
<li>
<span><i class="fas fa-map-marker-alt"></i></span>Location : Detroit, USA
</li>
</ul>
<div class="last-book">
<p>Last Book on 16 Feb 2023</p>
</div>
</div>
</div>
<div class="fav-footer">
<div class="row row-sm"> 
<div class="col-md-12">
<a href="#" class="btn book-btn">Book Now</a>
</div>
</div>
</div>
</div>
</div>
<div class="col-md-6 col-lg-4">
<div class="profile-widget patient-favour">
<div class="fav-head">
<a href="javascript:void(0)" class="fav-btn favourite-btn">
<span class="favourite-icon favourite"><i class="fa-solid fa-heart"></i></span>
</a>
<div class="doc-img"> 
<img class="img-fluid" alt="User Image" src="../assets/img/doctors/doctor-thumb-17.jpg">
 
</div>
<div class="pro-content">
<h3 class="title">
 Dr.Joseph Engels 
<i class="fas fa-check-circle verified"></i>
</h3>
<p class="speciality">BSPT - Bachelor of Science in Physical Therapy</p>
<div class="rating">
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star filled"></i>
<i class="fas fa-star"></i>
<span class="d-inline-block average-rating">4.0</span>
</div>
<ul class="available-info">
<li>
<span><i class="fa-solid fa-calendar-day"></i></span>Next Availability : 10 May 2024
</li>
<li>
<span><i class="fas fa-map-marker-alt"></i></span>Location : Las Vegas, USA
</li>
</ul>
<div class="last-book">
<p>Last Book on 08 Mar 2023</p>
</div>
</div>
</div>
<div class="fav-footer">
<div class="row row-sm"> 
<div class="col-md-12">
<a href="#" class="btn book-btn">Book Now</a>
</div>
</div>
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