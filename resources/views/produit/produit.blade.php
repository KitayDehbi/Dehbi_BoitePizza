@extends("template")
@section('title','HomePage')
@section('content','content')
<section class="story-area bg-seller color-white pos-relative">
<div class="container">
                <div class="heading">
                        <img class="heading-img" src="{{asset('images/heading_logo.png')}}">
                        <h2>{{$produit->name}}</h2>
                </div>
<div class="row">

<div class="col-lg-3 col-md-4  col-sm-6 ">
        <div class="center-text mb-30">
        <div class="ïmg-200x mlr-auto pos-relative">
        <h6 class="ribbon-cont"><div class="ribbon secondary"></div><b>{{$produit->categorie->name}}</b></h6>
        <img class ="trans" src="{{asset('storage/'.$produit->imgPath)}}" alt=""></div>
        <h4 class="mt-5"><b>{{$produit->prix}} CHF </b></h4>  
        </div><!--text-center-->
        </div>
        <div class="col-md-6">
        @if ($produit->isPromo == 1)
        <h4 class="mt-5"><b> Promo : oui </b></h4>
        @else 
        <h4 class="mt-5"><b>Promo :  non  </b></h4>
        @endif
        <ul>
        @foreach ($elements as $element) <li> <h5 class="mt-5"><b> |-- <?php echo $element->nom; ?></b></h5> </li> <br/> @endforeach
        </ul>
        </div>
        <div class="col-md-6">   
        </div>

</div>
</section>