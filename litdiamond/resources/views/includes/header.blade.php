<header id="header">
    <div class="container">
        <a href="index.html" id="logo" title="Diana’s jewelry">Diana’s jewelry</a>
        <div class="right-links">
            <ul>
                <li><a href="{{ url('/cart') }}/"><span class="ico-products"></span>Cart</a></li>


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
            <li><a href="{{url('/')}}">Home</a></li>
            <?php
            foreach ($main_menu as $menu) {
                ?>
                <li><a href="{{ url('products/'.$menu->CategoryID) }}">{{ $menu->CategoryName }}</a></li>
                <?php
            }
            ?>
            <li><a href="{{url('/about')}}">About</a></li>
            <li><a href="{{url('/contact')}}">Contact</a></li>
        </ul>
    </div>
    <!-- / container -->
</nav>
<!-- / navigation -->