@extends('frontEnd.layouts.master')
@section('title','Customer Login')
@section('content')
<section class="auth-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-5">
                <div class="form-content">
                    <p class="auth-title">{{ __("messages.cus_login") }}</p>
                    <form action="{{route('customer.signin')}}" method="POST"  data-parsley-validate="">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="username">{{ __("messages.mob_email") }}</label>
                            <input type="text" id="username" class="form-control @error('phone') is-invalid @enderror" name="username" value="{{ old('username') }}"  required>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- col-end -->
                        <div class="form-group mb-3">
                            <label for="password">{{ __("messages.log_pass") }}</label>
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}"  required>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- col-end -->
                        <a href="{{route('customer.forgot.password')}}" class="forget-link"><i class="fa-solid fa-unlock"></i>{{ __("messages.forget_pass") }}</a>
                        <div class="form-group mb-3">
                            <button class="submit-btn">{{ __("messages.login") }}</button>
                        </div>
                     <!-- col-end -->
                     </form>
                     <div class="register-now no-account">
                        <p>{{ __("messages.no_account") }}</p>
                        <a href="{{route('customer.register')}}"><i data-feather="edit-3"></i>{{ __("messages.register") }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('script')
<script src="{{asset('public/frontEnd/')}}/js/parsley.min.js"></script>
<script src="{{asset('public/frontEnd/')}}/js/form-validation.init.js"></script>
@endpush
