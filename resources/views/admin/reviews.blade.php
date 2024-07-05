@extends('layouts.admin.main')
@section('content')
 
        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Reviews</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Reviews</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="datatable table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>Patient Name</th>
                                                <th>Doctor Name</th>
                                                <th>Ratings</th>
                                                <th>Description</th>
                                                <th>Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient1.jpg"
                                                                alt=""></a>
                                                        <a href="">Charlene Reed </a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-01.jpg"
                                                                alt=""></a>
                                                        <a href="">Dr. Ruby Perrin</a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star-o text-secondary"></i>
                                                </td>
                                                <td>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                                </td>
                                                <td>3 Nov 2023 <br><small>09.59 AM</small></td>
                                                <td>
                                                    <div class="actions">
                                                        <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal"
                                                            href="#delete_modal">
                                                            <i class="fe fe-trash"></i> Delete
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient2.jpg"
                                                                alt=""></a>
                                                        <a href="">Travis Trimble </a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-02.jpg"
                                                                alt=""></a>
                                                        <a href="">Dr. Darren Elder</a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star-o text-secondary"></i>
                                                </td>
                                                <td>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                                </td>
                                                <td>2 Nov 2023<br> <small>08.50 AM</small></td>
                                                <td>
                                                    <div class="actions">
                                                        <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal"
                                                            href="#delete_modal">
                                                            <i class="fe fe-trash"></i> Delete
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient3.jpg"
                                                                alt=""></a>
                                                        <a href="">Carl Kelly</a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-03.jpg"
                                                                alt=""></a>
                                                        <a href="">Dr. Deborah Angel</a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star-o text-secondary"></i>
                                                </td>
                                                <td>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                                </td>
                                                <td>1 Nov 2023<br> <small>02.59 PM</small></td>
                                                <td>
                                                    <div class="actions">
                                                        <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal"
                                                            href="#delete_modal">
                                                            <i class="fe fe-trash"></i> Delete
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient4.jpg"
                                                                alt=""></a>
                                                        <a href=""> Michelle Fairfax</a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-04.jpg"
                                                                alt=""></a>
                                                        <a href="">Dr. Sofia Brient</a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star-o text-secondary"></i>
                                                </td>
                                                <td>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                                </td>
                                                <td>27 Sep 2023 <br><small>03.40 PM</small></td>
                                                <td>
                                                    <div class="actions">
                                                        <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal"
                                                            href="#delete_modal">
                                                            <i class="fe fe-trash"></i> Delete
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient5.jpg"
                                                                alt=""></a>
                                                        <a href="">Gina Moore</a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-05.jpg"
                                                                alt=""></a>
                                                        <a href="">Dr. Marvin Campbell</a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star-o text-secondary"></i>
                                                </td>
                                                <td>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                                </td>
                                                <td>24 Sep 2023 <br><small>04.38 PM</small></td>
                                                <td>
                                                    <div class="actions">
                                                        <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal"
                                                            href="#delete_modal">
                                                            <i class="fe fe-trash"></i> Delete
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient6.jpg"
                                                                alt=""></a>
                                                        <a href="">Elsie Gilley</a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-06.jpg"
                                                                alt=""></a>
                                                        <a href="">Dr. Katharine Berthold</a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star-o text-secondary"></i>
                                                </td>
                                                <td>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                                </td>
                                                <td>22 Aug 2023 <br><small>01.50 PM</small></td>
                                                <td>
                                                    <div class="actions">
                                                        <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal"
                                                            href="#delete_modal">
                                                            <i class="fe fe-trash"></i> Delete
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient7.jpg"
                                                                alt=""></a>
                                                        <a href="">Joan Gardner</a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-07.jpg"
                                                                alt=""></a>
                                                        <a href="">Dr. Linda Tobin</a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star-o text-secondary"></i>
                                                </td>
                                                <td>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                                </td>
                                                <td>21 Jul 2023 <br><small>05.50 PM</small></td>
                                                <td>
                                                    <div class="actions">
                                                        <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal"
                                                            href="#delete_modal">
                                                            <i class="fe fe-trash"></i> Delete
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient8.jpg"
                                                                alt=""></a>
                                                        <a href="">Daniel Griffing</a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-08.jpg"
                                                                alt=""></a>
                                                        <a href="">Dr. Paul Richard</a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star-o text-secondary"></i>
                                                </td>
                                                <td>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                                </td>
                                                <td>16 Jun 2023 <br><small>04.50 PM</small></td>
                                                <td>
                                                    <div class="actions">
                                                        <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal"
                                                            href="#delete_modal">
                                                            <i class="fe fe-trash"></i> Delete
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient9.jpg"
                                                                alt=""></a>
                                                        <a href="">Walter Roberson</a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-09.jpg"
                                                                alt=""></a>
                                                        <a href="">Dr. John Gibbs</a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star-o text-secondary"></i>
                                                </td>
                                                <td>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                                </td>
                                                <td>11 Mar 2023 <br><small>05.55 PM</small></td>
                                                <td>
                                                    <div class="actions">
                                                        <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal"
                                                            href="#delete_modal">
                                                            <i class="fe fe-trash"></i> Delete
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient10.jpg"
                                                                alt=""></a>
                                                        <a href="">Harry Williams</a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/doctors/doctor-thumb-10.jpg"
                                                                alt=""></a>
                                                        <a href="">Dr. Olga Barlow</a>
                                                    </h2>
                                                </td>
                                                <td>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star text-warning"></i>
                                                    <i class="fe fe-star-o text-secondary"></i>
                                                </td>
                                                <td>
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit
                                                </td>
                                                <td>15 Feb 2023 <br><small>07.30 PM</small></td>
                                                <td>
                                                    <div class="actions">
                                                        <a class="btn btn-sm bg-danger-light" data-bs-toggle="modal"
                                                            href="#delete_modal">
                                                            <i class="fe fe-trash"></i> Delete
                                                        </a>
                                                    </div>
                                                </td>
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


        <div class="modal fade" id="delete_modal" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-content p-2">
                            <h4 class="modal-title">Delete</h4>
                            <p class="mb-4">Are you sure want to delete?</p>
                            <button type="button" class="btn btn-primary">Save </button>
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endsection