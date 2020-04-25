<!DOCTYPE html>
<!--[if IE 8]> <html class="ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Diana’s jewelry</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
        <link rel="stylesheet" media="all" href="{{ url('resources/web') }}/css/style.css">
        <!--[if lt IE 9]>
                <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        @include('includes.header');


        <div id="breadcrumbs">
            <div class="container">
                <ul>
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>Cart</li>
                </ul>
            </div>
            <!-- / container -->
        </div>
        <!-- / body -->

        <div id="body">
            <div class="container">
                <h2 style="text-align: center; color: green;">@include('admin.includes.alerts')</h2>
                <div id="content" class="full">
                    <div class="cart-table">
                        <table>
                            <tr>
                                <th class="items">Items</th>
                                <th class="price">Price</th>
                                <th class="delete"></th>
                            </tr>
                            <?php
                            $TotalAmount = 0;
                            if (Session::has('CartDetails') && count(Session::get('CartDetails')) > 0) {
                                foreach (Session::get('CartDetails') as $cart) {
                                    ?>
                                    <tr>
                                        <td class="items">
                                            <div class="image">
                                                <img width="20%" src="{{ url('public/uploads/products/'.$cart['Image']) }}" alt="">
                                            </div>
                                            <h3><a href="#">{{ $cart['ProductName'] }}</a></h3>

                                        </td>
                                        <td class="price">{{ $cart['SalePrice'] }}</td>
                                        <td class="delete"><a href="#" class="ico-del"></a></td>
                                    </tr>

                                    <?php
                                    $TotalAmount += $cart['SalePrice'];
                                }
                            }
                            ?>

                        </table>
                    </div>

                    <div class="total-count">
                        <h4>Total to pay:</h4>
                        <h3>Amount&nbsp;<strong>Rs. {{ $TotalAmount }}</strong></h3>
                        <a href="{{ url('checkout') }}" class="btn-grey">Finalize and pay</a>
                    </div>

                </div>
                <!-- / content -->
            </div>
            <!-- / container -->
        </div>
        <!-- / body -->


        @include('includes.footer');
        <!-- / footer -->


        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script>window.jQuery || document.write("<script src='{{ url('resources/web') }}/js/jquery-1.11.1.min.js'>\x3C/script>")</script>
        <script src="{{ url('resources/web') }}/js/plugins.js"></script>
        <script src="{{ url('resources/web') }}/js/main.js"></script>
    </body>
</html>
