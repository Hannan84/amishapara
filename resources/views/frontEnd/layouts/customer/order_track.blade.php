@extends('frontEnd.layouts.master')
@section('title','Order Track')
@section('content')
<section class="auth-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-5">
                <div class="form-content">
                    <p class="auth-title">{{ __('messages.orderTack') }}</p>
                    <form action="{{route('customer.order_track_result')}}"  data-parsley-validate="">
                        <div class="form-group mb-3">
                            <label for="phone">{{ __('messages.reg_mob') }}</label>
                            <input type="number" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="{{ __('messages.reg_mob') }}" required>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- col-end -->
                        <div class="form-group mb-3">
                            <label for="invoice_id">{{ __('messages.invoice') }}</label>
                            <input type="number" id="invoice_id" class="form-control @error('invoice_id') is-invalid @enderror" name="invoice_id" value="{{ old('invoice_id') }}" placeholder="{{ __('messages.invoice') }}">
                            @error('invoice_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <!-- col-end -->
                        <div class="form-group mb-3">
                            <button class="submit-btn">{{ __('messages.submit') }}</button>
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
<script src="{{asset('public/frontEnd/')}}/js/parsley.min.js"></script>
<script src="{{asset('public/frontEnd/')}}/js/form-validation.init.js"></script>
@endpush