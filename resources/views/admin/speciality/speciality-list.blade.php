
<div id="speciality_list" class="card-body">
    <div class="table-responsive">
        <table class=" table table-hover table-center mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Specialities</th>
                    <th>Description</th>
                    <th>Create At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($specialities as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>
                        <h2 class="table-avatar">
                            <a href="" class="avatar avatar-sm me-2">
                                <img class="avatar-img"
                                    src="{{ asset('admin/specialization_image/' . $data->image_url) }}"
                                    onerror="this.src='{{asset('assets/img/doctors/doctor-thumb-01.jpg')}}';" 
                                    alt="img">
                            </a>
                            {{$data->name}}
                        </h2>
                    </td>
                    <td>{{ $data->description }}</td>

                    <td>{{ $data->created_at->format('d/m/Y') }}</td>
                    <td>
                        <div class="actions">
                            <a class="btn btn-sm bg-success-light" data-id ="{{$data->id}}" data-bs-toggle="modal"href="#edit_specialities_details" onclick="edit_speciality('{{$data->name}}','{{$data->description}}','{{$data->image_url}}','{{$data->id}}')">
                                <i class="fe fe-pencil"></i> Edit
                            </a>
                            <a data-bs-toggle="modal" href="#delete_modal"
                                class="btn btn-sm bg-danger-light delete-specialities" data-id="{{$data->id}}" >
                                <i class="fe fe-trash"></i> Delete
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3 d-flex justify-content-end">
            {{ $specialities->links() }}
        </div>
    </div>
</div>
