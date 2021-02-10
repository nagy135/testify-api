<!-- field_type_name -->
@include('crud::fields.inc.wrapper_start')

<div class="row">
    <div class="col-md-10 col-sm-12">
        <select class="form-control" id="question-types">
            @foreach(\App\Models\Question::TYPES as $key => $type)
                <option value="{{ $key }}">{{ $type }}</option>
            @endforeach </select>
    </div>
    <div class="col-md-2 col-sm-12">
        <button id="add-question" type="button" class="btn btn-primary" data-toggle="modal"
                data-target="#add-question-modal">
            Add
        </button>
    </div>
</div>
<div class="container mt-3">
    <table class="table table-striped questions-table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Question Type</th>
                <th scope="col">Points</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>


{{-- HINT --}}
@if (isset($field['hint']))
    <p class="help-block">{!! $field['hint'] !!}</p>
@endif

@include('crud::fields.inc.wrapper_end')

@if ($crud->fieldTypeNotLoaded($field))
    @php
        $crud->markFieldTypeAsLoaded($field);
    @endphp

    {{-- FIELD EXTRA CSS  --}}
    {{-- push things in the after_styles section --}}
    @push('crud_fields_styles')
        <style type="text/css" media="screen">
            .btn:focus {
                box-shadow: none;
            }
            .btn-link:focus {
                text-decoration: none;
            }
            #drag-join-accordion input {
                width: 100%;
                overflow: hidden;
            }
            #drag-join-accordion strong {
                overflow-wrap: normal;
            }
        </style>
    @endpush

    {{-- FIELD EXTRA JS --}}
    {{-- push things in the after_scripts section --}}
    @push('crud_fields_scripts')
        @include('modals.addQuestionModal')

        <script>
            $(document).ready(function () {
                // holds objects of data field later stored as models
                let questions = [];
                @foreach ($entry->questions as $question)
                    var question = @json($question);
                    questions.push({
                        type: question.type,
                        data: question.data
                    });
                @endforeach
                console.log(questions);
                updateQuestionTable();
                // creates another question object for later saving

                const snakeToCamel = str => str.replace(/([-_]\w)/g, g => g[1].toUpperCase());

                function createQuestionHandler(type){
                    let newQuestion = {
                        type: snakeToCamel(type),
                        data: {}
                    };
                    let inputs = $("." + type).find('input');

                    // here branch to different parsing methods depending on question type
                    switch (type) {
                        case 'multi-choice':
                            questions.push(newMultiChoiceQuestion(newQuestion, inputs));
                            break;
                        case 'drag-join':
                            questions.push(newDragJoinQuestion(newQuestion, inputs));
                            break;
                        case 'image':
                            questions.push(newImageQuestion(newQuestion, inputs));
                            break;
                        case 'question-answer':
                            questions.push(newQuestionAnswerQuestion(newQuestion, inputs));
                            break;
                        case 'yes-no':
                            questions.push(newYesNoQuestion(newQuestion, inputs));
                            break;
                    };
                    console.log('updated questions', questions);
                    updateQuestionTable();
                };

                function updateQuestionTable(){
                    $('.questions-table > tbody').html('');
                    questions.forEach(function(e, i){
                        $('.questions-table > tbody').append(
                            '<tr>' +
                                '<th scope="row">' + (i+1) + '</th>' +
                                '<td>' + e.type + '</td>' +
                                '<td>' + e.data.points + '</td>' +
                                '<td><button type="button" data-id="' + i + '" class="btn btn-sm btn-error questions-table-delete-row">Delete</button></td>' +
                            '</tr>'
                        );
                    });
                }

                function newMultiChoiceQuestion(newQuestion, inputs){
                    inputs.each(function(){
                        newQuestion[$(this).attr('name').replace(/^multi-choice-/, "")] = $(this).val();
                    });
                    return newQuestion;
                };
                function newDragJoinQuestion(newQuestion, inputs){
                    inputs.each(function(){
                        newQuestion[$(this).attr('name').replace(/^drag-join-/, "")] = $(this).val();
                    });
                    return newQuestion;
                };
                function newImageQuestion(newQuestion, inputs){
                    let subQuestions = {};
                    inputs.each(function(){
                        let key = $(this).attr('name').replace(/^image-/, "");
                        let value = $(this).val();
                        console.log(key, value);
                        if (!key.startsWith('subquestion')){
                            if (key == 'points') value = parseInt(value);
                            newQuestion['data'][key] = value;
                        } else {
                            if (key in subQuestions)
                                subQuestions[key].push(value);
                            else
                                subQuestions[key] = [value];
                        }
                    });

                    newQuestion['data']['subQuestions'] = [];
                    for (var i=0; i<subQuestions["subquestion-points"].length; i++){
                        newQuestion['data']["subQuestions"].push({
                            question: subQuestions['subquestion-question'][i],
                            answer: subQuestions['subquestion-answer'][i],
                            maxPoints: parseInt(subQuestions['subquestion-points'][i]),
                        });
                    }

                    return newQuestion;
                };
                function newQuestionAnswerQuestion(newQuestion, inputs){
                    inputs.each(function(){
                        let key = $(this).attr('name').replace(/^question-answer-/, "");
                        let value = $(this).val();
                        if (key == 'points')
                            value = parseInt(value);
                        newQuestion['data'][key] = value;
                    });
                    return newQuestion;
                };
                function newYesNoQuestion(newQuestion, inputs){
                    inputs.each(function(){
                        let key = $(this).attr('name').replace(/^yes-no-/, "");
                        let value = $(this).val();
                        if (key == 'answer'){
                            value = 0;
                            if (value == "yes") value = 1;
                        } else if (key == 'points')
                            value = parseInt(value);
                        newQuestion['data'][key] = value;
                    });
                    return newQuestion;
                };

                let questionTypeMapping = [
                    "multi-choice",
                    "drag-join",
                    "image",
                    "question-answer",
                    "yes-no",
                ];
                let questionTitleMapping = [
                    "Multi Choice",
                    "Drag/Join",
                    "Image",
                    "Question/Answer",
                    "Yes/No",
                ];

                $('.questions-table').on('click', '.questions-table-delete-row', function(e){
                    e.preventDefault();
                    questions.splice(parseInt($(this).data('id')), 1);
                    updateQuestionTable();
                });

                // add new question with selected type
                $("#add-question").click(function() {
                    let type = $("#question-types").val();
                    $('.question-type-creators').children().hide();
                    $('.' + questionTypeMapping[type]).show();
                    $('#add-question-modal').data('question-type', questionTypeMapping[type]);
                    $('#add-question-modal h5.modal-title').html(questionTitleMapping[type]);
                });

                // this is case where question is completed and should be stored
                $("#add-question-modal button.add-question-save").click(function(){
                    $('#add-question-modal').modal('hide');
                    createQuestionHandler($('#add-question-modal').data('question-type'));
                });

                // image {
                $("#add-another-image-subquestion").click(function(){
                    let newOne = $('.subquestion').last().clone(true);
                    $('.subquestions').append(newOne);
                });
                $(".remove-image-subquestion").click(function(){
                    if ($('.subquestion').length == 1) return;
                    $(this).closest('.subquestion').remove();
                });
                // }

                // dragJoin {

                function dragJoinFixLabels(type){
                    let q = '.drag-join-answer-label';
                    if (type == 'questions')
                        q = '.drag-join-question-label';
                    else if (type == 'joins')
                        q = '.drag-join-join-label';
                    $(q).each(function(e){
                        $(this).html('#' + (e+1));
                    });
                };
                // if showing joins, update selects
                $("#drag-join-accordion").on('show.bs.collapse', function(e){
                    if (e.target.id != 'drag-join-collapse-joins') return;
                    // get values
                    let questions = [];
                    $('input.drag-join-question-text').each(function(){
                        questions.push($(this).val());
                    });
                    for(var i=0; i<questions.length; i++) {
                        if(questions[i] === ""){
                            alert('Some questions have empty name!');
                            $("#drag-join-collapse-questions").collapse('show');
                            return false;
                        }
                    }
                    let answers = [];
                    $('input.drag-join-answer-text').each(function(){
                        answers.push($(this).val());
                    });
                    for(var i=0; i<answers.length; i++) {
                        if(answers[i] === ""){
                            alert('Some answers have empty name!');
                            $("#drag-join-collapse-answers").collapse('show');
                            return false;
                        }
                    }
                    // populate selects
                    let newOne = $('.drag-join-join-wrapper').last().clone(true);
                    $('.drag-join-join-wrapper').remove();
                    questions.forEach(function(e,i){
                        let newOneInner = newOne.clone(true);
                        newOneInner.find('.drag-join-question-join').val(e);
                        $('.drag-join-joins').append(newOneInner);
                    });
                    $('.drag-join-answer-join').each(function(){
                        let answerSelect = $(this);
                        answerSelect.html('');
                        answers.forEach(function(e,i){
                            answerSelect.append(
                                '<option value="' + i + '">' +
                                e +
                                '</option>'
                            );
                        });
                    })
                    dragJoinFixLabels('joins');
                });

                $(".remove-drag-join-question").click(function(){
                    if ($('.drag-join-question-wrapper').length == 1) return;
                    $(this).closest('.drag-join-question-wrapper').remove();
                    dragJoinFixLabels('questions');
                });

                $(".remove-drag-join-answer").click(function(){
                    if ($('.drag-join-answer-wrapper').length == 1) return;
                    $(this).closest('.drag-join-answer-wrapper').remove();
                    dragJoinFixLabels('answers');
                });

                $("#add-another-drag-join-question").click(function(){
                    let newOne = $('.drag-join-question-wrapper').last().clone(true);
                    $('.drag-join-questions').append(newOne);
                    dragJoinFixLabels('questions');
                });

                $("#add-another-drag-join-answer").click(function(){
                    let newOne = $('.drag-join-answer-wrapper').last().clone(true);
                    $('.drag-join-answers').append(newOne);
                    dragJoinFixLabels('answers');
                });
                // }

                // multichoice {
                $("#add-another-multi-choice-answer").click(function(){
                    let newOne = $('.multi-choice-answer-wrapper').last().clone(true);
                    let count = $('.multi-choice-answer-wrapper').length;
                    newOne.find('.form-check-input').each(function(){
                        $(this).attr('name', 'multi-choice-answers-' + count);
                    })
                    $('.multi-choice-answers').append(newOne);
                });
                $(".remove-multi-choice-answer").click(function(){
                    if ($('.multi-choice-answer-wrapper').length == 1) return;
                    $(this).closest('.multi-choice-answer-wrapper').remove();
                });
                // }
            });
        </script>
    @endpush
@endif
