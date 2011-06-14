/**
 * @class Ext.app.Portal
 * @extends Object
 * A sample portal layout application class.
 */
// TODO: Fill in the content panel -- no AccordionLayout at the moment
// TODO: Fix container drag/scroll support (waiting on Ext.lib.Anim)
// TODO: Fix Ext.Tool scope being set to the panel header
// TODO: Drag/drop does not cause a refresh of scroll overflow when needed
// TODO: Grid portlet throws errors on destroy (grid bug)
// TODO: Z-index issues during drag

Ext.define('Ext.app.Portal', {

    extend: 'Ext.container.Viewport',

    uses: ['Ext.app.PortalPanel', 'Ext.app.PortalColumn', 'Ext.app.GridPortlet', 'Ext.app.ChartPortlet'],

    getTools: function(){
        return [{
            xtype: 'tool',
            type: 'gear',
            handler: function(e, target, panelHeader, tool){
                var portlet = panelHeader.ownerCt;
                portlet.setLoading('Working...');
                Ext.defer(function() {
                    portlet.setLoading(false);
                }, 2000);
            }
        }];
    },

    initComponent: function(){
        var content = '<div class="portlet-content"><a href="#">Employer List</a></br><a href="#">Report</a></div>';

        Ext.apply(this, {
            id: 'app-viewport',
            layout: {
                type: 'border',
                padding: '0 5 5 5' // pad the layout from the window edges
            },
            items: [{
                id: 'app-header',
                xtype: 'box',
                region: 'north',
                height: 40,
                html: 'Admin Panel'
            },{
                xtype: 'container',
                region: 'center',
                layout: 'border',
                items: [{
                    id: 'app-options',
                    title: 'Options',
                    region: 'west',
                    animCollapse: true,
                    width: 200,
                    minWidth: 150,
                    maxWidth: 400,
                    split: true,
                    collapsible: true,
                    layout: 'accordion',
                    layoutConfig:{
                        animate: true
                    },
                    items: [{
                        html: content,
                        title:'Navigation',
                        autoScroll: true,
                        border: false,
                        iconCls: 'nav'
                    },{
                        title:'Settings',
                        html: content,
                        border: false,
                        autoScroll: true,
                        iconCls: 'settings'
                    }]
                },{
                    id: 'app-portal',
                    xtype: 'portalpanel',
                    region: 'center',
                    items: [{
                        id: 'col-1',
                        items: [{
                            id: 'portlet-1',
                            title: 'Employer List',
                            tools: this.getTools(),
                            items: Ext.create('Ext.app.GridPortlet'),
                            listeners: {
                                'close': Ext.bind(this.onPortletClose, this)
                            }
                        },{
                            id: 'portlet-3',
                            title: 'Notice',
                            tools: this.getTools(),
							//height:400,
                            html: '<div id="chart_div">ee</div>',
                            listeners: {
                                'close': Ext.bind(this.onPortletClose, this)
                            }
                        }]
                    },{
                        id: 'col-2',
                        items: [{
                            id: 'portlet-5',
                            title: 'Company Performance',
                            tools: this.getTools(),
							//height:400,
                            html: '<div id="line_div">ee</div>',
                            listeners: {
                                'close': Ext.bind(this.onPortletClose, this)
                            }
                        },{
                            id: 'portlet-4',
                            title: 'Notice',
                            tools: this.getTools(),
                            html: '<div class="portlet-content"> <ul><li><a href="#">Message 1</a></li><li><a href="#">Message 2</a></li></ul></div>',
                            listeners: {
                                'close': Ext.bind(this.onPortletClose, this)
                            }
                        }/*,
                        {
                            id: 'portlet-6',
                            title: 'Payment Status',
                            tools: this.getTools(),
                            items: Ext.create('Ext.app.PaymentGridPortlet'),
                            listeners: {
                                'close': Ext.bind(this.onPortletClose, this)
                            }
                        }*/]
                    }]
                }]
            }]
        });
        this.callParent(arguments);
    },

    onPortletClose: function(portlet) {
        this.showMsg('"' + portlet.title + '" was removed');
    },

    showMsg: function(msg) {
        var el = Ext.get('app-msg'),
            msgId = Ext.id();

        this.msgId = msgId;
        el.update(msg).show();

        Ext.defer(this.clearMsg, 3000, this, [msgId]);
    },

    clearMsg: function(msgId) {
        if (msgId === this.msgId) {
            Ext.get('app-msg').hide();
        }
    }
});
