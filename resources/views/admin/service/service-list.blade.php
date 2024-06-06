
<div id="service_list" class="card-body">
    <div class="table-responsive">
        <table class="table table-hover table-center mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Service</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>
                        <h2 class="table-avatar">
                            {{$service->name}}
                        </h2>
                    </td>
                    <td>
                        <div class="actions">
                            <a class="btn btn-sm bg-success-light" data-id ="{{$service->id}}" data-bs-toggle="modal"href="#edit_service" onclick="edit_service('{{$service->name}}','{{$service->id}}')">
                                <i class="fe fe-pencil"></i> Edit
                            </a>
                            <a data-bs-toggle="modal" href="#delete_service"
                                class="btn btn-sm bg-danger-light delete-service" data-id="{{$service->id}}" >
                                <i class="fe fe-trash"></i> Delete
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-3 d-flex justify-content-end">
            {{{ $services->links() }}}
        </div>

    </div>
</div>
