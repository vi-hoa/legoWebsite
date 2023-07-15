<?php $__env->startSection('title', 'Account'); ?>
<?php $__env->startSection('content'); ?>
    <div class="account-page">
        <div class="container">
            <?php if(auth()->guard()->check()): ?>
                <form action="<?php echo e(route('logout')); ?>" method="POST">
                   <?php echo csrf_field(); ?>
                   <button class="btn btn-primary">Logout</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
    <?php echo $__env->make('pages.components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\btec\final project\legoWebsite\example-app\resources\views/pages/account.blade.php ENDPATH**/ ?>