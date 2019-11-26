<?php $__env->startSection('title', 'Dashboard'); ?>
<?php $__env->startSection('data-page-id', 'adminDashboard'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row expanded">
        <div class="page-header">
            <div class="grid-x">
                <div class="cell medium-12 large-12">
                    <h3 class="margin-0-auto">
                        <i class="fa fa-tachometer-alt fa-fw margin-right-icon" aria-hidden="true"></i>
                        Dashboard
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
                                    <span class="show-for-sr">Current: </span>Dashboard
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
                    <div class="dashboard">
                        <div class="grid-container fluid">
                            <div class="grid-x grid-padding-x">
                                
                                <div class="cell medium-3 summary">
                                    <div class="card">
                                        <div class="card-section summary-orders">
                                            <div class="grid-x">
                                                <div class="small-3 cell">
                                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                </div>
                                                <div class="small-9 cell">
                                                    <p>Total</p>
                                                    <h4><?php echo e($orders); ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-divider order-details">
                                            <div class="grid-x cell">
                                                <a href="/admin/transactions/orders">Order Details <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="cell medium-3 summary">
                                    <div class="card">
                                        <div class="card-section">
                                            <div class="grid-x">
                                                <div class="small-3 cell">
                                                    <i class="fa fa-thermometer-empty" aria-hidden="true"></i>
                                                </div>
                                                <div class="small-9 cell">
                                                    <p>Products</p><h4><?php echo e($products); ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-divider products">
                                            <div class="grid-x cell">
                                                <a href="/admin/products">View Products <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="cell medium-3 summary">
                                    <div class="card">
                                        <div class="card-section">
                                            <div class="grid-x">
                                                <div class="small-3 cell">
                                                    <i class="fa fa-money-bill-alt" aria-hidden="true"></i>
                                                </div>
                                                <div class="small-9 cell">
                                                    <p>Revenue</p>
                                                    <h4>$<?php echo e(number_format($payments, 2)); ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-divider revenue">
                                            <div class="grid-x cell">
                                                <a href="/admin/transactions/payments">Payment Details <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="cell medium-3 summary">
                                    <div class="card">
                                        <div class="card-section">
                                            <div class="grid-x">
                                                <div class="small-3 cell">
                                                    <i class="fa fa-users" aria-hidden="true"></i>
                                                </div>
                                                <div class="small-9 cell">
                                                    <p>Signup</p>
                                                    <h4><?php echo e($users); ?></h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-divider signup">
                                            <div class="grid-x cell">
                                                <a href="/admin/users">Registered Users <i class="fas fa-arrow-circle-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="cell medium-6 monthly-revenue graph">
                                    <div class="card">
                                        <div class="card-section">
                                            <h4 class="float-left">Monthly Revenue</h4>
                                            <i class="fa fa-sync float-right sync-monthly-revenue" aria-hidden="true" title="Reload"></i>
                                            <canvas id="revenue"></canvas>
                                        </div>
                                    </div>
                                </div>

                                <div class="cell medium-6 monthly-sales graph">
                                    <div class="card">
                                        <div class="card-section clearfix">
                                            <h4 class="float-left">Monthly Orders</h4>
                                            <i class="fa fa-sync float-right sync-monthly-orders" aria-hidden="true" title="Reload"></i>
                                            <canvas id="order"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layout.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\mystore\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>