<div id="social_media_account_list" class="card-body">
    <div class="table-responsive">
        <table class="table table-hover table-center mb-0 question-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Account-Type</th>
                    <th>Link</th>
                    <th>status</th>
                    <th>created_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($socialMediaAccounts as $socialMediaAccount)
                    <tr>
                        <td>{{ $socialMediaAccount['id'] }}</td>
                        <td>{{ $socialMediaAccount->socialMediaAccountType->name }}</td>
                        <td>{{ $socialMediaAccount['link'] }}</td>
                        <td>{{ $socialMediaAccount['status'] == 1 ? 'Active' : 'DeActive' }}</td>
                        <td> {{ date('j M Y', strtotime($socialMediaAccount['created_at'] )) ?? '' }} </td>
                        <td>
                            <div class="actions">
                                <a class="btn btn-sm bg-success-light" data-id =""
                                    data-bs-toggle="modal"href="#edit_account"
                                    onclick="edit_account('{{ $socialMediaAccount }}')">
                                    <i class="fe fe-pencil"></i> Edit
                                </a>
                                <a data-bs-toggle="modal" href="#delete-account"
                                    class="btn btn-sm bg-danger-light delete-account"
                                    data-id="{{ $socialMediaAccount['id'] }}">
                                    <i class="fe fe-trash"></i> Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td> Record Not Found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
