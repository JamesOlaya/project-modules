@extends('layouts.master')
@section('content')
    @php
        $currency=localesymbol($code??'USD')
    @endphp

    <div id="orderList" class="icommerce-page page">

        @component('partials.widgets.breadcrumb')
            <li class="breadcrumb-item active" aria-current="page">{{trans('icommerce::orders.title.orders')}}</li>
        @endcomponent
        <div class="container mb-5">
            <div class="row">
                <div class="col">
                    <div class="title-arrow text-center mb-5">
                        <h1 class="px-5 bg-white font-weight-bold text-uppercase">{{trans('icommerce::orders.title.orders')}}</h1>
                    </div>
                </div>
            </div>
            <div class="cart-content" v-show="items.length > 0">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class=" bg-secondary text-white">
                        <tr>
                            <th>{{trans('icommerce::orders.table.id')}}</th>
                            <th>{{trans('icommerce::orders.table.email')}}</th>
                            <th>{{trans('icommerce::orders.table.total')}}</th>
                            <th>{{trans('icommerce::orders.table.status')}}</th>
                            <th>{{trans('core::core.table.created at')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (isset($orders)): ?>
                        <?php foreach ($orders as $order): ?>
                        <tr class='clickable-row cursor-pointer' data-href="{{ url('/orders').'/'.$order->id }}">
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{$currency->symbol_left}} {{formatMoney($order->total) }}{{$currency->symbol_right}} </td>
                            <td>{{$order->status->title}}</td>
                            <td>{{ $order->created_at }}</td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <!--End of Shopping cart items-->
                <hr class="my-4 hr-lg">
                <div class="cart-content-footer">
                    <div class="row">
                        {{$orders->links()}}
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-8 text-right mt-3 mt-md-0">
                            <div class="cart-content-totals"> </div>
                            <!-- Proceed to checkout -->
                            <a href="{{ url('/account') }}" class="btn btn-outline-primary btn-rounded btn-lg my-2">
                                {{trans('icommerce::orders.button.Back_to_profile')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
    @parent
    <script type="text/javascript">
        $(document).ready(function () {
            $("table .clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>
@stop