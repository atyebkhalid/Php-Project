<!DOCTYPE html>
<!--[if IE 8]> <html class="ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Checkout</title>
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
                    <li><a href="#">Checkout</a></li>
                </ul>
            </div>
            <!-- / container -->
        </div>
        <!-- / body -->
        <div class="container">
            <div id="content" class="full">
                <div class="cart-table">
                    <table>
                        <tr>
                            <th class="items">Items</th>
                            <th class="price">Price</th>
                        </tr>
                        <?php
                        $TotalAmount = 0;
                        if (Session::has('CartDetails') && count(Session::get('CartDetails')) > 0) {
                            foreach (Session::get('CartDetails') as $cart) {
                                ?>
                                <tr>
                                    <td class="items">

                                        <h3><a href="#"><?php echo e($cart['ProductName']); ?></a></h3>

                                    </td>
                                    <td class="price"><?php echo e($cart['SalePrice']); ?></td>
                                </tr>

                                <?php
                                $TotalAmount += $cart['SalePrice'];
                            }
                        }
                        ?>

                    </table>
                </div>
            </div>
        </div>

        <div id="body">
            <div class="container">
                <?php echo e(Form::open(['url' => 'checkout'])); ?>

                <div id="content" class="full">
                    <div class="product">
                        <div class="image">
                            <img width="100%" src="<?php echo e(url('resources/web/images/62.jpg')); ?>" alt="">
                        </div>
                        <div class="details">
                            <h1>Checkout</h1>
                            <h4>Fill the requirements: </h4>
                            <h2> <?php echo $__env->make('admin.includes.alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?></h2>
                            <div class="entry">
                                
                                <div id="chkout">
                                    <div class="ab">
                                        <h3>Customer Name:</h3>
                                        <?php echo e(Form::text('CustomerName', null, ['placeholder' => 'Customer Name*'])); ?>


                                        <h3>Cell:</h3>
                                        <?php echo e(Form::text('Cell', null, ['placeholder' => 'Cell*', 'autocomplete' => 'off'])); ?>


                                        <h3>Email:</h3>
                                        <?php echo e(Form::email('Email', null, ['placeholder' => 'Email*'])); ?>


                                        <h3>Address:</h3>
                                        <?php echo e(Form::text('Address', null, ['placeholder' => 'Address*'])); ?>

                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="total-count">
                        <h4>Total to pay:</h4>
                        <h3>Amount &nbsp; <strong>Rs. <?php echo e($TotalAmount); ?></strong></h3>
                        <button type="submit" class="btn-grey">Cash on delivery</button>
                    </div>
                    <!-- / content -->
                </div>
                 <?php echo e(Form::close()); ?>

                <!-- / container -->
            </div>
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
<?php /**PATH C:\xampp\htdocs\Laravel\litdiamond\resources\views/checkout.blade.php ENDPATH**/ ?>