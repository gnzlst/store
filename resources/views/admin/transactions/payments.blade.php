@extends('admin.layout.base')
@section('title', 'Payments')
@section('data-page-id', 'adminPayments')
@section('content')
    <div class="category">
        <div class="row expanded">
            <div class="page-header">
                <div class="grid-x">
                    <div class="cell medium-12 large-12">
                        <h3 class="margin-0-auto">
                            <i class="fa fa-money-bill-alt fa-fw" aria-hidden="true"></i>
                            Payments
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row expanded">
            <div class="page-header-breadcrumbs">
                <div class="grid-x">
                    <div class="cell medium-12 large-12">
                        <h6 class="margin-0-auto">
                            <nav aria-label="You are here:" role="navigation">
                                <ul class="breadcrumbs margin-0-auto">
                                    <li><i class="fa fa-home fa-fw margin-right-icon" aria-hidden="true"></i>
                                        <a href="/admin">Dashboard</a></li>
                                    <li>
                                        <span class="show-for-sr">Current: </span> Payments
                                    </li>
                                </ul>
                            </nav>
                        </h6>
                    </div>
                </div>
            </div>
        </div>

        <div class="row expanded">
            <div class="page-wrapper">
                <div class="page-background">
                    <div class="grid-container fluid">
                        @include('includes.message')
                        @if(isset($message))
                            <p>{{ $message }}</p>
                        @endif
                        <div class="grid-x grid-margin-x">
                            <div class="cell medium-12 large-12">
                                @if(isset($payments) && count($payments))
                                    <h3>List of Payments</h3>
                                    <table class="hover stack list-payments">
                                        <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Amount</th>
                                            <th>Order No</th>
                                            <th>Item Count</th>
                                            <th>Status</th>
                                            <th>Date Created</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($payments as $payment)
                                            <tr>
                                                <td>{{ $payment['customer']['full_name'] }}</td>
                                                <td>$ {{ number_format($payment['amount'], 2) }}</td>
                                                <td>{{ $payment['order_no'] }}</td>
                                                <td>{{ $payment['item_count'] }}</td>
                                                <td><span class="label @if ($payment['status'] === 'Pending') warning  @endif @if ($payment['status'] === 'succeeded') success @endif">{{ $payment['status'] }}</span></td>

                                                <td>{{ $payment['added'] }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                    <div class="title-bar-right">
                                        {!! $links !!}
                                    </div>
                                @else
                                    <h3 class="text-center subheader">Whoops... You have not received any
                                        payments yet.</h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection