<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 grid grid-cols-5 gap-6">

        <div class="col-span-3">

            <div class="bg-white rounded-lg shadow p-4">

                <span class="text-lg text-gray-700">Elija el método de pago:</span>
                
                <div class="mt-4" id="paypal-button-container"></div>

            </div>

            <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}">
                // Replace YOUR_CLIENT_ID with your sandbox client ID

            </script>

            <script>
                paypal.Buttons({
                    createOrder: function(data, actions) {
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: "{{ $carrito->total }}"
                                }
                            }]
                        });
                    },
                    onApprove: function(data, actions) {
                        return actions.order.capture().then(function(details) {

                            window.location.href = 'confirmar';

                        });

                    }

                }).render('#paypal-button-container'); // Display payment options on your web page


            </script>
        </div>

        <div class="col-span-2">
            <div class="bg-white rounded-lg shadow p-6">

                <div class="text-gray-700">

                    <p class="flex justify-between items-center">
                        TOTAL
                        <span class="font-semibold">{{$carrito->total}} USD</span>
                    </p>

                </div>

            </div>
        </div>

    </div>
</x-app-layout>