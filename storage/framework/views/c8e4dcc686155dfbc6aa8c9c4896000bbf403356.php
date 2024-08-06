<div>
    <div>
        <div>
            <div id='calendar-container' wire:ignore>
                <div id='calendar'></div>
            </div>
        </div>
        <?php $__env->startPush('scripts'); ?>
            <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.js'></script>

            <script>
                document.addEventListener('livewire:load', function () {
                    var Calendar = FullCalendar.Calendar;
                    var Draggable = FullCalendar.Draggable;
                    var calendarEl = document.getElementById('calendar');
                    var checkbox = document.getElementById('drop-remove');
                    var data = window.livewire.find('<?php echo e($_instance->id); ?>').events;
                    var calendar = new Calendar(calendarEl, {
                        events: JSON.parse(data),
                    });
                    calendar.render();
                window.livewire.find('<?php echo e($_instance->id); ?>').on(`refreshCalendar`, () => {
                    calendar.refetchEvents()
                });
                });
            </script>
            <link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.3.1/main.min.css' rel='stylesheet'/>
        <?php $__env->stopPush(); ?>
    </div>

</div>
<?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/livewire/calender-student.blade.php ENDPATH**/ ?>