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
