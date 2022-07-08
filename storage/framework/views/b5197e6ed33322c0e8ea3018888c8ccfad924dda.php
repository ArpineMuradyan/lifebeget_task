<?php echo $__env->make('layouts.auth_layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-10">
        <h1 class="text-6xl dark:text-white text-center">Welcome to admin page</h1>
        <h1 class="text-5xl dark:text-white text-center">Dear <?php echo e(Auth::user()->name); ?></h1>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/lifebeget/resources/views/admin/home.blade.php ENDPATH**/ ?>