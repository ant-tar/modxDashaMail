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

$dashamail = $modx->getService('dashamail','DashaMail',$modx->getOption('dashamail.core_path',null,$modx->getOption('core_path').'components/dashamail/').'model/dashamail/',[]);
if (!($dashamail instanceof DashaMail)) {
    return;
}

$formit =& $hook->formit;
$formValues = $hook->getValues();

// properties

$dmEmailField = $modx->getOption('dmEmailField', $hook->formit->config, 'email');
$dmlistId = intval($modx->getOption('dmlistId', $hook->formit->config, $modx->getOption('dashamail_list_id')));
$modx->log(modX::LOG_LEVEL_ERROR, 'hook dmMergeParams BEFORE ='.$modx->getOption('dmMergeParams', $hook->formit->config));
$dmMergeParams = explode(',', $modx->getOption('dmMergeParams', $hook->formit->config));
$modx->log(modX::LOG_LEVEL_ERROR, 'hook dmMergeParams ='.print_r($dmMergeParams,true));
$mergeData = [];

//process merge array params

foreach ($dmMergeParams as $mergeParam){
    list($key,$value) = explode('==', $mergeParam);
    $mergeData[$key] = $formValues[$value];
}

// init dashaMail Object
$dm = new DashaMail($modx);

// create contact
$result = $dm->addListMember($dmlistId, $hook->getValue($dmEmailField), $mergeData);

if (!empty($result) ){
    $modx->log(modX::LOG_LEVEL_ERROR, 'DashaMail addListMember error:'.$result);
    return false;
}
return true;