<!DOCTYPE html>
<html lang="en">
<head>
@include('admin.include.head')
</head>
<body>
    <div class="main-wrapper">
    @include('admin.include.header')
        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Transactions</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item active">Transactions</li>
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
                                                <th>Invoice Number</th>
                                                <th>Patient ID</th>
                                                <th>Patient Name</th>
                                                <th>Total Amount</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><a href="{{ route('admin.invoice.index') }}">#IN0001</a></td>
                                                <td>#PT001</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{ route('admin.profile.index') }}" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient1.jpg"
                                                                alt="User Image"></a>
                                                        <a href="{{ route('admin.profile.index') }}">Charlene Reed </a>
                                                    </h2>
                                                </td>
                                                <td>$100.00</td>
                                                <td>
                                                    <span class="badge rounded-pill bg-success inv-badge">Paid</span>
                                                </td>
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
                                                <td><a href="{{ route('admin.invoice.index') }}">#IN0002</a></td>
                                                <td>#PT002</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{ route('admin.profile.index') }}" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient2.jpg"
                                                                alt="User Image"></a>
                                                        <a href="{{ route('admin.profile.index') }}">Travis Trimble </a>
                                                    </h2>
                                                </td>
                                                <td>$200.00</td>
                                                <td>
                                                    <span class="badge rounded-pill bg-success inv-badge">Paid</span>
                                                </td>
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
                                                <td><a href="{{ route('admin.invoice.index') }}">#IN0003</a></td>
                                                <td>#PT003</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{ route('admin.profile.index') }}" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient3.jpg"
                                                                alt="User Image"></a>
                                                        <a href="{{ route('admin.profile.index') }}">Carl Kelly</a>
                                                    </h2>
                                                </td>
                                                <td>$250.00</td>
                                                <td>
                                                    <span class="badge rounded-pill bg-success inv-badge">Paid</span>
                                                </td>
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
                                                <td><a href="{{ route('admin.invoice.index') }}">#IN0004</a></td>
                                                <td>#PT004</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{ route('admin.profile.index') }}" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient4.jpg"
                                                                alt="User Image"></a>
                                                        <a href="{{ route('admin.profile.index') }}"> Michelle Fairfax</a>
                                                    </h2>
                                                </td>
                                                <td>$150.00</td>
                                                <td>
                                                    <span class="badge rounded-pill bg-success inv-badge">Paid</span>
                                                </td>
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
                                                <td><a href="{{ route('admin.invoice.index') }}">#IN0005</a></td>
                                                <td>#PT005</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{ route('admin.profile.index') }}" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient5.jpg"
                                                                alt="User Image"></a>
                                                        <a href="{{ route('admin.profile.index') }}">Gina Moore</a>
                                                    </h2>
                                                </td>
                                                <td>$350.00</td>
                                                <td>
                                                    <span class="badge rounded-pill bg-success inv-badge">Paid</span>
                                                </td>
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
                                                <td><a href="{{ route('admin.invoice.index') }}">#IN0006</a></td>
                                                <td>#PT006</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{ route('admin.profile.index') }}" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient6.jpg"
                                                                alt="User Image"></a>
                                                        <a href="{{ route('admin.profile.index') }}">Elsie Gilley</a>
                                                    </h2>
                                                </td>
                                                <td>$300.00</td>
                                                <td>
                                                    <span class="badge rounded-pill bg-success inv-badge">Paid</span>
                                                </td>
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
                                                <td><a href="{{ route('admin.invoice.index') }}">#IN0007</a></td>
                                                <td>#PT007</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{ route('admin.profile.index') }}" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient7.jpg"
                                                                alt="User Image"></a>
                                                        <a href="{{ route('admin.profile.index') }}"> Joan Gardner</a>
                                                    </h2>
                                                </td>
                                                <td>$250.00</td>
                                                <td>
                                                    <span class="badge rounded-pill bg-success inv-badge">Paid</span>
                                                </td>
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
                                                <td><a href="{{ route('admin.invoice.index') }}">#IN0008</a></td>
                                                <td>#PT008</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{ route('admin.profile.index') }}" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient8.jpg"
                                                                alt="User Image"></a>
                                                        <a href="{{ route('admin.profile.index') }}"> Daniel Griffing</a>
                                                    </h2>
                                                </td>
                                                <td>$150.00</td>
                                                <td>
                                                    <span class="badge rounded-pill bg-success inv-badge">Paid</span>
                                                </td>
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
                                                <td><a href="{{ route('admin.invoice.index') }}">#IN0009</a></td>
                                                <td>#PT009</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{ route('admin.profile.index') }}" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient9.jpg"
                                                                alt="User Image"></a>
                                                        <a href="{{ route('admin.profile.index') }}">Walter Roberson</a>
                                                    </h2>
                                                </td>
                                                <td>$100.00</td>
                                                <td>
                                                    <span class="badge rounded-pill bg-success inv-badge">Paid</span>
                                                </td>
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
                                                <td><a href="{{ route('admin.invoice.index') }}">#IN0010</a></td>
                                                <td>#PT010</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="{{ route('admin.profile.index') }}" class="avatar avatar-sm me-2"><img
                                                                class="avatar-img rounded-circle"
                                                                src="assets/img/patients/patient10.jpg"
                                                                alt="User Image"></a>
                                                        <a href="{{ route('admin.profile.index') }}">Robert Rhodes </a>
                                                    </h2>
                                                </td>
                                                <td>$120.00</td>
                                                <td>
                                                    <span class="badge rounded-pill bg-success inv-badge">Paid</span>
                                                </td>
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
    @include('admin.include.footer')