<?php
if (!$modx->getService('miniShop2')) {
    return;    
}

switch ($modx->event->name) {
   case 'msOnCreateOrder':
      $msAddress = $msOrder->getOne('Address');
      $dmListID = $modx->getOption('dashamail_list_id');
      $msSubscription = $msAddress->get('dmsubscription');
      $msPhone = $msAddress->get('phone');
      $msEmail = $msAddress->get('email');
      $msAddressReceiver = $msAddress->get('receiver');
      $modx->log(modX::LOG_LEVEL_ERROR, $msAddressReceiver, '', 'sendOrder');       
      $modx->log(modX::LOG_LEVEL_ERROR, $msEmail, '', 'sendOrder');        
      $modx->log(modX::LOG_LEVEL_ERROR, $msPhone, '', 'sendOrder');        
      if($msSubscription){
          $modx->log(modX::LOG_LEVEL_ERROR, 'checkbox is active', '', 'sendOrder');    
        $dashamail = $modx->getService('dashamail','DashaMail',$modx->getOption('dashamail.core_path',null,$modx->getOption('core_path').'components/dashamail/').'model/dashamail/',[]);
        if (!($dashamail instanceof DashaMail)) {
            return;
        }
        $dm = new DashaMail($modx);
        $mergeData = ['merge_3' => $msPhone]; //
        $modx->log(modX::LOG_LEVEL_ERROR, 'merge params='.print_r($mergeData,true), '', 'sendOrder'); 
        $listMember = $dm->addListMember($dmListID, $msEmail, $mergeData);
        $modx->log(modX::LOG_LEVEL_ERROR, 'data sent to DM', '', 'sendOrder');    
      }
   
       break;
}