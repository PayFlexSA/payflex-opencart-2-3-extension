<?php
// Heading
$_['heading_title']     = 'PayFlex Payments';
$_['text_plugin_version']  = '1.0.0';

// Text
$_['text_payment']      = 'Payment';
$_['text_success']      = 'Success: You have modified your payflex details!';
$_['text_edit']         = 'Edit PayFlex';
$_['text_payflex']      = '<a href="https://www.payflex.co.za" target="_blank" title="Sign-up for PayFlex"><img width="100" src="' . HTTP_SERVER . 'view/image/payflex.png" alt="PayFlex" title="PayFlex" /></a>';
$_['text_authorisation'] = 'Authorisation';
$_['text_sale']         = 'Sale';

// Entry
$_['entry_sort']       = 'Sorting';
$_['entry_paymode']    = 'Payment Mode';
$_['entry_test']       = 'Test mode';
$_['entry_status']     = 'Enable / Disable';
$_['entry_username']	 = 'PayFlex API Key (Client ID)';
$_['entry_password']	 = 'PayFlex secret';
$_['entry_reference']	 = 'PayFlex Merchant Reference (Merchant ID)';
$_['entry_order_status_success'] = 'Success Order Status';
$_['entry_order_status_pending'] = 'Success Order Pending';
$_['entry_order_status_expired'] = 'Success Order Expired';
$_['entry_order_status_cancelled'] = 'Success Order Cancelled';
$_['entry_order_status_failed'] = 'Success Order Failed';

$_['entry_cron_job_url']			= 'Cron Job\'s URL';
$_['entry_cron_job_token']			= 'Secret Token';
$_['entry_cron_job_last_run']		= 'Cron Job\'s Last Run Time';
// Error
$_['error_permission']   = 'Warning: You do not have permission to modify the PayFlex payment module';
$_['error_username']     = 'PayFlex API Key is required!';
$_['error_password']     = 'PayFlex password is required!';
$_['error_reference']    = 'PayFlex merchant reference is required!';
$_['error_sort']    	 = 'PayFlex payment sort is required!';

// Help hints
$_['help_sort']      	 = 'Set to Payment Method sorting.';
$_['help_testmode']      = 'Set to Yes to use the PayFlex Sandbox.';
$_['help_username']      = 'Your PayFlex API Key from your PayFlex account.';
$_['help_password']      = 'Your PayFlex API Secret from your PayFlex account.';
$_['help_reference']     = 'Your PayFlex API Merchant Reference ID.';

$_['help_cron_job_url']				= 'Set a cron job to call this URL';
$_['help_cron_job_token']			= 'Make this long and hard to guess';


// Product page widget manually adding info
$_['text_widget_manual_title']		= 'Product Page Widget - Manual Adding';
$_['text_widget_manual_desc1']		= 'To manually add the PayFlex product page widget to your product page template, copy and paste the code below into your product template (e.g. catalog/view/theme/[your_theme]/template/product/product.tpl) where you would like the widget to appear:';
$_['text_widget_manual_desc2']		= 'For example, in the default theme, to add the widget above the price, you can add it right after <?php if ($price) { ?> to start with.';
$_['text_widget_manual_note']		= 'Note: Replace [PRODUCT_PRICE] with the dynamic price variable from your template, e.g. <?php echo $price; ?>';