DashaMail.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'dashamail-panel-home',
            renderTo: 'dashamail-panel-home-div'
        }]
    });
    DashaMail.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(DashaMail.page.Home, MODx.Component);
Ext.reg('dashamail-page-home', DashaMail.page.Home);