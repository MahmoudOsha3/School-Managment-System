<!-- Title -->
<title><?php echo $__env->yieldContent("title"); ?></title>

<!-- Favicon -->

<link rel="shortcut icon" href="<?php echo e(URL::asset('attachemnts/logo/logo.png')); ?>" type="image/x-icon" />


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<!-- Font -->
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">
        <!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600&display=swap" rel="stylesheet">

<?php echo $__env->yieldContent('css'); ?>
<!--- Style css -->
<link href="<?php echo e(URL::asset('assets/css/style.css')); ?>" rel="stylesheet">
<link href="<?php echo e(URL::asset('css/wizard.css')); ?>" rel="stylesheet">


<!--- Style css -->
<?php if(App::getLocale() == 'en'): ?>
    <link href="<?php echo e(URL::asset('assets/css/ltr.css')); ?>" rel="stylesheet">
<?php else: ?>
    <link href="<?php echo e(URL::asset('assets/css/rtl.css')); ?>" rel="stylesheet">
<?php endif; ?>
<?php /**PATH D:\Projects Laravel\projects\School Management System\resources\views/layouts/head.blade.php ENDPATH**/ ?>