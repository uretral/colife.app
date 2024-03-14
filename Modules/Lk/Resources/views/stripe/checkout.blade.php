@extends('lk::tpl.main')
@section('title'){{ __('auth-register-title') }}@endsection
@section('main')
    <x-lk::ui.frame.section class="register auth">
                <form action="{{ route('lk.login') }}" class="register-form" method="POST">
                    <h2>Тест оплаты</h2>

                    <div id="checkout">
                        <!-- Checkout will insert the payment form here -->
                    </div>
            @csrf

            <x-lk::ui.block.support-link />


        </form>

        <div class="register-images">
            <x-lk::static.welcome/>
        </div>
    </x-lk::ui.frame.section>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        function ready() {
            const stripe = Stripe("{{ config('tenant.STRIPE_ID') }}");
            initialize();
            async function initialize() {
                {{--const response = await fetch("{{ route('tenant.stripe.checkout') }}", {--}}
                {{--    method: "POST",--}}
                {{--});--}}

                // const { clientSecret } = await response.json();
                const clientSecret = "{{ $clientSecret }}";

                const checkout = await stripe.initEmbeddedCheckout({
                    clientSecret,
                });

                // Mount Checkout
                checkout.mount('#checkout');
            }
        }

        document.addEventListener("DOMContentLoaded", ready);

    </script>
@endsection

