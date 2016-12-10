/**
 * Adamas Framework JS
 *
 * @subpackage Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

jQuery(document).ready(function($) {
    'use strict';

    var $window     = $(window),
        $document   = $(document);

    window.SITE = {

        // Initialization
        init: function() {
            var self = this,
                obj;

            for ( var obj in self ) {
                if ( self.hasOwnProperty(obj) ) {
                    var _method = self[obj];
                    if ( _method.selector !== undefined && _method.init !== undefined ) {
                        if ( $(_method.selector).length > 0 ) {
                            _method.init();
                        }
                    }
                }
            }
        },

        // Select shortcode text when click on it
        selectShortcode: {
            selector: 'input.wpus-readonly',
            init: function() {

                $("input.wpus-readonly").focus(function(){
                    this.select();
                });

                $("input.wpus-readonly").click(function(){
                    this.select();
                });

            },
        },

        // Slider Tabs
        sliderTabs: {
            selector: '.wpus-slider-tab-header',
            init: function() {

                $('.wpus-slider-tab-header').on('click', 'li', function(e) {

                    var $that = $(this);
                    var el    = $that.data('tab');

                    $that.parents('.wpus-slider-tab-header').find('li').removeClass('active');
                    $that.addClass( 'active' );

                    $that.parents('.wpus-slider-metabox-inside').find('.wpus-slider-tab-content').removeClass('show').addClass('hide');
                    $that.parents('.wpus-slider-metabox-inside').find(el).removeClass('hide').addClass('show');

                    return false;
                    
                });

            },
        },

        // Metabox Tabs
        metaTabs: {
            selector: '.wpus-tab-header',
            init: function() {

                var tab = $('.wpus-tab-header li:first span').data('tab');

			    $('.wpus-tab-header li:first').addClass('active'); 
			    $(tab).addClass('show');

			    $('.wpus-tab-header').on('click', 'span', function(e) {

			        var $that = $(this);
			        var el    = $that.data('tab');

			        $that.parents('.wpus-tab-header').find('li').removeClass('active');
			        $that.parent().addClass( 'active' );

			        $('.wpus-tab-content').removeClass('show').addClass('hide');
			        $(el).removeClass('hide').addClass('show');

			        return false;
			    });

            },
        },

        // Visual composer  
        vcDeprecated: {
            selector: '.wpb-layout-element-button',
            init: function() {
                $('.wpb-layout-element-button').each( function() {
			        $(this).removeClass('vc_element-deprecated');
			    })
            },
        },

        // Display post format meta boxes as needed
        checkFormat: {
            selector: '#post-formats-select input',
            init: function() {
                
                $('#post-formats-select input').change(function checkFormat() {

			        var format = $('#post-formats-select input:checked').attr('value');

			        if (format == '0') {
			            format = 'standard'; 
			        }

			        if (typeof format != 'undefined') {
			            $('#adamas_gallery_post_format_metadata_metabox').hide();
			            $('#adamas_video_post_format_metadata_metabox').hide();
			            $('#adamas_audio_post_format_metadata_metabox').hide();
			            $('#adamas_'+format+'_post_format_metadata_metabox').stop( true, true ).show();   
			        }

			    }).trigger('change');

            },
        },

        // Popup
        popup: {
            selector: '.wpus-popup',
            init: function() {
                $document.on('click', '.wpus-popup-link', function(e) {
                    $(this).next().addClass('show');
                    return false;
                });
                $document.on('click', '.wpus-popup-close', function(e) {
                    $(this).closest('.wpus-popup').removeClass('show');
                    return false;
                });
                $document.on('click', '.wpus-popup', function(e) {
                    if ( $(e.target).hasClass('wpus-popup')) {
                        $(this).removeClass('show');
                    }
                    return false;
                });
            },
        },

    }

    // on Ready
	$document.ready(function() {
		window.SITE.init();
	});

	// on Load
	$window.load(function(){
		window.SITE.checkFormat.init();
	});


    $('body').on('wpa_copy', function(){
        window.SITE.sliderTabs.init();
    } )

});


jQuery(document).ready(function($) {
    'use strict';


/* ----------------------------------------------------------------------------- */
/* Colorpicker
/* ----------------------------------------------------------------------------- */

    if ( $('.wpus-colorpicker').length > 0 ) {
        Color.prototype.toString = function() {
            if (this._alpha < 1) {
                return this.toCSS('rgba', this._alpha ).replace(/\s+/g, '');
            }

            var hex = parseInt(this._color, 10).toString(16);

            if (this.error)
                return '';
            if (hex.length < 6) {
                for (var i = 6 - hex.length - 1; i >= 0; i--) {
                    hex = '0' + hex;
                }
            }

            return '#' + hex;
        };
    }

    $('.wpus-colorpicker').each( function() {
        var $control = $(this);
        var value = $control.val().replace(/\s+/g, '');
        var alpha_val = 100;
        var $alpha, $alpha_output;

        if(value.match(/rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/)) {
            alpha_val = parseFloat(value.match(/rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/ )[1]) * 100;
        }

        $control.wpColorPicker({
            clear: function( event, ui ) {
                $alpha.val(100);
                $alpha_output.val(100 + '%');
            }
        });

        $('<div class="wpus-alpha-container">'
            + '<label>Opacity: <output class="rangevalue">' + alpha_val +'%</output></label>'
            + '<input type="range" min="1" max="100" value="' + alpha_val +'" name="alpha" class="wpus-alpha-field">'
            + '</div>').appendTo($control.parents('.wp-picker-container:first').addClass('wpus-color-picker').find('.iris-picker'));

        $alpha = $control.parents('.wp-picker-container:first').find('.wpus-alpha-field');
        $alpha_output = $control.parents('.wp-picker-container:first').find('.wpus-alpha-container output');

        $alpha.bind('change keyup', function() {
            var alpha_val = parseFloat($alpha.val());
            var iris = $control.data( 'a8cIris' );
            var color_picker = $control.data('wpWpColorPicker');

            $alpha_output.val($alpha.val() + '%');
            iris._color._alpha = alpha_val/100.0;
            $control.val(iris._color.toString());
            color_picker.toggler.css({backgroundColor: $control.val()});
        }).val(alpha_val).trigger('change');
    });

/* ----------------------------------------------------------------------------- */
/*  Gallery init
/* ----------------------------------------------------------------------------- */

    $( '.wpus-gallerybutton' ).on( 'click', function(e) {

        var frame;
        var $that     = $( this );
        var images    = $that.parent().find( '.adamas_img_id' ).val();
        var selection = loadImages( images );
        var $insert   = $that.parent().find( '.adamas_img_id' );
        var metaId    = $insert.attr( 'id' );
        var thumb     = $that.prev();

        e.preventDefault();

        // First frame
        var options = {
            title: adamas.create_gallery,
            state: 'gallery-edit',
            frame: 'post',
            selection: selection,
        };

        // If frame is there 
        if ( frame || selection ) {
            options['title'] = adamas.edit_gallery;
        }

        frame = wp.media( options ).open();
            
        // Customize views
        frame.menu.get( 'view' ).get( 'cancel' ).el.innerHTML = adamas.cancel;
        frame.menu.get( 'view' ).get( 'gallery-edit' ).el.innerHTML = adamas.edit_gallery;
        frame.content.get( 'view' ).sidebar.unset( 'gallery' );

        overrideGalleryInsert( $insert, metaId, thumb );

        frame.on( 'toolbar:render:gallery-edit', function() {
            overrideGalleryInsert( $insert, metaId, thumb );
        });
            
        frame.on( 'content:render:browse', function( browser ) {

            if ( ! browser ) return;

            // Hide gallery settings
            browser.sidebar.on( 'ready', function() {
                browser.sidebar.unset( 'gallery' );
            });

        });
            
        // Remove all images from library
        frame.state().get( 'library' ).on( 'remove', function() {
            var models = frame.state().get( 'library' );
            if ( models.length == 0 ) {
                selection = false;
                $.post( ajaxurl, { ids: '', action: 'gallery_meta_box_ajax', post_id: adamas.post_id, meta_id: metaId, nonce: adamas.nonce } );
            }
        });
            
        // Insert button custom text
        function overrideGalleryInsert( $insert, metaId, thumb ) {
            frame.toolbar.get( 'view' ).set({

                insert: {

                    style: 'primary',
                    text: adamas.save_gallery,

                    click: function() {

                        var models  = frame.state().get( 'library' ),
                            ids     = '',
                            ids_val = [];

                        models.each( function( attachment ) {
                            ids += attachment.id + ','
                            ids_val.push( attachment.id );
                        });

                        this.el.innerHTML = adamas.saving;
                        
                        $.ajax({
                            type: 'POST',
                            url: ajaxurl,
                            data: { 
                                ids: ids, 
                                action: 'gallery_meta_box_ajax', 
                                post_id: adamas.post_id,
                                meta_id: metaId,
                                nonce: adamas.nonce 
                            },
                            success: function() {
                                console.log(ids_val);
                                selection = loadImages(ids);
                                $insert.val(ids_val);
                                frame.close();
                            },
                            dataType: 'html'
                        }).done( function( data ) {
                            thumb.fadeIn().html(data);
                        }); 

                    }
                }

            });
        }

    });
        
    // Load images via gallery
    function loadImages( images ) {

        if (images) {

            var shortcode = new wp.shortcode({
                tag:    'gallery',
                attrs:   {ids: images},
                type:   'single'
            });

            var attachments = wp.media.gallery.attachments(shortcode);

            var selection = new wp.media.model.Selection(attachments.models, {
                props: attachments.props.toJSON(),
                multiple: true
            });

            selection.gallery = attachments.gallery;

            // Query attachments
            selection.more().done( function() {
                selection.props.set({query: false});
                selection.unmirror();
                selection.props.unset( 'orderby' );
            });
            
            return selection;
        }
        
        return false;
    };


});