<div id="faqs_list" class="card-body">
    <div class="table-responsive">
        <table class="table table-hover table-center mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>name</th>
                    <th>description</th>
                    <th>created_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allFaqs as $faqs)
                <tr>
                    <td>{{ $faqs['id'] }}</td>
                    <td>{{ $faqs['name'] }}</td>
                    <td>{{ $faqs['description'] }}</td>
                    <td>{{ $faqs['created_at']->format('d/m/Y') }}</td>
                    <td>
                        <div class="actions">
                            <a class="btn btn-sm bg-success-light" data-id ="{{$faqs['name']}}" data-bs-toggle="modal"href="#edit_faqs" onclick="edit_faqs('{{ $faqs['id'] }}','{{ $faqs['name']}}','{{ $faqs['description'] }}')">
                                <i class="fe fe-pencil"></i> Edit
                            </a>
                            <a data-bs-toggle="modal" href="#delete-faqs"
                                class="btn btn-sm bg-danger-light delete-faqs" data-id="{{$faqs['id']}}" >
                                <i class="fe fe-trash"></i> Delete
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
             
            </tbody>
        </table>
        <div class="mt-3 d-flex justify-content-end">
            {{-- {{ $allFaqs->links() }} --}}
        </div>
    </div>
</div>
