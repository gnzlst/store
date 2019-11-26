<?php $__env->startSection('title', 'Payments'); ?>
<?php $__env->startSection('data-page-id', 'adminPayments'); ?>
<?php $__env->startSection('content'); ?>
    <div class="category">
        <div class="row expanded">
            <div class="page-header">
                <div class="grid-x">
                    <div class="cell medium-12 large-12">
                        <h3 class="margin-0-auto">
                            <i class="fa fa-money-bill-alt fa-fw" aria-hidden="true"></i>
                            Payments
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
                                        <span class="show-for-sr">Current: </span> Payments
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
                                <?php if(isset($payments) && count($payments)): ?>
                                    <h3>List of Payments</h3>
                                    <table class="hover stack list-payments">
                                        <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Amount</th>
                                            <th>Order No</th>
                                            <th>Item Count</th>
                                            <th>Status</th>
                                            <th>Date Created</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($payment['customer']['full_name']); ?></td>
                                                <td>$ <?php echo e(number_format($payment['amount'], 2)); ?></td>
                                                <td><?php echo e($payment['order_no']); ?></td>
                                                <td><?php echo e($payment['item_count']); ?></td>
                                                <td><span class="label <?php if($payment['status'] === 'Pending'): ?> warning  <?php endif; ?> <?php if($payment['status'] === 'succeeded'): ?> success <?php endif; ?>"><?php echo e($payment['status']); ?></span></td>

                                                <td><?php echo e($payment['added']); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>

                                    <div class="title-bar-right">
                                        <?php echo $links; ?>

                                    </div>
                                <?php else: ?>
                                    <h3 class="text-center subheader">Whoops... You have not received any
                                        payments yet.</h3>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mystore\resources\views/admin/transactions/payments.blade.php ENDPATH**/ ?>