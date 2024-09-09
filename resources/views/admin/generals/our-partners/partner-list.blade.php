<div id="partner_list" class="card-body">
    <div class="table-responsive">
        <table class="table table-hover table-center mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>logo</th>
                    <th>created_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allPartners as $partner)
                <tr>
                    <td>{{ $partner['id'] }}</td>
                    <td><img src="{{ $partner['image'] ?? '' }}" width="33px"></td>
                    <td>{{ $partner['created_at']->format('d/m/Y') }}</td>
                    <td>
                        <div class="actions">
                            {{-- <a class="btn btn-sm bg-success-light" data-id ="{{$partner['name']}}" data-bs-toggle="modal"href="#edit_partner" onclick="edit_partner('{{ $partner['id'] }}','{{ $partner['name']}}','{{ $partner['description'] }}')">
                                <i class="fe fe-pencil"></i> Edit
                            </a> --}}
                            <a data-bs-toggle="modal" href="#delete-partners"
                                class="btn btn-sm bg-danger-light delete-partners" data-id="{{$partner['id']}}" >
                                <i class="fe fe-trash"></i> Delete
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
             
            </tbody>
        </table>
        <div class="mt-3 d-flex justify-content-end">
            {{ $allPartners->links() }}
        </div>
    </div>
</div>
