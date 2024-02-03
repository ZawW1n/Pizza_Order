@extends('user.layouts.master')

@section('content')

    <!-- Shop Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <!-- Shop Sidebar Start -->
            <div class="col-lg-3 col-md-4">
                <!-- Price Start -->
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="pr-3">Filter Categories</span></h5>
                <div class="bg-light p-4 mb-30">

                        <form>
                            <div class="text-warning rounded bg-dark px-3 py-2 d-flex align-items-center justify-content-between mb-3">
                                <label class="" for="price-all">All Categories</label>
                                <span class="badge border font-weight-normal">{{ count($category)}}</span>
                            </div>

                            <div class="btn d-flex align-items-center justify-content-between mb-1">
                                <a href="{{route('user#home')}}" class="text-dark">
                                <label class="pt-2" for="price-1"><i class="fa-solid fa-dumpster"></i> All</label></a>
                            </div>

                                @foreach ($category as $c)
                                <div class="btn d-flex align-items-center justify-content-between mb-1">
                                <a href="{{route('user#filter',$c->id)}}" class="text-dark"> <label class="pt-2" for="price-1">{{ $c->name}}</label></a>
                                </div>
                                @endforeach
                            </div>
                <!-- Price End -->

                <div class="mb-3">
                    <button class="btn btn-warning w-100">Order</button>
                </div>


                <a href="{{ route('user#contactToAdmin')}}">
                    <button type="button" class="btn btn-light position-relative">
                        <i class="fa-solid fa-comment-dots"></i> To Admin
                      </button>
                </a>
                <!-- Size End -->
            </div>
            <!-- Shop Sidebar End -->


            <!-- Shop Product Start -->
            <div class="col-lg-9 col-md-8">
                <div class="row pb-3">
                    <div class="col-12 pb-1">
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div>
                                <a href="{{ route('user#cartList')}}">
                                    <button type="button" class="btn btn-light position-relative">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                            {{ count($cart)}}
                                        </span>
                                      </button>
                                </a>
                                <a class="ms-3" href="{{ route('user#history')}}">
                                    <button type="button" class="btn btn-light position-relative">
                                        <i class="fa-solid fa-clock-rotate-left"></i>
                                        History
                                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                            {{ count($history)}}
                                        </span>
                                      </button>
                                </a>
                            </div>
                            <div class="ml-2">
                                <div class="btn-group">
                                    {{-- <button type="button" class="btn btn-sm btn-dark text-warning dropdown-toggle" data-toggle="dropdown">Sorting</button> --}}
                                    {{-- <div class=" btndropdown-menu dropdown-menu-right bg-warning text-dark"> --}}
                                        <select name="sorting" id="sortingOption" class="form-control">
                                            <option value="">Sorting</option>
                                            <option value="asc">Ascending</option>
                                            <option value="desc">Descending</option>
                                        </select>
                                    {{-- </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <span class="row" id="dataList">
                        @if (count($pizza) != 0)
                        @foreach ($pizza as $p)
                        <div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                            <div class="product-item bg-light mb-4" id="myForm">
                                <div class="product-img position-relative overflow-hidden">
                                    <img class="img-fluid w-100" style="height: 250px" src="{{ asset('storage/'.$p->image)}}" alt="">
                                     <div class="product-action">
                                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href="{{ route('user#pizzaDetails',$p->id)}}"><i class="fa-solid fa-circle-info"></i></a>
                                    </div>
                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-danger" href="">{{ $p->name}}</a>
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        <h5 class="ml-2">{{ $p->price}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <p class="text-center fs-1 col-6 offset-3 bordered">Sorry...!Not Available Pizza...<i class="fa-solid fa-pizza-slice"></i></p>
                    @endif
                </form>
                    </span>


                </div>
            </div>
            <!-- Shop Product End -->
        </div>
    </div>
    <!-- Shop End -->

@endsection


@section('scriptSource')
    <script>
              $(document).ready(function(){
        $('#sortingOption').change(function(){
            $eventOption = $('#sortingOption').val();

            if($eventOption == 'asc'){
                $.ajax({
                type: 'get',
                url: '/user/ajax/pizza/list',
                data: {'status' : 'asc'},
                dataType: 'json' ,
                success: function(response){
                    $list = '';
                    for($i=0;$i<response.length;$i++){

                        $list += `<div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                            <div class="product-item bg-light mb-4" id="myForm">
                                <div class="product-img position-relative overflow-hidden">
                                    <img class="img-fluid w-100" style="height: 250px" src="{{ asset('storage/${response[$i].image}')}}" alt="">
                                     <div class="product-action">
                                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa-regular fa-eye"></i></a>
                                    </div>
                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-danger" href="">${response[$i].name}</a>
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        <h5 class="ml-2">${response[$i].price}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                    }
                    $('#dataList').html($list);
                }
            })
            }else if($eventOption == 'desc'){
                $.ajax({
                type: 'get',
                url: '/user/ajax/pizza/list',
                data: {'status' : 'desc'},
                dataType: 'json' ,
                success: function(response){
                    $list = '';
                    for($i=0;$i<response.length;$i++){

                    $list += `<div class="col-lg-4 col-md-6 col-sm-6 pb-1">
                            <div class="product-item bg-light mb-4" id="myForm">
                                <div class="product-img position-relative overflow-hidden">
                                    <img class="img-fluid w-100" style="height: 250px" src="{{ asset('storage/${response[$i].image}')}}" alt="">
                                     <div class="product-action">
                                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                        <a class="btn btn-outline-dark btn-square" href=""><i class="fa-regular fa-eye"></i></a>
                                    </div>
                                </div>
                                <div class="text-center py-4">
                                    <a class="h6 text-decoration-none text-danger" href="">${response[$i].name}</a>
                                    <div class="d-flex align-items-center justify-content-center mt-2">
                                        <h5 class="ml-2">${response[$i].price}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                    }
                    $('#dataList').html($list);
                }
            })
            }

        })
       });

        </script>
@endsection
