<style>
    .container {
        margin-top: 30px;
        font-family: Arial, sans-serif;
    }
    .badge {
        height: 35px;
        width: 35px;
    }
    .card {
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 2x 4px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }
    .card .card-header {
        background-color: #f5f5f5;
        padding: 10px 20px;
        border-bottom: 1px solid #ddd;
    }
    .card .card-body {
        padding: 20px;
    }
    .table {
        width: 100%;
        border-spacing: 0;
        border-collapse: collapse;
    }
    .table th, .table td {
        padding: 8px;
        text-align: left;
        border-top: 1px solid #ddd;
        vertical-align: top;
    }
    .table th {
        font-weight: bold;
        background: #f5f5f5;
    }
    .table-striped tbody tr:nth-of-type(old){
        background: #f9f9f9;
    }
    .table-striped tbody tr:nth-of-type(even){
        background: #fff;
    }
    .d-flex a {
        text-decoration: none;
        background: #ccc;
    }
    .d-flex {
        display: flex;
        gap:5px;
    }
    .d-flex .edit-button {
        margin-right: 3px;
    }
    .edit-button a, .delete-button button {
        display: inline-block;
        padding: 6px 12px;
        font-size: 14px;
        text-align: center;
        line-height: 1.42857143;
        white-space: nowrap;
        vertical-align: middle;
        color: #fff;
        border-radius: 4px;
        cursor: pointer;
    }
    .delete-button button.btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
    .edit-button button.btn-secondary{
        background-color: #6c757d;
        border-color: #6c757d;
    }
</style>

<?php $__env->startSection('title','Products'); ?>
<?php $__env->startSection('content'); ?>   
    <h1 class="page-title">Products</h1>

    <div class="container">
        <div class="text-end mb-3" >
            <a style="text-decoration: none; list-style: none; font-weight: bold;" href="<?php echo e(route('adminpanel.products.create')); ?>" class="btn btn-primary">+ &nbsp; Create Products</a>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card" style="">
                    <div class="card-header">
                        <h5 style="padding-top: 5px">Products</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-stripped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Colors</th>
                                    <th>Image</th>
                                    <th>Published</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($product->id); ?></td>
                                        <td><?php echo e($product->title); ?></td>
                                        <td><?php echo e($product->price); ?></td>
                                        <td><?php echo e($product->category->name ?? 'None'); ?></td>
                                        <td>
                                            <?php $__currentLoopData = $product->colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span class="badge" style="background: <?php echo e($color->code); ?>; border-radius: 3px;"><?php echo e($color->name); ?></span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td>
                                            <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="" width="40xp" height="40px">
                                        </td>
                                        <td><?php echo e(\carbon\Carbon::parse($product->created_at)->format('d/m/y')); ?></td>
                                        <td>
                                            <div class="d-flex" style="">
                                                <div class="edit-button">
                                                    <a class="btn btn-secondary" href="<?php echo e(route('adminpanel.products.edit', $product->id)); ?>">Edit</a>
                                                </div>
                                                <div class="delete-button">
                                                    <form action="<?php echo e(route('adminpanel.products.destroy', $product->id)); ?>"
                                                        method="post">  
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>                
                                            </div>                             
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\btec\final project\New folder\legoWebsite-main\legoWebsite-main\example-app\resources\views/admin/pages/products/index.blade.php ENDPATH**/ ?>