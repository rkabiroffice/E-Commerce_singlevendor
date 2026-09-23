@extends('backend.layouts.app')

@section('content')

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">{{ translate('SSLCommerz Credentials') }}</h5>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ url('/admin/payment_method_update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="payment_method" value="sslcommerz">
                    <input type="hidden" name="types[]" value="SSLCZ_STORE_ID">
                    <input type="hidden" name="types[]" value="SSLCZ_STORE_PASSWD">

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label">{{ translate('Store ID') }}</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="SSLCZ_STORE_ID" value="{{ env('SSLCZ_STORE_ID') }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label">{{ translate('Store Password') }}</label>
                        <div class="col-md-8">
                            <input type="password" class="form-control" name="SSLCZ_STORE_PASSWD" value="{{ env('SSLCZ_STORE_PASSWD') }}" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4">
                            <label class="col-from-label">{{ translate('SSLCommerz Sandbox Mode') }}</label>
                        </div>
                        <div class="col-md-8">
                            <label class="aiz-switch aiz-switch-success mb-0">
                                <input value="1" name="sslcommerz_sandbox" type="checkbox" @if (get_setting('sslcommerz_sandbox') == 1) checked @endif>
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group mb-0 text-right">
                        <button type="submit" class="btn btn-sm btn-primary">{{ translate('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
