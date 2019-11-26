<?php $__env->startSection('title', 'Product Orders'); ?>
<?php $__env->startSection('data-page-id', 'adminOrders'); ?>
<?php $__env->startSection('content'); ?>
    <div class="category">
        <div class="row expanded">
            <div class="page-header">
                <div class="grid-x">
                    <div class="cell medium-12 large-12">
                        <h3 class="margin-0-auto">
                            <i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i>
                            Product Orders
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
                                        <span class="show-for-sr">Current: </span> Orders
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
                        <div class="grid-x grid-margin-x">
                            <div class="cell medium-12 large-12">
                                <?php if(isset($orders) && count($orders)): ?>
                                    <h3>List of Orders</h3>
                                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order_no => $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <ul class="accordion" data-accordion data-allow-all-closed="true">
                                            <li class="accordion-item" data-accordion-item>
                                                <a href="#" class="accordion-title">Order ID: <?php echo e($order_no); ?></a>
                                                <div class="accordion-content" data-tab-content>
                                                    <h4>Order ID: <?php echo e($order_no); ?></h4>
                                                    <table class="hover stack list-orders">
                                                        <thead>
                                                        <tr>
                                                            <th>Customer Name</th>
                                                            <th>Address</th>
                                                            <th>Post Code</th>
                                                            <th>City</th>
                                                            <th>State</th>
                                                            <th>Country</th>
                                                            <th>Geo IP</th>
                                                            <th>Order Date</th>
                                                            <th>Grand Total</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td><?php echo e($details['customer']['full_name']); ?></td>
                                                            <td><?php echo e($details['customer']['street_address']); ?></td>
                                                            <td><?php echo e($details['customer']['post_code']); ?></td>
                                                            <td><?php echo e($details['customer']['city_suburb_town']); ?></td>
                                                            <td><?php echo e($details['customer']['state_territory']); ?></td>
                                                            <td><?php echo e($details['customer']['country']); ?></td>
                                                            <td>
                                                                <a href="https://www.google.com.au/maps/place/<?php echo e($details['customer']['geo_latitude']); ?>, <?php echo e($details['customer']['geo_longitude']); ?>"
                                                                   target="_blank">
                                                                    <?php echo e($details['customer']['geo_city']); ?>

                                                                </a>
                                                            </td>
                                                            <td><?php echo e($details['when']); ?></td>
                                                            <td>$ <?php echo e(number_format($details['total'], 2)); ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="9" class="row-table-details">
                                                                <h4>Items</h4>
                                                                <table>
                                                                    <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Product Name</th>
                                                                        <th>Qty</th>
                                                                        <th>Unit Price</th>
                                                                        <th>Total</th>
                                                                        <th>Status</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <?php echo $__env->renderEach('admin.transactions.items', $details, 'detail'); ?>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                        <div class="title-bar-right">
                                            <?php echo $links; ?>

                                        </div>
                                        <?php else: ?>
                                            <h3 class="text-center subheader">Whoops... You have not made any
                                                sales.</h3>
                                        <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mystore\resources\views/admin/transactions/orders.blade.php ENDPATH**/ ?>