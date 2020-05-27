<!DOCTYPE HTML>
<html lang="en">
<head>
        <title>Boite à Pizza</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">

        <!-- Font -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('fonts/beyond_the_mountains-webfont.css')}}" type="text/css"/>

        <!-- Stylesheets -->
        <link href="{{asset('plugin-frameworks/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('plugin-frameworks/swiper.css')}}" rel="stylesheet">
        <link href="{{asset('fonts/ionicons.css')}}" rel="stylesheet">
        <link href="{{asset('common/styles.css')}}" rel="stylesheet">

</head>
<body>

<header>
        <div class="container">
                <a class="logo" href="/home"><img src="{{asset('images/logo_white.png')}}" alt="Logo"></a>

                <div class="right-area">
                        <h6><a class="plr-20 color-white btn-fill-primary" href="/panier" style="margin-left:20px">Panier</a> 
                        <a  href="/logout"  onclick="event.preventDefault();1
                                                     document.getElementById('logout-form').submit();">
                                       deconnecter</a></h6>
                                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                
                </div><!-- right-area -->

                <a class="menu-nav-icon" data-menu="#main-menu" href="#"><i class="ion-navicon"></i></a>

                <ul class="main-menu font-mountainsre" id="main-menu">
                        <li><a href="/formule/">Acceuil</a></li>
                        <li><a href="/produit/">Produits</a></li>
                        <li><a href="/supplement/">Supplements</a></li>
                        
                </ul>

                <div class="clearfix"></div>
        </div><!-- container -->
</header>


<footer class="pb-50  pt-70 pos-relative">
        <div class="pos-top triangle-bottom"></div>
        <div class="container-fluid">
                <a href="/home"><img src="{{asset('images/heading_logo.png')}}" alt="Logo"></a>

                <div class="pt-30">
                        <p class="underline-secondary"><b>Address:</b></p>
                        <p>481 Creekside Lane Avila Beach, CA 93424 </p>
                </div>

                <div class="pt-30">
                        <p class="underline-secondary mb-10"><b>Phone:</b></p>
                        <a href="tel:+53 345 7953 32453 ">+53 345 7953 32453 </a>
                </div>

                <div class="pt-30">
                        <p class="underline-secondary mb-10"><b>Email:</b></p>
                        <a href="mailto:yourmail@gmail.com"> BoitePizza@gmail.com</a>
                </div>

                <ul class="icon mt-30">
                        <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
                        <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                        <li><a href="#"><i class="ion-social-dribbble-outline"></i></a></li>
                        <li><a href="#"><i class="ion-social-linkedin"></i></a></li>
                        <li><a href="#"><i class="ion-social-vimeo"></i></a></li>
                </ul>

                <p class="color-light font-9 mt-50 mt-sm-30"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ion-heart" aria-hidden="true"></i> by <a href="https://github.com/KitayDehbi/" target="_blank">Dehbi Ayoub</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div><!-- container -->
</footer>

<!-- SCIPTS -->
<script src="{{asset('plugin-frameworks/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('plugin-frameworks/bootstrap.min.js')}}"></script>
<script src="{{asset('plugin-frameworks/swiper.js')}}"></script>
<script src="{{asset('common/scripts.js')}}"></script>

</body>
</html> 