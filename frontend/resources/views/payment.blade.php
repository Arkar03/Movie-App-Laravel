@extends('layouts.main')
@section('content')

    <body>
        <div class="p-20">
            <div id="card-element" class="container"></div>
        </div>
        <div class="flex justify-end px-20">
            <button
                class="flex-end text-white-900 bg-yellow-600  text-gray-900 rounded font-semibold px-5 py-4 hover:bg-yellow-500 transition-ease-in-out duration-150"
                onclick="submitPayment()">Submit</button>

        </div>
    </body>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe(`{{ env('STRIPE_PK') }}`);
        const paymentIntend = {{ Js::from($paymentIntend) }};
        const client_secret = paymentIntend.client_secret;
        const elements = stripe.elements({
            clientSecret: client_secret,
        });
        const cardElement = elements.create('payment');
        cardElement.mount('#card-element');

        const submitPayment = async () => {
            stripe.confirmPayment({
                    elements,
                    confirmParams: {
                        return_url: 'http://localhost:8000/movies',
                    },
                })
                .then(function(result) {
                    console.log(result);
                })
        }
    </script>
@endsection
