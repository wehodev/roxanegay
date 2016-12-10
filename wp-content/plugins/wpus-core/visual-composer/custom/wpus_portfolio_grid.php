<?php
/**
 * Visual Composer: Portfolio Grid
 * 
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

vc_map( array(

    'base'        => 'wpus_portfolio_grid',
    'icon'        => 'icon-wpus-portfolio-grid',
    'category'    => esc_html__( 'Built for Adamas', 'wpus-core' ),
    'name'        => esc_html__( 'Portfolio Grid', 'wpus-core' ),
    'description' => esc_html__( 'Add portfolio grid', 'wpus-core' ),
    'params'      => array(

        // General Tab
        array(
            'type'        => 'dropdown',
            'param_name'  => 'image_size',
            'heading'     => esc_html__( 'Image Size', 'wpus-core' ),
            'description' => esc_html__( 'Select image size.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::image_size() ),
            'std'         => 'adamas-image-horizontal',
        ),

        array(
            'type'             => 'textfield',
            'param_name'       => 'image_width',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Image Width', 'wpus-core' ),
            'description'      => esc_html__( 'Enter image width without px.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'image_size', 'value' => 'custom' ),
        ),

        array(
            'type'             => 'textfield',
            'param_name'       => 'image_height',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Image Height', 'wpus-core' ),
            'description'      => esc_html__( 'Enter image height without px.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'image_size', 'value' => 'custom' ),
        ),

        // Query tab
        array(
            'type'        => 'textfield',
            'param_name'  => 'number',
            'heading'     => esc_html__( 'Number', 'wpus-core' ),
            'description' => esc_html__( 'Number of projects to show.', 'wpus-core' ),
            'std'         => '8',
            'admin_label' => true,
            'group'       => esc_html__( 'Query', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'orderby',
            'heading'     => esc_html__( 'Order By', 'wpus-core' ),
            'description' => esc_html__( 'Select orderby.', 'wpus-core'),
            'value'       => array_flip( AdamasShared::orderby() ),
            'std'         => 'ASC',
            'admin_label' => true,
            'group'       => esc_html__( 'Query', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'order',
            'heading'     => esc_html__( 'Order', 'wpus-core' ),
            'description' => esc_html__( 'Select order.', 'wpus-core'),
            'value'       => array_flip( AdamasShared::order() ),
            'std'         => 'none',
            'admin_label' => true,
            'group'       => esc_html__( 'Query', 'wpus-core' ),
        ),

        array(
            'type'        => 'autocomplete',
            'param_name'  => 'include_cat',
            'heading'     => esc_html__( 'Include Categories.', 'wpus-core' ),
            'description' => esc_html__( 'Enter categories name. ( Note: Leave empty to select all categories ).', 'wpus-core' ),
            'settings'    => array(
                'multiple'       => true,
                'min_length'     => 1,
                'groups'         => true,
                'unique_values'  => true,
                'display_inline' => true,
                'delay'          => 0,
                'auto_focus'     => true,
                'values'         => WpusVcHelper::autocomplete_terms( 'portfolio_category' ),
            ),
            'group' => esc_html__( 'Query', 'wpus-core' ),
        ),

        array(
            'type'        => 'autocomplete',
            'heading'     => esc_html__( 'Exclude Categories', 'wpus-core' ),
            'description' => esc_html__( 'Enter categories name.', 'wpus-core' ),
            'param_name'  => 'exclude_cat',
            'settings'    => array(
                'multiple'       => true,
                'min_length'     => 1,
                'groups'         => true,
                'unique_values'  => true,
                'display_inline' => true,
                'delay'          => 0,
                'auto_focus'     => true,
                'values'         => WpusVcHelper::autocomplete_terms( 'portfolio_category' ),
            ),
            'group' => esc_html__( 'Query', 'wpus-core' ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'offset',
            'heading'     => esc_html__( 'Offset', 'wpus-core' ),
            'description' => esc_html__( 'Number of post to displace or pass over. WARNING: Setting the offset parameter overrides/ignores the paged parameter and breaks pagination.', 'wpus-core' ),
            'group'       => esc_html__( 'Query', 'wpus-core' ),
        ),

        // Settings tab
        array(
            'type'        => 'dropdown',
            'param_name'  => 'columns_lg',
            'heading'     => esc_html__( 'Maximum Columns', 'wpus-core' ),
            'description' => esc_html__( 'Select columns.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::columns() ),
            'std'         => '4',
            'group'       => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'columns_md',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Columns on Notebook', 'wpus-core' ),
            'description'      => esc_html__( 'Select columns.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::columns() ),
            'std'              => '3',
            'group'            => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'columns_sm',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Columns on Tablet', 'wpus-core' ),
            'description'      => esc_html__( 'Select columns.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::columns() ),
            'std'              => '2',
            'group'            => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'             => 'dropdown',
            'param_name'       => 'columns_xs',
            'edit_field_class' => 'vc_col-sm-4 vc_column',
            'heading'          => esc_html__( 'Columns on Mobile', 'wpus-core' ),
            'description'      => esc_html__( 'Select columns.', 'wpus-core' ),
            'value'            => array_flip( AdamasShared::columns() ),
            'std'              => '1',
            'group'            => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'right_space',
            'heading'     => esc_html__( 'Margin Right', 'wpus-core' ),
            'description' => esc_html__( 'Select margin right.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::margin() ),
            'group'       => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'bottom_space',
            'heading'     => esc_html__( 'Margin Bottom', 'wpus-core' ),
            'description' => esc_html__( 'Select margin bottom.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::margin() ),
            'group'       => esc_html__( 'Settngs', 'wpus-core' ),
        ),

        // Title tab
        array(
            'type'        => 'dropdown',
            'param_name'  => 'title',
            'heading'     => esc_html__( 'Title', 'wpus-core' ),
            'description' => esc_html__( 'Show title.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'No', 'wpus-core' )                => '',
                esc_html__( 'Title Overlay', 'wpus-core' )     => 'title-overlay',
                esc_html__( 'Title Under Image', 'wpus-core' ) => 'title-under',
            ),
            'std'   => 'title-overlay',
            'group' => esc_html__( 'Title', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'title_appearance',
            'heading'     => esc_html__( 'Title Appearance', 'wpus-core' ),
            'description' => esc_html__( 'Select title appearance.', 'wpus-core' ),
            'value'       => array_filter( array_flip( AdamasShared::appearance() ) ),
            'std'         => 'wpus-hover-show',
            'dependency'  => array( 'element' => 'title', 'value' => 'title-overlay' ),
            'group'       => esc_html__( 'Title', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'title_position',
            'heading'     => esc_html__( 'Title Position', 'wpus-core' ),
            'description' => esc_html__( 'Select title position.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::position() ),
            'std'         => 'wpus-position-cc',
            'dependency'  => array( 'element' => 'title', 'value' => 'title-overlay' ),
            'group'       => esc_html__( 'Title', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'title_align',
            'heading'     => esc_html__( 'Title Align', 'wpus-core' ),
            'description' => esc_html__( 'Select title alignment.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::alignment() ),
            'dependency'  => array( 'element' => 'title', 'value' => 'title-under' ),
            'group'       => esc_html__( 'Title', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'title_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Title Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select title color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'title', 'not_empty' => true ),
            'group'            => esc_html__( 'Title', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'title_hover_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Title Hover Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select title hover color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'title', 'value' => 'title-under' ),
            'group'            => esc_html__( 'Title', 'wpus-core' ),
        ),

        array(
            'type'             => 'textfield',
            'param_name'       => 'title_padding_top',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Title Padding Top', 'wpus-core' ),
            'description'      => esc_html__( 'You can use px or em value.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'title', 'value' => 'title-under' ),
            'group'            => esc_html__( 'Title', 'wpus-core' ),
        ),

        array(
            'type'             => 'textfield',
            'param_name'       => 'title_padding_lr',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Title Padding Left/Right', 'wpus-core' ),
            'description'      => esc_html__( 'You can use px or em value.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'title', 'value' => 'title-under' ),
            'group'            => esc_html__( 'Title', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'categories',
            'heading'     => esc_html__( 'Categories', 'wpus-core' ),
            'description' => esc_html__( 'Show categories.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::boolean() ),
            'dependency' => array( 'element' => 'title', 'not_empty' => true ),
            'group'      => esc_html__( 'Title', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'categories_color',
            'heading'     => esc_html__( 'Categories Color', 'wpus-core' ),
            'description' => esc_html__( 'Select categories color.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'categories', 'value' => 'true' ),
            'group'       => esc_html__( 'Title', 'wpus-core' ),
        ),

        array(
            'type'       => 'wpus_typography',
            'param_name' => 'title_typography',
            'heading'    => esc_html__( 'Title Typography', 'wpus-core' ),
            'options'    => array( 'text-align' => false ),
            'dependency' => array( 'element' => 'title', 'not_empty' => true ),
            'group'      => esc_html__( 'Title', 'wpus-core' ),
        ),

        array(
            'type'       => 'wpus_typography',
            'param_name' => 'categories_typography',
            'heading'    => esc_html__( 'Categories Typography', 'wpus-core' ),
            'options'    => array( 'text-align' => false ),
            'dependency' => array( 'element' => 'categories', 'value' => 'true' ),
            'group'      => esc_html__( 'Title', 'wpus-core' ),
        ),

        // Filter tab
        array(
            'type'        => 'dropdown',
            'heading'     => esc_html__( 'Filter', 'wpus-core' ),
            'description' => esc_html__( 'Show filter.', 'wpus-core' ),
            'param_name'  => 'filter',
            'value'       => array_flip( AdamasShared::boolean() ),
            'group'       => esc_html__( 'Filter', 'wpus-core' ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'filter_text',
            'heading'     => esc_html__( 'Custom Filter "All" Text', 'wpus-core' ),
            'description' => esc_html__( 'Enter custom filter "All" text.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'filter', 'value' => 'true' ),
            'group'       => esc_html__( 'Filter', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'filter_align',
            'heading'     => esc_html__( 'Filter Align', 'wpus-core' ),
            'description' => esc_html__( 'Select fiter alignment.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::alignment() ),
            'dependency'  => array( 'element' => 'filter', 'value' => 'true' ),
            'group'       => esc_html__( 'Filter', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'filter_margin_bottom',
            'heading'     => esc_html__( 'Filter Margin Bottom', 'wpus-core' ),
            'description' => esc_html__( 'Select filter margin bottom.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::margin() ),
            'dependency'  => array( 'element' => 'filter', 'value' => 'true' ),
            'group'       => esc_html__( 'Filter', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'filter_style',
            'heading'     => esc_html__( 'Filter Style', 'wpus-core' ),
            'description' => esc_html__( 'Select filter style.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Minimal', 'wpus-core' )    => 'style-minimal',
                esc_html__( 'Background', 'wpus-core' ) => 'style-bg',
                esc_html__( 'Outline', 'wpus-core' )    => 'style-outline',
            ),
            'dependency' => array( 'element' => 'filter', 'value' => 'true' ),
            'group'      => esc_html__( 'Filter', 'wpus-core' ),
        ),
        
        array(
            'type'             => 'colorpicker',
            'param_name'       => 'filter_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'filter', 'value' => 'true' ),
            'group'            => esc_html__( 'Filter', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'filter_hover_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Hover Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select hover color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'filter', 'value' => 'true' ),
            'group'            => esc_html__( 'Filter', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'filter_background_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Background Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select background color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'filter_style', 'value_not_equal_to' => 'style-minimal' ),
            'group'            => esc_html__( 'Filter', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'filter_hover_background_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Hover Background Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select hover background color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'filter_style', 'value_not_equal_to' => 'style-minimal' ),
            'group'            => esc_html__( 'Filter', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'filter_border_style',
            'heading'     => esc_html__( 'Border Style', 'wpus-core' ),
            'description' => esc_html__( 'Select border style.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::border_style() ),
            'dependency'  => array( 'element' => 'filter_style', 'value' => 'style-outline' ),
            'group'       => esc_html__( 'Filter', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'filter_border_width',
            'heading'     => esc_html__( 'Border Width', 'wpus-core' ),
            'description' => esc_html__( 'Select border width.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::border_width() ),
            'dependency'  => array( 'element' => 'filter_border_style', 'value_not_equal_to' => 'none'  ),
            'group'       => esc_html__( 'Filter', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'filter_border_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Border Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select border color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'filter_border_style', 'value_not_equal_to' => 'none'  ),
            'group'            => esc_html__( 'Filter', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'filter_hover_border_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Hover Border Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select hover border color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'filter_border_style', 'value_not_equal_to' => 'none'  ),
            'group'            => esc_html__( 'Filter', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'filter_border_radius',
            'heading'     => esc_html__( 'Border Radius', 'wpus-core' ),
            'description' => esc_html__( 'Select border radius.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::border_radius() ),
            'dependency'  => array( 'element' => 'filter_style', 'value_not_equal_to' => array( 'style-minimal' ) ),
            'group'       => esc_html__( 'Filter', 'wpus-core' ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'filter_class',
            'heading'     => esc_html__( 'Filter Extra Class Name', 'wpus-core' ),
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'filter', 'value' => 'true' ),
            'group'       => esc_html__( 'Filter', 'wpus-core' ),
        ),

        array(
            'type'       => 'wpus_typography',
            'param_name' => 'filter_typography',
            'heading'    => esc_html__( 'Filter Typography', 'wpus-core' ),
            'options'    => array( 'text-align' => false ),
            'dependency' => array( 'element' => 'filter', 'value' => 'true' ),
            'group'      => esc_html__( 'Filter', 'wpus-core' ),
        ),

        // Pagination tab
        array(
            'type'        => 'dropdown',
            'param_name'  => 'pagination',
            'heading'     => esc_html__( 'Pagination', 'wpus-core' ),
            'description' => esc_html__( 'Show pagination.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'No', 'wpus-core' )         => '',
                esc_html__( 'Pagination', 'wpus-core' ) => 'pagination',
                esc_html__( 'Load More', 'wpus-core' )  => 'loadmore',
            ),
            'group' => esc_html__( 'Pagination', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'pagination_align',
            'heading'     => esc_html__( 'Pagination Align', 'wpus-core' ),
            'description' => esc_html__( 'Select pagination alignment.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::alignment() ),
            'dependency'  => array( 'element' => 'pagination', 'not_empty' => true ),
            'group'       => esc_html__( 'Pagination', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'pagination_margin_top',
            'heading'     => esc_html__( 'Pagination Margin Top', 'wpus-core' ),
            'description' => esc_html__( 'Select pagination margin top.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::margin() ),
            'dependency'  => array( 'element' => 'pagination', 'not_empty' => true ),
            'group'       => esc_html__( 'Pagination', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'pagination_style',
            'heading'     => esc_html__( 'Pagination Style', 'wpus-core' ),
            'description' => esc_html__( 'Select pagination style.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Background', 'wpus-core' ) => 'style-bg',
                esc_html__( 'Outline', 'wpus-core' )    => 'style-outline',
                esc_html__( 'Minimal', 'wpus-core' )    => 'style-minimal',
            ),
            'std'        => 'style-outline',
            'dependency' => array( 'element' => 'pagination', 'not_empty' => true ),
            'group'      => esc_html__( 'Pagination', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'pagination_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'pagination', 'not_empty' => true ),
            'group'            => esc_html__( 'Pagination', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'pagination_hover_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Hover Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select hover color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'pagination', 'not_empty' => true ),
            'group'            => esc_html__( 'Pagination', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'pagination_background_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Background Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select background color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'pagination_style', 'value_not_equal_to' => 'style-minimal' ),
            'group'            => esc_html__( 'Pagination', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'pagination_hover_background_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Hover Background Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select hover background color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'pagination_style', 'value_not_equal_to' => 'style-minimal' ),
            'group'            => esc_html__( 'Pagination', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'pagination_border_style',
            'heading'     => esc_html__( 'Border Style', 'wpus-core' ),
            'description' => esc_html__( 'Select border style.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::border_style() ),
            'dependency'  => array( 'element' => 'pagination_style', 'value' => 'style-outline' ),
            'group'       => esc_html__( 'Pagination', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'pagination_border_width',
            'heading'     => esc_html__( 'Border Width', 'wpus-core' ),
            'description' => esc_html__( 'Select border width.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::border_width() ),
            'dependency'  => array( 'element' => 'pagination_border_style', 'value_not_equal_to' => 'none' ),
            'group'       => esc_html__( 'Pagination', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'pagination_border_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Border Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select border color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'pagination_border_style', 'value_not_equal_to' => 'none' ),
            'group'            => esc_html__( 'Pagination', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'pagination_hover_border_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Hover Border Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select hover border color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'pagination_border_style', 'value_not_equal_to' => 'none' ),
            'group'            => esc_html__( 'Pagination', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'pagination_border_radius',
            'heading'     => esc_html__( 'Border Radius', 'wpus-core' ),
            'description' => esc_html__( 'Select border radius.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::border_radius() ),
            'dependency'  => array( 'element' => 'pagination_style', 'value_not_equal_to' => array( 'style-minimal' ) ),
            'group'       => esc_html__( 'Pagination', 'wpus-core' ),
        ),

        array(
            'type'        => 'textfield',
            'param_name'  => 'pagination_class',
            'heading'     => esc_html__( 'Pagination Extra Class Name', 'wpus-core' ),
            'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'pagination', 'not_empty' => true ),
            'group'       => esc_html__( 'Pagination', 'wpus-core' ),
        ),

        array(
            'type'       => 'wpus_typography',
            'param_name' => 'pagination_typography',
            'heading'    => esc_html__( 'Pagination Typography', 'wpus-core' ),
            'options'    => array( 'text-align' => false, ),
            'dependency' => array( 'element' => 'pagination', 'not_empty' => true ),
            'group'      => esc_html__( 'Pagination', 'wpus-core' ),
        ),

        // Advanced tab
        array(
            'type'        => 'dropdown',
            'param_name'  => 'image_hover',
            'heading'     => __( 'Image on Mouse Hover', 'wpus-core' ),
            'description' => __( 'Select style to image on mouse hover.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::image_hovers() ),
            'group'       => __( 'Advanced', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'overlay_appearance',
            'heading'     => esc_html__( 'Overlay Appearance', 'wpus-core' ),
            'description' => esc_html__( 'Select overlay appearance.', 'wpus-core' ),
            'value'       => array_flip( AdamasShared::appearance() ),
            'std'         => 'wpus-hover-show',
            'group'       => esc_html__( 'Advanced', 'wpus-core' ),
        ),

        array(
            'type'        => 'dropdown',
            'param_name'  => 'overlay_type',
            'heading'     => esc_html__( 'Overlay Type', 'wpus-core' ),
            'description' => esc_html__( 'Select overlay type.', 'wpus-core' ),
            'value'       => array(
                esc_html__( 'Background', 'wpus-core' ) => 'background',
                esc_html__( 'Gradient', 'wpus-core' )   => 'gradient',
            ),
            'dependency' => array( 'element' => 'overlay_appearance', 'not_empty' => true ),
            'group'      => esc_html__( 'Advanced', 'wpus-core' ),
        ),

        array(
            'type'        => 'colorpicker',
            'param_name'  => 'overlay_color',
            'heading'     => esc_html__( 'Overlay Color', 'wpus-core' ),
            'description' => esc_html__( 'Select overlay color.', 'wpus-core' ),
            'dependency'  => array( 'element' => 'overlay_type', 'value' => 'background' ),
            'group'       => esc_html__( 'Advanced', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'overlay_top_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Overlay Top Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select overlay top color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'overlay_type', 'value' => 'gradient' ),
            'group'            => esc_html__( 'Advanced', 'wpus-core' ),
        ),

        array(
            'type'             => 'colorpicker',
            'param_name'       => 'overlay_bottom_color',
            'edit_field_class' => 'vc_col-sm-6 vc_column',
            'heading'          => esc_html__( 'Overlay Bottom Color', 'wpus-core' ),
            'description'      => esc_html__( 'Select overlay bottom color.', 'wpus-core' ),
            'dependency'       => array( 'element' => 'overlay_type', 'value' => 'gradient' ),
            'group'            => esc_html__( 'Advanced', 'wpus-core' ),
        ),

        // Extra tab
        WpusVcParams::param_id(),
        WpusVcParams::param_class(),
        WpusVcParams::param_hidden(),
    
    ),

) );