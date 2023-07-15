<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .alert{
            font-weight: bold;
            background: rgb(162, 230, 162);
            color: rgb(2, 53, 2);
            border-radius: 10px;
            font-size: 20px;
            margin: 0 auto ;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>">
</head>

<body>
    <?php echo $__env->make('admin.partials.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="admin-main">
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <?php if(session('error')): ?>
            <div class="alert alert-danger">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>
        <?php if(session('warning')): ?>
            <div class="alert alert-warning">
                <?php echo e(session('warning')); ?>

            </div>
        <?php endif; ?>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</body>

</html>
<?php /**PATH E:\btec\final project\New folder\legoWebsite-main\legoWebsite-main\example-app\resources\views/layouts/admin.blade.php ENDPATH**/ ?>