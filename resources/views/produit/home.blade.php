@extends("template")
@section('title','HomePage')


<section class="story-area bg-seller color-white pos-relative">
<div class="container">
                <div class="heading">
                        <img class="heading-img" src="{{asset('images/heading_logo.png')}}">
                        <h2>Notre Pizza</h2>
                        
                        
                </div>
<div class="row">
@foreach ($pizzas as $pizza)
<div class="col-lg-3 col-md-4  col-sm-6 ">
        <div class="center-text mb-30">
        <div class="ïmg-200x mlr-auto pos-relative">
        <h6 class="ribbon-cont"><div class="ribbon secondary"></div><b>{{$pizza->name}}</b></h6>
        <img src="{{asset('storage/'.$pizza->imgPath)}}" alt="">  
        </div>
        <h4 class="mt-5"><b>{{$pizza->prix}} CHF</b></h4>
        @if ($pizza->isPromo == 1)
        <h4 class="mt-5"><b> Promo : oui </b></h4>
        @else 
        <h4 class="mt-5"><b>Promo :  non </b></h4>
        @endif
        <h6 class="mt-20" style="margin-left:30px"><a href="/produit/{{$pizza->id}}" class="btn-brdr-primary plr-25"><b>Voir</b></a></h6>
        <form action ="/ajouterProduit" method="post" class="form-style-1 placeholder-1" style="margin-top:10px;margin-left:30px">
                        @csrf
                        <input  class="plr-25" type="number" name="id" value="{{$pizza->id}}" hidden/> 
                        <div > <input class="mb-20" type="number" name="qte" placeholder="Quantité"></div>
                        <button class="btn-brdr-primary plr-25" type ="submit" > Ajouter </button>
                </form>        </div><!--text-center-->
        </div>
@endforeach
</div>
</section>

<section class="story-area bg-seller color-white pos-relative">
        <div class="pos-bottom triangle-up"></div>
        <div class="pos-top triangle-bottom"></div>
        <div class="container">
                <h4 class="font-30 font-sm-20  center-text mb-25">ajouter une <b>Salad</b> à votre commande</h4>
        </div><!-- container -->
</section>
<section class="story-area  color-white pos-relative">
<div class="container">
                <div class="heading">
                        <img class="heading-img" src="{{asset('images/heading_logo.png')}}">
                        <h2 class="dark">Notre Salades</h2>
                </div>
<div class="row">
@foreach ($salades as $pizza)
<div class="col-lg-3 col-md-4  col-sm-6 ">
        <div class="center-text mb-30">
        <div class="ïmg-200x mlr-auto pos-relative">
        <h6 class="ribbon-cont"><div class="ribbon secondary"></div><b>{{$pizza->name}}</b></h6>
                <img src="{{asset('storage/'.$pizza->imgPath)}}" alt="">                                         
        </div>
        <h4 class="dark"><b>{{$pizza->prix}} CHF</b></h4>
        @if ($pizza->isPromo == 1)
        <h4 class="dark"><b> Promo : oui </b></h4>
        @else 
        <h4 class="dark"><b> Promo : non </b></h4>
        @endif
        <h6 class="mt-20" style="margin-left:30px"><a href="/produit/{{$pizza->id}}" class="btn-brdr-primary plr-25"><b>Voir</b></a></h6>        
        <form action ="/ajouterProduit" method="post" class="form-style-1 placeholder-1" style="margin-top:10px;margin-left:30px">
                        @csrf
                        <input  class="plr-25" type="number" name="id" value="{{$pizza->id}}" hidden/> 
                        <div > <input class="mb-20" type="number" name="qte" placeholder="Quantité"></div>
                        <button class="btn-brdr-primary plr-25" type ="submit" > Ajouter </button>
                </form>
        </div><!--text-center-->
        </div>
@endforeach
</div>
</section>

<section class="story-area bg-seller color-white pos-relative">
        <div class="pos-bottom triangle-up"></div>
        <div class="pos-top triangle-bottom"></div>
        <div class="container">
        <div class="heading">
                        <img class="heading-img" src="{{asset('images/heading_logo.png')}}">
                        <h2 class="dark">Notre Boissons</h2>
                </div>
        </div><!-- container -->
</section>

<section class="bg-lite-blue">
        <div class="container">
         @foreach($boissons as $boisson)
        <div class="row">
        <div class="col-md-6">
        <div class="sided-90x mb-30 ">
        <div class="s-left"><img class="br-3" src="{{asset('storage/'.$boisson->imgPath)}}" alt="Menu Image"></div><!--s-left-->
         <div class="s-right">
        <h5 class="mb-10"><b>{{$boisson->name}}</b><b class="color-primary float-right">{{$boisson->prix}} CHF</b></h5>
        <form action ="/ajouterProduit" method="post" class="form-style-1 placeholder-1">
                        @csrf
                        <input  class="plr-25" type="hidden" name="id" value="{{$boisson->id}}"/> 
                        <div class="col-md-6"> <input class="mb-20" type="number" name="qte" placeholder="Quantité"></div>
                        <button class="btn-brdr-primary plr-25" type ="submit" > Ajouter </button>
                </form>        </div><!--s-right-->
        </div><!-- sided-90x -->
        </div><!-- food-menu -->  
        </div><!-- row -->
        @endforeach
        </div><!-- container -->
</section>