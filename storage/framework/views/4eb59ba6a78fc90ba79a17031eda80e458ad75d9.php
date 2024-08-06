<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->

                    <!-- dashboard -->
                    <li>
                        <a href="<?php echo e(route('student.dashboard')); ?>"><i class="ti-home"></i><span class="right-nav-text"><?php echo e(trans('site.dashboard')); ?></span> </a>
                    </li>


                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components </li>



                    <!-- Exams -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#exams-menu">
                            <div class="pull-left"><i class="bi bi-journals"></i><span
                                    class="right-nav-text"><?php echo e(trans('student.exams')); ?></span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="exams-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="<?php echo e(route('student.quizze')); ?>"><?php echo e(trans('student.quizzes')); ?></a></li>
                        </ul>
                    </li>


                    
                    <li>
                        <a href="<?php echo e(route('student.library')); ?>"><i class="bi bi-book-half"></i><span class="right-nav-text"><?php echo e(trans('student.library')); ?></span>
                        </a>
                    </li>

                    
                    <li>
                        <a href="<?php echo e(route('student.onlineclass')); ?>"><i class="bi bi-camera-video"></i><span class="right-nav-text"><?php echo e(trans('student.online_classes')); ?></span>
                        </a>
                    </li>


                    
                    <li>
                        <a href="<?php echo e(route('student.profile')); ?>"><i class="bi bi-person-circle"></i><span class="right-nav-text"><?php echo e(trans('site.profile')); ?></span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
<?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/layouts/main-sidebar/student-main-sidebar.blade.php ENDPATH**/ ?>