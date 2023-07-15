<style>
    .page-header {
        /* background: linear-gradient(to bottom, rgb(202, 39, 107), #d38eff); */
        background-image: url(https://thumbs.dreamstime.com/b/vibrant-meccano-puzzle-kit-set-light-white-paper-backdrop-freehand-line-dark-black-color-ink-hand-drawn-design-object-logo-152473486.jpg);
        
        padding: 100px 25px 120px;
        justify-content: center;
        text-align: center;
        flex-direction: column;
        border-radius: 2px 2px 50% 50%;
        /* color: #fff; */
    }

    h1 {
        font-family: Bahnschrift, SemiBold, SemiConden;

        font-size: 50px;
        font-weight: bold;
        text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
        /* background-color: rgba(255, 255, 255, 0.8); ; */

            color: #9681EB;
    }

    h3 {
        font-family: Bahnschrift, SemiBold, SemiConden;
        font-size: 40px;
        font-weight: bold;
        text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
        /* background-color: rgba(255, 255, 255, 0.8); ; */

            color: #9681EB;
    }

    .cart-page {
        padding: 70px 15px;
        background: #fafafa;
    }

    .cart-table {
        background: #fff;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 0 6px 0 rgba(0, 0, 0, 0.3)
    }

    .table {
        width: 100%;
        text-align: center;
        border-collapse: collapse;
    }

    .table thead tr {
        color: #fff;
        background: rgb(30, 130, 170);
    }

    .table thead tr th {
        padding: 10px;
        font-weight: 600;
        font-size: 18px;
        text-align: center;
    }

    .table tbody {
        font-weight: 700;
        color: rgb(30, 130, 170);
    }

    .table tbody tr td {
        padding: 10px;
        font-weight: 400;
        font-size: 18px;
    }
    .table tbody tr td a {
        margin-left: 100px;
   }

    .cart-item-title {
        font-weight: 700;
        margin-bottom: 10px;
        text-transform: inherit;
        text-decoration: none;
        display: flex;
        font-size: 20px;
        gap: 20px;
        align-items: center;
        color: rgb(30, 130, 170);
    }
    .cart-item-title img {
        width: 100px;
        margin-left: 170px;
        height: 100px;
    }
    .cart-total td {
        font-size: 20px;
        font-weight: 600;
        color: #793010;
    }

    .cart-actions {
        display: flex;
        justify-content: center;
        padding: 30px 0;
    }

    .cart-actions a {
        background: rgb(183, 21, 110);
        color: #fff;
        width: 150px;
        height: 35px;
        padding-top: 17px;
        border-radius: 10px;
        cursor: pointer;
        text-decoration: none;
        text-align: center;
        justify-content: center;
    }

    .btn-button {
        background: #7e0b61;
        color: #fff;
        cursor: pointer;
        border-radius: 5px;
    }

    .btn-primary:hover {
        background: rgb(16, 144, 167);
    }

    .pop-up {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;
        background-color: #fff;
        z-index: -999;
        text-align: center;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }
    .pop-up .pop-up-title{
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 10px;
    }
    .pop-up .pop-up-actions {
        margin-bottom: 20px;
    }
    .pop-up .pop-up-actions a {
        display: inline-block;
        margin-right: 10px;
        padding: 8px 16px;
        background-color: #337ab7;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        transition: all 0.3 ease;
    }
</style>


<?php $__env->startSection('title', 'Cart'); ?>
<?php $__env->startSection('content'); ?>

    <header class="page-header">
        <h1>Cart</h1>
        <h3 class="cart-amount">$<?php echo e(App\Models\Cart::totalAmount()); ?></h3>
    </header>

    <?php if(session()->has('success')): ?>
        <section class="pop-up">
            <div class="pop-up-box">
                <div class="pop-up-title">
                    <?php echo e(session()->get('success')); ?>

                </div>
                <div class="pop-up-actions">
                    <a href="<?php echo e(route('cart')); ?>">Continue Shopping</a>
                    <a href="<?php echo e(route('cart')); ?>">Checkout!</a>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <main class="cart-page">
        <div class="container">
            <div class="cart-table">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Image</th>
                            <th>Color</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(session()->has('cart') && count(session()->get('cart')) > 0): ?>
                            <?php $__currentLoopData = session()->get('cart'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                            <p><?php echo e($item['product']['title']); ?></p>
                                    
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('product', $item['product']['id'])); ?>" class="cart-item-title">
                                            <img src="<?php echo e(asset('storage/' . $item['product']['image'])); ?>" alt="">
                                            
                                        </a>
                                    </td>
                                    <td><?php echo e($item['color']['name']); ?></td>
                                    <div class="color">
                                        <td>$<?php echo e($item['product']['price'] / 100); ?></td>
                                        <td><?php echo e($item['quantity']); ?></td>
                                        <td>$<?php echo e(App\Models\Cart::unitPrice($item)); ?></td>
                                    </div>

                                    <td>
                                        <form action="<?php echo e(route('removeFromCart', $key)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" class="btn-button">X</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <tr class="cart-total">
                                <td colspan="4" style="text-align: right">Total</td>
                                <td>$<?php echo e(App\Models\Cart::totalAmount() * 100 / 100); ?></td>
                            </tr>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="empty-cart">Your cart is Empty</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <div class="cart-actions">
                <a href="<?php echo e(route('checkout')); ?>" class="btn btn-primary">Go To Checkout</a>
            </div>
        </div>
    </main>
    <?php echo $__env->make('pages.components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\btec\final project\legoWebsite\example-app\resources\views/pages/cart.blade.php ENDPATH**/ ?>