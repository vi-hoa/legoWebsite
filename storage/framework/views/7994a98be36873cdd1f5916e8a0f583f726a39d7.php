<style>
   @import './components/home/header.sass';
   .products-section{
      padding: 70px;
   }
      .section-title {
         font-size: 30px;
         font-weight: 600;
         text-align: center;
         margin-bottom: 30px;
         color: rgb(60, 125, 194);
      }        
   .products-row {
      display: flex;
      gap: 25px;
      flex-wrap: wrap;
   }
      
</style>



<?php $__env->startSection('title', 'Home'); ?>
<?php $__env->startSection('content'); ?>
   <main class="homepage">
        <?php echo $__env->make('pages.components.home.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <section class="products-section">
            <div class="container">

               <h1 class="section-title">Featured Products</h1>
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

            </div>
        </section>
        
   </main>

<?php echo $__env->make('pages.components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\btec\final project\legoWebsite\example-app\resources\views/pages/home.blade.php ENDPATH**/ ?>