<aside class="side-nav">
    <div class="logo">
        <img src="<?php echo e(asset('img/logo.svg')); ?>" alt="">
        ADMINPANEL
    </div>
    <ul>
        <li>
            <a href="<?php echo e(route('adminpanel')); ?>">Dashboard</a>
        </li>
        <li>
            <a href="<?php echo e(route('adminpanel.products')); ?>">Product</a>
        </li>
        <li>
            <a href="<?php echo e(route('adminpanel.categories')); ?>">Categories</a>
        </li>
        <li>
            <a href="<?php echo e(route('adminpanel.colors')); ?>">Colors</a>
        </li>
        <li>
            <a href="">Orders</a>
        </li>
    </ul>

    <div class="logout">
        <form action="<?php echo e(route('logout')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <button type="submit">
                <svg width="36" height="36" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4h3a2 2 0 0 1 2 2v1m-5 13h3a2 2 0 0 0 2-2v-1M4.425 19.428l6 1.8A2 2 0 0 0 13 19.312V4.688a2 2 0 0 0-2.575-1.916l-6 1.8A2 2 0 0 0 3 6.488v11.024a2 2 0 0 0 1.425 1.916zM9.001 12H9m7 0h5m0 0l-2-2m2 2l-2 2"/></svg>
                &nbsp; Logout
            </button>
        </form>
    </div>
</aside><?php /**PATH E:\btec\final project\New folder\legoWebsite-main\legoWebsite-main\example-app\resources\views/admin/partials/nav.blade.php ENDPATH**/ ?>