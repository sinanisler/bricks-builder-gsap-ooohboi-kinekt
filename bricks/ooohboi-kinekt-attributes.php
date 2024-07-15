<?php

/**
 * Kinekt Attributes
 *
 * @since      1.0.0
 * @package    Ooohboi_Kinekt
 * @subpackage Ooohboi_Kinekt/includes
 * @author     OoohBoi <oooh.boi29@gmail.com>
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$markers = false;
$custom_start_end = false;
$animate_children = false;
$use_scrubbing = false;
$use_pinning = false;
$pin_spacing = false;
$img_effect_reveal_fadein = false;
$on_enter = 'play';
$on_leave = 'play';
$on_enter_back = 'resume';
$on_leave_back = 'reverse';
$toggle_actions = $on_enter . ' ' . $on_leave . ' ' . $on_enter_back . ' ' . $on_leave_back;

if( ! isset( $element->settings[ 'animation_type' ] ) || '' === $element->settings[ 'animation_type' ] ) return;

if( isset( $element->settings[ 'custom_start_end' ] ) ) $custom_start_end = true;
if( isset( $element->settings[ 'animation_type_markers' ] ) ) $markers = true;
if( isset( $element->settings[ 'animate_children' ] ) ) $animate_children = true;
if( isset( $element->settings[ 'animation_type_use_scrub' ] ) ) $use_scrubbing = true;
if( isset( $element->settings[ 'animation_type_pin' ] ) ) $use_pinning = true;
if( isset( $element->settings[ 'animation_type_pin_spacing' ] ) ) $pin_spacing = true;
if( isset( $element->settings[ 'animation_type_img_effect_reveal_fadein' ] ) ) $img_effect_reveal_fadein = true;

// Animatable properties
$animatable_properties = isset( $element->settings[ 'animation_properties' ] ) ? $element->settings[ 'animation_properties' ] : [];
$ap_all = [];
if ( count( $animatable_properties ) ) $ap_all = $animatable_properties;

// Toggle Actions
if( isset( $element->settings[ 'animation_toggle_actions_onenter' ] ) ) $on_enter = $element->settings[ 'animation_toggle_actions_onenter' ];
if( isset( $element->settings[ 'animation_toggle_actions_onleave' ] ) ) $on_leave = $element->settings[ 'animation_toggle_actions_onleave' ];
if( isset( $element->settings[ 'animation_toggle_actions_onenterback' ] ) ) $on_enter_back = $element->settings[ 'animation_toggle_actions_onenterback' ];
if( isset( $element->settings[ 'animation_toggle_actions_onleaveback' ] ) ) $on_leave_back = $element->settings[ 'animation_toggle_actions_onleaveback' ];
$toggle_actions = $on_enter . ' ' . $on_leave . ' ' . $on_enter_back . ' ' . $on_leave_back;

$json_data_fade_in_out = [
    'AP' => $ap_all, 
    'A1' => isset( $element->settings[ 'animation_type_trigger' ] ) ? $element->settings[ 'animation_type_trigger' ] : '',
    'A2' => isset( $element->settings[ 'animation_type_end_trigger' ] ) ? $element->settings[ 'animation_type_end_trigger' ] : '',
    'B' => isset( $element->settings[ 'animation_type_start' ] ) ? $element->settings[ 'animation_type_start' ] : 'bottom', 
    'B1' => isset( $element->settings[ 'animation_type_end' ] ) ? $element->settings[ 'animation_type_end' ] : 'bottom', 
    'C' => isset( $element->settings[ 'animation_type_meet' ] ) ? $element->settings[ 'animation_type_meet' ] : 'bottom', 
    'C1' => isset( $element->settings[ 'animation_type_meet_end' ] ) ? $element->settings[ 'animation_type_meet_end' ] : 'top', 
    'D' => isset( $element->settings[ 'animation_type_offset' ] ) ? $element->settings[ 'animation_type_offset' ] : 0, 
    'D1' => isset( $element->settings[ 'animation_type_offset_end' ] ) ? $element->settings[ 'animation_type_offset_end' ] : 0, 
    'E' => isset( $element->settings[ 'animation_type_custom_start' ] ) ? $element->settings[ 'animation_type_custom_start' ] : '', 
    'F' => isset( $element->settings[ 'animation_type_custom_end' ] ) ? $element->settings[ 'animation_type_custom_end' ] : '', 
    'G' => $custom_start_end,
    'I2' => isset( $element->settings[ 'animation_type_rot_origin' ] ) ? $element->settings[ 'animation_type_rot_origin' ] : 'center',
    'J' => isset( $element->settings[ 'animation_type_stagger' ] ) ? $element->settings[ 'animation_type_stagger' ] : 0, 
    'M' => $use_scrubbing,
    'M1' => isset( $element->settings[ 'animation_type_scrub' ] ) ? $element->settings[ 'animation_type_scrub' ] : 0,
    'P' => $use_pinning, 
    'P1' => $pin_spacing, 
    'U' => isset( $element->settings[ 'animation_type_duration' ] ) ? $element->settings[ 'animation_type_duration' ] : 0.5, 
    'V' => isset( $element->settings[ 'animation_type_delay' ] ) ? $element->settings[ 'animation_type_delay' ] : 0, 
    'X' => isset( $element->settings[ 'animation_type_easing' ] ) ? $element->settings[ 'animation_type_easing' ] : 'none', 
    'Y' => $toggle_actions, 
    'Z' => $markers,
    'W' => $animate_children
];

$json_data_text_effect = [
    'AP' => $ap_all, 
    'A1' => isset( $element->settings[ 'animation_type_trigger' ] ) ? $element->settings[ 'animation_type_trigger' ] : '',
    'A2' => isset( $element->settings[ 'animation_type_end_trigger' ] ) ? $element->settings[ 'animation_type_end_trigger' ] : '',
    'B' => isset( $element->settings[ 'animation_type_start' ] ) ? $element->settings[ 'animation_type_start' ] : 'bottom', 
    'B1' => isset( $element->settings[ 'animation_type_end' ] ) ? $element->settings[ 'animation_type_end' ] : 'bottom', 
    'C' => isset( $element->settings[ 'animation_type_meet' ] ) ? $element->settings[ 'animation_type_meet' ] : 'bottom', 
    'C1' => isset( $element->settings[ 'animation_type_meet_end' ] ) ? $element->settings[ 'animation_type_meet_end' ] : 'top', 
    'D' => isset( $element->settings[ 'animation_type_offset' ] ) ? $element->settings[ 'animation_type_offset' ] : 0, 
    'D1' => isset( $element->settings[ 'animation_type_offset_end' ] ) ? $element->settings[ 'animation_type_offset_end' ] : 0, 
    'E' => isset( $element->settings[ 'animation_type_custom_start' ] ) ? $element->settings[ 'animation_type_custom_start' ] : '', 
    'F' => isset( $element->settings[ 'animation_type_custom_end' ] ) ? $element->settings[ 'animation_type_custom_end' ] : '', 
    'G' => $custom_start_end,
    'I2' => isset( $element->settings[ 'animation_type_rot_origin' ] ) ? $element->settings[ 'animation_type_rot_origin' ] : 'center',
    'J' => isset( $element->settings[ 'animation_type_stagger' ] ) ? $element->settings[ 'animation_type_stagger' ] : 0,
    'K' => isset( $element->settings[ 'animation_type_text_split_type' ] ) ? $element->settings[ 'animation_type_text_split_type' ] : '', 
    'K1' => isset( $element->settings[ 'animation_type_text_split_overflow' ] ) ? $element->settings[ 'animation_type_text_split_overflow' ] : false, 
    'M' => $use_scrubbing,
    'M1' => isset( $element->settings[ 'animation_type_scrub' ] ) ? $element->settings[ 'animation_type_scrub' ] : 0,
    'P' => $use_pinning, 
    'P1' => $pin_spacing, 
    'U' => isset( $element->settings[ 'animation_type_duration' ] ) ? $element->settings[ 'animation_type_duration' ] : 0.5, 
    'V' => isset( $element->settings[ 'animation_type_delay' ] ) ? $element->settings[ 'animation_type_delay' ] : 0, 
    'X' => isset( $element->settings[ 'animation_type_easing' ] ) ? $element->settings[ 'animation_type_easing' ] : 'none', 
    'Y' => $toggle_actions, 
    'Z' => $markers
];

$json_data_image_effects = [
    'A1' => isset( $element->settings[ 'animation_type_trigger' ] ) ? $element->settings[ 'animation_type_trigger' ] : '',
    'A2' => isset( $element->settings[ 'animation_type_end_trigger' ] ) ? $element->settings[ 'animation_type_end_trigger' ] : '',
    'B' => isset( $element->settings[ 'animation_type_start' ] ) ? $element->settings[ 'animation_type_start' ] : 'bottom', 
    'B1' => isset( $element->settings[ 'animation_type_end' ] ) ? $element->settings[ 'animation_type_end' ] : 'bottom', 
    'C' => isset( $element->settings[ 'animation_type_meet' ] ) ? $element->settings[ 'animation_type_meet' ] : 'bottom', 
    'C1' => isset( $element->settings[ 'animation_type_meet_end' ] ) ? $element->settings[ 'animation_type_meet_end' ] : 'top', 
    'D' => isset( $element->settings[ 'animation_type_offset' ] ) ? $element->settings[ 'animation_type_offset' ] : 0, 
    'D1' => isset( $element->settings[ 'animation_type_offset_end' ] ) ? $element->settings[ 'animation_type_offset_end' ] : 0, 
    'E' => isset( $element->settings[ 'animation_type_custom_start' ] ) ? $element->settings[ 'animation_type_custom_start' ] : '', 
    'F' => isset( $element->settings[ 'animation_type_custom_end' ] ) ? $element->settings[ 'animation_type_custom_end' ] : '', 
    'G' => $custom_start_end, 
    'M' => $use_scrubbing,
    'M1' => isset( $element->settings[ 'animation_type_scrub' ] ) ? $element->settings[ 'animation_type_scrub' ] : 0, 
    'N' => isset( $element->settings[ 'animation_type_img_effects' ] ) ? $element->settings[ 'animation_type_img_effects' ] : 'reveal', 
    'N1' => isset( $element->settings[ 'animation_type_img_effect_reveal' ] ) ? $element->settings[ 'animation_type_img_effect_reveal' ] : 'reveal-from-left',
    'N2' => isset( $element->settings[ 'animation_type_img_effect_reveal_dir_offset' ] ) ? $element->settings[ 'animation_type_img_effect_reveal_dir_offset' ] : 0,
    'N3' => isset( $element->settings[ 'animation_type_img_effect_reveal_speed_offset' ] ) ? $element->settings[ 'animation_type_img_effect_reveal_speed_offset' ] : 0,
    'N4' => isset( $element->settings[ 'animation_type_img_effect_cover_color' ] ) ? $element->settings[ 'animation_type_img_effect_cover_color' ] : '', 
    'N5' => $img_effect_reveal_fadein, 
    'O' => isset( $element->settings[ 'animation_type_img_effect_parallax_vol' ] ) ? $element->settings[ 'animation_type_img_effect_parallax_vol' ] : 20,
    'O1' => isset( $element->settings[ 'animation_type_img_effect_parallax_dir' ] ) ? $element->settings[ 'animation_type_img_effect_parallax_dir' ] : 'vertical',
    'O2' => isset( $element->settings[ 'animation_type_img_effect_parallax_pan' ] ) ? $element->settings[ 'animation_type_img_effect_parallax_pan' ] : 'negative',
    'P' => $use_pinning, 
    'P1' => $pin_spacing, 
    'U' => isset( $element->settings[ 'animation_type_duration' ] ) ? $element->settings[ 'animation_type_duration' ] : 0.5, 
    'V' => isset( $element->settings[ 'animation_type_delay' ] ) ? $element->settings[ 'animation_type_delay' ] : 0, 
    'X' => isset( $element->settings[ 'animation_type_easing' ] ) ? $element->settings[ 'animation_type_easing' ] : 'none', 
    'Y' => $toggle_actions, 
    'Z' => $markers
];

// map for JS
/*
AP: 'ap_all', 
A1: 'animation_type_trigger',
A2: 'animation_type_end_trigger',
B: 'animation_type_start', 
B1: 'animation_type_end', 
C: 'animation_type_meet', 
C1: 'animation_type_meet_end', 
D: 'animation_type_offset', 
D1: 'animation_type_offset_end', 
E: 'animation_type_custom_start', 
F: 'animation_type_custom_end', 
G: 'custom_start_end',
I2: 'animation_type_rot_origin',
J: 'animation_type_stagger', 
K: 'animation_type_text_split_type',
K1: 'animation_type_text_split_overflow',
N: 'animation_type_img_effects', 
N1: 'animation_type_img_effect_reveal', 
N2: 'animation_type_img_effect_reveal_dir_offset', 
N3: 'animation_type_img_effect_reveal_speed_offset', 
N4: 'animation_type_img_effect_cover_color', 
N5: 'animation_type_img_effect_reveal_fadein', 
M: 'animation_type_use_scrub', 
M1: 'animation_type_scrub', 
O: 'animation_type_img_effect_parallax_vol',
O1: 'animation_type_img_effect_parallax_dir',
O2: 'animation_type_img_effect_parallax_pan',
P: 'animation_type_pin', 
P1: 'animation_type_pin_spacing', 
U: 'animation_type_duration',
V: 'animation_type_delay',
X: 'animation_type_easing',
Y: 'play play resume reverse',
Z: 'markers', 
W: 'animate_children'
*/

if( isset( $element->settings[ 'animation_type' ] ) && '' !== $element->settings[ 'animation_type' ] ) {

    if ( ! bricks_is_frontend() ) return;

    // animation type: kinekt-fade-from-to | kinekt-text-effect | kinekt-image-effects
    $the_type = $element->settings[ 'animation_type' ];

    // get the existing class
    $existing_class = implode( ' ', $attributes[ '_root' ][ 'class' ] );

    switch( $the_type ) {
        case 'kinekt-fade-from-to' : 
            $json_encoded = base64_encode( json_encode( $json_data_fade_in_out ) );
            $attributes[ $key ][ 'class' ] = $existing_class . ' ' . $the_type;
            $attributes[ $key ][ 'data-kinekt' ] = $json_encoded;
            break;
        case 'kinekt-text-effect' : 
            $json_encoded = base64_encode( json_encode( $json_data_text_effect ) );
            $attributes[ $key ][ 'class' ] = $existing_class . ' ' . $the_type;
            $attributes[ $key ][ 'data-kinekt' ] = $json_encoded; 
            break;
        case 'kinekt-image-effects' : 
            $json_encoded = base64_encode( json_encode( $json_data_image_effects ) );
            $attributes[ $key ][ 'class' ] = $existing_class . ' ' . $the_type  . ' ' . 'effect-' . $element->settings[ 'animation_type_img_effects' ];
            $attributes[ $key ][ 'data-kinekt' ] = $json_encoded; 
            break;
    }

}