<?php $__env->startSection('title', 'Category'); ?>
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

        <h1 class="page-title">Categories</h1>
        <div class="row mb-5">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h5>Create Category</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('adminpanel.category.store')); ?>" method="post">
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
                        <h5 style="padding-top: 5px">Categories</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>name</th>
                                    <th>Total Product</th>
                                    <th>Published</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($category->id); ?></td>
                                        <td><?php echo e($category->name); ?></td>
                                        <td>-</td>
                                        <td><?php echo e(\carbon\Carbon::parse($category->created_at)->format('d/m/y')); ?></td>
                                        <td>
                                            <form action="<?php echo e(route('adminpanel.category.destroy', $category->id)); ?>"
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

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\btec\final project\New folder\legoWebsite-main\legoWebsite-main\example-app\resources\views/admin/pages/categories/index.blade.php ENDPATH**/ ?>