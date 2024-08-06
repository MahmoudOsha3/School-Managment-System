<div>
    <?php if(!empty($successMessage)): ?>
        <div class="alert alert-success" id="success-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <?php echo e($successMessage); ?>

        </div>
    <?php endif; ?>

    <?php if(!empty($catchError)): ?>
        <div class="alert alert-danger" id="danger-alert">
            <button type="button" class="close" data-dismiss="alert">x</button>
            <?php echo e($catchError); ?>

        </div>
    <?php endif; ?>


    
    <?php if($show_table): ?>
        <?php echo $__env->make('livewire.Parent_Table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php else: ?>

        
        
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button"
                        class="btn btn-circle <?php echo e($currentStep != 1 ? 'btn-default' : 'btn-success'); ?>">1</a>
                    <p><?php echo e(trans('parent.Step1')); ?></p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button"
                        class="btn btn-circle <?php echo e($currentStep != 2 ? 'btn-default' : 'btn-success'); ?>">2</a>
                    <p><?php echo e(trans('parent.Step2')); ?></p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button"
                        class="btn btn-circle <?php echo e($currentStep != 3 ? 'btn-default' : 'btn-success'); ?>"
                        disabled="disabled">3</a>
                    <p><?php echo e(trans('parent.Step3')); ?></p>
                </div>
            </div>
        </div>

        <?php echo $__env->make('livewire.Father_Form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->make('livewire.Mother_Form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="row setup-content <?php echo e($currentStep != 3 ? 'displayNone' : ''); ?>" id="step-3">
            <?php if($currentStep != 3): ?>
                <div style="display: none" class="row setup-content" id="step-3">
                    <?php endif; ?>
                    <div class="col-xs-12">
                        <div class="col-md-12"><br>
                            <label style="color: red"><?php echo e(trans('Parent_trans.Attachments')); ?></label>
                            <div class="form-group">
                                <input type="file" wire:model="photos" accept="image/*" multiple>
                            </div>
                            <br>
                            <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button"
                                    wire:click="back(2)"><?php echo e(trans('parent.Back')); ?></button>

                            
                            <?php if(! $updatedMode): ?>
                                <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submitForm"
                                type="button"><?php echo e(trans('parent.Finish')); ?></button>
                            <?php else: ?>
                                <button class="btn btn-success btn-sm btn-lg pull-right" wire:click="submitFormUpdated"
                                type="button"><?php echo e(trans('parent.Next')); ?></button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
        </div>

    <?php endif; ?>


</div>
<?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/livewire/add-parent.blade.php ENDPATH**/ ?>