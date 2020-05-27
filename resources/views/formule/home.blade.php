@extends("template")
@section('content','content')
<section class="story-area bg-seller color-white pos-relative">
<div class="container">
                <div class="heading">
                        <img class="heading-img" src="{{asset('images/heading_logo.png')}}">
                        <h2>Notre Formules</h2>
                        
                </div>
<div class="row">
@foreach ($formules as $formule)
<div class="col-lg-3 col-md-4  col-sm-6 ">
        <div class="center-text mb-30">
                <div class="ïmg-200x mlr-auto pos-relative">
                <h6 class="ribbon-cont"><div class="ribbon secondary"></div><b>{{$formule->nom}}</b></h6>
                <img src="{{asset('storage/'.$formule->imgPath)}}" alt="">                             
                </div>
                <h4 class="mt-5"><b>{{$formule->prix}} CHF</b></h4>
                <h6 class="mt-20" style="margin-left:30px"><a href="/formule/{{$formule->id}}" class="btn-brdr-primary plr-25"><b>Voir</b></a></h6>
                <form action ="/ajouterFormule" method="post" class="form-style-1 placeholder-1" style="margin-top:10px;margin-left:30px">
                        @csrf
                        <input  class="plr-25" type="number" name="id" value="{{$formule->id}}" hidden/> 
                        <div> <input class="mb-20" type="number" name="qte" placeholder="Quantité"></div>
                        <button class="btn-brdr-primary plr-25" type ="submit" > Ajouter </button>
                </form>
                
                </div><!--text-center-->
                </div>
@endforeach
</div>
</section>


<section class="story-area left-text center-sm-text pos-relative">
        <div class="abs-tbl bg-2 w-20 z--1 dplay-md-none"></div>
        <div class="abs-tbr bg-3 w-20 z--1 dplay-md-none"></div>
        <div class="container">
                <div class="heading">
                        <img class="heading-img" src="{{asset('images/heading_logo.png')}}" alt="">
                        <h2>Our Story</h2>
                </div>

                <div class="row">
                        <div class="col-md-6">
                                <p class="mb-30">Maecenas fermentum tortor id fringilla molestie. In hac habitasse
                                        platea dictumst. Morbi maximus
                                        lobortis ipsum, ut blandit augue ullamcorper vitae.
                                        Nulla dignissim leo felis, eget cursus elit aliquet ut. Curabitur vel convallis
                                        massa. Morbi tellus
                                        tortor, luctus et lacinia non, tincidunt in lacus.
                                        Vivamus sed ligula imperdiet, feugiat magna vitae, blandit ex. Vestibulum id
                                        dapibus dolor, ac
                                        cursus nulla. </p>
                        </div><!-- col-md-6 -->

                        <div class="col-md-6">
                                <p class="mb-30">Maecenas fermentum tortor id fringilla molestie. In hac habitasse platea
                                        dictumst.Morbi maximus lobortis ipsum, ut blandit augue ullamcorper vitae.
                                        Nulla dignissim leo felis, eget cursus elit aliquet ut. Curabitur vel
                                        convallismassa. Morbi tellus tortor, luctus et lacinia non, tincidunt in lacus.
                                        Vivamus sed ligula imperdiet, feugiat magna vitae, blandit ex. Vestibulumidda
                                        pibus dolor, accursus nulla. </p>
                        </div><!-- col-md-6 -->
                </div><!-- row -->
        </div><!-- container -->
</section>