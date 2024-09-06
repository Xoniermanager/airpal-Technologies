<div id="faqs_list" class="card-body">
    <div class="table-responsive">
        <table class="table table-hover table-center mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Address</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>Created_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($testimonialList as $key=> $testimonial)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $testimonial['title'] }}</td>
                    <td>{{ $testimonial['description'] }}</td>
                    <td>{{ $testimonial['address'] }}</td>
                    <td><img src="{{ $testimonial['image'] }}"  width="40px"></td>
                    <td>{{ $testimonial['status'] }}</td>
                    <td>{{ $testimonial['created_at']->format('d/m/Y') }}</td>
                    <td>
                        <div class="actions">
                            <a class="btn btn-sm bg-success-light"  href="{{ route('admin.edit.testimonial.form', [ 'id' => $testimonial['id']] ) }} ">
                                <i class="fe fe-pencil"></i> Edit
                            </a>
                            <a href="{{ route('admin.delete.testimonial.form', [ 'id' => $testimonial['id']] ) }} "
                                class="btn btn-sm bg-danger-light delete-faqs">
                                <i class="fe fe-trash"></i> Delete
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                    
                @endforelse

             
            </tbody>
        </table>
        <div class="mt-3 d-flex justify-content-end">
            {{ $testimonialList->links() }}
        </div>
    </div>
</div>
