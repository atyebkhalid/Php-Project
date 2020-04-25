<!DOCTYPE html>
<!--[if IE 8]> <html class="ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Diana’s jewelry</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
        <link rel="stylesheet" media="all" href="<?php echo e(url('resources/web')); ?>/css/style.css">
        <!--[if lt IE 9]>
                <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>

        <?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div id="breadcrumbs">
            <div class="container">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><?php echo e($Product->ProductName); ?></li>
                </ul>
            </div>
            <!-- / container -->
        </div>
        <!-- / body -->

        <div id="body">
            <div class="container">

                <div id="content" class="full">
                    <div class="product">
                        <div class="image">
                            <img src="<?php echo e(url('public/uploads/products/'.$Product->Image)); ?>" alt="">
                        </div>
                        <div class="details">
                            <h1><?php echo e($Product->ProductName); ?></h1>
                            <h4><?php echo e($Product->SalePrice); ?></h4>
                            <div class="entry">
                                <p><?php echo e($Product->Desc); ?>.</p>
                                <div class="tabs">

                                </div>
                            </div>
                            <div class="actions">
                                <label>Quantity:</label>
                                <select><option>1</option></select>
                                <a href="<?php echo e(url('add-to-cart/'.$Product->ProductID)); ?>" class="btn-grey">Add to cart</a>
                                <h2><?php echo $__env->make('admin.includes.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / content -->
            </div>
            <!-- / container -->
        </div>
        <!-- / body -->

        <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- / footer -->


        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script>window.jQuery || document.write("<script src='<?php echo e(url('resources/web')); ?>/js/jquery-1.11.1.min.js'>\x3C/script>")</script>
        <script src="<?php echo e(url('resources/web')); ?>/js/plugins.js"></script>
        <script src="<?php echo e(url('resources/web')); ?>/js/main.js"></script>
    </body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel\litdiamond\resources\views/product-detail.blade.php ENDPATH**/ ?>