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


    /**
     * @param modX $modx
     * @param array $config
     */
    function __construct(modX &$modx, array $config = [])
    {
        $this->modx =& $modx;
       // $this->namespace = $this->getOption('namespace', $config, 'dashamail');

        $corePath = MODX_CORE_PATH . 'components/moddashamail/';
        $assetsUrl = MODX_ASSETS_URL . 'components/moddashamail/';
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
    
    public function getDashaMailLists()
    {
        //echo $this->initDashaMailApi();
        //echo "!!!!!";
        $params = array('count' => 100);
        
        $lists = $this->dm->lists_get();
        echo print_r($lists);
        echo "FINAL";
        
        
        $this->dm->lists_add_member("288061","anton.tarasoff@gmail.com",["merge_1" => "Андрей"]);
        //$result = $this->mailchimp->get('/lists/?' . http_build_query($params));
/*
        $options = [];
        if (isset($result['lists']) && !empty($result['lists'])) {
            foreach ($result['lists'] as $list) {
                $options[$list['name']] = $list['name'] . '==' . $list['id'];
            }
        }

        asort($options, SORT_NATURAL);
        array_unshift($options, '- Select a mailchimp list - ==0');

        return implode('||', $options);
        */
    }


}