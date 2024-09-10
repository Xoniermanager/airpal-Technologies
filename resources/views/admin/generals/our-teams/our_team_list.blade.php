<div id="faqs_list" class="card-body">
    <div class="table-responsive">
        <table class="table table-hover table-center mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Address</th>
                    <th>Status</th>
                    <th>Created_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @isset($ourTeams)
                @forelse ($ourTeams as $key=> $ourTeam) 
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td><img src="{{ $ourTeam['image'] ?? '' }}"  width="40px"></td>
                    <td>{{ $ourTeam['title'] }}</td>
                    <td> {!! Str::limit($ourTeam['description'], 30, ' ...') !!}</td>
                    <td>{{ $ourTeam['address'] }}</td>
                    <td>{{ $ourTeam['status'] }}</td>
                    <td>{{ $ourTeam['created_at']->format('d/m/Y') }}</td>
                    <td>
                        <div class="actions">
                            <a class="btn btn-sm bg-success-light"  href="{{ route('admin.edit.our-team.form', [ 'id' => $ourTeam['id']] ) }} ">
                                <i class="fe fe-pencil"></i> Edit
                            </a>
                            <a href="#" 
                            data-url="{{ route('admin.delete.our-team.form', ['id' => $ourTeam['id']]) }}" 
                            class="btn btn-sm bg-danger-light delete-btn">
                             <i class="fe fe-trash"></i> Delete
                         </a>
                         
                        </div>
                    </td>
                </tr>
                @empty
                    
                @endforelse
                @endisset

             
            </tbody>
        </table>
        <div class="mt-3 d-flex justify-content-end">
            {{-- {{ $ourTeamList->links() }} --}}
        </div>
    </div>
</div>
