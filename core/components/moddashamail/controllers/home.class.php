<?php

/**
 * The home manager controller for modDashaMail.
 *
 */
class modDashaMailHomeManagerController extends modExtraManagerController
{
    /** @var modDashaMail $modDashaMail */
    public $modDashaMail;


    /**
     *
     */
    public function initialize()
    {
        $this->modDashaMail = $this->modx->getService('modDashaMail', 'modDashaMail', MODX_CORE_PATH . 'components/moddashamail/model/');
        parent::initialize();
    }


    /**
     * @return array
     */
    public function getLanguageTopics()
    {
        return ['moddashamail:default'];
    }


    /**
     * @return bool
     */
    public function checkPermissions()
    {
        return true;
    }


    /**
     * @return null|string
     */
    public function getPageTitle()
    {
        return $this->modx->lexicon('moddashamail');
    }


    /**
     * @return void
     */
    public function loadCustomCssJs()
    {
        $this->addCss($this->modDashaMail->config['cssUrl'] . 'mgr/main.css');
        $this->addJavascript($this->modDashaMail->config['jsUrl'] . 'mgr/moddashamail.js');
        $this->addJavascript($this->modDashaMail->config['jsUrl'] . 'mgr/misc/utils.js');
        $this->addJavascript($this->modDashaMail->config['jsUrl'] . 'mgr/misc/combo.js');
        $this->addJavascript($this->modDashaMail->config['jsUrl'] . 'mgr/widgets/items.grid.js');
        $this->addJavascript($this->modDashaMail->config['jsUrl'] . 'mgr/widgets/items.windows.js');
        $this->addJavascript($this->modDashaMail->config['jsUrl'] . 'mgr/widgets/home.panel.js');
        $this->addJavascript($this->modDashaMail->config['jsUrl'] . 'mgr/sections/home.js');

        $this->addHtml('<script type="text/javascript">
        modDashaMail.config = ' . json_encode($this->modDashaMail->config) . ';
        modDashaMail.config.connector_url = "' . $this->modDashaMail->config['connectorUrl'] . '";
        Ext.onReady(function() {MODx.load({ xtype: "moddashamail-page-home"});});
        </script>');
    }


    /**
     * @return string
     */
    public function getTemplateFile()
    {
        $this->content .= '<div id="moddashamail-panel-home-div"></div>';

        return '';
    }
}