modDashaMail.window.CreateItem = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'moddashamail-item-window-create';
    }
    Ext.applyIf(config, {
        title: _('moddashamail_item_create'),
        width: 550,
        autoHeight: true,
        url: modDashaMail.config.connector_url,
        action: 'mgr/item/create',
        fields: this.getFields(config),
        keys: [{
            key: Ext.EventObject.ENTER, shift: true, fn: function () {
                this.submit()
            }, scope: this
        }]
    });
    modDashaMail.window.CreateItem.superclass.constructor.call(this, config);
};
Ext.extend(modDashaMail.window.CreateItem, MODx.Window, {

    getFields: function (config) {
        return [{
            xtype: 'textfield',
            fieldLabel: _('moddashamail_item_name'),
            name: 'name',
            id: config.id + '-name',
            anchor: '99%',
            allowBlank: false,
        }, {
            xtype: 'textarea',
            fieldLabel: _('moddashamail_item_description'),
            name: 'description',
            id: config.id + '-description',
            height: 150,
            anchor: '99%'
        }, {
            xtype: 'xcheckbox',
            boxLabel: _('moddashamail_item_active'),
            name: 'active',
            id: config.id + '-active',
            checked: true,
        }];
    },

    loadDropZones: function () {
    }

});
Ext.reg('moddashamail-item-window-create', modDashaMail.window.CreateItem);


modDashaMail.window.UpdateItem = function (config) {
    config = config || {};
    if (!config.id) {
        config.id = 'moddashamail-item-window-update';
    }
    Ext.applyIf(config, {
        title: _('moddashamail_item_update'),
        width: 550,
        autoHeight: true,
        url: modDashaMail.config.connector_url,
        action: 'mgr/item/update',
        fields: this.getFields(config),
        keys: [{
            key: Ext.EventObject.ENTER, shift: true, fn: function () {
                this.submit()
            }, scope: this
        }]
    });
    modDashaMail.window.UpdateItem.superclass.constructor.call(this, config);
};
Ext.extend(modDashaMail.window.UpdateItem, MODx.Window, {

    getFields: function (config) {
        return [{
            xtype: 'hidden',
            name: 'id',
            id: config.id + '-id',
        }, {
            xtype: 'textfield',
            fieldLabel: _('moddashamail_item_name'),
            name: 'name',
            id: config.id + '-name',
            anchor: '99%',
            allowBlank: false,
        }, {
            xtype: 'textarea',
            fieldLabel: _('moddashamail_item_description'),
            name: 'description',
            id: config.id + '-description',
            anchor: '99%',
            height: 150,
        }, {
            xtype: 'xcheckbox',
            boxLabel: _('moddashamail_item_active'),
            name: 'active',
            id: config.id + '-active',
        }];
    },

    loadDropZones: function () {
    }

});
Ext.reg('moddashamail-item-window-update', modDashaMail.window.UpdateItem);