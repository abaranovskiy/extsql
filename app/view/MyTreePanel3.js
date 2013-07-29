/*
 * File: app/view/MyTreePanel3.js
 *
 * This file was generated by Sencha Architect version 2.2.2.
 * http://www.sencha.com/products/architect/
 *
 * This file requires use of the Ext JS 4.2.x library, under independent license.
 * License of Sencha Architect does not include license for Ext JS 4.2.x. For more
 * details see http://www.sencha.com/license or contact license@sencha.com.
 *
 * This file will be auto-generated each and everytime you save your project.
 *
 * Do NOT hand edit this file.
 */

Ext.define('MyApp.view.MyTreePanel3', {
    extend: 'Ext.tree.Panel',
    alias: 'widget.mytreepanel3',

    width: 221,
    autoScroll: true,
    resizable: true,
    collapseDirection: 'left',
    collapseFirst: false,
    collapsible: false,
    title: 'My Tree Panel',
    titleCollapse: true,
    store: 'MyTreeStore',

    initComponent: function() {
        var me = this;

        Ext.applyIf(me, {
            viewConfig: {

            }
        });

        me.callParent(arguments);
    }

});