<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Responsive Bootstrap App Landing Page Template">
    <title>Grile admitere medicina 2019!</title>

    <!-- KEYWORDS THAT DESCRIBES YOUR PAGE -->
    <meta name="keywords" content="khales, Bootstrap, Landing page, Template, App, Mobile">

    <!-- HELP US SPREAD THE LOVE :-) -->
    <meta name="author" content="book.boluwebtasarim.net">

    <!-- ALLOW GOOGLE TO INDEX YOUR PAGE -->
    <META NAME="ROBOTS" CONTENT="INDEX, FOLLOW">


    <!-- Fonts -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700"> -->

    <!-- Styles -->
    
    
    <link rel="icon" href="img/favicon/favicon.ico">

    <!-- SET OF FAVICONS FOR APPLE PRODUCTS -->
    <link rel="apple-touch-icon" href="img/favicon/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png">

    <!-- =========================
         FONTS
    ============================== -->
    <!-- Montserrat FONT FROM GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <!-- ELEGANT ICON PACK FOR YOUR PAGE -->
    <link href="css/icons/elegant.css" rel='stylesheet' type='text/css'>

    <!-- =========================
         MAIN STYLESHEETS
    ============================== -->
    <!-- BOOTSTRAP -->
    <link href="css/bootstrap/bootstrap.css" rel="stylesheet">

    <!-- ALIVE! THEME -->
    <link href="css/style.css" rel="stylesheet" id="theme-change">

    <!-- COLORBOX THEME -->
    <!-- CAROUSEL THEME -->
    <link href="css/plugins/plugins.css" rel="stylesheet">


    <!-- =========================
         ANIMATIONS
    ============================== -->
    <!-- ALIVE THEME ANIMATIONS -->
    <!-- ANIMATIONS BASED ON ANIMATE.CSS -->
    <link href="css/animations/animations.css" rel="stylesheet" type="text/css">
    
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    
</head>
<body id="body" class="page-loading">

    <!-- =========================
         PRELOADER
    ============================== -->
    <div id="preloader">
        <div id="loading"></div>
    </div>


    <!-- =========================
         MAIN MENU
    ============================== -->
    <nav id="mainmenu" class="navbar navbar-fixed-top main-menu head-menu auto-height" role="navigation">
        <div class="container">

            <!-- LOGO CONTAINER -->
            <div class="logo-cont">
                <a class="navbar-brand" href="#header">
                    <!-- SCROLLS TO TOP OF THE PAGE -->
                    <!--PLACE URL OF YOUR LOGO BELOW-->
                    <img src="img/logo.png" alt>

                </a>

            </div>

            <!-- MAIN MENU BUTTONS CONTAINER -->
            <div class="buttons-cont">

                <!-- OPEN MODAL WITH LOGIN FORM -->
                @if (Auth::guest())
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#joinUs">Incepe Acum</button>
                @else
                    <a type="button" class="btn btn-primary" href="{{ url('/home')}}">Incepe Acum</a>
                @endif
                <!-- BUY BUTTON - PLACE LINK TO YOUR APP HERE 
                <button type="button" class="btn btn-success" onclick="location.reload();location.href='#'">Buy The Book</button>-->

            </div>

            <!-- "BURGER MENU" FOR RESPONSIVE VIEW -->
            <div class="navbar-header" id="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- MAIN MENU CONTAINER -->
            <div id="navbar" class="navbar-collapse collapse">
                <div class="navbar-right">
                    <ul class="nav navbar-nav">

                        <!-- MAIN MENU POSITIONS -->
                        <li><a href="#features">Features</a></li>
                        <li><a href="#about">About</a></li>
                       <!-- <li><a href="#reviews">Reviews</a></li>
                        <li><a href="#subscribe">Subscribe</a></li>
                        <li><a href="#pricing">Pricing</a></li>
                        <li><a href="#author">Author</a></li>
                        <li><a href="#gallery">Gallery</a></li>
                        <li><a href="#contact">Contact</a></li> -->

                    </ul>
                </div>
            </div>

        </div>
    </nav>
    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
    @if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
    <!-- =========================
         JOIN US MODAL
    ============================== -->
    <div class="modal fade" id="joinUs" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <!-- CLOSE MODAL BUTTON -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <!-- MODAL TITLE -->
                    <h5 class="modal-title" id="myModalLabel">Join our community today!</h5>

                    <!-- MODAL SUBTITLE -->
                    <h6>Register an account or login now</h6>

                </div>

                <!-- LOGIN FORM -->
                <div class="modal-body" id="login">
                    <form class="form-horizontal" role="form" autocomplete="off" data-toggle="validator" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">

                            <!-- E-MAIL INPUT -->
                            <div class="input-group col-xs-12">

                                <!-- ICON -->
                                <div class="input-group-addon"><span class="elegant icon_mail_alt"></span></div>

                                <!-- INPUT -->
                                <input type="email" class="form-control" name="email" placeholder="e-mail adress" autocomplete="off" value="{{ old('email') }}" required autofocus>
                                
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <!-- ERROR MESSAGE BOX -->
                            <div class="help-block with-errors"></div>

                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <!-- PASSWORD INPUT -->
                            <div class="input-group col-xs-12">

                                <!-- ICON -->
                                <div class="input-group-addon"><span class="icon-password">*</span></div>

                                <!-- INPUT -->
                                <input type="password" class="form-control" name="password" placeholder="password" autocomplete="off" data-minlength="5" required>
                                
                            </div>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            <!-- ERROR MESSAGE BOX -->
                            <div class="help-block with-errors"></div>

                        </div>

                        <div class="input-group col-xs-12">

                            <!-- SUBMIT BUTTON -->
                            <button type="submit" class="btn btn-success col-xs-12">

                                <!-- ICON -->
                                <span class="icon_profile"></span>

                                <!-- BUTTON TEXT -->
                                Login

                            </button>

                        </div>

                        <!--CHANGE FORM TO PASSWORD REMINDER-->
                        <p class="other" id="gotoRemind">
                            <a href="{{ url('/password/reset')}}"></a>
                        </p>

                    </form>
                </div>

                <!-- REGISTRATION FORM -->
                <div class="modal-body noopacity nodisplay" id="register">
                    <form class="form-horizontal" role="form" autocomplete="off" data-toggle="validator" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

                            <!-- E-MAIL INPUT -->
                            <div class="input-group col-xs-12">

                                <!-- ICON -->
                                <div class="input-group-addon"><span class="elegant icon_mail_alt"></span></div>

                                <!-- INPUT -->
                                <input type="text" class="form-control" name="name" placeholder="name" autocomplete="off" value="{{ old('name') }}" required autofocus>

                            </div>
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            <!-- ERROR MESSAGE BOX -->
                            <div class="help-block with-errors"></div>

                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <!-- E-MAIL INPUT -->
                            <div class="input-group col-xs-12">

                                <!-- ICON -->
                                <div class="input-group-addon"><span class="elegant icon_mail_alt"></span></div>

                                <!-- INPUT -->
                                <input type="email" class="form-control" name="email" placeholder="e-mail adress" value="{{ old('email') }}" autocomplete="off" required>

                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <!-- ERROR MESSAGE BOX -->
                            <div class="help-block with-errors"></div>

                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <!-- PASSWORD INPUT -->
                            <div class="input-group col-xs-12">

                                <!-- ICON -->
                                <div class="input-group-addon"><span class="icon-password">*</span></div>

                                <!-- INPUT -->
                                <input type="password" class="form-control" id="password" name="password" placeholder="password" autocomplete="off" data-minlength="5" required>

                            </div>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                            <!-- ERROR MESSAGE BOX -->
                            <div class="help-block with-errors"></div>

                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                            <!-- PASSWORD REPEAT INPUT -->
                            <div class="input-group col-xs-12">

                                <!-- ICON -->
                                <div class="input-group-addon"><span class="icon-repeat">**</span></div>

                                <!-- INPUT -->
                                <input type="password" class="form-control" name="password_confirmation" placeholder="repeat password" autocomplete="off" data-match="#register-password" required>

                            </div>
                            @if ($errors->has('password_confirmation'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @endif
                            <!-- ERROR MESSAGE BOX -->
                            <div class="help-block with-errors"></div>

                        </div>

                        <div class="form-group">
                            <div class="input-group col-xs-12">

                                <!-- SUBMIT BUTTON -->
                                <button type="submit" class="btn btn-success col-xs-12">

                                    <!-- ICON -->
                                    <span class="icon_profile"></span>

                                    <!--BUTTON TEXT-->
                                    Create Account

                                </button>

                            </div>
                        </div>

                    </form>
                </div>

                <!-- PASSWORD REMINDER FORM -->
                <div class="modal-body noopacity nodisplay" id="remind">
                    <form class="form-horizontal" role="form" autocomplete="off" data-toggle="validator">
                        <div class="form-group">

                            <!-- E-MAIL INPUT -->
                            <div class="input-group col-xs-12">

                                <!-- ICON -->
                                <div class="input-group-addon"><span class="elegant icon_mail_alt"></span></div>

                                <!-- INPUT -->
                                <input type="email" class="form-control" id="remind-email" placeholder="e-mail adress" autocomplete="off" required>

                            </div>

                            <!-- ERROR MESSAGE BOX -->
                            <div class="help-block with-errors"></div>

                        </div>

                        <div class="form-group">
                            <div class="input-group col-xs-12">

                                <!-- SUBMIT BUTTON -->
                                <button type="submit" class="btn btn-success col-xs-12">

                                    <!-- ICON -->
                                    <span class="icon_profile"></span>

                                    <!-- BUTTON TEXT -->
                                    Send me new password

                                </button>

                            </div>
                        </div>

                    </form>
                </div>

                <!-- MODAL FOOTERS -->
                <div class="modal-footer">

                    <!-- LOGIN & PASSWORD REMINDER FOOTER -->
                    <p id="gotoRegister">Need an account? <span>Register here.</span></p>

                    <!-- REGISTRATION FOOTER -->
                    <p id="gotoLogin" class="noopacity nodisplay">Already have an account?  <span>Login here.</span></p>

                </div>

            </div>
        </div>
    </div>
    <!-- =========================
         HEADER
    ============================== -->
    <section id="header" class="parallax">

        <div class="container">
            <div class="row">

                <!-- HEADER CONTENT LEFT -->
                <div class="header-cont col-xs-12 col-sm-12 col-md-8">

                    <!-- MARGIN FROM TOP -->
                    <div class="header-margin"></div>

                    <!-- HEADER TEXT -->
                    <header class="anim-bounce-up">

                        <!-- HEADER TITLE -->
                        <h3>

                            <!-- SMALL TITLE -->
                            <span class="">Susții admiterea </span><br />

                            <!-- REGULAR TITLE -->
                            la facultate în <span class="header-txt-color">2019?</span>

                        </h3>

                        <!-- SUBTITLE -->
                        <h3>Fii cu un pas înaintea concurenței!</h3>
                         <!-- <p>Lorem ipsum dolor sit amet, consectetur adip iscing elit. Mauris hendrerit eros ac fermentum Fusce sodales enim at efficitur sagittis consectetur adip iscing elit.</p>-->
                    </header>

                    <!-- HEADER BUTTONS -->
                    <div class="buttons-cont">

                        <!-- DOWNLOAD BUTTON -->
                        <div class="btn btn-lg btn-success anim-bounce-left">
                        @if (Auth::guest())
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#joinUs">

                                <!-- ICON -->
                                <span class="elegant icon_book"></span>

                                <!-- BUTTON TEXT -->
                                Incepe Acum!!

                            </a>
                            
                        @else
                            <a href="{{ url('/home')}}">

                                <!-- ICON -->
                                <span class="elegant icon_book"></span>

                                <!-- BUTTON TEXT -->
                                Incepe Acum!!

                            </a>
                        @endif
                            
                        </div>

                        

                    </div>

                </div>

                <!-- HEADER CONTENT RIGHT -->
                <div class="header-cont col-md-4 hidden-sm hidden-xs">

                    <!-- MARGIN FROM TOP -->
                    <div class="header-margin"></div>

                    <!-- PRODUCT IMAGE -->
                    <div class="header-image-right">
                        <img class="anim-from-right" src="img/header/img-phone.png" alt>
                    </div>

                </div>

            </div>
        </div>

    </section>
    <!-- =========================
         FEATURES
    ============================== -->
    <section id="features">
        <div class="container">

            <!-- VISABLE FEATURES
            <div class="row">
                <div class="col-md-12">
                    <h3 class="header-div">Topics in the Book</h3>

                    <!-- FEATURES DESCRIPTION
                    <p class="header-p">Lorem ipsum dolor sit amet consectetur adip scing elit mauris</p>
                </div>
            </div> -->
            <div class="row">

                <!-- FEATURE 1 -->
                <div class="feature col-md-4 col-sm-12">
                    <span class="elegant icon_easel"></span>
                    <h5>Productivitate.</h5>
                    <p>Acces la un sistem performant care te ajută să îți “programezi” mai bine timpul de învățat și timpul liber..</p>
                </div>

                <!-- FEATURE 2 -->
                <div class="feature col-md-4 col-sm-12">
                    <span class="elegant icon_heart"></span>
                    <h5>Eficiență.</h5>
                    <p>Indiferent că este vorba de time-efficiency sau o abordare mai rapidă și inteligentă a grilelor, platforma noastră schimbă totul.</p>
                </div>

                <!-- FEATURE 3 -->
                <div class="feature col-md-4 col-sm-12">
                    <span class="elegant icon_lifesaver"></span>
                    <h5>Progres.</h5>
                    <p>Prin sistemul inteligent de statistici, platforma îți va arăta oricând ai nevoie care este progresul tău de-a lungul timpului pe acest site.</p>
                </div>
            </div>

            <!-- LOAD MORE FEATURES BUTTON -->
            <div class="row load-more anim-fade-down">
                <button type="button" class="btn btn-lg btn-primary" data-toggle="collapse" data-target="#MoreFeatures">

                    More Features

                </button>
            </div>

            <!-- MORE FEATURES - VISABLE AFTER "SHOW MORE" IS CLICKED -->
            <div class="row">
                <div id="MoreFeatures" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="row">

                            <!--SAME MARKUP AS ABOWE-->
                            <!-- FEATURE 4 -->
                            <div class="feature col-md-4 col-sm-12">

                                <!-- FEATURE ICON -->
                                <span class="elegant icon_document_alt anim-bounce-left"></span>

                                <!-- FEATURE TITLE -->
                                <h5>Clean code. We mean it.</h5>

                                <!-- FEATURE DESCRIPTION -->
                                <p>Based on Bootstrap v3.3.2, HTML5 & CSS3, fully commented and described in documentation code. Incredibly easy to customize!</p>

                            </div>

                            <!-- FEATURE 5 -->
                            <div class="feature col-md-4 col-sm-12">

                                <!-- FEATURE ICON -->
                                <span class="elegant icon_lightbulb_alt anim-bounce"></span>

                                <!-- FEATURE TITLE -->
                                <h5>Endless possibilities!</h5>

                                <!-- FEATURE DESCRIPTION -->
                                <p>8 predefined color schemes, 4 layouts, 12 types of animations, parallax effect, smart navigation bar... and still more to come!</p>

                            </div>

                            <!-- FEATURE 6 -->
                            <div class="feature col-md-4 col-sm-12">

                                <!-- FEATURE ICON -->
                                <span class="elegant icon_tablet anim-bounce-right"></span>

                                <!-- FEATURE TITLE -->
                                <h5>Responsive Web Design</h5>

                                <!-- FEATURE DESCRIPTION -->
                                <p>Thanks to RWD technology alive theme will look great on any device: Smartphone, Tablet, PC, Mac, TV... just give it a try!</p>

                            </div>


                        </div>

                        <div class="row">

                            <!-- FEATURE 7 -->
                            <div class="feature col-md-4 col-sm-12">
                                <span class="elegant icon_id"></span>
                                <h5>Dynamic modals system</h5>
                                <p>You want your visitors to stay connected? Use alive theme dynamic modals to make them register and login easily. Build your community!</p>
                            </div>

                            <!-- FEATURE 8 -->
                            <div class="feature col-md-4 col-sm-12">
                                <span class="elegant icon_mail_alt"></span>
                                <h5>Subscribe and drop a line</h5>
                                <p>Gather e-mail addresses of you visitors, without editing a single line of code! Paste your e-mail address to get a line from your visitors.</p>
                            </div>

                            <!-- FEATURE 9 -->
                            <div class="feature col-md-4 col-sm-12">
                                <span class="elegant icon_genius"></span>
                                <h5>For your apps, products and more!</h5>
                                <p>Alive theme gives you almost endless possibilities to present your app, products or event startups. In just few minutes!</p>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- =========================
         FUN FACTS
    ============================== -->
    <section id="funfacts">
        <div class="container">
            <div class="row">

                <!-- FUN FACTS CAROUSEL -->
                <div class="carousel-funfacts" id="carousel-funfacts">

                    <!-- FACT 1 -->
                    <div class="carousel-element col-md-12">

                        <!-- ICON -->
                        <span class="elegant icon_bag anim-bounce"></span>

                        <!-- NUMBER COUNT UP (DEFINATED IN alive.scripts.js) -->
                        <p id="count01" class="count"></p>

                        <!-- DESCRIPTION -->
                        <p class="desc">Total Book</p>

                    </div>

                    <!-- FACT 2 -->
                    <div class="carousel-element col-md-12">

                        <!-- ICON -->
                        <span class="elegant icon_profile anim-bounce"></span>

                        <!-- NUMBER COUNT UP (DEFINATED IN alive.scripts.js) -->
                        <p id="count02" class="count"></p>

                        <!-- DESCRIPTION -->
                        <p class="desc">Online Readers</p>

                    </div>

                    <!-- FACT 3 -->
                    <div class="carousel-element col-md-12">

                        <!-- ICON -->
                        <span class="elegant icon_comment anim-bounce"></span>

                        <!-- NUMBER COUNT UP (DEFINATED IN alive.scripts.js) -->
                        <p id="count03" class="count"></p>

                        <!-- DESCRIPTION -->
                        <p class="desc">Comments</p>

                    </div>

                    <!-- FACT 4 -->
                    <div class="carousel-element col-md-12">

                        <!-- ICON -->
                        <span class="elegant social_twitter anim-bounce"></span>

                        <!-- NUMBER COUNT UP (DEFINATED IN alive.scripts.js) -->
                        <p id="count04" class="count"></p>

                        <!-- DESCRIPTION -->
                        <p class="desc">Twitter Fans</p>

                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- =========================
         ABOUT
    ============================== -->
    <section id="about">
        <h2 class="anim-fade-up">

            <!-- MAIN TITLE -->
            Lorem ipsum dolor<br />

            <!-- SUBTITLE -->
            <span>Aliquam lorem elit</span>

        </h2>
    </section>
    <!-- COPYRIGHT -->
    <div class="col-sm-3 col-xs-12 footerinfo">
        © 2017 all rights reserved.
        <br />
        <a data-toggle="modal" data-target="#PrivacyModal">Privacy</a> | <a data-toggle="modal" data-target="#TermOfUseModal">Terms of Use</a>
    </div>
    <!-- PRIVACY MODAL -->
    <div class="modal fade" id="PrivacyModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <!-- CLOSE MODAL BUTTON -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <!-- MODAL TITLE -->
                    <h5 class="modal-title" id="myModalLabel">Privacy</h5>

                </div>
                <div class="modal-body">
                    <p class="formModal2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam iaculis libero non accumsan pharetra. Aenean vel est luctus, rhoncus sapien sit amet, pretium mauris.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam iaculis libero non accumsan pharetra.</p>
                    <p class="formModal2">  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam iaculis libero non accumsan pharetra. Aenean vel est luctus, rhoncus sapien sit amet, pretium mauris.Lorem ipsum dolor sit amet.</p>
                    <p class="formModal2"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam iaculis libero non accumsan pharetra. Aenean vel est luctus, rhoncus sapien sit amet, pretium mauris.</p>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- TERMS OF USE MODAL -->
    <div class="modal fade" id="TermOfUseModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">

                    <!-- CLOSE MODAL BUTTON -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <!-- MODAL TITLE -->
                    <h5 class="modal-title" id="myModalLabel">Terms of Use</h5>

                </div>
                <div class="modal-body">
                    <p class="formModal2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam iaculis libero non accumsan pharetra. Aenean vel est luctus, rhoncus sapien sit amet, pretium mauris.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam iaculis libero non accumsan pharetra.</p>
                    <p class="formModal2">  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam iaculis libero non accumsan pharetra. Aenean vel est luctus, rhoncus sapien sit amet, pretium mauris.Lorem ipsum dolor sit amet.</p>
                    <p class="formModal2"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam iaculis libero non accumsan pharetra. Aenean vel est luctus, rhoncus sapien sit amet, pretium mauris.</p>

                </div>
            </div>
        </div>
    </div>




    
    <!-- JavaScripts -->
    <script type="text/javascript" src="js/jquery_1.11.1.min.js"></script>

    <!-- BOOTSTRAP SCRIPTS -->
    <script type="text/javascript" src="js/bootstrap.js"></script>

    <!-- SMOOTH SCROLLING FIX -->
    <script type="text/javascript" src="js/smoothscroll.js"></script>

    <!-- PARALLAX -->
    <script type="text/javascript" src="js/parallax.js" id="parallax-change"></script>

    <!-- HEADROOM -->
    <script type="text/javascript" src="js/headroom.min.js"></script>
    <script type="text/javascript" src="js/jQuery.headroom.js"></script>

    <!-- VIEWPORT DETECTION -->
    <script type="text/javascript" src="js/jquery.inview.min.js"></script>

    <!-- CAROUSEL -->
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>

    <!-- COUTNUP -->
    <script type="text/javascript" src="js/countUp.min.js"></script>

    <!-- FORM VALIDATION -->
    <script type="text/javascript" src="js/validator.js"></script>

    <!-- IMAGE ZOOM - COLORBOX JS-->
    <script type="text/javascript" src="js/jquery.colorbox-min.js"></script>

    <!--CUSTOM THEME SCRIPTS & SETTINGS -->
    <script type="text/javascript" src="js/alive.scripts.js"></script>
 
    <!--GOOGLE MAPS -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script> -->
    <!-- <script type="text/javascript" src="js/custom.js"></script> -->
    
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
