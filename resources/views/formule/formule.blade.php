@extends("template")
@section('title','HomePage')
@section('content','content')
<section class="story-area bg-seller color-white pos-relative">
<div class="container">
                <div class="heading">
                        <img class="heading-img" src="{{asset('images/heading_logo.png')}}">
                        <h2>{{$formule->nom}}</h2>
                </div>
<div class="row">

<div class="col-lg-3 col-md-4  col-sm-6 ">
        <div class="center-text mb-30">
        <div class="ïmg-200x mlr-auto pos-relative">
        <h6 class="ribbon-cont"><div class="ribbon secondary"></div><b>{{$formule->nom}}</b></h6>
        <img class ="trans" src="{{asset('storage/'.$formule->imgPath)}}" alt=""></div>
        <h4 class="mt-5"><b>{{$formule->prix}} CHF</b></h4>  
        </div><!--text-center-->
        </div>
        <div class="col-md-6">
                <p class="mb-30" >{{$formule->description}}</p>
        </div>
</div>
</section>