<!DOCTYPE html>
<html>
<head>
    <title>Stripe Payment Platform</title>
    <link rel="stylesheet" href="{{ url('css/style.css') }}" type="text/css">
</head>
<body>
<div class="container">
    @if (Session::has('success'))
        <div class="alert alert-success text-center">
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif
    <form
        role="form"
        action="{{ route('stripe.post') }}"
        method="post">
        @csrf
        <div class="price">
            <h1>Complete your payment here!</h1>
        </div>
        <div class="card__container">
            <div class="card">
                <div class="row credit">
                    <div class="left">
                        <label for="cd">Debit/ Credit Card</label>
                    </div>
                    <div class="right">
                        <img src="{{ asset('images/visa_method.png') }}" alt="visa" class="icon"/>
                        <img src="{{ asset('images/mastercard_method.png') }}" alt="mastercard"/>
                        <img src="{{ asset('images/amex_method.png') }}" alt="amex"/>
                        <img src="{{ asset('images/maestro_method.png') }}" alt="maestro"/>
                    </div>
                </div>
                <div class="row cardholder">
                    <div class="info">
                        <label for="cardholdername">Name</label>
                        <input placeholder="e.g. John Doe" id="cardholdername" type="text" name="cardholdername"
                               required/>
                    </div>
                </div>
                <div class="row number">
                    <div class="info">
                        <label for="cardnumber">Card number</label>
                        <input id="cardnumber" type="text" pattern="[0-9]{16,19}" maxlength="19"
                               placeholder="1234567898765432" name="cardnumber" required/>
                    </div>
                </div>
                <div class="row number">
                    <div class="info">
                        <label for="paymentamount">Pay (AUD)</label>
                        <input id="paymentamount" type="text" inputmode="numeric"
                               placeholder="100" name="paymentamount" required/>
                    </div>
                </div>
                <div class="row details">
                    <div class="left">
                        <label for="expiry-date">Expiry</label>
                        <select id="expirymonth" name="expirymonth" required>
                            <option>MM</option>
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor

                        </select>
                        <span>/</span>
                        <select id="expiryyear" name="expiryyear" required>
                            <option>YYYY</option>
                            @for ($i = now()->year; $i <= (now()->year + 10); $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="right">
                        <label for="cvv">CVC/CVV</label>
                        <input type="text" maxlength="4" placeholder="123" inputmode="numeric" required/>
{{--                        <span data-balloon-length="medium"--}}
{{--                              data-balloon="The 3 or 4-digit number on the back of your card."--}}
{{--                              data-balloon-pos="up">i</span>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="button">
            <button type="submit"><i class="ion-locked"></i> Confirm and Pay</button>
        </div>
    </form>
</div>
</body>
</html>
