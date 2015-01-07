<br>
<div><div class="custom_h3"><div class="create_course_color">For this course, select one area of concentration:</div></div>
    <span class="checkboxes_alb">{{ Form::label('sciences', 'Sciences') }}{{ Form::radio('sciences', 'y') }}</span>
    <span class="checkboxes_alb">{{ Form::label('social_sciences', 'Social Sciences') }}{{ Form::radio('social_sciences', 'y') }}</span>
    <span class="checkboxes_alb"> {{ Form::label('humanities', 'Humanities') }}{{ Form::radio('humanities', 'y') }}</span>
    <span class="checkboxes_alb">{{ Form::label('outside_concentrations', 'Outside Concentrations') }}{{ Form::radio('outside_concentrations', 'y') }}</span>
</div><br>

<div><div class="custom_h3"><div class="create_course_color">Select attributes that apply for this course (maximum 5): </div></div>
    <span class="checkboxes_alb"> {{ Form::label('expository_writing', 'Expository Writing') }}{{ Form::checkbox('expository_writing', 'y') }}</span>
    <span class="checkboxes_alb">{{ Form::label('writing_intensive', 'Writing Intensive') }}{{ Form::checkbox('writing_intensive', 'y') }}</span>
</div>

<div><span class="checkboxes_alb"> {{ Form::label('foreign_language_lower', 'Foreign Language (lower)') }}{{ Form::checkbox('foreign_language_lower', 'y') }}</span>
    <span class="checkboxes_alb">(or)</span>
    <span class="checkboxes_alb"> {{ Form::label('foreign_language_upper', 'Foreign Language (upper)') }}{{ Form::checkbox('foreign_language_upper', 'y') }}</span>
</div>

<div><span class="checkboxes_alb"> {{ Form::label('quantitative_reasoning', 'Quantitative Reasoning') }}{{ Form::checkbox('quantitative_reasoning', 'y') }}</span>
    <span class="checkboxes_alb">(or)</span>
    <span class="checkboxes_alb">{{ Form::label('moral_reasoning', 'Moral Reasoning') }}{{ Form::checkbox('moral_reasoning', 'y') }}</span>
</div>

<div>
    <span class="checkboxes_alb">{{ Form::label('harvard_instructor', 'Harvard Instructor') }}{{ Form::checkbox('harvard_instructor', 'y') }}</span>
    <span class="checkboxes_alb">{{ Form::label('upper_level_course', 'Upper Level Course') }}{{ Form::checkbox('upper_level_course', 'y') }}</span>
    <span class="checkboxes_alb">{{ Form::label('residency', 'Residency') }}{{ Form::checkbox('residency', 'y') }}</span>
</div><br>

<div><div class="custom_h3"><div class="create_course_color">If this course fulfills requirements for a field of study or minor, then choose below: </div></div>
    <span class="checkboxes_alb"> {{ Form::label('field_of_study', 'Field of Study') }}{{ Form::checkbox('field_of_study', 'y') }}</span>
</div>

<div>
    <span class="checkboxes_alb"> {{ Form::label('minor_1', 'Minor 1') }}{{ Form::checkbox('minor_1', 'y') }}</span>
    <span class="checkboxes_alb">(or)</span>
    <span class="checkboxes_alb"> {{ Form::label('minor_2', 'Minor 2') }}{{ Form::checkbox('minor_2', 'y') }}</span>
</div>

