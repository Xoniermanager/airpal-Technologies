<div class="card-body">
    <div class="table-responsive">
        <div class="col-md-3 float-right">
            <div class="top-nav-search mb-3">
                <form>
                    <input type="text" class="form-control" placeholder="Search here">
                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
        <table class="datatable table table-hover table-center mb-0">
            <thead>
                <tr>
                    <th>Doctor Name</th>
                    <th>Speciality</th>
                    <th>Member Since</th>
                    <th>Earned</th>
                    <th>Account Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($doctors as $doctor)
                <tr>
                    <td>
                        <h2 class="table-avatar">
                            <a href="{{ route('admin.profile.index', ['user' => $doctor->id]) }}" class="avatar avatar-sm me-2"><img
                                    class="avatar-img rounded-circle"
                                    src="{{asset('images/'.$doctor->image_url)}}"
                                    alt=""
                                    onerror="this.src='{{asset('assets/img/doctors/doctor-thumb-01.jpg')}}';" 
                                    >
                                </a>
                            <a href="{{ route('admin.profile.index', ['user' => $doctor->id]) }}">{{$doctor->first_name}} {{$doctor->last_name}}</a>
                        </h2>
                    </td>
                    <td>
                        @forelse ($doctor->specializations as $specializaion)
                        <span>{{$specializaion->name}},</span>
                        @empty
                        <span>No Specialization available</span>
                        @endforelse</td>
                    <?php
                        $createdAt =  $doctor->created_at;
                        $date = new DateTime($createdAt);
                        $formattedDate = $date->format('d M Y');
                    ?>
                    <td>{{$formattedDate}} <br></td>
                    <td>$3100.00</td>
                    <td>
                        <div class="status-toggle">
                            <input type="checkbox" id="{{$doctor->id}}" class="check" checked>
                            <label for="{{$doctor->id}}" class="checktoggle">checkbox</label>
                        </div>
                    </td>
                    <td>
                        <a href="{{ route('admin.edit-doctor', ['user' => $doctor->id]) }}"><button class="btn btn-secondary">Edit</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3 d-flex justify-content-end">
            {{ $doctors->links() }}
        </div>
    </div>
</div> 