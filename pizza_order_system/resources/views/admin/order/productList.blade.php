@extends('admin.layouts.master')

@section('title', 'Products List Page')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h2 class="title-1">Orders List</h2>

                            </div>
                        </div>
                    </div>

                    <a href="{{ route('admin#orderList')}}" class="text-dark mb-1"><i class="fa-solid fa-arrow-left-long"> Back</i></a>

                    <div class="ror col-6">
                        <div class="card mt-4">
                            <div class="card-header"><i class="fa-regular fa-clipboard"></i> Order Info</div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col"><i class="fa-solid fa-user"></i> Name</div>
                                    <div class="col">- {{ strtoupper($orderList[0]->user_name)}}</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col"><i class="fa-solid fa-barcode"></i> Order Code</div>
                                    <div class="col">- {{ $orderList[0]->order_code}}</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col"><i class="fa-regular fa-clock"></i> Date</div>
                                    <div class="col">- {{ $orderList[0]->created_at->format('F j, Y')}}</div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col"><i class="fa-solid fa-money-bill-wave"></i> Total</div>
                                    <div class="col">- {{ $order->total_price}} Kyats</div>
                                </div>

                                <small class="text-warning"><i class="fa-solid fa-triangle-exclamation"></i> Incluted Delivery Fees</small>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive table-responsive-data2">
                        <table class="table text-center table-data2">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>User ID</th>
                                    <th>Products Image</th>
                                    <th>Products Name</th>
                                    <th>Qty</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                                <tbody id="dataList">
                                        @foreach ($orderList as $o)
                                        <tr class="mb-3 tr-shadow">
                                            <th></th>
                                            <td>{{ $o->user_id}}</td>
                                            <td class="col-2"><img src="{{asset('storage/'.$o->product_image)}}" class="img-thumbnail"></td>
                                            <td>{{ $o->product_name}}</td>
                                            <td>{{ $o->qty}}</td>
                                            <td>{{ $o->total}}</td>
                                        </tr>
                                        @endforeach
                                </tbody>
                        </table>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
