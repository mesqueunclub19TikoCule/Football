<!DOCTYPE html>
<html>
<head>
    <title>FC Barcelona Web Site | Barça </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link href="{{asset('css/bootstrap.min.css')}}" rel='stylesheet' type='text/css'/>
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href='//fonts.googleapis.com/css?family=Yeseva+One' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700'
          rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic'
          rel='stylesheet' type='text/css'>
    <!---strat-date-piker---->
    {{--<link rel="{{asset("css/jquery-ui.css")}}"/>--}}
    <link href="{{asset("css/animate.css")}}" rel='stylesheet' type='text/css'/>
    <!---/End-Animation---->
    <!--Slideshow-->
    <link type="text/css" rel="stylesheet"
          href="{{asset("css/lightGallery.css")}}"/>
</head>
<body>
<div class="header" id="home">
    <div class="container">
        <div class="header-top w3l">
            <div class="logo wow fadeInLeft" data-wow-delay="0.5s">
                <a href="index.html"><img src="images/fcb.png" class="img-responsive" alt=""/></a>
            </div>
            <div class="top-menu">
                <span class="menu"> </span>
                <ul>
                    <li><a href="#home" class="scroll"><span data-hover="home">home</span></a></li>
                    <li><a href="#about" class="scroll"><span data-hover="about">news</span></a></li>
                    <li><a href="#menu" class="scroll"><span data-hover="menu">season </span></a></li>
                    <li ><a href="#reviews" class="scroll"><span data-hover="reviews">club</span></a></li>
                    <li><a href="#reviews" class="scroll"><span data-hover="reviews">media</span></a></li>
                    </li>
                </ul>
            </div>

            <!--script-nav-->
            <script>
                $("span.menu").onclick(function () {
                    $(".top-menu ul").slideToggle("slow", function () {
                    });
                });
            </script>

            <div class="clearfix"></div>
        </div>

        {{--<div class="baneer-center wow fadeInLeft" data-wow-delay="0.5s">--}}
            {{--<h1>the right ingredients for the right food</h1>--}}
            {{--<img src="{{asset("images/divider.png")}}" alt=""/>--}}
        {{--</div>--}}
        {{--<div class="buttons agileits">--}}
            {{--<a class="button" href="#">book a table</a>--}}
            {{--<a class="button1" href="#">see the menu</a>--}}
        {{--</div>--}}
    </div>

</div>


@yield('content')
<div class="footer-section wow fadeInLeft" data-wow-delay="0.5s">
    <div class="container">
        <div class="footer-grids w3layouts">
            <div class="col-md-4 footer-grid w3l">
                <h5>about us</h5>
                <img src="images/divider.png" alt=""/>
                <p>Lambda's new and expanded Chelsea location represents a truly authentic <span>Greek</span>
                    patisserie, featuring breakfasts of fresh croissants and</p>
                <p>steaming bowls of café.Lamda the best restaurant in town</p>

            </div>
            <div class="col-md-4 footer-grid w3l">
                <h5>Opening Hours</h5>
                <img src="images/divider.png" alt=""/>
                <p><span>Mon-Thu:</span> 7:00am-8:00pm</p>
                <p><span>Fri-Sun:</span> 7:00am-10:00pm</p>
                <a href="#"><img src="images/cards.png" alt=""/></a>
            </div>
            <div class="col-md-4 footer-grid w3l">
                <h5>Our Location</h5>
                <img src="images/divider.png" alt=""/>
                <p>19th Paradise Street Sitia</p>
                <p>128 Meserole Avenue</p>
                <div class="footer-socialicons">
                    <a href="#"><i class="icon4"></i></a>
                    <a href="#"><i class="icon5"></i></a>
                    <a href="#"><i class="icon6"></i></a>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="footer-bottom w3ls">
            <p> Copyright &copy;2018 TarTik. All rights Reserved </p>
        </div>
        <script type="text/javascript">
            $(document).ready(function () {
                /*
                var defaults = {
                      containerID: 'toTop', // fading element id
                    containerHoverID: 'toTopHover', // fading element hover id
                    scrollSpeed: 1200,
                    easingType: 'linear'
                 };
                */

                $().UItoTop({easingType: 'easeOutQuart'});

            });
        </script>
        <a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>


    </div>
</div>
</body>
<script type="application/x-javascript"> addEventListener("load", function () {
        setTimeout(hideURLbar, 0);
    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    } </script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset("js/jquery.min.js")}}"></script>
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="{{asset("js/move-top.js")}}"></script>
<script type="text/javascript" src="{{asset("js/easing.js")}}"></script>
<script type="text/javascript" src="{{asset("js/bootstrap.min.js")}}"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        $(".scroll").onclick(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
        });
    });
</script>
<!---End-smoth-scrolling---->
<script src="{{asset("js/jquery-ui.js")}}"></script>
<script>
    $(function () {
        $("#datepicker,#datepicker1").datepicker();
    });
</script>
<!---/End-date-piker---->
<!--Animation-->
<script src="{{asset("js/wow.min.js")}}"></script>
<script>
    new WOW().init();
</script>
<script src="{{asset("js/lightGallery.js")}}"></script>
<script src="{{asset("js/js.js")}}"></script>
</html>>