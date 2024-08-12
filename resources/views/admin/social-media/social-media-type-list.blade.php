
<div id="social_media_type_list" class="card-body">
    <div class="table-responsive">
        <table class="table table-hover table-center mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Social Media Type</th>
                    <th>Created at</th>
                    <th class="text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($socialMediaTypes as $socialMediaType)
                <tr>
                    <td>{{ $socialMediaType->id }}</td>
                    <td>
                        <h2 class="table-avatar">
                            {{ $socialMediaType->name }}
                        </h2>
                    </td>
                    <td>{{ $socialMediaType->created_at->format('d/m/Y') }}</td>
                    <td class="text-right">
                        <div class="actions">
                            <a class="btn btn-sm bg-success-light" data-id ="{{$socialMediaType->id}}" data-bs-toggle="modal"href="#edit_social_media_type" onclick="edit_social_media_type('{{$socialMediaType->name}}','{{$socialMediaType->id}}')">
                                <i class="fe fe-pencil"></i> Edit
                            </a>
                            <a data-bs-toggle="modal" href="#delete_social_media_type"
                                class="btn btn-sm bg-danger-light delete_social_media_type" data-id="{{ $socialMediaType->id }}" onclick="social_media_type_delete('{{ $socialMediaType->id }}')" >
                                <i class="fe fe-trash"></i> Delete
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <div class="mt-3 d-flex justify-content-end">
            {{ $socialMediaTypes->links() }}
        </div>

    </div>
</div>
<style>
    .text-right {
        text-align: right;
    }
   
</style>