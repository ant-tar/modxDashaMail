<?php
/**
 * dashaMailSubscribe
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
$modx->log(modX::LOG_LEVEL_ERROR, 'hook mergeData='.print_r($mergeData,true));


$modx->log(modX::LOG_LEVEL_ERROR, 'hook call....');
$modx->log(modX::LOG_LEVEL_ERROR, 'hook email='.$dmEmailField);
$modx->log(modX::LOG_LEVEL_ERROR, 'hook list ID ='.$dmlistId);

$modx->log(modX::LOG_LEVEL_ERROR, 'hook values='.print_r($formValues,true));

//$modx->log(modX::LOG_LEVEL_ERROR, 'hook formit listID param='.$modx->getOption('dmlistId', $scriptProperties));
$modx->log(modX::LOG_LEVEL_ERROR, 'hook merge params='.print_r($mergeData,true));
$modx->log(modX::LOG_LEVEL_ERROR, 'hook will be send to ='.$hook->getValue($dmEmailField));

// init dashaMail Object
$dm = new DashaMail($modx);
$listMember = $dm->addListMember($dmlistId, $hook->getValue($dmEmailField),$mergeData);

if (!is_array($listMember)) { // no array means error message
$modx->log(modX::LOG_LEVEL_ERROR, 'hook result is not array=error message'.$listMember);
    $hook->hasErrors();
    $modx->setPlaceholder('fi.validation_error', true);
    $modx->setPlaceholder('fi.validation_error_message', $listMember);
    return false;
}
return true;