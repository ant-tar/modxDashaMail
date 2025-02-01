modDashaMail.panel.Home = function (config) {
    config = config || {};
    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        layout: 'anchor',
        /*
         stateful: true,
         stateId: 'moddashamail-panel-home',
         stateEvents: ['tabchange'],
         getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
         */
        hideMode: 'offsets',
        items: [{
            html: '<h2>' + _('moddashamail') + '</h2>',
            cls: '',
            style: {margin: '15px 0'}
        }, {
            xtype: 'modx-tabs',
            defaults: {border: false, autoHeight: true},
            border: true,
            hideMode: 'offsets',
            items: [{
                title: _('moddashamail_items'),
                layout: 'anchor',
                items: [{
                    html: _('moddashamail_intro_msg'),
                    cls: 'panel-desc',
                }, {
                    xtype: 'moddashamail-grid-items',
                    cls: 'main-wrapper',
                }]
            }]
        }]
    });
    modDashaMail.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(modDashaMail.panel.Home, MODx.Panel);
Ext.reg('moddashamail-panel-home', modDashaMail.panel.Home);
