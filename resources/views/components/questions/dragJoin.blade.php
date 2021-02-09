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
    <div id="drag-join-accordion">
        <div class="card">
            <div class="card-header" id="drag-join-questions-heading">
                <h5 class="mb-0">
                    <button class="btn btn-link drag-join-collapse accordion-button" data-toggle="collapse" data-target="#drag-join-collapse-questions" aria-expanded="true" aria-controls="drag-join-collapse-questions">
                        Questions
                    </button>
                </h5>
            </div>
            <div id="drag-join-collapse-questions" class="collapse show" aria-labelledby="drag-join-questions-heading" data-parent="#drag-join-accordion">
                <div class="card-body">
                    <h3>Questions</h3>
                    <div class="drag-join-questions">
                        <div class="drag-join-question-wrapper">
                            <div class="row">
                                <div class="col-md-1 col-sm-12">
                                    <strong class='drag-join-question-label'>#1</strong>
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <input type="text" name="drag-join-question-text" class="drag-join-question-text"/>
                                </div>
                                <div class="col-md-4 col-sm-10">
                                    <input type="file" name="drag-join-question-image" class="drag-join-question-image"/>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <button class="btn btn-error remove-drag-join-question">X</button>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary" id="add-another-drag-join-question">Add another Question</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="drag-join-answers-heading">
                <h5 class="mb-0">
                    <button class="btn btn-link drag-join-collapse collapsed" data-toggle="collapse" data-target="#drag-join-collapse-answers" aria-expanded="false" aria-controls="drag-join-collapse-answers">
                        Answers
                    </button>
                </h5>
            </div>
            <div id="drag-join-collapse-answers" class="collapse" aria-labelledby="drag-join-answers-heading" data-parent="#drag-join-accordion">
                <div class="card-body">
                    <h3>Answers</h3>
                    <div class="drag-join-answers">
                        <div class="drag-join-answer-wrapper">
                            <div class="row">
                                <div class="col-md-1 col-sm-12">
                                    <strong class='drag-join-answer-label'>#1</strong>
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <input type="text" name="drag-join-answer-text" class="drag-join-answer-text"/>
                                </div>
                                <div class="col-md-4 col-sm-10">
                                    <input type="file" name="drag-join-answer-image" class="drag-join-answer-image"/>
                                </div>
                                <div class="col-md-2 col-sm-2">
                                    <button class="btn btn-error remove-drag-join-answer">X</button>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary" id="add-another-drag-join-answer">Add another Question</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="drag-join-joins-heading">
                <h5 class="mb-0">
                    <button class="btn btn-link drag-join-collapse collapsed" data-toggle="collapse" data-target="#drag-join-collapse-joins" aria-expanded="false" aria-controls="drag-join-collapse-joins">
                        Joins
                    </button>
                </h5>
            </div>
            <div id="drag-join-collapse-joins" class="collapse" aria-labelledby="drag-join-joins-heading" data-parent="#drag-join-accordion">
                <div class="card-body">
                    <h3>Joins</h3>
                    <div class="drag-join-joins">
                        <div class="drag-join-join-wrapper">
                            <div class="row">
                                <div class="col-md-1 col-sm-12">
                                    <strong class='drag-join-join-label'>#1</strong>
                                </div>
                                <div class="col-md-5 col-sm-12">
                                    <input class="form-control form-control-sm drag-join-question-join" type="text" name="drag-join-question-join" readonly/>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <select class="form-control form-control-sm drag-join-answer-join" name="drag-join-answer-join" multiple size="3">
                                    </select>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
