-- Single-vendor database cleanup for ecommerce_multivendor dumps.
-- Affiliate/referral tables are intentionally preserved.
-- Run this after importing the original SQL dump.

SET FOREIGN_KEY_CHECKS = 0;
START TRANSACTION;

-- Remove marketplace-only tables.
DROP TABLE IF EXISTS `seller_withdraw_requests`;
DROP TABLE IF EXISTS `seller_package_translations`;
DROP TABLE IF EXISTS `seller_package_payments`;
DROP TABLE IF EXISTS `seller_packages`;
DROP TABLE IF EXISTS `sellers`;
DROP TABLE IF EXISTS `shops`;
DROP TABLE IF EXISTS `commission_histories`;

-- Remove seller-only seed/configuration data.
DELETE FROM `addons` WHERE `unique_identifier` = 'seller_subscription';
DELETE FROM `business_settings`
WHERE `type` IN (
    'vendor_system_activation',
    'show_vendors',
    'vendor_commission',
    'verification_form',
    'category_wise_commission',
    'pos_activation_for_seller'
);
DELETE FROM `pages` WHERE `type` = 'seller_policy_page';
DELETE FROM `translations`
WHERE `lang_key` LIKE '%seller%'
    OR `lang_key` LIKE '%vendor%';

-- Remove seller-only permissions and their role assignments.
DELETE FROM `model_has_permissions`
WHERE `permission_id` IN (
    SELECT `id` FROM `permissions`
    WHERE `name` LIKE '%seller%'
       OR `name` LIKE '%vendor%'
       OR `name` IN ('pay_to_seller', 'commission_history_report')
);
DELETE FROM `role_has_permissions`
WHERE `permission_id` IN (
    SELECT `id` FROM `permissions`
    WHERE `name` LIKE '%seller%'
       OR `name` LIKE '%vendor%'
       OR `name` IN ('pay_to_seller', 'commission_history_report')
);
DELETE FROM `permissions`
WHERE `name` LIKE '%seller%'
   OR `name` LIKE '%vendor%'
   OR `name` IN ('pay_to_seller', 'commission_history_report');

-- Move every product into the in-house admin catalog.
UPDATE `products`
SET `added_by` = 'admin',
    `user_id` = (SELECT `id` FROM `users` WHERE `user_type` = 'admin' ORDER BY `id` LIMIT 1),
    `seller_featured` = 0;

-- Remove seller ownership from shared commerce records.
UPDATE `orders` SET `seller_id` = NULL, `commission_calculated` = 0;
UPDATE `order_details` SET `seller_id` = NULL;
UPDATE `payments` SET `seller_id` = 0;
UPDATE `product_queries` SET `seller_id` = 0;

ALTER TABLE `orders`
    DROP COLUMN `seller_id`,
    DROP COLUMN `commission_calculated`;
ALTER TABLE `order_details` DROP COLUMN `seller_id`;
ALTER TABLE `payments` DROP COLUMN `seller_id`;
ALTER TABLE `products` DROP COLUMN `seller_featured`;
ALTER TABLE `product_queries` DROP COLUMN `seller_id`;

-- Seller accounts are no longer valid in a single-vendor store.
DELETE FROM `users` WHERE `user_type` = 'seller';

COMMIT;
SET FOREIGN_KEY_CHECKS = 1;
