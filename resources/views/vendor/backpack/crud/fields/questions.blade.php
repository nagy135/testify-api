<!-- field_type_name -->
@include('crud::fields.inc.wrapper_start')

<div class="row">
    <div class="col-md-11">
        <select class="form-control" id="question-types">
            @foreach(\App\Models\Question::TYPES as $key => $type)
                <option value="{{ $key }}">{{ $type }}</option>
            @endforeach </select>
    </div>
    <div class="col-md">
        <button id="add-question" type="button" class="btn btn-primary" data-toggle="modal"
                data-target="#addQuestionModal">
            Add
        </button>
    </div>
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

    @endpush

    {{-- FIELD EXTRA JS --}}
    {{-- push things in the after_scripts section --}}
    @push('crud_fields_scripts')
        @include('modals.addQuestionModal')

        <script>
            $(document).ready(function () {
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

                $("#add-question").click(function () {
                    let type = $("#question-types").val();
                    $('.question-type-creators').children().hide();
                    $('.' + questionTypeMapping[type]).show();
                    $('#addQuestionModal h5.modal-title').html(questionTitleMapping[type]);
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
            });
        </script>
    @endpush
@endif
