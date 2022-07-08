<div class="flex bg-gray-100 border-b border-gray-300 py-4">
    <?php if(auth()->guard()->guest()): ?>
        <div class="container mx-auto flex justify-between">
            <div class="flex">
                <a class="mr-4" href="/login" exact>Login</a>
                <a href="/registration">Registration</a>
            </div>
        </div>
    <?php endif; ?>
    <?php if(auth()->guard()->check()): ?>
        <div class="container mx-auto flex justify-between">
            <div class="flex">
            </div>
            <div class="flex">
                <form action="<?php echo e(route('logout')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
    <?php endif; ?>

</div>
<?php /**PATH /var/www/html/lifebeget/resources/views/layouts/auth_layout.blade.php ENDPATH**/ ?>