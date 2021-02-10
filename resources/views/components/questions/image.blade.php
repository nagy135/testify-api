<div class="image">
    <h3>Options</h3>
    <div class="row">
        <div class="col-3">
            <label for="image-image">Image</label>
        </div>
        <div class="col-9">
            <input type="file" name="image-image" id="image-image"/>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <label for="image-file">Description</label>
        </div>
        <div class="col-9">
            <input type="text" name="image-description" id="image-description"/>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <label for="image-points">Points</label>
        </div>
        <div class="col-2">
            <input type="number" name="image-points" id="image-points"/>
        </div>
    </div>
    <h3>Subquestions</h3>
    <div class="subquestions">
        <div class="subquestion">
            <div class="row">
                <div class="col-3">
                    <label for="image-subquestion-question">Question</label>
                </div>
                <div class="col-9">
                    <input type="text" name="image-subquestion-question" class="image-subquestion-question"/>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label for="image-subquestion-answer">Answer</label>
                </div>
                <div class="col-9">
                    <input type="text" name="image-subquestion-answer" class="image-subquestion-answer"/>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label for="image-subquestion-points">Points</label>
                </div>
                <div class="col-9">
                    <input type="number" name="image-subquestion-points" class="image-subquestion-points"/>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <button class="btn btn-error remove-image-subquestion">Delete</button>
                </div>
            </div>
            <hr>
        </div>
    </div>
    <div>
        <button class="btn btn-primary" id="add-another-image-subquestion">Add another</button>
    </div>
</div>
