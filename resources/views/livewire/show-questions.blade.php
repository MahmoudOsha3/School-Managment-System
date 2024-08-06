{{-- هذا الشرط اذا كان الطالب لديها درجات في تقرير الدرجات يبقي هو امتحن و مينفعش يمتحن تاني  --}}
@if(\App\Models\ReportDegreeQuizze::where(['student_id' => auth()->user()->id  , 'quizze_id' => $questions[$numberQuestion]->quizze_id ])->count() == 0)
<div>
    <div class="start-quizze">
            <h6 class="text-title text-danger"><span>*</span> {{ trans('site.count_question') }} : {{ $total_questions }}</h6>
            <br>
            <h4 class="card-title">{{ $questions[$numberQuestion]->title }}</h4>
            @foreach (explode('-', $questions[$numberQuestion]->answer) as $index => $answer)
                <input type="radio" name="answer_{{ $numberQuestion }}" id="answer{{ $index }}" value="{{ $answer }}" wire:model="student_answer">
                <label for="answer{{ $index }}">{{ $answer }}</label>
                <br>
            @endforeach
            <button wire:click="backQuestion('{{$questions[$numberQuestion]->id }}')" class="btn btn-danger">{{ trans('parent.Back') }}</button>
            <button wire:click="nextQuestion('{{$questions[$numberQuestion]->id }}','{{ $student_answer }}')" class="btn btn-success">{{ trans('parent.Next') }}</button>
    </div>


</div>
@else
    <div class="container finish-quizze">
        <h1>{{ trans('site.finish_quizze_msg') }}</h1>
        <p>{{ trans('site.score_finish_msg') }}</p>
            <div class="score">
                {{ \App\Models\ReportDegreeQuizze::where(['quizze_id' =>  $questions[$numberQuestion]->quizze_id , 'student_id' => auth()->user()->id ])->pluck('score_student')->first() }}
                @php
                    echo app()->getLocale() == 'en' ? " / " : " \ " ;
                @endphp
                {{ \App\Models\ReportDegreeQuizze::where('quizze_id' ,  $questions[$numberQuestion]->quizze_id)->pluck('score_quizze')->first() }}
            </div>
        <a href="{{ route('student.quizze') }}" class="btn">{{ trans('site.back_main_page') }}</a>
    </div>
@endif
