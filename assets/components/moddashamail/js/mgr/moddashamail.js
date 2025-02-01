var modDashaMail = function (config) {
    config = config || {};
    modDashaMail.superclass.constructor.call(this, config);
};
Ext.extend(modDashaMail, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('moddashamail', modDashaMail);

modDashaMail = new modDashaMail();