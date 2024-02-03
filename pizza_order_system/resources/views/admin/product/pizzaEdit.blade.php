@extends('admin.layouts.master')

@section('title', 'Category List Page')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="row">
            <div class="col-3">
                @if (session('updateSuccess'))
                <div class="ms-3">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <i class="fa-regular fa-circle-xmark"></i> {{ session('updateSuccess')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            </div>
        </div>
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-lg-10 offset-1">
                    <div class="card">
                        <div class="card-body">
                            {{-- <div class="ms-5 fs-4">
                                    <i class="fa-regular fa-circle-left" onclick="history.back()"></i>
                            </div> --}}
                            <div class="ms-5 fs-4">
                                <a href="{{ route('product#list')}}">
                                    <i class="fa-regular fa-circle-left"></i>
                                </a>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-3 offset-2">
                                         <img src="{{ asset('storage/'.$pizza->image)}}" class="shadow-sm img-thumbnail" />
                                </div>
                                <div class="col-7 row">
                                    <div class="my-4 text-white border border-bottom-0 col-12 text-dark fs-4"><i class="fa-solid fa-pizza-slice text-success"></i> {{  $pizza->name }}</div>
                                    <span class="my-4 text-white rounded bg-dark col-5 "><i class="fa-regular fa-money-bill-1 text-success"></i> {{ $pizza->price }} Ks</span>
                                    <span class="my-4 text-white rounded bg-dark col-4 "><i class="fa-regular fa-clock text-success"></i> {{ $pizza->waiting_time }}</span>
                                    <span class="my-4 text-white rounded bg-dark col-3 "><i class="fa-regular fa-eye text-success"></i> {{ $pizza->view_count }}</span>
                                    <span class="my-4 text-white rounded bg-dark col-5 "><i class="fa-solid fa-fire text-success"></i> {{ $pizza->category_name }}</span>
                                    <span class="my-4 text-white rounded bg-dark col-7 "><i class="fa-solid fa-user-clock me-2 text-success"></i>{{ $pizza->created_at->format('F j, Y') }}</span>
                                    <div class="my-4 border border-top-0 border-right-0 border-left-0"><i class="fa-solid fa-hashtag text-success"></i> {{ $pizza->description}}</div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
