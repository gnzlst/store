<?php if(isset($detail['product'])): ?>
    <tr>
        <td>
            <img src="/<?php echo e($detail['product']['image_path']); ?>"
                 alt="<?php echo e($detail['product']['name']); ?>" title="<?php echo e($detail['product']['name']); ?>" class="image-order">
        </td>
        <td><?php echo e($detail['product']['name']); ?></td>
        <td><?php echo e($detail['quantity']); ?></td>
        <td>$ <?php echo e(number_format($detail['unit_price'], 2)); ?></td>
        <td>$ <?php echo e(number_format($detail['total'], 2)); ?></td>
        <td>
            <span class="label <?php if($detail['status'] === 'Pending'): ?> warning  <?php endif; ?> <?php if($detail['status'] === 'Ok'): ?> success <?php endif; ?>"><?php echo e($detail['status']); ?></span>
        </td>
    </tr>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\mystore\resources\views/admin/transactions/items.blade.php ENDPATH**/ ?>