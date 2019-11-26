<?php $__env->startSection('title', 'Register Free Account'); ?>
<?php $__env->startSection('data-page-id', 'auth'); ?>

<?php $__env->startSection('content'); ?>
    <div class="auth" id="auth">
        <section class="register_form">
            <div class="grid-x grid-padding-x">
                <div class="small-12 medium-6 medium-offset-3">
                    <h2 class="text-center">Create Account</h2>
                    <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <form action="/register" method="post" autocomplete="off">
                        <div class="input-group">
                            <span class="input-group-label"><i class="fa fa-address-card fa-fw" aria-hidden="true"></i></span>
                            <input class="input-group-field" type="text" name="full_name" placeholder="Full Name"
                                   value="<?php echo e(\App\Classes\Request::old('post', 'full_name')); ?>">
                        </div>
                        <div class="input-group">
                            <span class="input-group-label"><i class="fa fa-at fa-fw" aria-hidden="true"></i></span>
                            <input class="input-group-field" type="text" name="email" placeholder="Email Address"
                                   value="<?php echo e(\App\Classes\Request::old('post', 'email')); ?>">
                        </div>
                        <div class="input-group">
                            <span class="input-group-label"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                            <input class="input-group-field" type="text" name="username" placeholder="Username"
                                   value="<?php echo e(\App\Classes\Request::old('post', 'username')); ?>">
                        </div>
                        <div class="input-group">
                            <span class="input-group-label"><i class="fa fa-key fa-fw" aria-hidden="true"></i></span>
                            <input class="input-group-field" type="password" name="password" placeholder="Password">
                        </div>
                        <div class="input-group">
                            <span class="input-group-label"><i class="fa fa-road fa-fw" aria-hidden="true"></i></span>
                            <input class="input-group-field" type="text" name="street_address"
                                   placeholder="Street and Number"
                                   value="<?php echo e(\App\Classes\Request::old('post', 'street_address')); ?>">
                        </div>
                        <div class="input-group">
                            <span class="input-group-label"><i class="fa fa-mail-bulk fa-fw"
                                                               aria-hidden="true"></i></span>
                            <input class="input-group-field" type="text" name="post_code" placeholder="Post Code"
                                   value="<?php echo e(\App\Classes\Request::old('post', 'post_code')); ?>">
                        </div>
                        <div class="input-group">
                            <span class="input-group-label"><i class="fa fa-city fa-fw" aria-hidden="true"></i></span>
                            <input class="input-group-field" type="text" name="city_suburb_town"
                                   placeholder="City, Suburb or Town"
                                   value="<?php echo e(\App\Classes\Request::old('post', 'city_suburb_town')); ?>">
                        </div>
                        <div class="input-group">
                            <span class="input-group-label"><i class="fa fa-flag fa-fw" aria-hidden="true"></i></span>
                            <input class="input-group-field" type="text" name="state_territory"
                                   placeholder="State or Territory"
                                   value="<?php echo e(\App\Classes\Request::old('post', 'state_territory')); ?>">
                        </div>
                        <div class="input-group">
                            <span class="input-group-label"><i class="fa fa-globe-asia fa-fw"
                                                               aria-hidden="true"></i></span>
                            <input class="input-group-field" type="text" name="country" placeholder="Country"
                                   value="<?php echo e(\App\Classes\Request::old('post', 'country')); ?>">
                        </div>
                        <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
                        <button class="button float-right">Register</button>
                    </form>
                    <p>Already Registered? <a href="/login">Login Here</a></p>

                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mystore\resources\views/register.blade.php ENDPATH**/ ?>