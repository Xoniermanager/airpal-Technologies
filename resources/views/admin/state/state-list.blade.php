
<div id="state_list" class="card-body">
    <div class="table-responsive">
        <table class="table table-hover table-center mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allStates as $state)
                <tr>
                    <td>{{ $state['id'] }}</td>
                    <td>{{ $state['name'] }}</td>
                    <td>
                        <h2 class="table-avatar">
                            {{$state['country']['name']}}
                        </h2>
                    </td>
                    <td>
                        <div class="actions">
                            <a class="btn btn-sm bg-success-light" data-id ="{{$state['name']}}" data-bs-toggle="modal"href="#edit_state" onclick="edit_state('{{$state['name']}}','{{$state['id']}}','{{$state['country']['id']}}')">
                                <i class="fe fe-pencil"></i> Edit
                            </a>
                            <a data-bs-toggle="modal" href="#delete-state"
                                class="btn btn-sm bg-danger-light delete-state" data-id="{{$state['id']}}" onclick="state_delete('{{$state['id']}}')" >
                                <i class="fe fe-trash"></i> Delete
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
             
            </tbody>
        </table>
        <div class="mt-3 d-flex justify-content-end">
            {{ $allStates->links() }}
        </div>
    </div>
</div>
