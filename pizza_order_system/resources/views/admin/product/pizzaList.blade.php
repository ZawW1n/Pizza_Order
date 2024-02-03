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
                                <h2 class="title-1">Products List</h2>

                            </div>
                        </div>

                        <div class="table-data__tool-right">
                            <a href="{{ route('product#createPage')}}">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>Add Pizza
                                </button>
                            </a>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                CSV download
                            </button>
                        </div>
                    </div>

                    @if (session('productDeleteSuccess'))
                    <div class="ms-3">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fa-regular fa-circle-check"></i> {{ session('productDeleteSuccess')}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                @endif
                    <div class="mb-1 row">
                        <div class="col-4">
                            <h4 class="text-secondary">Search Key : <span class="text-info">{{ request('key')}}</span> </h4>
                        </div>
                        <div class="col-4 offset-4">
                            <form action="{{ route('product#list')}}" method="get">
                                @csrf
                                <div class="d-flex">
                                    <input type="text" name="key" class="form-control" placeholder="Search . . . " value="{{ request('key')}}">
                                    <button class="btn btn-secondary" type="submit" >
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="my-2 row ">
                        <div class="rounded shadow-sm col-1 offset-10 bg-success">
                            <h5 class="py-1 text-center text-black"><i class="fa-solid fa-cookie"></i> {{ $pizzas->total()}} </h5>
                        </div>
                    </div>

                    @if(count($pizzas) != 0)
                    <div class="table-responsive table-responsive-data2">
                        <table class="table text-center table-data2">
                            <thead>
                                <tr>
                                    <th>Pizza</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                    <th>Viewer</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr class="mb-3 tr-shadow">
                                        @foreach ($pizzas as $p)
                                        <tr class="mb-3 tr-shadow">
                                            <td class="col-2"><img src="{{ asset('storage/'.$p->image)}}" class="shadow-sm img-thumbnail"></td>
                                            <td>{{ $p->name}}</td>
                                            <td>{{ $p->price}}</td>
                                            <td>{{ $p->category_name}}</td>
                                            <td><i class="fa-regular fa-eye"></i>{{ $p->view_count}}</td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <a href="{{ route('product#edit', $p->id)}}">
                                                        <button class="item me-1" data-toggle="tooltip" data-placement="top" title="View">
                                                            <i class="fa-regular fa-eye"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{ route('product#updatePage', $p->id)}}">
                                                        <button class="item me-1" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                    </a>
                                                    <a href="{{ route('product#delete', $p->id)}}">
                                                        <button class="item me-1" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tr>
                            </tbody>
                        </table>

                        <div class="mt-3 ">
                            {{ $pizzas->links()}}
                        </div>
                    </div>
                    @else
                    <h3 class="text-center text-secondary">Oop  ! There is nope pizza...</h3>
                    @endif
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
