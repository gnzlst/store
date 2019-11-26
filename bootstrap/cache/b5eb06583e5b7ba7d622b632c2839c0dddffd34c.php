<?php $__env->startSection('title', 'Login to your account'); ?>
<?php $__env->startSection('data-page-id', 'auth'); ?>

<?php $__env->startSection('content'); ?>
    <div class="auth" id="auth">
        <section class="login_form">
            <div class="grid-x grid-padding-x">
                <div class="small-12 medium-6 medium-offset-3">
                    <h2 class="text-center">Login</h2>
                    <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <form action="/login" method="post">
                        <div class="input-group">
                            <span class="input-group-label"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                            <input class="input-group-field" type="text" name="username" placeholder="Username or Email"
                                   value="<?php echo e(\App\Classes\Request::old('post', 'username')); ?>">
                        </div>
                        <div class="input-group">
                            <span class="input-group-label"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
                            <input class="input-group-field" type="password" name="password" placeholder="Password">
                        </div>
                        <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
                        <button class="button float-right">Login</button>
                    </form>
                    <p>Not yet a member? <a href="/register">Register Here</a></p>

                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mystore\resources\views/login.blade.php ENDPATH**/ ?>