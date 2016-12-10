/**
 * Redux Framework JS
 *
 * @package WordPress
 * @subpackage Adamas
 * @author WP Uber Studio
 * @since Adamas 1.0
 */

jQuery(document).ready(function($) {
    'use strict';

    $('.redux-section-field').each(function(index) {
        var $el = $(this).next();
        $(this).add($el).wrapAll('<div class="wpus-section-wrap"></div>');
    });

});
