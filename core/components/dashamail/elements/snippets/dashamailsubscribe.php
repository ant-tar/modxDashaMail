<?php
/**
 * dashaMailSubscribe
 * 
 * Formit Hook, add to dashaMail subscription list.
 * It can work also as.....
 *
 * @author Anton Tarasov <contact@antontarasov.com>
 */

/** @var modX $modx */
/** @var array $scriptProperties */
/** @var DashaMail $DashaMail */
echo "1";
$corePath = $modx->getOption('dashamail.core_path', null, $modx->getOption('core_path') . 'components/dashamail/');
echo "2";

if (!$modx->loadClass('DashaMail', $corePath.'model/dashamail/', false, true)) {
    return false;
}

$dashaMail = $modx->getService('dashaMail', 'DashaMail', $corePath, array('core_path' => $corePath));
if (!$dashaMail) {
    
    echo "NOT ";
    $modx->log(xPDO::LOG_LEVEL_ERROR, 'Could not load DashaMail class!');
    return false;
}

echo "3";



// properties
//$listId = array_map('intval', explode(',', $modx->getOption('dashaMailListId', $scriptProperties)));
//$emailField = $modx->getOption('dashaMailEmailField', $scriptProperties, 'email');
//$attributes = explode(',', $modx->getOption('dashaMailAttributes', $scriptProperties));
//$attributesData = array();


// formatting attributes
//foreach ($attributes as $attribute){
//    list($fieldname, $key) = explode('=', $attribute);
//    $attributesData[$key] = $hook->getValue($fieldname);
//}

// init dashaMail Object
//$dm = new DashaMail($modx);
$lists = $dashaMail->getDashaMailLists();
echo print_r($lists);
// create contact
//$contact = $brv->createContact($data = array(
 //   'email' => $hook->getValue($emailField),
 //   'listIds' => $listIds,
 //   'attributes' => $attributesData
//));

//if (!$contact) return;

return true;