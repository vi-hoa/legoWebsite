<style>
    .page-header {
        background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%);
        width: 100%;
        justify-content: center;
        text-align: center;
        color: #fff;
        height: 100px;
        font-size: 22px;
        border-radius: 1px 1px 40% 40%;
    }
    .products-row {
        margin-top: 30px;
        display: flex;
        border-radius: 10px;
        overflow: hidden;
        flex-wrap: wrap;
        justify-content: center;
    }
    .product-box {
        width: 200px;
        margin: 10px;
        padding: 10px;
        text-align: center;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
</style>


<?php $__env->startSection('title', 'Wishlist'); ?>
<?php $__env->startSection('content'); ?>
    <header class="page-header">
        <h1>Wishlist</h1>
    </header>
    
    <div class="products-row">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if (isset($component)) { $__componentOriginal0d2a1d546fcb91c714fc3b0f2b3e2f2dc896f738 = $component; } ?>
<?php $component = App\View\Components\ProductBox::resolve(['product' => $product] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('product-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\ProductBox::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal0d2a1d546fcb91c714fc3b0f2b3e2f2dc896f738)): ?>
<?php $component = $__componentOriginal0d2a1d546fcb91c714fc3b0f2b3e2f2dc896f738; ?>
<?php unset($__componentOriginal0d2a1d546fcb91c714fc3b0f2b3e2f2dc896f738); ?>
<?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\btec\final project\New folder\legoWebsite-main\legoWebsite-main\example-app\resources\views/pages/wishlist.blade.php ENDPATH**/ ?>