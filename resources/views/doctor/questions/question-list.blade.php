<div id="question_list" class="card-body">
    <div class="table-responsive">
        <table class="table table-hover table-center mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    {{-- <th>Doctor Name</th> --}}
                    <th>Specialty</th>
                    <th>Answer Type</th>
                    <th>Question</th>
                    <th>Created_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($allQuestions as $question)
                    <tr>
                        <td>{{ $question['id'] }}</td>
                        {{-- <td>{{ $question->user->fullName }}</td> --}}
                        <td>{{ $question->specialty->name }}</td>
                        <td>{{ $question['answer_type'] }}</td>
                        <td>{{ $question['question'] }}</td>
                        <td>{{ $question['created_at']->format('d/m/Y') }}</td>
                        <td>
                            <div class="actions">
                                <a class="btn btn-sm bg-success-light" data-bs-toggle="modal" data-bs-toggle="modal" data-bs-target="#edit_question" data-bs-original-title="" title=""
 
                                    onclick="edit_question('{{ $question->id }}')">
                                    <i class="fe fe-pencil"></i> Edit
                                </a>
                                <a data-bs-toggle="modal" href="#delete-question"
                                    class="btn btn-sm bg-danger-light delete-question" data-id="{{ $question['id'] }}">
                                    <i class="fe fe-trash"></i> Delete
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty

                    <tr>
                        <td>Not Found</td>
                    </tr>

    @endforelse

            </tbody>
        </table>
        <div class="mt-3 d-flex justify-content-end">
            {{ $allQuestions->links() }}
        </div>


    </div>
</div>

<script>


    </script>