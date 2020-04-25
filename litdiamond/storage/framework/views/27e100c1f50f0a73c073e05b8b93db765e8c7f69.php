<header id="header">
    <div class="container">
        <a href="index.html" id="logo" title="Diana’s jewelry">Diana’s jewelry</a>
        <div class="right-links">
            <ul>
                <li><a href="<?php echo e(url('/cart')); ?>/"><span class="ico-products"></span>Cart</a></li>


            </ul>
        </div>
    </div>
    <!-- / container -->
</header>
<!-- / header -->

<nav id="menu">
    <div class="container">
        <div class="trigger"></div>
        <ul>
            <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
            <?php
            foreach ($main_menu as $menu) {
                ?>
                <li><a href="<?php echo e(url('products/'.$menu->CategoryID)); ?>"><?php echo e($menu->CategoryName); ?></a></li>
                <?php
            }
            ?>
            <li><a href="<?php echo e(url('/about')); ?>">About</a></li>
            <li><a href="<?php echo e(url('/contact')); ?>">Contact</a></li>
        </ul>
    </div>
    <!-- / container -->
</nav>
<!-- / navigation --><?php /**PATH C:\xampp\htdocs\Laravel\litdiamond\resources\views/includes/header.blade.php ENDPATH**/ ?>