<style>
    .login-page {
        min-height: 100vh;
        background-image: url(https://thumbs.dreamstime.com/b/vibrant-meccano-puzzle-kit-set-light-white-paper-backdrop-freehand-line-dark-black-color-ink-hand-drawn-design-object-logo-152473486.jpg);
        opacity: 1;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .login-form-box {
        background: #fff;
        border-radius: 10px;
        padding: 30px;
        width: 500px;
        max-width: 100%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .login-title {
        font-size: 30px;
        font-weight: 600;
        text-align: center;
        margin-bottom: 30px;
        color: #9681EB;
        text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;
    }

    .field {
        margin-bottom: 25px;
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
    }

    .field a {
        text-align: center;
        margin-right: 100px;
        color: #55afd5;
    }

    .field input {
        width: 100%;
        padding: 10px 15px;
        border-radius: 200px;
        border: 1px solid #55afd5;
    }

    .field button {
        background: rgb(71, 184, 221);
        color: #fff;
        width: 100%;
        text-align: center;
        font-family: 'Times New Roman', Times, serif;
        height: 40px;
        border-radius: 200px;
        cursor: pointer;
    }

    .field button:hover {
        background: #13698e;
    }

    .forgot-password {
        text-align: center;
        margin-top: 10px;
    }

    .forgot-password a {
        color: #55afd5;
        text-decoration: none;
    }
</style>


<?php $__env->startSection('title', 'Login Page'); ?>
<?php $__env->startSection('content'); ?>
    <section class="login-page">
        <div class="login-form-box">
            <div class="login-title">Welcome To Login Page</div>
            <div class="login-form">
                <form action="<?php echo e(route('login')); ?>" method="post"> 
                    <?php echo csrf_field(); ?>

                    <div class="field">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter your email...">
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

                    <div class="field">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> has-error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="Enter your password...">
                        <?php $__errorArgs = ['password'];
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
                   
                    <div class="field">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>

                    <div class="forgot-password">
                        <a href="<?php echo e(route('password.request')); ?>">Forgot Password?</a>
                    </div>

                    <div class="field">
                        <a href="<?php echo e(route('register')); ?>">New User? Register Now!</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php echo $__env->make('pages.components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\btec\final project\New folder\legoWebsite-main\legoWebsite-main\example-app\resources\views/pages/login.blade.php ENDPATH**/ ?>