<?php $__env->startSection('title', 'Color'); ?>
<?php $__env->startSection('content'); ?>
<style>
    .container {
        h1 {
            text-align: left;

        }

        justify-content: center;
        align-items: center;
        margin: 0 200px;
        .card {
            border: 1px solid #ccc;
            border-radius: 7px;
            max-width: 700px;
            margin: 0 40px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1) padding: 20px;

            .card-header {
                background-color: #f5f5f5;
                border-bottom: 1px solid #ccc;
                margin-bottom: 20px;
                text-align: center;
                padding-bottom: 10px;
            }

            .card-header h5 {
                color: rgb(145, 12, 70);
                font-weight: bold;
                font-size: 25px; 
        
            }

            .card-body .form-group {
                margin-bottom: 20px;
            }

        }
        .row{
            max-width: 700px;
            margin-top: 50px;
            justify-content: center;
            align-items: center;
            .card-body{ 
                padding: 20px;
                .table th, .table td {
                    word-wrap: break-word;
                    font-weight: bold;
                    padding: 10px;
                    text-align: left;
                    vertical-align: bottom;
                    justify-content: space-between;
                    color: #000;
                    font-size: 20px;
                }
                .table th {
                    font-weight: bold;
                    background: #f5f5f5;
                    border-radius: 10px;
                    background: rgb(202, 202, 43);

                }
                .table-striped tbody tr:nth-of-type(odd) {
                    background: #f9f9f9;
                }
                .btn-danger{
                    background: #dc3545;
                    border: none;
                    border-radius: 3px;
                    color: #ccc;
                    cursor: pointer;
                    padding: 5px 10px;
                    &:hover{
                        background-color: #c82333;
                    }
                }
            }
        }
    }
</style> 
    <div class="container">

        <h1 class="page-title">Color</h1>
        <div class="row mb-5">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5>Create Color</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('adminpanel.color.store')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group" mb-3>
                                <label for="name" style="display: block;font-weight: bold">Name</label>
                                <input style="font-weight: bold; border-radius: 7px;" type="text" name="name" id="name"
                                    class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('name')); ?>">
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e(message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group" mb-3>
                                <label for="name" style="display: block;font-weight: bold">Code</label>
                                <input style="font-weight: bold; border-radius: 7px; width: 192px" type="color" name="code" id="code"
                                    class="form-control <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('color')); ?>">
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e(message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>
                            <div class="form-group text-end">
                                <button class="btn btn-primary" type="submit">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card" style="">
                    <div class="card-header">
                        <h5 style="padding-top: 5px">Color</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Color</th>
                                    <th>Total </th>
                                    <th>Published</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($color->id); ?></td>
                                        <td><?php echo e($color->name); ?></td>
                                        <td>
                                            <div style="display: flex; align-items:center; gap: 10px">
                                                <?php echo e($color->code); ?> <span style="display: inline-block; width: 30px; height: 30px; border-radius:50%; background: <?php echo e($color->code); ?>"></span>
                                            </div>
                                        </td>
                                        <td>-</td>
                                        <td><?php echo e(\carbon\Carbon::parse($color->created_at)->format('d/m/y')); ?></td>
                                        <td>
                                            <form action="<?php echo e(route('adminpanel.color.destroy', $color->id)); ?>"
                                                method="post">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\btec\final project\New folder\legoWebsite-main\legoWebsite-main\example-app\resources\views/admin/pages/colors/index.blade.php ENDPATH**/ ?>