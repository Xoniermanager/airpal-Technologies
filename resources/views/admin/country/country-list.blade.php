
<div id="country_list" class="card-body">
    <div class="table-responsive">
        <table class="table table-hover table-center mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Country</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($countries as $country)
                <tr>
                    <td>{{ $country->id }}</td>
                    <td>
                        <h2 class="table-avatar">
                            {{-- <a href="{{ route('admin.profile.index') }}" class="avatar avatar-sm me-2">
                                <img class="avatar-img"
                                    src="{{ asset('admin/specialization_image/' . $data->image_url) }}"
                                    alt="img">
                            </a> --}}
                            {{$country->name}}
                        </h2>
                    </td>
                    <td>
                        <div class="actions">
                            <a class="btn btn-sm bg-success-light" data-id ="{{$country->id}}" data-bs-toggle="modal"href="#edit_country" onclick="edit_country('{{$country->name}}','{{$country->id}}')">
                                <i class="fe fe-pencil"></i> Edit
                            </a>
                            <a data-bs-toggle="modal" href="#delete_country"
                                class="btn btn-sm bg-danger-light delete-country" data-id="{{$country->id}}" onclick="country_delete('{{$country->id}}')" >
                                <i class="fe fe-trash"></i> Delete
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3 d-flex justify-content-end">
            {{ $countries->links() }}
        </div>

    </div>
</div>
