@extends("template")
@section('content','content')
<section class="story-area bg-seller color-white pos-relative">
    <div class="container">
        <div class="heading">
            <img class="heading-img" src="{{asset('images/heading_logo.png')}}">
            <h2>payer votre commande</h2>
        </div>

</section>

        <div class="left-area" style="margin-left : 1200px" >
                        <h5>prix totale : {{$prix}} CHF  
                        <div class="links">
                    <form action="/payment" method="POST">
                    @csrf
                        <input  class="plr-25" type="text" name="adresse"    placeholder="adresse"/> 
                   
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
                </div>
                        </h5>
                </div>
</section>