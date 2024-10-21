@extends('frontEnd.layouts.master')
@section('title', 'Customer Register')
@section('content')
    <section class="auth-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-5">
                    <div class="form-content">
                        <p class="auth-title"> কাস্টমার রেজিস্ট্রেশন </p>
                        <form action="{{ route('customer.store') }}" method="POST" data-parsley-validate="">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">নাম</label>
                                <input type="text" id="name"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" placeholder=" আপনার নাম " required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- col-end -->
                            <div class="form-group mb-3">
                                <label for="phone"> মোবাইল নাম্বার </label>
                                <input type="number" id="phone"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    value="{{ old('phone') }}" placeholder="মোবাইল নাম্বার" required>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="email"> ইমেইল </label>
                                <input type="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" placeholder="ইমেইল">
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
                                <label for="password"> পাসওয়ার্ড </label>
                                <input type="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror" placeholder="পাসওয়ার্ড "
                                    name="password" value="{{ old('password') }}" required>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="address"> ঠিকানা </label>
                                <input type="text" id="address"
                                    class="form-control @error('address') is-invalid @enderror" name="address"
                                    value="{{ old('address') }}" placeholder="ঠিকানা">
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="gender"> লিঙ্গ </label><br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender"
                                        id="female" value="female" {{ old("gender") == 'female' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="female">
                                        স্ত্রী
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender"
                                        id="male" value="male" {{ old("gender") == 'male' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="male">
                                        পুরুষ
                                    </label>
                                </div>
                            </div>
                            <!-- col-end -->
                            <button class="submit-btn">রেজিস্ট্রেশন</button>
                            <div class="register-now no-account">
                                <p><i class="fa-solid fa-user"></i> রেজিস্ট্রেশন করা থাকলে?</p>
                                <a href="{{ route('customer.login') }}"><i data-feather="edit-3"></i> লগিন করুন </a>
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
