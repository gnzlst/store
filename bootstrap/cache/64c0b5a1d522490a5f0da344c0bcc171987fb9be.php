<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="author" content="Gonzalo Soto">
    <title><?php echo e(getenv('APP_NAME')); ?> - <?php echo $__env->yieldContent('title'); ?></title>
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'/>
    <link rel="stylesheet" href="/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css"/>
</head>
<body data-page-id="<?php echo $__env->yieldContent('data-page-id'); ?>">
<div class="off-canvas position-left reveal-for-large nav" id="offCanvas" data-off-canvas>
    <?php echo $__env->make('includes.admin-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<div class="off-canvas-content admin-title-bar" data-off-canvas-content>
    <div id="container">
        <header id="header" class="header">
        </header>
        <div id="header">
            <?php echo $__env->make('includes.admin-header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div id="body">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        <div id="footer">
            <?php echo $__env->make('includes.admin-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</div>
<script src="/js/all.js"></script>
</body>
</html><?php /**PATH C:\xampp\htdocs\mystore\resources\views/admin/layout/base.blade.php ENDPATH**/ ?>