@extends("template")
@section('content','content')
<section class="story-area bg-seller color-white pos-relative">
<div class="container">
                <div class="heading">
                        <img class="heading-img" src="{{asset('images/heading_logo.png')}}">
                        <h2>Notre Supplements</h2>
                </div>
<div class="row">
@foreach ($supplements as $supplement)
<div class="col-lg-3 col-md-4  col-sm-6 ">
        <div class="center-text mb-30">
                <div class="ïmg-200x mlr-auto pos-relative">
                <img src="{{asset('images/alg.png')}}" alt="">                             
                </div>
                <h4 class="mt-5"><b>{{$supplement->name}}</b></h4>
                <h4 class="mt-5"><b>{{$supplement->prix}} CHF</b></h4>
                <form action ="/ajouterSupplement" method="post" class="form-style-1 placeholder-1" style="margin-top:10px;margin-left:30px">
                        @csrf
                        <input  class="plr-25" type="number" name="id" value="{{$supplement->id}}" hidden/> 
                        <div class=""> <input class="mb-20" type="number" name="qte" placeholder="Quantité"></div>

                        <button class="btn-brdr-primary plr-25" type ="submit" > Ajouter </button>
                </form>
                </div><!--text-center-->
                </div>
@endforeach
</div>
</section>