<style>
    .page-header {
        background: linear-gradient(to bottom, rgb(202, 39, 107), #d38eff);
        padding: 100px 25px 120px;
        justify-content: center;
        text-align: center;
        flex-direction: column;
        border-radius: 2px 2px 50% 50%;
        color: #fff;
    }

    .filed {
        margin-bottom: 25px;
    }

    .filed input,
    select {
        width: 100%;
        border-radius: 150px;
        padding: 10px 15px;
        border: 1px solid #ddd;
    }

    .filed label {
        color: rgb(28, 7, 7);
        font-weight: bold;
        font-weight: 800;
    }

    .checkout-page {
        padding: 70px 0;
        background: #fafafa;
    }

    .checkout-page .checkout-form {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 6px rgba(0, 0, 0, 0.09);
        padding: 30px;
        max-width: 100%;
        margin: 0 auto;
        width: 700px;
    }

    .StripeElement {
        height: 40px;
        width: 100%;
        padding: 10px 12px;
        border-radius: 8px;
        border: 1px solid transparent;
        background-color: white;
        color: #32325d;

        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
        margin-bottom: 20px;
    }
    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }
    .StripeElement--invalid {
        border-color: #fa755a;
    }
    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
    .btn-primary {
        border: 1px solid #ddd;
        background-color: #7d0a6a;
        height: 30px;
        width: 100%;
        color: #fff;
        font-size: 16px;
        border-radius: 10px;
        text-align: center;
        justify-content: center;
        cursor: pointer;
    }
    .btn:hover {
        background-color: #e529b9;
    }
</style>


<?php $__env->startSection('title', 'CheckOut'); ?>
<?php $__env->startSection('head'); ?>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="<?php echo e(asset('js/stripe.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <header class="page-header">
        <h1>CheckOut</h1>
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
    <main class="checkout-page">
        <div class="container">
            <div class="checkout-form">
                <form action="<?php echo e(route('stripeCheckout')); ?>" id="payment-form" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="filed">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="Enter your name..." value="<?php echo e(old('name') ? old('name') : auth()->user()->name); ?>">
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="field-error"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="filed">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="Enter your email..."
                            value="<?php echo e(old('email') ? old('email') : auth()->user()->email); ?>">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="field-error"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="filed">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" class="<?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="Enter your phone..."
                            value="<?php echo e(old('phone') ? old('phone') : auth()->user()->phone); ?>">
                        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="field-error"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="filed">
                        <label for="country">Country</label>
                        <select name="" id="country">
                            <option value="">Select Your Country</option>
                            <option value="United States">United States</option>
                            <option value="Viet Nam">Viet Nam</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Korea">Korea</option>
                        </select>
                        <?php $__errorArgs = ['country'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="field-error"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="filed">
                        <label for="states">States</label>
                        <input type="text" id="states" name="states" class="<?php $__errorArgs = ['states'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="Enter your states..."
                            value="<?php echo e(old('states') ? old('states') : auth()->user()->states); ?>">
                        <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="field-error"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="filed">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" class="<?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="Viet Nam" value="<?php echo e(old('city') ? old('city') : auth()->user()->city); ?>">
                        <?php $__errorArgs = ['city'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="field-error"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="filed">
                        <label for="zipcode">Zipcode</label>
                        <input type="text" id="zipcode" name="zipcode" class="<?php $__errorArgs = ['zipcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="12345" value="<?php echo e(old('zipcode') ? old('zipcode') : auth()->user()->zipcode); ?>">
                        <?php $__errorArgs = ['zipcode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="field-error"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="filed">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" class="<?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                            placeholder="Enter your address..."
                            value="<?php echo e(old('address') ? old('address') : auth()->user()->address); ?>">
                        <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="field-error"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <input type="hidden" name="payment_method_id" id="payment_method_id" value="">

                    <label>
                        Card Details
                        <div id="card-element"></div>
                    </label>
                    <button type="submit" class="btn btn-primary">Submit Payment</button>

                </form>
            </div>

        </div>
    </main>

    <script>
        var stripe = Stripe('pk_test_51l6omlHxyFtMcKLAIFs2NwdnrYPpxEHbCgiW8p7q1uK56VViLQVfAHyR2FCILrrlMk30L8DQW6EGYlKaPnO0uuJ00yM4jAcWX');

        var elements = stripe.elements();

        var style = {
            base: {
                color: "#32325d",
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: "antialiased",
                fontSize: "16px",
                "::placeholder": {
                    color: "#aab7c4"
                }
            },
            invalid: {
                color: "#fa755a",
                iconColor: "#fa755a"
            },
        };

        var cardElement = elements.create('card', {style: style});
        cardElement.mount('#card-element');

        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createPaymentMethod({
                type: "card",
                card: "cardElement",
                billing_details: {
                    name: "Test Name"
                },
            }).then(stripePaymentMethodHandler);
        });

        function stripePaymentMethodHandler(result){
            if(result.error){

            }else{
                document.getElementById('payment_method_id').value = result.paymentMethod.id
                form.submit();
            }
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\btec\final project\New folder\legoWebsite-main\legoWebsite-main\example-app\resources\views/pages/checkout.blade.php ENDPATH**/ ?>