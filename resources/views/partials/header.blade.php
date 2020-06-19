{{-- <header role="banner">
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-9 social">
                    <a href="#"><span class="fa fa-twitter"></span></a>
                    <a href="#"><span class="fa fa-facebook"></span></a>
                    <a href="#"><span class="fa fa-instagram"></span></a>
                    <a href="#"><span class="fa fa-youtube-play"></span></a>
                    <a href="#"><span class="fa fa-vimeo"></span></a>
                    <a href="#"><span class="fa fa-snapchat"></span></a>
                </div>
                <div class="col-3 search-top">
                    <!-- <a href="#"><span class="fa fa-search"></span></a> -->
                    <form action="#" class="search-top-form">
                        <span class="icon fa fa-search"></span>
                        <input type="text" id="s" placeholder="Type keyword to search...">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container logo-wrap">
        <div class="row pt-5">
            <div class="col-12 text-center">
                <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button"
                    aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
                <h1 class="site-logo"><a href="/">{{setting('site.title')}}</a></h1>
</div>
</div>
</div>
@include('partials.nav')
</header> --}}



<!-- site header
        ================================================== -->
<header class="s-header">

    <div class="header__top">
        <div class="header__logo">
            <a class="site-logo" href="/">
                <img src="/images/logo.svg" alt="Homepage">
            </a>
        </div>

        <div class="header__search">

            <form role="search" method="get" class="header__search-form" action="#">
                <label>
                    <span class="hide-content">Procurar:</span>
                    <input type="search" class="search-field" placeholder="chave" value="" name=" s" title="Search for:"
                        autocomplete="off">
                </label>
                <input type="submit" class="header__search-submit" value="Search">
            </form>

            <a href="#" title="Close Search" class="header__search-close">Close</a>

        </div> <!-- end header__search -->

        <!-- toggles -->
        <a href="#0" class="header__search-trigger"></a>
        <a href="#0" class="header__menu-toggle"><span>Menu</span></a>

    </div> <!-- end header__top -->

    {{-- NAV HERE --}}

    @include('partials.nav')

</header> <!-- end s-header -->
