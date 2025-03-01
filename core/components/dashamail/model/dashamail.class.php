<?php

require_once dirname(dirname(dirname(__FILE__))) . '/lib/DashaMail.php';

class DashaMail
{
    /** @var modX $modx */
    public $modx;
    
    public $namespace = 'dashamail';

/** @var array $config */
    public $config = array();
	
	/**
     * @var \DashaMailPHP
     */
    public $dm;
    
    private $cultureKey;


    /**
     * @param modX $modx
     * @param array $config
     */
    function __construct(modX &$modx, array $config = [])
    {
        $this->modx =& $modx;
       // $this->namespace = $this->getOption('namespace', $config, 'dashamail');

        $corePath = MODX_CORE_PATH . 'components/dashamail/';
        $assetsUrl = MODX_ASSETS_URL . 'components/dashamail/';
        $connectorUrl = $assetsUrl . 'connector.php';

        $this->config = array_merge([
            'assets_url' => $assetsUrl,
            'core_path' => $corePath,
            'assetsUrl' => $assetsUrl,
            'cssUrl' => $assetsUrl . 'css/',
            'jsUrl' => $assetsUrl . 'js/',
            'imagesUrl' => $assetsUrl . 'images/',
            'connectorUrl' => $connectorUrl,
            'corePath' => $corePath,
            'modelPath' => $corePath . 'model/',
            'chunksPath' => $corePath . 'elements/chunks/',
            'chunkSuffix' => '.chunk.tpl',
            'snippetsPath' => $corePath . 'elements/snippets/',
            'processorsPath' => $corePath . 'processors/',
            'templatesPath' => $corePath . 'templates/',
        ], $config);

        $this->modx->addPackage('dashamail', $this->config['modelPath']);
        $this->modx->lexicon->load('dashamail:default');
        $this->initDashaMailApi();
        $this->$cultureKey = $this->modx->getOption('cultureKey') ?? 'en';
    }

	
	/**
     * Init DashaMail Class.
     *
     * https://github.com/
     */
    private function initDashaMailApi()
    {
        $this->dm = new \DMP\DashaMailPHP($this->modx->getOption('dashamail_api_key'));
    }
    
    //get error codes
	private function getError($key) {
		return $this->modx->lexicon('dashamail_api_response_code_'.$key,[],$this->$cultureKey);
	}
    
    public function getDashaMailLists()
    {
        $lists = $this->dm->lists_get();
    }
    
    public function addListMember($listID, $email, $params)
    {
        $result = $this->dm->lists_add_member($listID,$email,$params);
        if ($result['msg']['err_code'] == '0') {
			return $result['data'];
		} else {
		    $this->modx->log(modX::LOG_LEVEL_ERROR, $this->getError($result['msg']['err_code']));
			return $this->getError($result['msg']['err_code']);
		}
 
    }
    


}