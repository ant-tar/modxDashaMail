<?php
/**
 * dmSubscribe
 * 
 * MODX to DashaMail Formit Hook, add to subscription list.
 *
 * @author Anton Tarasov <contact@antontarasov.com>
 */

/** @var modX $modx */
/** @var array $scriptProperties */
/** @var DashaMail $dashamail */

/*
$corePath = $modx->getOption('dashamail.core_path', null, $modx->getOption('core_path') . 'components/dashamail/');
if (!$modx->loadClass('DashaMail', $corePath.'model/dashamail/', false, true)) {
    return false;
}

$dashaMail = $modx->getService('dashaMail', 'DashaMail', $corePath, array('core_path' => $corePath));
if (!$dashaMail) {
    $modx->log(xPDO::LOG_LEVEL_ERROR, 'Could not load DashaMail class!');
    return false;
}
*/

$dashamail = $modx->getService('dashamail','DashaMail',$modx->getOption('dashamail.core_path',null,$modx->getOption('core_path').'components/dashamail/').'model/dashamail/',[]);
if (!($dashamail instanceof DashaMail)) {
    return;
}

$formit =& $hook->formit;
$formValues = $hook->getValues();

// properties

$dmEmailField = $modx->getOption('dmEmailField', $hook->formit->config, 'email');
$dmlistId = intval($modx->getOption('dmlistId', $hook->formit->config, $modx->getOption('dashamail_list_id')));
$dmMergeParams = explode(',', $modx->getOption('dmMergeParams', $hook->formit->config));
$mergeData = [];

//process merge array params

foreach ($dmMergeParams as $mergeParam){
    list($key,$value) = explode('==', $mergeParam);
    $mergeData[$key] = $formValues[$value];
}
// init dashaMail Object
$dm = new DashaMail($modx);
$listMember = $dm->addListMember($dmlistId, $hook->getValue($dmEmailField),$mergeData);

return true;