@section('css')
<link rel="stylesheet" href="/css/custom_footer.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
@endsection
<style>
    #related__item {
        text-align: left;
        float: left;
        width: 23.33333%;

    }
</style>
<footer class="s-footer">
    <div class="row" style="align-items: center;">
        <div class="column large-6 tab-full">
            <div style="text-align: left;"> <img src="skrIcon.svg" alt=""
                    style="width: 17%;height:auto;text-align:left;"></div>
        </div>

        <div class="column large-6 tab-full">
            <div>
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
                </li> --}}
                </ul>
            </div>
        </div>

    </div>

    <div class="column large-full footer__content">
        <hr>
    </div>
    {{-- Min 600 Px Content --}}
    <div class="column large-full footer__content">
        <div class="col-12" style="padding: 100px;padding-top:20px;">


            <ul class="related" id="related_footer" style="text-align: left;">
                <li id="related__item" class="related__item">

                    <h3 class="footer_text">Skeezrxcco</h3>
                    <a href="#">
                        <p class="footer_item">Contacto </p>
                    </a>
                    <a href="#">
                        <p class="footer_item">Sobre </p>
                    </a>
                    <a href="#">
                        <p class="footer_item">Publicidade </p>
                    </a>
                    <a href="#">
                        <p class="footer_item">Arquivos </p>
                    </a>
                </li>
                <li id="related__item" class="related__item">


                    <h3 class="footer_text">Secções</h3>

                    <a href="">
                        <p class="footer_item">Seleções</p>
                    </a> <a href="">
                        <p class="footer_item">Vidas</p>
                    </a> <a href="">
                        <p class="footer_item">Estilos</p>
                    </a> <a href="">
                        <p class="footer_item">Artistas</p>
                    </a>
                </li>
                <li id="related__item" class="related__item">

                    <h3 class="footer_text">Adições</h3>

                    <a href="">
                        <p class="footer_item"> Revista
                        </p>
                    </a>
                    <a href="">
                        <p class="footer_item"> Videos
                        </p>
                    </a> </a>
                    <a href="">
                        <p class="footer_item"> Podcasts
                        </p>
                    </a>
                    <a href="">
                        <p class="footer_item"> Newsletter
                        </p>
                    </a>
                </li>
                <li id="related__item" class="related__item">

                    <h3 class="footer_text">Loja</h3>

                    <a href="">
                        <p class="footer_item">A minha conta </p>
                    </a>
                    <a href="">
                        <p class="footer_item">Termos e Condições </p>
                    </a>
                    <a href="">
                        <p class="footer_item">Entregas e devoluções </p>
                    </a>
                    <a href="">
                        <p class="footer_item">FAQ</p>
                    </a>
                    <a href="">
                        <p class="footer_item">Serviço cliente </p>
                    </a>

                </li>
            </ul>

        </div>
    </div>




    <div class="row">

        <div class="column large-full footer__content">
            <div class="footer__copyright">
                <span>© Direitos de autor skeezrxcco 2020</span>
                <span>Desenhado por <a href="#">Ricardo Pires</a></span>

            </div>
        </div>
        <div class="column large-full footer__content">
            <div class="footer__copyright">
                <span>Agradecimentos a <a href="https://www.styleshout.com/">StyleShout</a></span>
            </div>
        </div>
    </div>

    <div class="go-top">
        <a class="smoothscroll" title="Back to Top" href="#top"></a>
    </div>
</footer>
@section('js')

<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script type="text/javascript">
    $(document).ready( function() {$( '.sidebar' ).fixedsticky();  });
</script>
<script type="text/javascript">
    $(document).ready(function() {
  $(".set > a").on("click", function() {
    if ($(this).hasClass("active")) {
      $(this).removeClass("active");
      $(this)
        .siblings(".content")
        .slideUp(200);
      $(".set > a i")
        .removeClass("fa-minus")
        .addClass("fa-plus");
    } else {
      $(".set > a i")
        .removeClass("fa-minus")
        .addClass("fa-plus");
      $(this)
        .find("i")
        .removeClass("fa-plus")
        .addClass("fa-minus");
      $(".set > a").removeClass("active");
      $(this).addClass("active");
      $(".content").slideUp(200);
      $(this)
        .siblings(".content")
        .slideDown(200);
    }
  });
});

</script>

@endsection
