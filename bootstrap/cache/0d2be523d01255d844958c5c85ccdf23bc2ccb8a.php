<?php $__env->startSection('title', 'Manage Inventory'); ?>
<?php $__env->startSection('data-page-id', 'adminProduct'); ?>
<?php $__env->startSection('content'); ?>
    <div class="products">
        <div class="row expanded">
            <div class="page-header">
                <div class="grid-x">
                    <div class="cell medium-12 large-12">
                        <h3 class="margin-0-auto">
                            <i class="fa fa-compress fa-fw" aria-hidden="true"></i>
                            Manage Inventory Items
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row expanded">
            <div class="page-header-breadcrumbs">
                <div class="grid-x">
                    <div class="cell medium-12 large-12">
                        <h6 class="margin-0-auto">
                            <nav aria-label="You are here:" role="navigation">
                                <ul class="breadcrumbs margin-0-auto">
                                    <li><i class="fa fa-home fa-fw margin-right-icon" aria-hidden="true"></i>
                                        <a href="/admin">Dashboard</a></li>
                                    <li>
                                        <span class="show-for-sr">Current: </span> Manage items
                                    </li>
                                </ul>
                            </nav>
                        </h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="row expanded">
            <div class="page-wrapper">
                <div class="page-background">
                    <div class="grid-container fluid">
                        <?php echo $__env->make('includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php if(isset($message)): ?>
                            <p><?php echo e($message); ?></p>
                        <?php endif; ?>

                        <div class="grid-x grid-padding-x">
                            <div class="small-12 cell">
                                <a href="/admin/product/create" class="button success float-right">
                                    <i class="fa fa-plus"></i> Add New Product
                                </a>
                            </div>
                        </div>

                        <div class="grid-x grid-margin-x">
                            <div class="cell medium-12 large-12">
                                <?php if(count($products)): ?>
                                    <h3>List of Products</h3>
                                    <table class="hover stack unstriped list-tables list-products"
                                           data-form="deleteForm">
                                        <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Category</th>
                                            <th>Subcategory</th>
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th colspan="2">Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><img src="/<?php echo e($product['image_path']); ?>" alt="<?php echo e($product['name']); ?>"
                                                         title="<?php echo e($product['name']); ?>" class="image-list-products"/></td>
                                                <td><?php echo e($product['name']); ?></td>
                                                <td class="pull-right"><?php echo e($product['price']); ?></td>
                                                <td class="pull-right"><?php echo e($product['quantity']); ?></td>
                                                <td><?php echo e($product['category_name']); ?></td>
                                                <td><?php echo e($product['sub_category_name']); ?></td>
                                                <td>
                                                    <time class="timeago" datetime="<?php echo e($product['created_at']); ?>"
                                                          title="<?php echo e($product['created_at']); ?>"><?php echo e($product['created_at']); ?></time>
                                                </td>
                                                <td>
                                                    <time class="timeago" datetime="<?php echo e($product['updated_at']); ?>"
                                                          title="<?php echo e($product['updated_at']); ?>"><?php echo e($product['updated_at']); ?></time>
                                                </td>
                                                <td>
                                                    <a href="/admin/product/<?php echo e($product['id']); ?>/edit" data-tooltip
                                                       aria-haspopup="true"
                                                       class="has-tip top"
                                                       data-disable-hover="false" tabindex="1"
                                                       title="Edit <?php echo e($product['name']); ?>">
                                                        <i class="fa fa-edit button-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                    <div class="title-bar-right">
                                        <?php echo $links; ?>

                                    </div>
                                <?php else: ?>
                                    <h3 class="text-center subheader">Whoops... There are not products here. Create
                                        one!</h3>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mystore\resources\views/admin/products/inventory.blade.php ENDPATH**/ ?>