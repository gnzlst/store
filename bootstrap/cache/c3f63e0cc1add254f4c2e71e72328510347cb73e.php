<?php

use App\Models\Category;

$categories = Category::with('subCategories')->get();
?>
<header class="navigation">
    <div class="title-bar toggle" data-responsive-toggle="main-animated-menu" data-hide-for="medium">
        <button class="menu-icon" type="button" data-toggle></button>
        <div class="title-bar-title"><a href="/">PC Factory</a></div>
    </div>

    <div class="top-bar" id="main-animated-menu" data-animate="hinge-in-from-top hinge-out-from-top"
         data-responsive-menu="drilldown medium-dropdown" data-click-open="true" data-disable-hover="true"
         data-close-on-click-inside="false" data-dropdown-menu>

        <div class="top-bar-left">
            <ul class="dropdown menu" data-dropdown-menu>
                <li class="menu-text logo" onclick="location.href='/'"></li>
                <li><a href="/products">Products</a></li>
                <?php if(count($categories)): ?>
                    <li>
                        <a href="/products/category">Categories</a>
                        <ul class="menu vertical dropdown">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a href="/products/category/<?php echo e($category->slug); ?>"><?php echo e($category->name); ?></a>
                                    <?php if(count($category->subCategories)): ?>
                                        <ul class="menu vertical sub">
                                            <?php $__currentLoopData = $category->subCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <a href="/products/category/<?php echo e($category->slug); ?>/<?php echo e($subCategory->slug); ?>">
                                                        <?php echo e($subCategory->name); ?>

                                                    </a>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="top-bar-right">
            <ul class="menu">
                <?php if(isAuthenticated()): ?>
                    <li><a href="#">Welcome <?php echo e(user()->full_name); ?></a></li>
                    <li><a href="/cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Cart</a></li>
                    <li><a href="/logout">Logout</a></li>
                <?php else: ?>
                    <li><a href="/login">Sign In</a></li>
                    <li><a href="/register">Register</a></li>
                    <li><a href="/cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;Cart</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</header>
<?php /**PATH C:\xampp\htdocs\mystore\resources\views/includes/nav.blade.php ENDPATH**/ ?>