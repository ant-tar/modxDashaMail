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
        //echo $this->initDashaMailApi();
        //echo "!!!!!";
        $params = array('count' => 100);
        
        $lists = $this->dm->lists_get();
        echo print_r($lists);
        echo "FINAL";
        
        
        //$this->dm->lists_add_member("288061","anton.tarasoff@gmail.com",["merge_1" => "Андрей"]);
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
    
    public function addListMember($listID, $email, $params)
    {
        $this->modx->log(modX::LOG_LEVEL_ERROR, 'addListMember listID ='.$listID);
        $this->modx->log(modX::LOG_LEVEL_ERROR, 'addListMember email ='.$email);
        //$params['send_confirm'] = 1;
        $result = $this->dm->lists_add_member($listID,$email,$params);
        $this->modx->log(modX::LOG_LEVEL_ERROR, 'addListMember result ='.print_r($result,true));
        
        if ($result['msg']['err_code'] == '0') {
			return $result['data'];
		} else {
			return $this->getError($result['msg']['err_code']);
		}
      
        
        
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