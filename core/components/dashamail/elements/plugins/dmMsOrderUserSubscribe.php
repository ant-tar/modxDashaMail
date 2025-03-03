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
 
      if($msSubscription){
        $dashamail = $modx->getService('dashamail','DashaMail',$modx->getOption('dashamail.core_path',null,$modx->getOption('core_path').'components/dashamail/').'model/dashamail/',[]);
        if (!($dashamail instanceof DashaMail)) {
            return;
        }
        $dm = new DashaMail($modx);
        $mergeData = ['merge_3' => $msPhone]; //
        $listMember = $dm->addListMember($dmListID, $msEmail, $mergeData);
      }
    break;
}