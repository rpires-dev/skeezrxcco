<!-- site header
        ================================================== -->
<header class="s-header">

    <div class="header__top">
        <div class="header__logo d-flex">
            <div class="d-flex flex-row">
                <a href="/"> <img class="site_icon" src="/images/logo.svg" alt="" style="vertical-align: sub;"></a>
                <a href=""> <img class="shopping-bag_icon" src="/images/shoppingBag.svg" alt=""
                        style="margin-left: 1.3em;width: auto;"></a>
                <img class="shopping-bag_icon" id="myAccount" src="/images/myaccount.svg" alt=""
                    style="margin-left: 1.3em;width: auto;">

            </div>


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
