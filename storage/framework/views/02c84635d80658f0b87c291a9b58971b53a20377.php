<style>
    .product-page {
       padding: 50px 15px;
    }
    /* .container {
        max-width: 1200px;
        width: 100%;
    } */
    .product-page-row {
        display: flex;
        /* //flex: wrap; */
    }
    .product-page-image {
        width: 50%;
        justify-content: center;
        align-items: center;
    }
    .product-page-details {
        max-width: 600px;
        margin: 0 auto;
    }
    .p-title {
        color: #333;
        margin-bottom: 10px;
        font-size: 24px;
        text-decoration: underline;
        text-transform: capitalize;
        font-weight: 600;
    }
    .p-price {
        font-size: 24px;
        color: #1aaac7;
        font-weight: 600;
    }
    .p-category {
        font-size: 18px;
        margin-bottom: 10px;
        color: #555;
        font-weight: 600;
        font-style: italic;
        text-transform: capitalize;
    }
    .p-description {
        font-size: 18px;
        color: #777;
        margin-bottom: 20px;
        font-weight: 500;
    }
    .p-form {
        flex-direction: column;
        margin-bottom: 20px;
        display: flex;
    }
    .p-colors {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }
    .p-colors label {
        margin-right: 54px;
        font-size: 20px;
        font-family:Arial, Helvetica, sans-serif
    }
    .p-colors select {
        width: 150px;
        height: 30px;
        color: #14b5c0;
        border-radius: 10px;
        border: 2px solid #1aaac7;
        text-align: center;
    }
    .p-quantity {
        margin-bottom: 10px;
    }
    .p-quantity label {
        margin-right:25px ;
        font-size: 20px;
        font-family:Arial, Helvetica, sans-serif
    }
    .p-quantity input {
        width: 150px;
        color: #47a6ce;
        height: 30px;
        border-radius: 10px;
        text-align: center;
        margin-bottom: 30px;
        border: 2px solid #1aaac7;
    }
    .btn-cart {
        background: linear-gradient(90deg, rgba(122,37,178,1) 10%, rgba(253,29,154,1) 50%, rgba(252,176,69,1) 100%);
        color: #fff;
        border: none;
        width: 100%;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        font-weight: 600;
        font-family:Arial, Helvetica, sans-serif;
        text-align: center;
        justify-content: center;
        border-radius: 20px;
    }
    .btn-cart:hover {
        background:rgba(252,176,69,1) ;
    }
    .pop-up {
        background: rgba(0, 0, 0, 0.4);
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 11;
    }
    .pop-up .pop-up-box {
        background: #e9e6e6;
        padding: 100px;
        text-align: center;
        border-radius: 12px;
    }
    .pop-up-box .pop-up-title {
        font-size: 24px;
        font-weight: 600;
        color: rgb(129, 11, 30);
        margin-bottom: 30px;
    }
    .pop-up-box .pop-up-actions {
        display: flex;
        justify-content: center;
        font-size: 20px;
        gap: 20px;
        text-decoration: none;
    }
    .pop-up-actions a {
        text-decoration: none;
        color: #fff;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 18px;
        border-radius: 15px;
        background: #970b99;
    }
</style>;

<?php $__env->startSection('title', $product->title); ?>
<?php $__env->startSection('content'); ?>

<?php if(session()->has('addedToCart')): ?>
    <section class="pop-up">
        <div class="pop-up-box">
            <div class="pop-up-title">
                <?php echo e(session()->get('addedToCart')); ?>

            </div>
            <div class="pop-up-actions">
                <a href="<?php echo e(route('home')); ?>">Continue Shopping</a>
                <a href="<?php echo e(route('cart')); ?>">Go To Cart</a>
            </div>
        </div>
    </section>
<?php endif; ?>

    <div class="product-page">
        <div class="container">
            <div class="product-page-row">
                <section class="product-page-image">
                    <img src="<?php echo e(asset('storage/' . $product->image)); ?>" alt="">
                </section>
                <section class="product-page-details">
                    <p class="p-title" style=""><?php echo e($product->title); ?></p>
                    <p class="p-price"><?php echo e($product->price/100); ?>$</p>
                    <p class="p-category">- <?php echo e($product->category->name); ?></p>
                    <p class="p-description"><?php echo e($product->description); ?></p>
                    <form action="<?php echo e(route('addToCart', $product->id)); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="p-form">
                            <div class="p-colors">
                                <label for="color">Color</label>
                                <select name="color" id="color">
                                    <option value="">--Color--</option>
                                    <?php $__currentLoopData = $product->colors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($color->id); ?>"><?php echo e($color->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="p-quantity">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" min="1" max="100" value="1" required>
                        </div>
                        <button type="submit" class="btn btn-cart">Add To Cart</button>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <?php echo $__env->make('pages.components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\btec\final project\New folder\legoWebsite-main\legoWebsite-main\example-app\resources\views/pages/product.blade.php ENDPATH**/ ?>