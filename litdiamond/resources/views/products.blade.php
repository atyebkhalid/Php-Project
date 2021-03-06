
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

        @include('includes.header'):
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
                    <li>{{$Products->links()}}</li>
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
                                <li><a href="{{ url('products/'.$menu->CategoryID) }}">{{ $menu->CategoryName }}</a></li>
                                
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
                                    <a href="{{ url('product-detail/'.$prod->ProductID) }}"><img width="100%" src="{{ url('public/uploads/products/'.$prod->Image) }}" alt="" ></a>
                                    <h3><a href="{{ url('product-detail/'.$prod->ProductID) }}">{{ $prod->ProductName }}</a></h3>
                                    <h4><a href="{{ url('product-detail/'.$prod->ProductID) }}">Rs:{{ $prod->SalePrice }}</a></h4>
                                    <h2><a href="{{ url('product-detail/'.$prod->ProductID) }}" ><b>See details</b></a></h2>
                                    <a href="{{ url('add-to-cart/'.$prod->ProductID) }}" class="btn-add">Add to cart</a>
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
                    <li><a href="#">{{$Products->links()}}</a></li>
                </ul>
            </div>
        </div>
        <!-- / container -->
    </div>
    <!-- / body -->
    i
    @include('includes.footer');
    <!-- / footer -->


    <script src="{{ url('resources/web') }}/http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script>window.jQuery || document.write("<script src='{{ url('resources/web') }}/js/jquery-1.11.1.min.js'>\x3C/script>")</script>
    <script src="{{ url('resources/web') }}/js/plugins.js"></script>
    <script src="{{ url('resources/web') }}/js/main.js"></script>
</body>
</html>
