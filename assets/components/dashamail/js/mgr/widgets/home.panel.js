DashaMail.panel.Home = function (config) {
    config = config || {};
    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        layout: 'anchor',
        /*
         stateful: true,
         stateId: 'dashamail-panel-home',
         stateEvents: ['tabchange'],
         getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
         */
        hideMode: 'offsets',
        items: [{
            html: '<h2>' + _('dashamail') + '</h2>',
            cls: '',
            style: {margin: '15px 0'}
        }, {
            xtype: 'modx-tabs',
            defaults: {border: false, autoHeight: true},
            border: true,
            hideMode: 'offsets',
            items: [{
                title: _('dashamail_items'),
                layout: 'anchor',
                items: [{
                    html: _('dashamail_intro_msg'),
                    cls: 'panel-desc',
                }, {
                    xtype: 'dashamail-grid-items',
                    cls: 'main-wrapper',
                }]
            }]
        }]
    });
    DashaMail.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(DashaMail.panel.Home, MODx.Panel);
Ext.reg('dashamail-panel-home', DashaMail.panel.Home);
