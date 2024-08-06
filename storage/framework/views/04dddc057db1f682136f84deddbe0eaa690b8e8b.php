
<?php if(\App\Models\ReportDegreeQuizze::where(['student_id' => auth()->user()->id  , 'quizze_id' => $questions[$numberQuestion]->quizze_id ])->count() == 0): ?>
<div>
    <div class="start-quizze">
            <h6 class="text-title text-danger"><span>*</span> <?php echo e(trans('site.count_question')); ?> : <?php echo e($total_questions); ?></h6>
            <br>
            <h4 class="card-title"><?php echo e($questions[$numberQuestion]->title); ?></h4>
            <?php $__currentLoopData = explode('-', $questions[$numberQuestion]->answer); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $answer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <input type="radio" name="answer_<?php echo e($numberQuestion); ?>" id="answer<?php echo e($index); ?>" value="<?php echo e($answer); ?>" wire:model="student_answer">
                <label for="answer<?php echo e($index); ?>"><?php echo e($answer); ?></label>
                <br>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <button wire:click="backQuestion('<?php echo e($questions[$numberQuestion]->id); ?>')" class="btn btn-danger"><?php echo e(trans('parent.Back')); ?></button>
            <button wire:click="nextQuestion('<?php echo e($questions[$numberQuestion]->id); ?>','<?php echo e($student_answer); ?>')" class="btn btn-success"><?php echo e(trans('parent.Next')); ?></button>
    </div>


</div>
<?php else: ?>
    <div class="container finish-quizze">
        <h1><?php echo e(trans('site.finish_quizze_msg')); ?></h1>
        <p><?php echo e(trans('site.score_finish_msg')); ?></p>
            <div class="score">
                <?php echo e(\App\Models\ReportDegreeQuizze::where(['quizze_id' =>  $questions[$numberQuestion]->quizze_id , 'student_id' => auth()->user()->id ])->pluck('score_student')->first()); ?>

                <?php
                    echo app()->getLocale() == 'en' ? " / " : " \ " ;
                ?>
                <?php echo e(\App\Models\ReportDegreeQuizze::where('quizze_id' ,  $questions[$numberQuestion]->quizze_id)->pluck('score_quizze')->first()); ?>

            </div>
        <a href="<?php echo e(route('student.quizze')); ?>" class="btn"><?php echo e(trans('site.back_main_page')); ?></a>
    </div>
<?php endif; ?>
<?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/livewire/show-questions.blade.php ENDPATH**/ ?>