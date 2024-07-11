@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Invoice') }}</div>
            <div class="card-body">
                <h5>{{ __('Order ID') }}: {{ $order->id }}</h5>
                <p>{{ __('Customer Name') }}: {{ $order->customer->name }}</p>
                <p>{{ __('Merchant Name') }}: {{ $order->merchant->name }}</p>
                <p>{{ __('Delivery Date') }}: {{ $order->delivery_date }}</p>
                <h5>{{ __('Order Details') }}</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>{{ __('Menu') }}</th>
                            <th>{{ __('Quantity') }}</th>
                            <th>{{ __('Price') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->orderDetails as $detail)
                            <tr>
                                <td>{{ $detail->menu->name }}</td>
                                <td>{{ $detail->quantity }}</td>
                                <td>{{ $detail->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h5>{{ __('Total Price') }}: {{ $order->total_price }}</h5>
            </div>
        </div>
    </div>
</div>
@endsection
