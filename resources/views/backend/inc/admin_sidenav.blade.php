<div class="aiz-sidebar-wrap">
    <div class="aiz-sidebar left c-scrollbar">
        <div class="aiz-side-nav-logo-wrap">
            <a href="{{ url('/admin') }}" class="d-block text-left">
                @if(get_setting('system_logo_white') != null)
                    <img class="mw-100" src="{{ uploaded_asset(get_setting('system_logo_white')) }}" class="brand-icon" alt="{{ get_setting('site_name') }}">
                @else
                    <img class="mw-100" src="{{ static_asset('assets/img/logo.png') }}" class="brand-icon" alt="{{ get_setting('site_name') }}">
                @endif
            </a>
        </div>

        <div class="aiz-side-nav-wrap">
            <ul class="aiz-side-nav-list" id="main-menu" data-toggle="aiz-side-menu">
                <li class="aiz-side-nav-item">
                    <a href="{{ url('/admin') }}" class="aiz-side-nav-link">
                        <i class="las la-home aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('Dashboard') }}</span>
                    </a>
                </li>

                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-shopping-cart aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('Products') }}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item"><a href="{{ url('/admin/products/create') }}" class="aiz-side-nav-link"><span class="aiz-side-nav-text">{{ translate('Add New product') }}</span></a></li>
                        <li class="aiz-side-nav-item"><a href="{{ url('/admin/products/all') }}" class="aiz-side-nav-link"><span class="aiz-side-nav-text">{{ translate('All Products') }}</span></a></li>
                        <li class="aiz-side-nav-item"><a href="{{ url('/admin/products/admin') }}" class="aiz-side-nav-link"><span class="aiz-side-nav-text">{{ translate('In House Products') }}</span></a></li>
                        <li class="aiz-side-nav-item"><a href="{{ url('/admin/categories') }}" class="aiz-side-nav-link"><span class="aiz-side-nav-text">{{ translate('Category') }}</span></a></li>
                        <li class="aiz-side-nav-item"><a href="{{ url('/admin/brands') }}" class="aiz-side-nav-link"><span class="aiz-side-nav-text">{{ translate('Brand') }}</span></a></li>
                    </ul>
                </li>

                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-money-bill aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('Sales') }}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item"><a href="{{ url('/admin/all_orders') }}" class="aiz-side-nav-link"><span class="aiz-side-nav-text">{{ translate('All Orders') }}</span></a></li>
                        <li class="aiz-side-nav-item"><a href="{{ url('/admin/inhouse-orders') }}" class="aiz-side-nav-link"><span class="aiz-side-nav-text">{{ translate('Inhouse orders') }}</span></a></li>
                    </ul>
                </li>

                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-user-friends aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('Customers') }}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item"><a href="{{ url('/admin/customers') }}" class="aiz-side-nav-link"><span class="aiz-side-nav-text">{{ translate('Customer list') }}</span></a></li>
                    </ul>
                </li>

                @if (addon_is_activated('pos_system') && auth()->user()->can('pos_manager'))
                    <li class="aiz-side-nav-item">
                        <a href="{{ route('poin-of-sales.index') }}" class="aiz-side-nav-link">
                            <i class="las la-cash-register aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Point of Sale') }}</span>
                        </a>
                    </li>
                @endif

                @if (addon_is_activated('offline_payment'))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-money-check-alt aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Offline Payment') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item"><a href="{{ route('manual_payment_methods.index') }}" class="aiz-side-nav-link"><span class="aiz-side-nav-text">{{ translate('Manual Payment Methods') }}</span></a></li>
                            <li class="aiz-side-nav-item"><a href="{{ route('offline_wallet_recharge_request.index') }}" class="aiz-side-nav-link"><span class="aiz-side-nav-text">{{ translate('Wallet Recharge Requests') }}</span></a></li>
                            <li class="aiz-side-nav-item"><a href="{{ route('offline_customer_package_payment_request.index') }}" class="aiz-side-nav-link"><span class="aiz-side-nav-text">{{ translate('Customer Package Payments') }}</span></a></li>
                        </ul>
                    </li>
                @endif

                @if (addon_is_activated('otp_system'))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-mobile-alt aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('OTP & SMS') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item"><a href="{{ route('otp.configconfiguration') }}" class="aiz-side-nav-link"><span class="aiz-side-nav-text">{{ translate('OTP Configuration') }}</span></a></li>
                            <li class="aiz-side-nav-item"><a href="{{ route('otp_credentials.index') }}" class="aiz-side-nav-link"><span class="aiz-side-nav-text">{{ translate('OTP Credentials') }}</span></a></li>
                            <li class="aiz-side-nav-item"><a href="{{ route('sms.index') }}" class="aiz-side-nav-link"><span class="aiz-side-nav-text">{{ translate('SMS') }}</span></a></li>
                            <li class="aiz-side-nav-item"><a href="{{ route('sms-templates.index') }}" class="aiz-side-nav-link"><span class="aiz-side-nav-text">{{ translate('SMS Templates') }}</span></a></li>
                        </ul>
                    </li>
                @endif

                @if (addon_is_activated('affiliate_system') && auth()->user()->can('affiliate_configurations'))
                    <li class="aiz-side-nav-item">
                        <a href="#" class="aiz-side-nav-link">
                            <i class="las la-users aiz-side-nav-icon"></i>
                            <span class="aiz-side-nav-text">{{ translate('Affiliate') }}</span>
                            <span class="aiz-side-nav-arrow"></span>
                        </a>
                        <ul class="aiz-side-nav-list level-2">
                            <li class="aiz-side-nav-item"><a href="{{ route('affiliate.index') }}" class="aiz-side-nav-link"><span class="aiz-side-nav-text">{{ translate('Affiliate Settings') }}</span></a></li>
                            @if (auth()->user()->can('view_affiliate_users'))
                                <li class="aiz-side-nav-item"><a href="{{ route('affiliate.users') }}" class="aiz-side-nav-link"><span class="aiz-side-nav-text">{{ translate('Affiliate Users') }}</span></a></li>
                            @endif
                            @if (auth()->user()->can('view_affiliate_withdraw_requests'))
                                <li class="aiz-side-nav-item"><a href="{{ route('affiliate.withdraw_requests') }}" class="aiz-side-nav-link"><span class="aiz-side-nav-text">{{ translate('Withdraw Requests') }}</span></a></li>
                            @endif
                            @if (auth()->user()->can('view_affiliate_logs'))
                                <li class="aiz-side-nav-item"><a href="{{ route('affiliate.logs.admin') }}" class="aiz-side-nav-link"><span class="aiz-side-nav-text">{{ translate('Affiliate Logs') }}</span></a></li>
                            @endif
                        </ul>
                    </li>
                @endif

                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-user aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('Inhouse Store') }}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item"><a href="{{ url('/admin/products/admin') }}" class="aiz-side-nav-link"><span class="aiz-side-nav-text">{{ translate('Admin Products') }}</span></a></li>
                    </ul>
                </li>

                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-desktop aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('Website Setup') }}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item"><a href="{{ url('/admin/website/header') }}" class="aiz-side-nav-link"><span class="aiz-side-nav-text">{{ translate('Header') }}</span></a></li>
                        <li class="aiz-side-nav-item"><a href="{{ url('/admin/website/footer') }}" class="aiz-side-nav-link"><span class="aiz-side-nav-text">{{ translate('Footer') }}</span></a></li>
                        <li class="aiz-side-nav-item"><a href="{{ url('/admin/website/pages') }}" class="aiz-side-nav-link"><span class="aiz-side-nav-text">{{ translate('Pages') }}</span></a></li>
                    </ul>
                </li>

                <li class="aiz-side-nav-item">
                    <a href="#" class="aiz-side-nav-link">
                        <i class="las la-dharmachakra aiz-side-nav-icon"></i>
                        <span class="aiz-side-nav-text">{{ translate('Setup & Configurations') }}</span>
                        <span class="aiz-side-nav-arrow"></span>
                    </a>
                    <ul class="aiz-side-nav-list level-2">
                        <li class="aiz-side-nav-item"><a href="{{ url('/admin/general-setting') }}" class="aiz-side-nav-link"><span class="aiz-side-nav-text">{{ translate('General Settings') }}</span></a></li>
                        <li class="aiz-side-nav-item"><a href="{{ url('/admin/activation') }}" class="aiz-side-nav-link"><span class="aiz-side-nav-text">{{ translate('Features activation') }}</span></a></li>
                        <li class="aiz-side-nav-item"><a href="{{ url('/admin/languages') }}" class="aiz-side-nav-link"><span class="aiz-side-nav-text">{{ translate('Languages') }}</span></a></li>
                        <li class="aiz-side-nav-item"><a href="{{ url('/admin/currency') }}" class="aiz-side-nav-link"><span class="aiz-side-nav-text">{{ translate('Currency') }}</span></a></li>
                        <li class="aiz-side-nav-item"><a href="{{ url('/admin/payment-method') }}" class="aiz-side-nav-link"><span class="aiz-side-nav-text">{{ translate('Payment Methods') }}</span></a></li>
                        <li class="aiz-side-nav-item"><a href="{{ url('/admin/file_system') }}" class="aiz-side-nav-link"><span class="aiz-side-nav-text">{{ translate('File System & Cache Configuration') }}</span></a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="aiz-sidebar-overlay"></div>
</div>
