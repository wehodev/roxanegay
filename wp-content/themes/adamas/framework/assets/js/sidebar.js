/**
 * Unlimited Sidebar
 *
 * @subpackage Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */
 
jQuery(document).ready(function($) {
    'use strict';

    var WpusSidebar = function() {
        this.widget_wrap = $( '.sidebars-column-1' );
        this.widget_area = $( '#widgets-right' );
        this.widget_add  = $( '#wpus-add-sidebar' );
        this.create_form();
        this.add_del_button();
        this.bind_events();
    };

    WpusSidebar.prototype = {

        create_form: function() {
            this.widget_wrap.append( this.widget_add.html() );
            this.widget_name = this.widget_wrap.find( 'input[name="wpus-sidebar-widgets"]' );
            this.nonce       = this.widget_wrap.find( 'input[name="wpus-delete-sidebar"]' ).val();    
        },

        add_del_button: function() {
            this.widget_area.find( '.sidebar-adamas_custom_sidebar' ).append( '<span class="dashicons dashicons-no wpus-delete-button"></span>' );
        },

        bind_events: function() {
            this.widget_wrap.closest( '.widget-liquid-right' ).on( 'click', '.wpus-delete-button', $.proxy( this.delete_sidebar, this ) );
        },

        delete_sidebar: function( e ) {
            var widget      = $( e.currentTarget ).parents( '.widgets-holder-wrap:eq(0)' ),
                title       = widget.find( '.sidebar-name h3' ),
                spinner     = title.find( '.spinner' ),
                widget_name = $.trim( title.text() ),
                obj         = this;

            $.ajax({
                type: "POST",
                url: window.ajaxurl,
                data: {
                    action: 'adamas_ajax_delete_custom_sidebar',
                    name: widget_name,
                    _wpnonce: obj.nonce
                },

                beforeSend: function() {
                    spinner.addClass( 'activate_spinner' );
                },
                
                success: function( response ) {     
                    if ( response == 'sidebar-deleted' ) {
                        widget.slideUp( 200, function() {
                            $( '.widget-control-remove', widget ).trigger( 'click' );
                            widget.remove();
                            wpWidgets.saveOrder();
                        });
                    }
                }
            });
        },

    };

    new WpusSidebar();

});