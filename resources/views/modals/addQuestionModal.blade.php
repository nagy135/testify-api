<div id="add-question-modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body question-type-creators">
                @include('components.questions.questionAnswer')
                @include('components.questions.dragJoin')
                @include('components.questions.image')
                @include('components.questions.multiChoice')
                @include('components.questions.yesNo')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary add-question-save">Save Question</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
