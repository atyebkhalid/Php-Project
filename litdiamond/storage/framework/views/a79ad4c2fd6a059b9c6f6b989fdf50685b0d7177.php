<?php if($errors->any()): ?>
<div class="alert alert-danger">
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>
<?php endif; ?>

<?php if(Session::has('error')): ?>
<div class="alert alert-danger">
    <ul>
        <li><?php echo e(Session::get('error')); ?></li>
    </ul>
</div>
<?php endif; ?>

<?php if(Session::has('success')): ?>
<div class="alert alert-success">
    <ul>
        <li><?php echo e(Session::get('success')); ?></li>
    </ul>
</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Laravel\litdiamond\resources\views/admin/includes/alerts.blade.php ENDPATH**/ ?>