
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

        <?php echo $__env->make('includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>:
        <!-- / navigation -->

        <div id="breadcrumbs">
            <div class="container">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li>Product results</li>
                </ul>
            </div>
            <!-- / container -->
        </div>
        <!-- / body -->

        <div id="body">
            <div class="container">
                <ol>
                    <li><?php echo e($Products->links()); ?></li>
                </ol>
                        
            </div>

            <div class="products-wrap">
                <aside id="sidebar">

                    <div class="widget">
                        <h3>Products per page:</h3>
                        <?php
                        foreach ($main_menu as $menu) {
                            ?>

                            <fieldset>
                                <li><a href="<?php echo e(url('products/'.$menu->CategoryID)); ?>"><?php echo e($menu->CategoryName); ?></a></li>
                                
                            </fieldset>
                            <?php
                        }
                        ?>
                    </div>
                    

                </aside>
                <div id="content">
                    <section class="products">
                        <?php
                        if (count($Products) > 0) {
                            foreach ($Products as $prod) {
                                ?>
                                <article>
                                    <a href="<?php echo e(url('product-detail/'.$prod->ProductID)); ?>"><img width="100%" src="<?php echo e(url('public/uploads/products/'.$prod->Image)); ?>" alt="" ></a>
                                    <h3><a href="<?php echo e(url('product-detail/'.$prod->ProductID)); ?>"><?php echo e($prod->ProductName); ?></a></h3>
                                    <h4><a href="<?php echo e(url('product-detail/'.$prod->ProductID)); ?>">Rs:<?php echo e($prod->SalePrice); ?></a></h4>
                                    <h2><a href="<?php echo e(url('product-detail/'.$prod->ProductID)); ?>" ><b>See details</b></a></h2>
                                    <a href="<?php echo e(url('add-to-cart/'.$prod->ProductID)); ?>" class="btn-add">Add to cart</a>
                                </article>

                                <?php
                            }
                        }
                        ?>

                    </section>
                </div>
                <!-- / content -->
            </div>


            <div class="pagination">
                <ul>
                    <li><a href="#"><?php echo e($Products->links()); ?></a></li>
                </ul>
            </div>
        </div>
        <!-- / container -->
    </div>
    <!-- / body -->
    i
    <?php echo $__env->make('includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>;
    <!-- / footer -->


    <script src="<?php echo e(url('resources/web')); ?>/http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>window.jQuery || document.write("<script src='<?php echo e(url('resources/web')); ?>/js/jquery-1.11.1.min.js'>\x3C/script>")</script>
    <script src="<?php echo e(url('resources/web')); ?>/js/plugins.js"></script>
    <script src="<?php echo e(url('resources/web')); ?>/js/main.js"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Laravel\litdiamond\resources\views/products.blade.php ENDPATH**/ ?>