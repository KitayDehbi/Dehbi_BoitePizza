@extends("template")
@section('content','content')
<section class="story-area bg-seller color-white pos-relative">
    <div class="container">
        <div class="heading">
            <img class="heading-img" src="{{asset('images/heading_logo.png')}}">
            <h2>Votre panier</h2>
        </div>

</section>
<section class="bg-lite-blue">
    <div class="row">
        <div class="col-md-6">
            <div class="sided-50x mb-30 ">
                <!--s-left-->
                <div style="margin:10px ">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">produit</th>
                                <th scope="col">prix unitaire</th>
                                <th scope="col">quantité</th>
                                <th scope="col">prix * quantité</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($produits as $produit)
                            <tr>
                                <th scope="row">{{$produit->name}}</th>
                                <td>{{$produit->prix}} CHF</td>
                                <td>{{$pqte[$produit->id]}}</td>
                                <td>{{$pqte[$produit->id]* $produit->prix}} CHF</td>
                                <td><form action ="/supprimerProduit" method="post">
                        @csrf
                        <input  type="number" name="id" value="{{$produit->id}}" hidden/> 
        
                        <button  type ="submit" > Supprimer </button>
                </form></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!--s-right-->
        </div><!-- sided-90x -->

        <div class="col-md-6">
            <div class="sided-50x mb-30 ">
                <div style="margin:10px ">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">supplemets</th>
                                <th scope="col">prix unitaire</th>
                                <th scope="col">quantité</th>
                                <th scope="col">prix * quantité</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($supplements as $supplement)
                            <tr>
                                <th scope="row">{{$supplement->name}}</th>
                                <td>{{$supplement->prix}} CHF</td>
                                <td>{{$sqte[$supplement->id]}}</td>
                                <td>{{$sqte[$supplement->id]* $supplement->prix}} CHF</td>
                                <td><form action ="/supprimerSupplement" method="post">
                        @csrf
                        <input  type="number" name="id" value="{{$supplement->id}}" hidden/> 
        
                        <button  type ="submit" > Supprimer </button>
                </form></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div><!-- row -->
</div>
        <div class="row">
            <div class="col-md-10">
                <div class="sided-90x mb-30 ">

                    <div style="margin-left:400px;margin-right:100px; margin-top:50px;">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">formule</th>
                                    <th scope="col">prix unitaire</th>
                                    <th scope="col">quantité</th>
                                    <th scope="col">prix * quantité</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($formules as $formule)
                                <tr>
                                    <th scope="row">{{$formule->nom}}</th>
                                    <td>{{$formule->prix}} CHF</td>
                                    <td>{{$fqte[$formule->id]}}</td>
                                    <td>{{$fqte[$formule->id]* $formule->prix}} CHF</td>
                                    <td><form action ="/supprimerFormule" method="post">
                        @csrf
                        <input  type="number" name="id" value="{{$formule->id}}" hidden/> 
        
                        <button  type ="submit" > Supprimer </button>
                </form></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="left-area" style="margin-left : 1200px" >
                        <h5>prix totale : {{$prix}} CHF  
                        <h6><a class="plr-20 color-white btn-fill-primary" href="/valider" style="margin-left:20px">payer</a> 
                        <!--<div class="links">
                    <form action="/valider" method="POST">
                    @csrf
                      <script
                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                        data-key="pk_test_RLf74SAurjb5dJ7N13xHRUEB00XsiYtrsb"
                        data-amount={{$prix}}
                        data-name="Boite a pizza"
                        data-description="payer"
                        data-image="{{asset('images/logo_white.png')}}"
                        data-locale="auto"
                        data-currency="CHF">
                      </script>
                    </form>
                </div>-->
                        </h5>
                </div>
</section>