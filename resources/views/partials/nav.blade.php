<nav class="header__nav-wrap">

    <ul class="header__nav">
        <li class="current"><a href="/" title=""></a></li>

        {{-- BLOG POSTS --}}
        {{-- <li class="has-children">
            <a href="#0" title="">Blog Posts</a>
            <ul class="sub-menu">
                <li><a href="single-video.html">Video Post</a></li>
                <li><a href="single-audio.html">Audio Post</a></li>
                <li><a href="single-gallery.html">Gallery Post</a></li>
                <li><a href="single-standard.html">Standard Post</a></li>
            </ul>
        </li> --}}
        <li class="{{ (request()->is('musica')) ? 'current' : '' }}"><a href="{{url('musica')}}" title="">Musica</a>
        </li>
        <li class="{{ (request()->is('tenis')) ? 'current' : '' }}"><a href="{{url('tenis')}}" title="">Ténis</a></li>
        <li class="{{ (request()->is('novidades')) ? 'current' : '' }}"><a href="{{url('novidades')}}"
                title="">Novidades</a></li>
        <li class="{{ (request()->is('hacktivismo')) ? 'current' : '' }}"><a href="{{url('hacktivismo')}}"
                title="">#Hacktivismo</a></li>
        <li class="{{ (request()->is('about')) ? 'current' : '' }}"><a href="{{url('about')}}" title="">Sobre</a></li>
        {{-- <li class="{{ (request()->is('contact')) ? 'current' : '' }}"><a href="{{url('contact')}}"
            title="">Contacto</a> --}}
        <li class="{{ (request()->is('contact')) ? 'current' : '' }}"><a href="{{url('contact')}}" title="">Shop</a>
        </li>
    </ul> <!-- end header__nav -->

    <ul class="header__social">
        <li class="ss-facebook">
            <a href="https://facebook.com/">
                <span class="screen-reader-text">Facebook</span>
            </a>
        </li>
        <li class="ss-twitter">
            <a href="#0">
                <span class="screen-reader-text">Twitter</span>
            </a>
        </li>
        <li class="ss-instagram">
            <a href="#0">
                <span class="screen-reader-text">Instagram</span>
            </a>
        </li>
        {{-- <li class="ss-pinterest">
            <a href="#0">
                <span class="screen-reader-text">Behance</span>
            </a>
        </li>--}}
    </ul>

</nav> <!-- end header__nav-wrap -->
