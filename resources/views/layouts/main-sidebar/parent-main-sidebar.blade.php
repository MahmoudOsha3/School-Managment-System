<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{ route('parent.dashboard') }}"><i class="ti-home"></i><span class="right-nav-text">{{trans('site.dashboard')}}</span>
                        </a>
                    </li>
                    <!-- menu title -->
                    <li class="mt-10 mb-10 text-muted pl-4 font-medium menu-title">Components </li>



                    <!-- student & quizze -->
                    <li>
                        <a href="{{ route('parent.students') }}"><i class="bi bi-people"></i><span class="right-nav-text">{{trans('student.students')}}</span>
                        </a>
                    </li>

                    <!-- attendance  -->
                    <li>
                        <a href="{{ route('students.attendance') }}"><i class="bi bi-bookmark-plus"></i><span class="right-nav-text">{{trans('student.attendance')}}</span> </a>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->

        <!--=================================
