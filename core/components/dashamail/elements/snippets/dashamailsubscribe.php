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
$corePath = $modx->getOption('dashamail.core_path', null, $modx->getOption('core_path') . 'components/dashamail/');
if (!$modx->loadClass('DashaMail', $corePath.'model/dashamail/', false, true)) {
    return false;
}

$dashaMail = $modx->getService('dashaMail', 'DashaMail', $corePath, array('core_path' => $corePath));
if (!$dashaMail) {
    $modx->log(xPDO::LOG_LEVEL_ERROR, 'Could not load DashaMail class!');
    return false;
}


// properties

$dmEmailField = $modx->getOption('dmEmailField', $scriptProperties, 'email');
$dmlistId = array_map('intval', explode(',', $modx->getOption('dmListId', $scriptProperties)));
$dmMergeParams = explode(',', $modx->getOption('dmMergeParams', $scriptProperties));
$mergeData = [];

$modx->log(modX::LOG_LEVEL_ERROR, 'hook call....');
$modx->log(modX::LOG_LEVEL_ERROR, 'hook email='.$dmEmailField);
$modx->log(modX::LOG_LEVEL_ERROR, 'hook list ID ='.$dmlistId);
$modx->log(modX::LOG_LEVEL_ERROR, 'hook dmMergeParams ='.$dmMergeParams);

// formatting attributes
//foreach ($attributes as $attribute){
//    list($fieldname, $key) = explode('=', $attribute);
//    $attributesData[$key] = $hook->getValue($fieldname);
//}

// init dashaMail Object
//$dm = new DashaMail($modx);
//$lists = $dashaMail->getDashaMailLists();
//echo print_r($lists);
// create contact
//$contact = $brv->createContact($data = array(
 //   'email' => $hook->getValue($emailField),
 //   'listIds' => $listIds,
 //   'attributes' => $attributesData
//));

//if (!$contact) return;

return true;