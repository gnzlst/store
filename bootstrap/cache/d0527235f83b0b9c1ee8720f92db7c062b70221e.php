<h3>
    <a href="/admin">
        <i class="fa fa-infinity fa-fw" aria-hidden="true"></i>
        OMDC
    </a>
</h3>
<div class="avatar-wrapper">
    <div class="avatar-container">
        <div class="credential">
            <div class="credential-image-holder">
                <a href="#">
                    <img src="/images/claudia-bravo.jpg" class="credential-image" alt="Administrator"
                         title="Administrator">
                </a>
            </div>
            <div class="credential-text-holder">
                <?php if(user()): ?>
                    <div class="credential-name"><?php echo e(user()->full_name); ?></div>
                    <div class="credential-location">
                        <i class="fa fa-map-marker-alt fa-fw"></i><?php echo e(user()->geo_city); ?>, <?php echo e(user()->geo_region_code); ?>.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<ul class="vertical menu nav">
    <li><a href="/admin"><i class="fa fa-tachometer-alt fa-fw" aria-hidden="true"></i>Dashboard</a></li>
    <li><a href="/admin/users"><i class="fa fa-users fa-fw" aria-hidden="true"></i>Users</a></li>
    <li><a href="/admin/product/create"><i class="fa fa-plus fa-fw" aria-hidden="true"></i>Add Product</a></li>
    <li><a href="/admin/products"><i class="fa fa-box-open fa-fw" aria-hidden="true"></i>Manage Products</a></li>
    <li><a href="/admin/product/categories"><i class="fa fa-compress fa-fw" aria-hidden="true"></i>Categories</a></li>
    <li><a href="/admin/transactions/orders"><i class="fa fa-shopping-cart fa-fw" aria-hidden="true"></i>View Orders</a>
    </li>
    <li><a href="/admin/transactions/payments"><i class="fa fa-money-bill-alt fa-fw" aria-hidden="true"></i>Payments</a>
    </li>
</ul><?php /**PATH C:\xampp\htdocs\mystore\resources\views/includes/admin-sidebar.blade.php ENDPATH**/ ?>