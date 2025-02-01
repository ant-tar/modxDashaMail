modDashaMail.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'moddashamail-panel-home',
            renderTo: 'moddashamail-panel-home-div'
        }]
    });
    modDashaMail.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(modDashaMail.page.Home, MODx.Component);
Ext.reg('moddashamail-page-home', modDashaMail.page.Home);