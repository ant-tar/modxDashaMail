<?php

class modDashaMail
{
    /** @var modX $modx */
    public $modx;

/** @var array $config */
    private $config;

    /**
     * @param modX $modx
     * @param array $config
     */
    function __construct(modX &$modx, array $config = [])
    {
        $this->modx =& $modx;
        $corePath = MODX_CORE_PATH . 'components/moddashamail/';
        $assetsUrl = MODX_ASSETS_URL . 'components/moddashamail/';

        $this->config = array_merge([
            'corePath' => $corePath,
            'assetsUrl' => $assetsUrl,
        ], $config);

        $this->modx->addPackage('moddashamail', $this->config['modelPath']);
        $this->modx->lexicon->load('moddashamail:default');
    }

}