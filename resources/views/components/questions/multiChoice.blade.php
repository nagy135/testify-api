<div class="multi-choice">
    <h3>Options</h3>
    <div class="row">
        <div class="col-3">
            <label for="multi-choice-question">Question</label>
        </div>
        <div class="col-9">
            <input type="text" name="multi-choice-question" id="multi-choice-question"/>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <label for="multi-choice-points">Points</label>
        </div>
        <div class="col-2">
            <input type="number" name="multi-choice-points" id="multi-choice-points"/>
        </div>
    </div>
    <h3>Answers</h3>
    <div class="multi-choice-answers">
        <div class="multi-choice-answer-wrapper">
            <div class="row">
                <div class="col-6">
                    <input type="text" name="multi-choice-answer" class="multi-choice-answer"/>
                </div>
                <div class="col-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="multi-choice-answers" type="radio" id="multi-choice-answer-yes" value="yes" checked>
                        <label class="form-check-label" for="multi-choice-answer-yes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" name="multi-choice-answers" type="radio" id="multi-choice-answer-no" value="no">
                        <label class="form-check-label" for="multi-choice-answer-no">No</label>
                    </div>
                </div>
                <div class="col-3">
                    <button class="btn btn-error remove-multi-choice-answer">Delete</button>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <div>
        <button class="btn btn-primary" id="add-another-multi-choice-answer">Add another</button>
    </div>
</div>
