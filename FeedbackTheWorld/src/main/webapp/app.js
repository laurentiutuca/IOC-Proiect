Ext.application({
    requires: ['Ext.container.Viewport'],
    name: 'FeedbackTheWorld',

    appFolder: 'app',

    launch: function() {
        Ext.create('Ext.container.Viewport', {
            layout: 'fit',
            items: [
                {
                    xtype: 'panel',
                    title: 'Users',
                    html : 'Mure Real Madrid'
                },
                {
                    xtype: 'panel',
                    title: 'Users2',
                    html: 'Mure Manchester United'
                }
            ]
        });
    }
});