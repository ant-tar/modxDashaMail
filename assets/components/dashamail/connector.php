<?php
if (file_exists(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php')) {
    /** @noinspection PhpIncludeInspection */
    require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
} else {
    require_once dirname(dirname(dirname(dirname(dirname(__FILE__))))) . '/config.core.php';
}
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';
/** @var DashaMail $DashaMail */
$DashaMail = $modx->getService('DashaMail', 'DashaMail', MODX_CORE_PATH . 'components/dashamail/model/');
$modx->lexicon->load('dashamail:default');

// handle request
$corePath = $modx->getOption('dashamail_core_path', null, $modx->getOption('core_path') . 'components/dashamail/');
$path = $modx->getOption('processorsPath', $DashaMail->config, $corePath . 'processors/');
$modx->getRequest();

/** @var modConnectorRequest $request */
$request = $modx->request;
$request->handleRequest([
    'processors_path' => $path,
    'location' => '',
]);