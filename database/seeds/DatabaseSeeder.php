<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            RoleHasPermissionsTableSeeder::class,
            ModelHasRolesTableSeeder::class,
        ]);

        $tableSeeders = [
            AddonsTableSeeder::class, AddressesTableSeeder::class,
            AffiliateConfigsTableSeeder::class, AffiliateLogsTableSeeder::class,
            AffiliateOptionsTableSeeder::class, AffiliatePaymentsTableSeeder::class,
            AffiliateStatsTableSeeder::class, AffiliateUsersTableSeeder::class,
            AffiliateWithdrawRequestsTableSeeder::class, AppTranslationsTableSeeder::class,
            AttributesTableSeeder::class, AttributeCategoryTableSeeder::class,
            AttributeTranslationsTableSeeder::class, AttributeValuesTableSeeder::class,
            AuctionProductBidsTableSeeder::class, BlogsTableSeeder::class,
            BlogCategoriesTableSeeder::class, BrandsTableSeeder::class,
            BrandTranslationsTableSeeder::class, BusinessSettingsTableSeeder::class,
            CarriersTableSeeder::class, CarrierRangesTableSeeder::class,
            CarrierRangePricesTableSeeder::class, CartsTableSeeder::class,
            CategoriesTableSeeder::class, CategoryTranslationsTableSeeder::class,
            CitiesTableSeeder::class, CityTranslationsTableSeeder::class,
            ClubPointsTableSeeder::class, ClubPointDetailsTableSeeder::class,
            ColorsTableSeeder::class, CombinedOrdersTableSeeder::class,
            ConversationsTableSeeder::class,
            CountriesTableSeeder::class, CouponsTableSeeder::class,
            CouponUsagesTableSeeder::class, CurrenciesTableSeeder::class,
            CustomerPackagesTableSeeder::class, CustomerPackagePaymentsTableSeeder::class,
            CustomerPackageTranslationsTableSeeder::class, CustomerProductsTableSeeder::class,
            CustomerProductTranslationsTableSeeder::class, FirebaseNotificationsTableSeeder::class,
            FlashDealsTableSeeder::class, FlashDealProductsTableSeeder::class,
            FlashDealTranslationsTableSeeder::class, HomeCategoriesTableSeeder::class,
            LanguagesTableSeeder::class, ManualPaymentMethodsTableSeeder::class,
            MessagesTableSeeder::class, NotificationsTableSeeder::class,
            OrdersTableSeeder::class, OrderDetailsTableSeeder::class,
            OtpConfigurationsTableSeeder::class, PagesTableSeeder::class,
            PageTranslationsTableSeeder::class, PasswordResetsTableSeeder::class,
            PaykuTransactionsTableSeeder::class, PaymentsTableSeeder::class,
            PickupPointsTableSeeder::class, PickupPointTranslationsTableSeeder::class,
            ProductsTableSeeder::class, ProductQueriesTableSeeder::class,
            ProductStocksTableSeeder::class, ProductTaxesTableSeeder::class,
            ProductTranslationsTableSeeder::class, ProxypayPaymentsTableSeeder::class,
            ReviewsTableSeeder::class, RoleTranslationsTableSeeder::class,
            SearchesTableSeeder::class, SmsTemplatesTableSeeder::class,
            StaffTableSeeder::class, StatesTableSeeder::class,
            SubscribersTableSeeder::class, TaxesTableSeeder::class,
            TicketsTableSeeder::class, TicketRepliesTableSeeder::class,
            TransactionsTableSeeder::class, TranslationsTableSeeder::class,
            UploadsTableSeeder::class, WalletsTableSeeder::class,
            WholesalePricesTableSeeder::class, WishlistsTableSeeder::class,
            ZonesTableSeeder::class, ModelHasPermissionsTableSeeder::class,
            ModelHasRolesGenericTableSeeder::class, PaykuPaymentsTableSeeder::class,
            RoleHasPermissionsGenericTableSeeder::class,
        ];

        $this->call($tableSeeders);
    }
}
