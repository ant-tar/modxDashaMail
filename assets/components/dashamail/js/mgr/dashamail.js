var DashaMail = function (config) {
    config = config || {};
    DashaMail.superclass.constructor.call(this, config);
};
Ext.extend(DashaMail, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('dashamail', DashaMail);

DashaMail = new DashaMail();