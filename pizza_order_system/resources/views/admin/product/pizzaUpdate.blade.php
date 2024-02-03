@extends('admin.layouts.master')

@section('title', 'Category List Page')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid rounded">
                <div class="col-lg-10 offset-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Update Pizza</h3>
                            </div>

                            <hr>
                            <form action="{{route('product#update')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-5">
                                        <input type="hidden" name="pizzaId" value="{{ $pizza->id}}">
                                             <img src="{{ asset('storage/'.$pizza->image)}}" class="img-thumbnail shadow-sm" />

                                         <div class="mt-2">
                                            <input type="file" class="form-control   @error('pizzaImage') is-invalid @enderror" name="pizzaImage" id="">
                                                @error('pizzaImage')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                         </div>
                                         <div class="">
                                            <button class="tbn btn-info mt-2 col-12 rounded-bottom" type="submit">Update</button>
                                         </div>
                                    </div>
                                    <div class="row col-7">
                                        <div class="form-group">
                                            <label class="control-label mb-1"><i class="fa-solid fa-user-pen me-2"></i> Name</label>
                                            <input id="cc-pament" value="{{ old('pizzaName',$pizza->name)}}" name="pizzaName" type="text" class="form-control
                                            @error('pizzaName')
                                        is-invalid
                                    @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Pizza Name...">
                                    @error('pizzaName')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                        </div>


                                        <div class="form-group">
                                            <label class="control-label mb-1"><i class="fa-solid fa-envelope-open-text me-2"></i> Description </label>
                                            <textarea name="pizzaDescription" class="form-control
                                            @error('pizzaDescription')
                                            is-invalid
                                            @enderror" id="cc-pament" cols="30" rows="10" placeholder="Enter Pizza Description...">{{ old('pizzaDescription',$pizza->description)}}</textarea>
                                    @error('pizzaDescription')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label mb-1"><i class="fa-solid fa-location-dot me-2"></i> Category</label>
                                            <select name="pizzaCategory" class="form-control @error('pizzaCategory') is-invalid @enderror">
                                                <option value="">Choose...</option>
                                                @foreach ($category as $c)
                                                <option value="{{ $c->id }}" @if ($pizza->category_id == $c->id) selected  @endif>{{ $c->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('pizzaCategory')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    </div>

                                        <div class="form-group">
                                            <label class="control-label mb-1"><i class="fa-solid fa-user-pen me-2"></i> Price</label>
                                            <input id="cc-pament" value="{{ old('pizzaPrice',$pizza->price)}}" name="pizzaPrice" type="text" class="form-control
                                            @error('pizzaPrice')
                                        is-invalid
                                    @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Pizza Price...">
                                    @error('pizzaPrice')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                    </div>

                                        <div class="form-group">
                                            <label class="control-label mb-1"><i class="fa-solid fa-circle-user"></i> Waiting Time</label>
                                            <input id="cc-pament" value="{{ old('pizzaWaitingTime',$pizza->waiting_time)}}" name="pizzaWaitingTime" type="text" class="form-control
                                            @error('pizzaWaitingTime')
                                                is-invalid
                                            @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Pizza Waiting Time">
                                            @error('pizzaWatingTime')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label mb-1"><i class="fa-solid fa-circle-user"></i> View Count</label>
                                            <input id="cc-pament" value="{{ old('viewCount',$pizza->view_count)}}" name="viewCount" type="text" class="form-control" aria-required="true" aria-invalid="false" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label mb-1"><i class="fa-solid fa-circle-user"></i> Create Date</label>
                                            <input id="cc-pament" value="{{ $pizza->created_at->format('F j, Y')}}" name="viewCount" type="text" class="form-control" aria-required="true" aria-invalid="false" disabled>
                                        </div


                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
@endsection
