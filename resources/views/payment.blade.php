<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/payment.css')}}">

    <title>Payment Example</title>

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 style="text-align: center; margin-bottom: 15px">Stripe Example</h3>

            <form action="{{route('payment.check')}}" method="POST" id="payment-form" style="margin-bottom: 15px">
                @csrf
                <div id="card-element" style="margin-bottom: 25px;">
                    <!-- A Stripe Element will be inserted here. -->
                </div>

                <input id="stripeToken" type="hidden" name="stripeToken"/>
                <div class="form-action">
                    <button type="submit" class="btn btn-primary" name="check" style="width: 100%; text-align: center">
                        Check
                    </button>
                </div>
                @if(session()->has('error'))
                    <div class="alert alert-danger">
                        {{session()->get('error')}}
                    </div>
                @elseif(session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif

            </form>


        </div>
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="col-md-2" style="float: left">Card Number : </div>
                <div class="col-md-7">4242 4242 4242 4242</div>
            </div>
            <div class="col-md-12">
                <div class="col-md-2" style="float: left">Expire date : </div>
                <div class="col-md-7">12/19</div>
            </div>
            <div class="col-md-12">
                <div class="col-md-2" style="float: left">CVC </div>
                <div class="col-md-7">1111</div>
            </div>

        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>

<!-- JAVASCRIPT STRIP SDS START-->
<script src="https://js.stripe.com/v3/"></script>
<!-- JAVASCRIPT STRIP SDS END-->

<!-- JAVASCRIPT PAGE LEVEL START-->
<script src="{{asset('js/payment.js')}}"></script>
<!-- JAVASCRIPT PAGE LEVEL END-->

</body>
</html>