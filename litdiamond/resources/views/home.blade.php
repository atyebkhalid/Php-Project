<!DOCTYPE html>
<!--[if IE 8]> <html class="ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>Diana’s jewelry</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
        <link rel="stylesheet" media="all" href="{{ url('resources/web') }}/css/style.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <!--[if lt IE 9]>
                <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>

        @include('includes.header')
        <!-- / navigation -->
        <h1 style="text-align: center; color: green;">@include('admin.includes.alerts')</h1>
    <marquee><h4>Our new accessories arrive soon...</h4></marquee><hr>
        <div id="slider">
            <ul>
                <li>
                    <img src="{{ url('resources/web/images/0.jpg') }}"/>			
                </li>
                <li class="purple" >
                    <img src="{{ url('resources/web/images/01.jpg') }}"/>
                </li>
                <li class="yellow" >
                    <img src="{{ url('resources/web/images/02.jpg') }}"/>
                </li>
                <li class="yellow">
                    <img src="{{ url('resources/web/images/03.jpg') }}"/>
                </li>
                <li class="yellow" >
                    <img src="{{ url('resources/web/images/04.jpg') }}"/>
                </li>
            </ul>
        </div>
        <!-- / body -->

        <div id="body">
            <div class="container">
                <div class="last-products">

                    <h2>Last added products</h2>

                    <section class="products">
                        <?php
                        foreach ($Products as $product_details) {
                            ?>
                            <article>
                                <img width="100%" src="{{ url('public/uploads/products/'.$product_details->Image) }}" alt="">
                                <h3>{{ $product_details->ProductName }}</h3>
                                <h4>{{ $product_details->SalePrice }}</h4>
                                <a href="{{ url('product-detail/'.$product_details->ProductID) }}" class="btn-add">View Details</a>
                            </article>
                            <?php
                        }
                        ?>

                    </section> 

                </div>
               
            </div>
            <img width="100%" src="{{ url('resources/web/images/5.jpg') }}"/>	
            <!-- / container -->
        </div>
        <!-- / body -->

        @include('includes.footer')


        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script>window.jQuery || document.write("<script src='{{ url('resources/web') }}/js/jquery-1.11.1.min.js'>\x3C/script>")</script>
        <script src="{{ url('resources/web') }}/js/plugins.js"></script>
        <script src="{{ url('resources/web') }}/js/main.js"></script>

    </body>
</html>