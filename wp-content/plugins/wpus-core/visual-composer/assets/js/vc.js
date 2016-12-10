/**
 * Javascript for Visual Composer
 *
 * @subpackage Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

jQuery(document).ready(function($) {
	'use strict';

	$('.wpus-typography-wrap .wpus-typography-input').change(function(e) {
        e.preventDefault();
        var parent = $(this).closest('.wpus-typography-wrap'),
            values = '';
        parent.find( '.wpus-typography-input' ).each(function() {
        	if ( $(this).val() ) {
            	values += $(this).data('type') + ':' + $(this).attr('value') + ';';
            }
        });
        parent.find('.wpb_vc_param_value').val(values).trigger('change');
    });

	$('.wpus-typography-wrap').each(function(index,element) {
		var self = $(this);
		var vals = self.find('.wpb_vc_param_value').val();
		if ( '' != vals ) {
	    	var vals = vals.split(';');
	      	$.each(vals, function(i, vl) {
	          	if ( '' != vl ) {
	            	self.find('.wpus-typography-input').each(function(input_index, elem) {
		                var splitVal = vl.split(':');
		                var dataType = $(elem).attr('data-type');
		                if ( dataType == splitVal[0] ) {
		                	var mval = splitVal[1];
		                  	$(elem).val(mval);
		                }
	            	});
	          	}
	      	});
	    }
	});

	$('[data-vc-shortcode-param-name^="arrows"]').wrapAll('<div class="wpus-vc-wrap"></div>');
	$('[data-vc-shortcode-param-name^="dots"]').wrapAll('<div class="wpus-vc-wrap"></div>');

});