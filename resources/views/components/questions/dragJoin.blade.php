<div class="drag-join">
    <h3>Options</h3>
    <div class="row">
        <div class="col-3">
            <label for="drag-join-description">Description</label>
        </div>
        <div class="col-9">
            <input type="text" name="drag-join-description" id="drag-join-description"/>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <label for="drag-join-points">Points</label>
        </div>
        <div class="col-2">
            <input type="number" name="drag-join-points" id="drag-join-points"/>
        </div>
    </div>
    <h3>Questions</h3>
    <div class="drag-join-questions">
        <div class="drag-join-question-wrapper">
            <div class="row">
                <div class="col-3">
                    <strong class='drag-join-question-label'>#1</strong>
                </div>
            </div>
            <div class="row">
                <div class="col-9">
                    <input type="text" name="drag-join-question-text" class="drag-join-question-text"/>
                </div>
            </div>
            <div class="row">
                <div class="col-9">
                    <input type="file" name="drag-join-question-image" class="drag-join-question-image"/>
                </div>
                <div class="col-3">
                    <button class="btn btn-error remove-drag-join-question">Delete</button>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <div>
        <button class="btn btn-primary" id="add-another-drag-join-question">Add another Question</button>
    </div>
    <hr>
    <h3>Answers</h3>
    <div class="drag-join-answers">
        <div class="drag-join-answer-wrapper">
            <div class="row">
                <div class="col-3">
                    <strong class='drag-join-answer-label'>#1</strong>
                </div>
            </div>
            <div class="row">
                <div class="col-9">
                    <input type="text" name="drag-join-answer-text" class="drag-join-answer-text"/>
                </div>
            </div>
            <div class="row">
                <div class="col-9">
                    <input type="file" name="drag-join-answer-image" class="drag-join-answer-image"/>
                </div>
                <div class="col-3">
                    <button class="btn btn-error remove-drag-join-answer">Delete</button>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <div>
        <button class="btn btn-primary" id="add-another-drag-join-answer">Add another Question</button>
    </div>
</div>
