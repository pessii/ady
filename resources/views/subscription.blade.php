@extends('layouts.app')

@section('content')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subscription') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form id="setup-form" action="{{ route('subscribe.post') }}" method="post">
                        @csrf
                        クレジットカードを選択
                        <input id="card-holder-name" type="text" placeholder="カード名義人" name="card-holder-name">
                        <div id="card-element"></div>
                        
                        ぴったりのプランをお選びください
                        <div class="plan">
                            <input type="radio" name="planChoice" class="basic" id="basic" value="1">
                            <label for="basic">
                                ベーシック
                            </label>
                            
                            <input type="radio" name="planChoice" class="standard" id="standard" value="2" checked>
                            <label for="standard">
                                スタンダード
                            </label>
                            
                            <input type="radio" name="planChoice" class="premium" id="premium" value="3">
                            <label for="premium">
                                プレミアム
                            </label>
                        </div>
                        
                        <table>
                            <tbody>
                                <tr>
                                    <td>月額</td>
                                    <td>2980円</td>
                                    <td>3980円</td>
                                    <td>4980円</td>
                                </tr>
                            </tbody>
                            <tbody>
                                <tr>
                                    <td>１か月に利用できるコースの数</td>
                                    <td>1コース</td>
                                    <td>2コース</td>
                                    <td>3コース</td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <button id="card-button" class="btn btn-primary btn-block normal-case" data-secret="{{ $intent->client_secret }}">メンバーシップを開始する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
      <script src="https://js.stripe.com/v3/"></script>
      <script>
        const stripe = Stripe('pk_test_51N5UaaBqtwf4uKqUjjYM6fOdteGuWBMJlmcX1jNWjuuPzS8frs98QZGe8QEV7N6DBk0A1XFOH8DaNfYjbZTB77Pz00zTjsjsED');
        
        const elements = stripe.elements();
        const cardElement = elements.create('card');
        cardElement.mount('#card-element');
        
        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;
        
        cardButton.addEventListener('click', async (e) => {
                e.preventDefault();
            const { setupIntent, error } = await stripe.confirmCardSetup(
                clientSecret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: { name: cardHolderName.value }
                    }
                }
            );
            if (error) {
                console.log(error);
            } else {
                stripePaymentIdHandler(setupIntent.payment_method);
            }
        });
        
        function stripePaymentIdHandler(paymentMethodId) {
            const form = document.getElementById('setup-form');
            
            const hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'paymentMethodId');
            hiddenInput.setAttribute('value', paymentMethodId);
            form.appendChild(hiddenInput);
            
            form.submit();
        }
      </script>
    @endpush
    
@endsection