<?php $__env->startSection('title', 'Products'); ?>
<?php $__env->startSection('data-page-id', 'products'); ?>

<?php $__env->startSection('content'); ?>
    <div class="home">
        <section class="display-products" data-token="<?php echo e($token); ?>" id="root">
            <h2>Products</h2>
            <div class="grid-container">
                <div class="grid-x grid-padding-x medium-unstack equal-height-cards">
                    <div class="cell medium-4" v-cloak v-for="product in products">
                        <div class="card">
                            <h5>
                                {{ stringLimit(product.name, 24) }}
                            </h5>
                            <div class="card-section">
                                <img :src="'/' + product.image_path">
                            </div>
                            <div class="card-divider-more">
                                <a :href="'/product/' + product.id" class="button more expanded">
                                    <i class="fa fa-search" aria-hidden="true"></i>&nbsp;
                                    See More
                                </a>
                            </div>
                            <div class="card-divider-add-to-cart">
                                <button v-if="product.quantity > 0" @click.prevent="addToCart(product.id)"
                                        class="button cart expanded"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;
                                    ${{ product.price.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') }} - Add to cart
                                </button>
                                <button v-else class="button warning expanded" disabled>
                                    Out of Stock
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <i v-show="loading" class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mystore\resources\views/products.blade.php ENDPATH**/ ?>