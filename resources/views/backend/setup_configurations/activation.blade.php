@extends('backend.layouts.app')

@section('content')

<h4 class="text-center text-muted">{{ translate('System') }}</h4>
<div class="row">
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header"><h3 class="mb-0 h6 text-center">{{ translate('HTTPS Activation') }}</h3></div>
            <div class="card-body text-center">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'FORCE_HTTPS')" <?php if (env('FORCE_HTTPS') == 'On') echo 'checked'; ?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header"><h3 class="mb-0 h6 text-center">{{ translate('Maintenance Mode Activation') }}</h3></div>
            <div class="card-body text-center">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'maintenance_mode')" <?php if (get_setting('maintenance_mode') == 1) echo 'checked'; ?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header"><h3 class="mb-0 h6 text-center">{{ translate('Disable image encoding?') }}</h3></div>
            <div class="card-body text-center">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'disable_image_optimization')" <?php if (get_setting('disable_image_optimization') == 1) echo 'checked'; ?>>
                    <span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
</div>

<h4 class="text-center text-muted mt-4">{{ translate('Business Related') }}</h4>
<div class="row">
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header"><h3 class="mb-0 h6 text-center">{{ translate('Wallet System Activation') }}</h3></div>
            <div class="card-body text-center">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'wallet_system')" <?php if (get_setting('wallet_system') == 1) echo 'checked'; ?>><span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header"><h3 class="mb-0 h6 text-center">{{ translate('Coupon System Activation') }}</h3></div>
            <div class="card-body text-center">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'coupon_system')" <?php if (get_setting('coupon_system') == 1) echo 'checked'; ?>><span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header"><h3 class="mb-0 h6 text-center">{{ translate('Pickup Point Activation') }}</h3></div>
            <div class="card-body text-center">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'pickup_point')" <?php if (get_setting('pickup_point') == 1) echo 'checked'; ?>><span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header"><h3 class="mb-0 h6 text-center">{{ translate('Conversation Activation') }}</h3></div>
            <div class="card-body text-center">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'conversation_system')" <?php if (get_setting('conversation_system') == 1) echo 'checked'; ?>><span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header"><h3 class="mb-0 h6 text-center">{{ translate('Email Verification') }}</h3></div>
            <div class="card-body text-center d-flex flex-column">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'email_verification')" <?php if (get_setting('email_verification') == 1) echo 'checked'; ?>><span class="slider round"></span>
                </label>
                <div class="alert mt-auto" style="color:#004085;background-color:#cce5ff;border-color:#b8daff;margin-bottom:0;margin-top:10px;">
                    {{ translate('You need to configure SMTP correctly to enable this feature.') }} <a href="{{ url('/admin/smtp-settings') }}">{{ translate('Configure Now') }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header"><h3 class="mb-0 h6 text-center">{{ translate('Product Query Activation') }}</h3></div>
            <div class="card-body text-center">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'product_query_activation')" <?php if (get_setting('product_query_activation') == 1) echo 'checked'; ?>><span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
</div>

<h4 class="text-center text-muted mt-4">{{ translate('Payment Related') }}</h4>
<div class="row">
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header"><h3 class="mb-0 h6 text-center">{{ translate('SSLCommerz Payment Activation') }}</h3></div>
            <div class="card-body text-center">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'sslcommerz_payment')" <?php if (get_setting('sslcommerz_payment') == 1) echo 'checked'; ?>><span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header"><h3 class="mb-0 h6 text-center">{{ translate('Cash on Delivery Activation') }}</h3></div>
            <div class="card-body text-center">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'cash_payment')" <?php if (get_setting('cash_payment') == 1) echo 'checked'; ?>><span class="slider round"></span>
                </label>
            </div>
        </div>
    </div>
</div>

<h4 class="text-center text-muted mt-4">{{ translate('Social Login') }}</h4>
<div class="row">
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header"><h3 class="mb-0 h6 text-center">{{ translate('Google login') }}</h3></div>
            <div class="card-body text-center d-flex flex-column">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'google_login')" <?php if (get_setting('google_login') == 1) echo 'checked'; ?>><span class="slider round"></span>
                </label>
                <div class="alert mt-auto" style="color:#004085;background-color:#cce5ff;border-color:#b8daff;margin-bottom:0;margin-top:10px;">
                    {{ translate('You need to configure Google Client correctly to enable this feature') }}. <a href="{{ url('/admin/social-login') }}">{{ translate('Configure Now') }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header"><h3 class="mb-0 h6 text-center">{{ translate('Twitter login') }}</h3></div>
            <div class="card-body text-center d-flex flex-column">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'twitter_login')" <?php if (get_setting('twitter_login') == 1) echo 'checked'; ?>><span class="slider round"></span>
                </label>
                <div class="alert mt-auto" style="color:#004085;background-color:#cce5ff;border-color:#b8daff;margin-bottom:0;margin-top:10px;">
                    {{ translate('You need to configure Twitter Client correctly to enable this feature') }}. <a href="{{ url('/admin/social-login') }}">{{ translate('Configure Now') }}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card h-100">
            <div class="card-header"><h3 class="mb-0 h6 text-center">{{ translate('Apple login') }}</h3></div>
            <div class="card-body text-center d-flex flex-column">
                <label class="aiz-switch aiz-switch-success mb-0">
                    <input type="checkbox" onchange="updateSettings(this, 'apple_login')" <?php if (get_setting('apple_login') == 1) echo 'checked'; ?>><span class="slider round"></span>
                </label>
                <div class="alert mt-auto" style="color:#004085;background-color:#cce5ff;border-color:#b8daff;margin-bottom:0;margin-top:10px;">
                    {{ translate('You need to configure Apple Client correctly to enable this feature') }}. <a href="{{ url('/admin/social-login') }}">{{ translate('Configure Now') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script type="text/javascript">
        function updateSettings(el, type) {
            var value = $(el).is(':checked') ? 1 : 0;

            $.post('{{ url('/admin/business-settings/update/activation') }}', {
                _token: '{{ csrf_token() }}',
                type: type,
                value: value
            }, function(data) {
                if (data == '1') {
                    AIZ.plugins.notify('success', '{{ translate('Settings updated successfully') }}');
                } else {
                    AIZ.plugins.notify('danger', '{{ translate('Something went wrong') }}');
                }
            });
        }
    </script>
@endsection
