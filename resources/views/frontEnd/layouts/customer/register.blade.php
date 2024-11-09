@extends('frontEnd.layouts.master')
@section('title', 'Customer Register')
@section('content')
    <section class="auth-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-5">
                    <div class="form-content">
                        <p class="auth-title">{{ __('messages.cus_register') }}</p>
                        <form action="{{ route('customer.store') }}" method="POST" data-parsley-validate="">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">{{ __('messages.reg_name') }}</label>
                                <input type="text" id="name"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" placeholder="{{ __('messages.reg_name') }}" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- col-end -->
                            <div class="form-group mb-3">
                                <label for="phone"> {{ __('messages.reg_mob') }}</label>
                                <input type="number" id="phone"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ old('phone') }}" placeholder="{{ __('messages.reg_mob') }}" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="email"> {{ __('messages.reg_email') }} </label>
                                <input type="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" placeholder="{{ __('messages.reg_email') }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- col-end -->
                            <!--<div class="form-group mb-3">-->
                            <!--    <label for="email"> ইমেইল </label>-->
                            <!--    <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="ইমেইল">-->
                            <!--    @error('email')
        -->
                                <!--        <span class="invalid-feedback" role="alert">-->
                                <!--            <strong>{{ $message }}</strong>-->
                                <!--        </span>-->
                                <!--
    @enderror-->
                            <!--</div>-->
                            <!-- col-end -->
                            <div class="form-group mb-3">
                                <label for="password"> {{ __('messages.reg_pass') }} </label>
                                <input type="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('messages.reg_pass') }} "
                                    name="password" value="{{ old('password') }}" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="address"> {{ __('messages.reg_addr') }} </label>
                                <input type="text" id="address"
                                    class="form-control @error('address') is-invalid @enderror" name="address"
                                    value="{{ old('address') }}" placeholder="{{ __('messages.reg_addr') }}">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="gender"> {{ __('messages.reg_gend') }} </label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender"
                                        id="female" value="female" {{ old("gender") == 'female' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="female">
                                    {{ __('messages.female') }}
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender"
                                        id="male" value="male" {{ old("gender") == 'male' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="male">
                                    {{ __('messages.male') }}
                                    </label>
                                </div>
                            </div>
                            <!-- col-end -->
                            <button class="submit-btn">{{ __('messages.registration') }}</button>
                            <div class="register-now no-account">
                                <p><i class="fa-solid fa-user"></i> {{ __('messages.if_reg') }}</p>
                                <a href="{{ route('customer.login') }}"><i data-feather="edit-3"></i> {{ __('messages.reg_log') }}</a>
                            </div>
                    </div>
                    <!-- col-end -->


                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
@push('script')
    <script src="{{ asset('public/frontEnd/') }}/js/parsley.min.js"></script>
    <script src="{{ asset('public/frontEnd/') }}/js/form-validation.init.js"></script>
@endpush
