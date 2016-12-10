<?php 
/**
 * Visual Composer Custom Icons
 *
 * @package Adamas
 * @author  WP Uber Studio
 * @version 1.0
 */

/**
 * ETline icons
 *
 * @since 1.0
 */ 
function adamas_vc_iconpicker_type_etline( $icons ) {
    
    $etline_icons = array(
        array( "etline-mobile"           => "Mobile" ),
        array( "etline-laptop"           => "Laptop" ),
        array( "etline-desktop"          => "Desktop" ),
        array( "etline-tablet"           => "Tablet" ),
        array( "etline-phone"            => "Phone" ),
        array( "etline-document"         => "Document" ),
        array( "etline-documents"        => "Documents" ),
        array( "etline-search"           => "Search" ),
        array( "etline-clipboard"        => "Clip board" ),
        array( "etline-newspaper"        => "News paper" ),
        array( "etline-notebook"         => "Notebook" ),
        array( "etline-book-open"        => "Book open " ),
        array( "etline-browser"          => "Browser" ),
        array( "etline-calendar"         => "Calendar" ),
        array( "etline-presentation"     => "Presentation" ),
        array( "etline-picture"          => "Picture" ),
        array( "etline-pictures"         => "Pictures" ),
        array( "etline-video"            => "Video" ),
        array( "etline-camera"           => "Camera" ),
        array( "etline-printer"          => "Printer" ),
        array( "etline-toolbox"          => "Tool box" ),
        array( "etline-briefcase"        => "Briefcase" ),
        array( "etline-wallet"           => "Wallet" ),
        array( "etline-gift"             => "Gift" ),
        array( "etline-bargraph"         => "Bar graph" ),
        array( "etline-grid"             => "Grid" ),
        array( "etline-expand"           => "Expand" ),
        array( "etline-focus"            => "Focus" ),
        array( "etline-edit"             => "Edit" ),
        array( "etline-adjustments"      => "Adjustments" ),
        array( "etline-ribbon"           => "Ribbon" ),
        array( "etline-hourglass"        => "Hourglass" ),
        array( "etline-lock"             => "Lock" ),
        array( "etline-megaphone"        => "Megaphone" ),
        array( "etline-shield"           => "Shield" ),
        array( "etline-trophy"           => "Trophy" ),
        array( "etline-flag"             => "Flag" ),
        array( "etline-map"              => "Map" ),
        array( "etline-puzzle"           => "Puzzle" ),
        array( "etline-basket"           => "Basket" ),
        array( "etline-envelope"         => "Envelope" ),
        array( "etline-streetsign"       => "Street sign" ),
        array( "etline-telescope"        => "Telescope" ),
        array( "etline-gears"            => "Gears" ),
        array( "etline-key"              => "Key" ),
        array( "etline-paperclip"        => "Paper clip" ),
        array( "etline-attachment"       => "Attachment" ),
        array( "etline-pricetags"        => "Price tags" ),
        array( "etline-lightbulb"        => "Light bulb" ),
        array( "etline-layers"           => "Layers" ),
        array( "etline-pencil"           => "Pencil" ),
        array( "etline-tools"            => "Tools" ),
        array( "etline-tools-2 "         => "Tools 2 " ),
        array( "etline-scissors"         => "Scissors" ),
        array( "etline-paintbrush"       => "Paintbrush" ),
        array( "etline-magnifying-glass" => "Magnifying glass" ),
        array( "etline-circle-compass"   => "Circle compass" ),
        array( "etline-linegraph"        => "Line graph" ),
        array( "etline-mic"              => "Mic" ),
        array( "etline-strategy"         => "Strategy" ),
        array( "etline-beaker"           => "Beaker" ),
        array( "etline-caution"          => "Caution" ),
        array( "etline-recycle"          => "Recycle" ),
        array( "etline-anchor"           => "Anchor" ),
        array( "etline-profile-male "    => "Profile male " ),
        array( "etline-profile-female"   => "Profile female" ),
        array( "etline-bike"             => "Bike" ),
        array( "etline-wine"             => "Wine" ),
        array( "etline-hotairballoon"    => "Hot air balloon" ),
        array( "etline-globe"            => "Globe" ),
        array( "etline-genius"           => "Genius" ),
        array( "etline-map-pin"          => "Map pin" ),
        array( "etline-dial"             => "Dial" ),
        array( "etline-chat"             => "Chat" ),
        array( "etline-heart"            => "Heart" ),
        array( "etline-cloud"            => "Cloud" ),
        array( "etline-upload"           => "Upload" ),
        array( "etline-download"         => "Download" ),
        array( "etline-target"           => "Target" ),
        array( "etline-hazardous"        => "Hazardous" ),
        array( "etline-piechart"         => "Pie chart" ),
        array( "etline-speedometer"      => "Speedometer" ),
        array( "etline-global"           => "Global" ),
        array( "etline-compass"          => "Compass" ),
        array( "etline-lifesaver"        => "Lifesaver" ),
        array( "etline-clock"            => "Clock" ),
        array( "etline-aperture"         => "Aperture" ),
        array( "etline-quote"            => "Quote" ),
        array( "etline-scope"            => "Scope" ),
        array( "etline-alarmclock"       => "Alarm clock" ),
        array( "etline-refresh"          => "Refresh" ),
        array( "etline-happy"            => "Happy" ),
        array( "etline-sad"              => "Sad" ),
        array( "etline-facebook"         => "Facebook" ),
        array( "etline-twitter"          => "Twitter" ),
        array( "etline-googleplus"       => "Googleplus" ),
        array( "etline-rss"              => "Rss" ),
        array( "etline-tumblr"           => "Tumblr" ),
        array( "etline-linkedin"         => "Linkedin" ),
        array( "etline-dribbble"         => "Dribbble" ), 
    );

    return array_merge( $icons, $etline_icons );
}

add_filter( 'vc_iconpicker-type-etline', 'adamas_vc_iconpicker_type_etline' );