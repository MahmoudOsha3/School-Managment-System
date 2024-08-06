<!-- delete_model -->
<div class="modal fade" id="delete{{ $question->id }}" tabindex="-1"
    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">
                    {{ trans('student.delete_quizee') }}</h4>
                <button type="button" class="close" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('question.destroy' , $question->id ) }}"
                    method="post">
                    @csrf
                    @method('delete')
                    <input type="text" name="name"
                        value="{{ $question->title }}"
                        class="form-control" disabled>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-dismiss="modal">{{ trans('site.close') }}</button>
                <button type="submit"
                    class="btn btn-danger">{{ trans('site.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
