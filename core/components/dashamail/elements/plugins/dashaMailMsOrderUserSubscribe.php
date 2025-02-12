<?php
/** @var modX $modx */
switch ($modx->event->name) {
	case 'msOnCreateOrder':
		$msAddress = $msOrder->getOne('Address');
		$msReceiver = $msOrder->get('receiver');
		$msComment = $msOrder->get('comment');
		$msSubscription = $msOrder->get('subscription');
		$msPhone = $msAddress->get('phone');
		$msEmail = $msAddress->get('email');       
		$modx->log(modX::LOG_LEVEL_ERROR, $msReceiver, '', 'sendOrder');        
		$modx->log(modX::LOG_LEVEL_ERROR, $msComment, '', 'sendOrder');        
		$modx->log(modX::LOG_LEVEL_ERROR, $msEmail, '', 'sendOrder');        
		$modx->log(modX::LOG_LEVEL_ERROR, $msPhone, '', 'sendOrder');        
		$modx->log(modX::LOG_LEVEL_ERROR, $msSubscription, '', 'sendOrder');        
		//$modx->log(modX::LOG_LEVEL_ERROR, " \"$v\": \n". print_r($msOrder->getMany('Products'), 1), '', 'sendOrder');

	break;
}