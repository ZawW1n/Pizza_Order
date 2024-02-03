@extends('user.layouts.master')

@section('title', 'Contact Page')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid rounded">
                <div class="col-lg-10 offset-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header">
                                <div class="text-secondary text-end">
                                    <i class="fa-brands fa-cloudversify"></i> Quick Talk <i class="fa-brands fa-cloudversify"></i>
                                </div>
                            </div>

                            <form action="{{ route('user#sendMessage')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6 offset-3">
                                        <h3 class="card-title mb-5 text-center">Contact Us</h3>
                                        <div class=" mb-3">
                                            <i class="fa-solid fa-user me-1"></i>
                                            <input name="Name" value="" type="text" class="border-white form-control" placeholder="Your Name">
                                        </div>
                                        <div class=" mb-3">
                                            <i class="fa-solid fa-envelope-open-text me-1"></i>
                                            <input name="Email" value="" type="email" class="border-white form-control" placeholder="Your Email">
                                        </div>
                                        <div class=" mb-3">
                                            <i class="fa-regular fa-comment-dots me-1"></i>
                                            <textarea name="Message" value="" type="text" class="border-white form-control" placeholder="Message" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <button id="payment-button" type="submit" class="col-4 offset-4 btn btn-lg btn-info btn-block">
                                            <span id="payment-button-amount">Send Message</span>
                                        </button>
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
