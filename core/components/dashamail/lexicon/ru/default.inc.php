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

$_lang['dashamail_api_response_code_2'] = 'Ошибка при добавлении в базу';
$_lang['dashamail_api_response_code_3'] = 'Заданы не все необходимые параметры';
$_lang['dashamail_api_response_code_4'] = 'Нет данных при выводе';
$_lang['dashamail_api_response_code_5'] = 'У пользователя нет адресной базы с таким id';
$_lang['dashamail_api_response_code_6'] = 'Некорректный email-адрес';
$_lang['dashamail_api_response_code_7'] = 'Такой пользователь уже есть в этой адресной базе';
$_lang['dashamail_api_response_code_8'] = 'Лимит по количеству активных подписчиков на тарифном плане клиента';
$_lang['dashamail_api_response_code_9'] = 'Нет такого подписчика у клиента';
$_lang['dashamail_api_response_code_10'] = 'Пользователь уже отписан';
$_lang['dashamail_api_response_code_11'] = 'Нет данных для обновления подписчика';
$_lang['dashamail_api_response_code_12'] = 'Не заданы элементы списка';
$_lang['dashamail_api_response_code_13'] = 'Не задано время рассылки';
$_lang['dashamail_api_response_code_14'] = 'Не задан заголовок письма';
$_lang['dashamail_api_response_code_15'] = 'Не задано поле От Кого?';
$_lang['dashamail_api_response_code_16'] = 'Не задан обратный адрес';
$_lang['dashamail_api_response_code_17'] = 'Не задана ни html ни plain_text версия письма';
$_lang['dashamail_api_response_code_18'] = 'Нет ссылки отписаться в тексте рассылки. Пример ссылки: отписаться';
$_lang['dashamail_api_response_code_19'] = 'Нет ссылки отписаться в тексте рассылки';
$_lang['dashamail_api_response_code_20'] = 'Задан недопустимый статус рассылки';
$_lang['dashamail_api_response_code_21'] = 'Рассылка уже отправляется';
$_lang['dashamail_api_response_code_22'] = 'У вас нет кампании с таким campaign_id';
$_lang['dashamail_api_response_code_23'] = 'Нет такого поля для сортировки';
$_lang['dashamail_api_response_code_24'] = 'Заданы недопустимые события для авторассылки';
$_lang['dashamail_api_response_code_25'] = 'Загружаемый файл уже существует';
$_lang['dashamail_api_response_code_26'] = 'Загружаемый файл больше 5 Мб';
$_lang['dashamail_api_response_code_27'] = 'Файл не найден';
$_lang['dashamail_api_response_code_28'] = 'Указанный шаблон не существует';
$_lang['dashamail_api_response_code_100'] = 'Неверные данные для подключения API';
$_lang['dashamail_api_response_code_101'] = 'Несуществующий метод API или указан некорректный метод API';