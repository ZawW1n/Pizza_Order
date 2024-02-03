@extends('user.layouts.master')

@section('content')
    <div class="row">
        <div class="col-4 offset-4">
             <div class="card bg-warning text-dark">
                    <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Change Your Password</h3>

                                        @if (session('notMatch'))
                                            <div class="my-2">
                                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                    <i class="fa-solid fa-circle-exclamation md-2"></i> {{ session('notMatch')}}
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                    <hr>
                                    <form action="{{ route('user#changePassword')}}" method="post" novalidate="novalidate">
                                        @csrf
                                        <div class="form-group">
                                            <label class="control-label mb-1">Old Password</label>
                                            <input id="cc-pament" name="oldPassword" type="password" class="form-control bg-white
                                            @error('oldPassword')
                                                is-invalid
                                            @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Old Password">

                                            @error('oldPassword')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror


                                        </div>

                                        <div class="form-group">
                                            <label class="control-label mb-1">New Password</label>
                                            <input id="cc-pament" name="newPassword" type="password" class="form-control bg-white @error('newPassword')
                                                is-invalid
                                            @enderror" aria-required="true" aria-invalid="false" placeholder="Enter New Password">
                                            @error('newPassword')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label mb-1">Confirm Password</label>
                                            <input id="cc-pament" name="confirmPassword" type="password" class="form-control bg-white @error('confirmPassword')
                                                is-invalid
                                            @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Confirm Password">
                                            @error('confirmPassword')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </div>


                                        <div>
                                            <button id="payment-button" type="submit" class="btn btn-lg btn-dark text-white btn-block">
                                                <i class="fa-solid fa-key"></i> <span id="payment-button-amount">Change Password</span>
                                                {{-- <span id="payment-button-sending" style="display:none;">Sending…</span> --}}
                                            </button>
                                        </div>
                                    </form>
                    </div>
             </div>
        </div>
    </div>
@endsection
