<?php $__env->startSection('title', 'Homepage'); ?>
<?php $__env->startSection('data-page-id', 'home'); ?>

<?php $__env->startSection('content'); ?>
    <div class="home">
        <section class="hero">
            <div class="hero-slider">
                <?php for($i = 1; $i <= 8; $i++): ?>
                    <div><img src="/images/home-sliders/slide-<?php echo e($i); ?>.jpg" alt="PC Factory Slide <?php echo e($i); ?>"
                              title="PC Factory Slide <?php echo e($i); ?>"></div>
                <?php endfor; ?>
            </div>
        </section>
        <section class="display-products" data-token="<?php echo e($token); ?>" id="root">
            <h2>Featured Products</h2>
            <div class="grid-container">
                <div class="grid-x grid-padding-x medium-unstack equal-height-cards">
                    <div class="cell medium-4" v-cloak v-for="feature in featured">
                        <div class="card">
                            <h5>
                                {{ stringLimit(feature.name, 24) }}
                            </h5>
                            <div class="card-section">
                                <img :src="'/' + feature.image_path">
                            </div>
                            <div class="card-divider-more">
                                <a :href="'/product/' + feature.id" class="button more expanded">
                                    <i class="fa fa-search" aria-hidden="true"></i>&nbsp;
                                    See More
                                </a>
                            </div>
                            <div class="card-divider-add-to-cart">
                                <button v-if="feature.quantity > 0" @click.prevent="addToCart(feature.id)"
                                        class="button cart expanded"><i class="fa fa-cart-plus" aria-hidden="true"></i>&nbsp;
                                    ${{ feature.price.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') }} - Add to cart
                                </button>
                                <button v-else class="button warning expanded" disabled>
                                    Out of Stock
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h2>Product Picks</h2>
            <div class="grid-container">
                <div class="grid-x grid-padding-x medium-unstack equal-height-cards">
                    <div class="cell medium-3" v-cloak v-for="product in products">
                        <div class="card">
                            <h5>
                                {{ stringLimit(product.name, 18) }}
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mystore\resources\views/home.blade.php ENDPATH**/ ?>