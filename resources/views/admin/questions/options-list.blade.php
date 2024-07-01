<div id="question_options_list" class="card-body">
    <div class="table-responsive">
        <table class="table table-hover table-center mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>question options</th>
                    <th>Created_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($allQuestionOptions as $question_option)
                    <tr>
                        <td>{{ $question_option['id'] }}</td>
                        <td>{{ $question_option['question_id'] }}</td>
                        <td>{{ $question_option['options'] }}</td>
                        <td>{{ $question_option['created_at']->format('d/m/Y') }}</td>
                        <td>
                            <div class="actions">
                                <a class="btn btn-sm bg-success-light" data-id ="{{ $question_option['name'] }}"
                                    data-bs-toggle="modal"href="#edit_question_option"
                                    onclick="edit_question_option('{{ $question_option }}')">
                                    <i class="fe fe-pencil"></i> Edit
                                </a>
                                <a data-bs-toggle="modal" href="#delete-question-options"
                                    class="btn btn-sm bg-danger-light delete-question-options" data-id="{{ $question_option['id'] }}">
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
            {{-- {{ $allquestion_option->links() }} --}}
        </div>
    </div>
</div>
