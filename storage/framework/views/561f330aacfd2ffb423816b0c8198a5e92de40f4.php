<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="<?php echo e(route('dashboard.teacher')); ?>"><i class="ti-home"></i><span class="right-nav-text"><?php echo e(trans('site.dashboard')); ?></span>
                        </a>
                    </li>

                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Teacher </li>


                    <!-- student-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#student-menu">
                            <div class="pull-left"><i class="bi bi-mortarboard"></i><span
                                    class="right-nav-text"><?php echo e(trans('student.students')); ?></span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="student-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="<?php echo e(route('teacher.students')); ?>"><?php echo e(trans('student.list_students')); ?></a> </li>
                        </ul>
                    </li>



                    <!-- attendance -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#attendance-menu">
                            <div class="pull-left"><i class="bi bi-bookmark-plus"></i><span
                                    class="right-nav-text"><?php echo e(trans('student.attendance')); ?></span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="attendance-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="<?php echo e(route('teacher.sections')); ?>"><?php echo e(trans('student.list_attendance')); ?></a></li>
                            <li> <a href="<?php echo e(route('teacher.attendance.reports')); ?>"><?php echo e(trans('student.reports')); ?></a></li>
                        </ul>
                    </li>


                    <!-- Exams -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#exams-menu">
                            <div class="pull-left"><i class="bi bi-journals"></i><span
                                    class="right-nav-text"><?php echo e(trans('student.exams')); ?></span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="exams-menu" class="collapse" data-parent="#sidebarnav">
                            
                            <li> <a href="<?php echo e(route('quizze.index')); ?>"><?php echo e(trans('student.add_quizee')); ?></a></li>
                            
                        </ul>
                    </li>

                    
                    <li>
                        <a href="<?php echo e(route('teacher.sections')); ?>"><i class="bi bi-shop-window"></i><span class="right-nav-text"><?php echo e(__('site.sections_list')); ?></span>
                        </a>
                    </li>

                    
                    <li>
                        <a href="<?php echo e(route('libraries.index')); ?>"><i class="bi bi-book-half"></i><span class="right-nav-text"><?php echo e(trans('student.library')); ?></span>
                        </a>
                    </li>

                    
                    <li>
                        <a href="<?php echo e(route('onlineclass.index')); ?>"><i class="bi bi-camera-video"></i><span class="right-nav-text"><?php echo e(trans('student.online_classes')); ?></span>
                        </a>
                    </li>


                    
                    <li>
                        <a href="<?php echo e(route('teacher.profile')); ?>"><i class="bi bi-person-circle"></i><span class="right-nav-text"><?php echo e(trans('site.profile')); ?></span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
<?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/layouts/main-sidebar/teacher-main-sidebar.blade.php ENDPATH**/ ?>