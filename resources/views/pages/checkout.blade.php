<style>
    .page-header {
        background: linear-gradient(to bottom, rgb(202, 39, 107), #d38eff);
        padding: 100px 25px 120px;
        justify-content: center;
        text-align: center;
        flex-direction: column;
        border-radius: 2px 2px 50% 50%;
        color: #fff;
    }

    .filed {
        margin-bottom: 25px;
    }

    .filed input,
    select {
        width: 100%;
        border-radius: 150px;
        padding: 10px 15px;
        border: 1px solid #ddd;
    }

    .filed label {
        color: rgb(28, 7, 7);
        font-weight: bold;
        font-weight: 800;
    }

    .checkout-page {
        padding: 70px 0;
        background: #fafafa;
    }

    .checkout-page .checkout-form {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 0 6px rgba(0, 0, 0, 0.09);
        padding: 30px;
        max-width: 100%;
        margin: 0 auto;
        width: 700px;
    }

    .StripeElement {
        height: 40px;
        width: 100%;
        padding: 10px 12px;
        border-radius: 8px;
        border: 1px solid transparent;
        background-color: white;
        color: #32325d;

        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
        margin-bottom: 20px;
    }
    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }
    .StripeElement--invalid {
        border-color: #fa755a;
    }
    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
    .btn-primary {
        border: 1px solid #ddd;
        background-color: #7d0a6a;
        height: 30px;
        width: 100%;
        color: #fff;
        font-size: 16px;
        border-radius: 10px;
        text-align: center;
        justify-content: center;
        cursor: pointer;
    }
    .btn:hover {
        background-color: #e529b9;
    }
</style>

@extends('layouts.master')
@section('title', 'CheckOut')
@section('head')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('js/stripe.js') }}"></script>
@endsection

@section('content')

    <header class="page-header">
        <h1>CheckOut</h1>
        <h3 class="cart-amount">${{ App\Models\Cart::totalAmount() }}</h3>
    </header>

    @if (session()->has('success'))
        <section class="pop-up">
            <div class="pop-up-box">
                <div class="pop-up-title">
                    {{ session()->get('success') }}
                </div>
                <div class="pop-up-actions">
                    <a href="{{ route('cart') }}">Continue Shopping</a>
                    <a href="{{ route('cart') }}">Checkout!</a>
                </div>
            </div>
        </section>
    @endif
    <main class="checkout-page">
        <div class="container">
            <div class="checkout-form">
                <form action="{{route('stripeCheckout')}}" id="payment-form" method="post">
                    @csrf
                    <div class="filed">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="@error('name') has-error @enderror"
                            placeholder="Enter your name..." value="{{ old('name') ? old('name') : auth()->user()->name }}">
                        @error('name')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="filed">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="@error('email') has-error @enderror"
                            placeholder="Enter your email..."
                            value="{{ old('email') ? old('email') : auth()->user()->email }}">
                        @error('email')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="filed">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" class="@error('phone') has-error @enderror"
                            placeholder="Enter your phone..."
                            value="{{ old('phone') ? old('phone') : auth()->user()->phone }}">
                        @error('phone')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="filed">
                        <label for="country">Country</label>
                        <select name="" id="country">
                            <option value="">Select Your Country</option>
                            <option value="United States">United States</option>
                            <option value="Viet Nam">Viet Nam</option>
                            <option value="Malaysia">Malaysia</option>
                            <option value="Korea">Korea</option>
                        </select>
                        @error('country')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="filed">
                        <label for="states">States</label>
                        <input type="text" id="states" name="states" class="@error('states') has-error @enderror"
                            placeholder="Enter your states..."
                            value="{{ old('states') ? old('states') : auth()->user()->states }}">
                        @error('city')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="filed">
                        <label for="city">City</label>
                        <input type="text" id="city" name="city" class="@error('city') has-error @enderror"
                            placeholder="Viet Nam" value="{{ old('city') ? old('city') : auth()->user()->city }}">
                        @error('city')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="filed">
                        <label for="zipcode">Zipcode</label>
                        <input type="text" id="zipcode" name="zipcode" class="@error('zipcode') has-error @enderror"
                            placeholder="12345" value="{{ old('zipcode') ? old('zipcode') : auth()->user()->zipcode }}">
                        @error('zipcode')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="filed">
                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" class="@error('address') has-error @enderror"
                            placeholder="Enter your address..."
                            value="{{ old('address') ? old('address') : auth()->user()->address }}">
                        @error('address')
                            <span class="field-error">{{ $message }}</span>
                        @enderror
                    </div>

                    <input type="hidden" name="payment_method_id" id="payment_method_id" value="">

                    <label>
                        Card Details
                        <div id="card-element"></div>
                    </label>
                    <button type="submit" class="btn btn-primary">Submit Payment</button>

                </form>
            </div>

        </div>
    </main>

    <script>
        var stripe = Stripe('pk_test_51l6omlHxyFtMcKLAIFs2NwdnrYPpxEHbCgiW8p7q1uK56VViLQVfAHyR2FCILrrlMk30L8DQW6EGYlKaPnO0uuJ00yM4jAcWX');

        var elements = stripe.elements();

        var style = {
            base: {
                color: "#32325d",
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: "antialiased",
                fontSize: "16px",
                "::placeholder": {
                    color: "#aab7c4"
                }
            },
            invalid: {
                color: "#fa755a",
                iconColor: "#fa755a"
            },
        };

        var cardElement = elements.create('card', {style: style});
        cardElement.mount('#card-element');

        var form = document.getElementById('payment-form');

        form.addEventListener('submit', function(event) {
            event.preventDefault();

            stripe.createPaymentMethod({
                type: "card",
                card: "cardElement",
                billing_details: {
                    name: "Test Name"
                },
            }).then(stripePaymentMethodHandler);
        });

        function stripePaymentMethodHandler(result){
            if(result.error){

            }else{
                document.getElementById('payment_method_id').value = result.paymentMethod.id
                form.submit();
            }
        }
    </script>
    @include('pages.components.footer')
@endsection
