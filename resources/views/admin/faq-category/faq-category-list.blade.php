<div id="faqs_category_list" class="card-body">
    <div class="table-responsive">
        <table class="table table-hover table-center mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Created_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($faqCategories as $faqCategory)
                <tr>
                    <td>{{ $faqCategory['id'] }}</td>
                    <td>{{ $faqCategory['name'] }}</td>
                    <td>{{ $faqCategory['status']}}</td>
                    <td>{{ $faqCategory['created_at']->format('d/m/Y') }}</td>
                    <td>
                        <div class="actions">
                            <a class="btn btn-sm bg-success-light" data-id ="{{$faqCategory['name']}}" data-bs-toggle="modal"href="#edit_faq_category" onclick="edit_faq_category('{{ $faqCategory['id'] }}','{{ $faqCategory['name']}}')">
                                <i class="fe fe-pencil"></i> Edit
                            </a>
                            <a data-bs-toggle="modal" href="#delete-faq-category"
                                class="btn btn-sm bg-danger-light delete-faqs" data-id="{{$faqCategory['id']}}" >
                                <i class="fe fe-trash"></i> Delete
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
             
            </tbody>
        </table>
        <div class="mt-3 d-flex justify-content-end">
            {{ $faqCategories->links() }}
        </div>
    </div>
</div>
