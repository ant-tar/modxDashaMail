<?php
include_once 'setting.inc.php';

$_lang['dashamail'] = 'DashaMail';
$_lang['dashamail_menu_desc'] = 'A sample Extra to develop from.';
$_lang['dashamail_intro_msg'] = 'You can select multiple items by holding Shift or Ctrl button.';

$_lang['dashamail_items'] = 'Items';
$_lang['dashamail_item_id'] = 'Id';
$_lang['dashamail_item_name'] = 'Name';
$_lang['dashamail_item_description'] = 'Description';
$_lang['dashamail_item_active'] = 'Active';

$_lang['dashamail_item_create'] = 'Create Item';
$_lang['dashamail_item_update'] = 'Update Item';
$_lang['dashamail_item_enable'] = 'Enable Item';
$_lang['dashamail_items_enable'] = 'Enable Items';
$_lang['dashamail_item_disable'] = 'Disable Item';
$_lang['dashamail_items_disable'] = 'Disable Items';
$_lang['dashamail_item_remove'] = 'Remove Item';
$_lang['dashamail_items_remove'] = 'Remove Items';
$_lang['dashamail_item_remove_confirm'] = 'Are you sure you want to remove this Item?';
$_lang['dashamail_items_remove_confirm'] = 'Are you sure you want to remove this Items?';

$_lang['dashamail_item_err_name'] = 'You must specify the name of Item.';
$_lang['dashamail_item_err_ae'] = 'An Item already exists with that name.';
$_lang['dashamail_item_err_nf'] = 'Item not found.';
$_lang['dashamail_item_err_ns'] = 'Item not specified.';
$_lang['dashamail_item_err_remove'] = 'An error occurred while trying to remove the Item.';
$_lang['dashamail_item_err_save'] = 'An error occurred while trying to save the Item.';

$_lang['dashamail_grid_search'] = 'Search';
$_lang['dashamail_grid_actions'] = 'Actions';

$_lang['dashamail_api_response_code_2'] = 'Error adding to the database';
$_lang['dashamail_api_response_code_3'] = 'Not all required parameters are set';
$_lang['dashamail_api_response_code_4'] = 'No data available for output';
$_lang['dashamail_api_response_code_5'] = 'User does not have an address database with this ID';
$_lang['dashamail_api_response_code_6'] = 'Invalid email address';
$_lang['dashamail_api_response_code_7'] = 'This user already exists in this address database';
$_lang['dashamail_api_response_code_8'] = 'Limit on the number of active subscribers in the client’s tariff plan';
$_lang['dashamail_api_response_code_9'] = 'No such subscriber for the client';
$_lang['dashamail_api_response_code_10'] = 'User is already unsubscribed';
$_lang['dashamail_api_response_code_11'] = 'No data available to update the subscriber';
$_lang['dashamail_api_response_code_12'] = 'List items are not set';
$_lang['dashamail_api_response_code_13'] = 'Mailing time is not set';
$_lang['dashamail_api_response_code_14'] = 'Email subject is not set';
$_lang['dashamail_api_response_code_15'] = 'Sender field is not set';
$_lang['dashamail_api_response_code_16'] = 'Reply-to address is not set';
$_lang['dashamail_api_response_code_17'] = 'Neither HTML nor plain_text version of the email is set';
$_lang['dashamail_api_response_code_18'] = 'No unsubscribe link in the email text. Example link: unsubscribe';
$_lang['dashamail_api_response_code_19'] = 'No unsubscribe link in the email text';
$_lang['dashamail_api_response_code_20'] = 'Invalid mailing status set';
$_lang['dashamail_api_response_code_21'] = 'Mailing is already being sent';
$_lang['dashamail_api_response_code_22'] = 'You do not have a campaign with this campaign_id';
$_lang['dashamail_api_response_code_23'] = 'No such field for sorting';
$_lang['dashamail_api_response_code_24'] = 'Invalid events set for auto-mailing';
$_lang['dashamail_api_response_code_25'] = 'Uploaded file already exists';
$_lang['dashamail_api_response_code_26'] = 'Uploaded file exceeds 5 MB';
$_lang['dashamail_api_response_code_27'] = 'File not found';
$_lang['dashamail_api_response_code_28'] = 'Specified template does not exist';
$_lang['dashamail_api_response_code_100'] = 'Invalid API connection data';
$_lang['dashamail_api_response_code_101'] = 'Non-existent API method or incorrect API method specified';