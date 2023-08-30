@extends('layouts.main')


@section('content')
    <div class="flex justify-center items-center h-screen bg-gray-100">
        <div class="grid grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Basic Plan</h2>
                <p class="text-gray-600 mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <p class="text-green-500 font-semibold text-lg mb-4">$19.99/month</p>

                <button id="planOne" data-modal-target="plan_one_modal" data-modal-toggle="plan_one_modal" value="1"
                    class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-200">
                    Select Plan
                </button>
            </div>
            <div id="plan_one_modal" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <!-- Plan 1 Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="plan_one_modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Basic Plan</h3>
                            <form class="space-y-6 flex-col" method="POST">
                                @csrf
                                <input type="hidden" name="plan_value" value="1">
                                <div id="card-element"></div>
                                <button
                                    class="w-[100%] bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-200"
                                    onclick="submitPayment()">Pay</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Plan 2 -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Standard Plan</h2>
                <p class="text-gray-600 mb-4">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                <p class="text-blue-500 font-semibold text-lg mb-4">$39.99/month</p>
                <button data-modal-target="plan_two_modal" data-modal-toggle="plan_two_modal"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">
                    Select Plan
                </button>
            </div>

            <!-- Plan 2 modal -->

            <div id="plan_two_modal" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <!-- Plan 2 Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="plan_two_modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Basic Plan</h3>
                            <form class="space-y-6 flex-col" method="POST">
                                @csrf
                                <input type="hidden" name="plan_value" value="2">
                                <div class="card-element">
                                </div>
                                <button
                                    class="w-[100%] bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-200"
                                    onclick="submitPayment()">Pay</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Plan 3 -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Premium Plan</h2>
                <p class="text-gray-600 mb-4">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore.
                </p>
                <p class="text-purple-500 font-semibold text-lg mb-4">$59.99/month</p>
                <button disabled data-modal-target="plan_three_modal" data-modal-toggle="plan_three_modal"
                    class="bg-purple-500 text-white px-4 py-2 rounded-md hover:bg-purple-600 focus:outline-none focus:ring focus:ring-purple-200">
                    Select Plan
                </button>
            </div>

            <div id="plan_three_modal" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-md max-h-full">
                    <!-- Plan 2 Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <button type="button"
                            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="plan_three_modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="px-6 py-6 lg:px-8">
                            <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white">Basic Plan</h3>
                            <form class="space-y-6 flex-col" method="POST">
                                @csrf
                                <input type="hidden" name="plan_value" value="3">
                                <div class="card-element">
                                </div>
                                <button
                                    class="w-[100%] bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-200"
                                    onclick="submitPayment()">Pay</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
            console.log(plan);
            stripe.confirmPayment({
                    elements,
                    confirmParams: {
                        return_url: 'http://localhost:8000/movies',
                    },
                    redirect: 'if-required'
                })
                .then(function(result) {
                    console.log(result);
                })
        }
    </script>
@endsection
