<?php

/**
 * Kinekt Controls Fade
 *
 * @since      1.0.0
 * @package    Ooohboi_Kinekt
 * @subpackage Ooohboi_Kinekt/includes
 * @author     OoohBoi <oooh.boi29@gmail.com>
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* Animation DURATION */
$controls[ 'animation_type_duration' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'Animation duration (in seconds)', 'ooohboi-kinekt' ), 
    'type'     => 'number',
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
    ], 
];
/* Animation DELAY */
$controls[ 'animation_type_delay' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'Animation delay (in seconds)', 'ooohboi-kinekt' ),
    'type'     => 'number',
    'default'  => 0, 
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
    ], 
];
/* Animation EASING */
$controls[ 'animation_type_easing' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'Animation easing', 'ooohboi-kinekt' ),
    'type'     => 'select', 
    'options'  => OoohBoi_Kinekted::get_animation_type_easing(),
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
    ],  
];
/* The Text Split Type */
$controls[ 'separator_txt_split_types' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'type'  => 'separator',
    'label' => esc_html__( 'Text Split Type', 'ooohboi-kinekt' ), 
    'description' => esc_html__( 'If you split to lines, you will be animating lines. If you split to words, you will animate the wrods.', 'ooohboi-kinekt' ),
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '=', 'kinekt-text-effect' ], /* VISIBLE FOR "kinekt-text-effect" ONLY! */
    ], 
];
$controls[ 'animation_type_text_split_type' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'Split text into:', 'ooohboi-kinekt' ), 
    'type'     => 'select', 
    'options'  => [
        'lines'  => esc_html__( 'Lines', 'ooohboi-kinekt' ), 
        'words' => esc_html__( 'Words', 'ooohboi-kinekt' ), 
    ],
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '=', 'kinekt-text-effect' ], /* VISIBLE FOR "kinekt-text-effect" ONLY! */
    ], 
];
$controls[ 'animation_type_text_split_overflow' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'Mask text lines?', 'ooohboi-kinekt' ), 
    'description' => esc_html__( 'This will set the text line to "overflow: hidden"', 'ooohboi-kinekt' ),
    'type'     => 'checkbox',
    'inline'   => true,
    'small'    => true,
    'default'  => true,
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type_text_split_type', '=', 'words' ], 
        [ 'animation_type', '=', 'kinekt-text-effect' ], /* VISIBLE FOR "kinekt-text-effect" ONLY! */
    ], 
];
/* Image Animation Effects --------------------------------------------------------------------------------- */
$controls[ 'separator_img_effects' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'type'  => 'separator',
    'label' => esc_html__( 'Image Effects', 'ooohboi-dawg' ),
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '=', 'kinekt-image-effects' ], /* VISIBLE FOR "kinekt-image-effects" ONLY! */
    ], 
];
$controls[ 'info_img_effects' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'type'  => 'info',
    'content' => esc_html__( 'BEWARE! Image effects require the "HTML tag" to be set on the target Image. Check if that\'s the case under the Image "Content" group. Either of the available HTML tags will work.', 'ooohboi-dawg' ),
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '=', 'kinekt-image-effects' ], 
    ], 
];
$controls[ 'animation_type_img_effects' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'Animation effect', 'ooohboi-kinekt' ),
    'type'     => 'select', 
    'options'  => [
        'reveal' => esc_html__( 'Reveal', 'ooohboi-kinekt' ), 
        'parallax' => esc_html__( 'Parallax', 'ooohboi-kinekt' ), 
    ],
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '=', 'kinekt-image-effects' ], /* VISIBLE FOR "kinekt-image-effects" ONLY! */
    ],  
];
$controls[ 'animation_type_img_effect_reveal' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'Reveal direction', 'ooohboi-kinekt' ),
    'type'     => 'select', 
    'options'  => [
        'reveal-from-left' => esc_html__( 'Reveal from left', 'ooohboi-kinekt' ), 
        'reveal-from-right' => esc_html__( 'Reveal from right', 'ooohboi-kinekt' ), 
        'reveal-from-top' => esc_html__( 'Reveal from top', 'ooohboi-kinekt' ), 
        'reveal-from-bottom' => esc_html__( 'Reveal from bottom', 'ooohboi-kinekt' ), 
    ],
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '=', 'kinekt-image-effects' ], /* VISIBLE FOR "kinekt-image-effects" ONLY! */
        [ 'animation_type_img_effects', '=', 'reveal' ], 
    ],  
];
$controls[ 'animation_type_img_effect_reveal_dir_offset' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'Direction offset', 'ooohboi-kinekt' ), 
    'description' => esc_html__( 'This will create an initial position. Only a positive number will have an effect!', 'ooohboi-kinekt' ),
    'type'     => 'number',
    'units'    => true, 
    'default'  => '0', 
    'placeholder'  => '0', 
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '=', 'kinekt-image-effects' ], /* VISIBLE FOR "kinekt-image-effects" ONLY! */
        [ 'animation_type_img_effects', '=', 'reveal' ], 
    ], 
];
$controls[ 'animation_type_img_effect_reveal_speed_offset' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'Speed offset', 'ooohboi-kinekt' ), 
    'description' => esc_html__( 'This will make the image reveal slower than the cover (in seconds, range 0.01 - 0.5).', 'ooohboi-kinekt' ),
    'type'     => 'number',
    'default'  => 0, 
    'placeholder'  => '0', 
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '=', 'kinekt-image-effects' ], /* VISIBLE FOR "kinekt-image-effects" ONLY! */
        [ 'animation_type_img_effects', '=', 'reveal' ], 
    ], 
];
$controls[ 'animation_type_img_effect_reveal_fadein' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'Fade in?', 'ooohboi-kinekt' ), 
    'description' => esc_html__( 'If the reveal effect should fade in', 'ooohboi-kinekt' ),
    'type'     => 'checkbox',
    'inline'   => true,
    'small'    => true,
    'default'  => false, 
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '=', 'kinekt-image-effects' ], 
        [ 'animation_type_img_effects', '!=', 'parallax' ], 
    ], 
];
$controls[ 'animation_type_img_effect_cover_color' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'Image cover color', 'ooohboi-kinekt' ), 
    'type'  => 'color',
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '=', 'kinekt-image-effects' ], /* VISIBLE FOR "kinekt-image-effects" ONLY! */
        [ 'animation_type_img_effects', '=', 'reveal' ], 
    ], 
    'css' => [
        [
            'selector' => '.kinekt-image-effects',
            'property' => 'background',
        ],
    ],
];
// parallax *********
$controls[ 'animation_type_img_effect_parallax_vol' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'Parallax volume', 'ooohboi-kinekt' ), 
    'description' => esc_html__( 'NO NEED FOR A UNIT! The more you add, the less you get.', 'ooohboi-kinekt' ),
    'type'     => 'number',
    'default'  => 20, 
    'placeholder'  => '20', 
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '=', 'kinekt-image-effects' ], /* VISIBLE FOR "kinekt-image-effects" ONLY! */
        [ 'animation_type_img_effects', '=', 'parallax' ], /* VISIBLE FOR "parallax" ONLY! */
    ], 
];
$controls[ 'animation_type_img_effect_parallax_dir' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'Direction', 'ooohboi-kinekt' ),
    'type'     => 'select', 
    'options'  => [
        'vertical' => esc_html__( 'Vertical', 'ooohboi-kinekt' ), 
        'horizontal' => esc_html__( 'Horizontal', 'ooohboi-kinekt' ), 
    ],
    'default'  => 'vertical', 
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '=', 'kinekt-image-effects' ], /* VISIBLE FOR "kinekt-image-effects" ONLY! */
        [ 'animation_type_img_effects', '=', 'parallax' ], /* VISIBLE FOR "parallax" ONLY! */
    ],  
];
$controls[ 'animation_type_img_effect_parallax_pan' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'Panning', 'ooohboi-kinekt' ),
    'type'     => 'select', 
    'default'  => 'negative', 
    'options'  => [
        'positive' => esc_html__( 'Positive', 'ooohboi-kinekt' ), 
        'negative' => esc_html__( 'Negative', 'ooohboi-kinekt' ), 
    ],
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '=', 'kinekt-image-effects' ], /* VISIBLE FOR "kinekt-image-effects" ONLY! */
        [ 'animation_type_img_effects', '=', 'parallax' ], /* VISIBLE FOR "parallax" ONLY! */
    ],  
];
/* ----------------------------------------------------------------------------- Image Animation Effects END */
/* Animatable properties */
$controls[ 'animation_properties_separator' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'type'  => 'separator',
    'label' => esc_html__( 'Animatable properties', 'ooohboi-kinekt' ),
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '=', [ 'kinekt-fade-from-to', 'kinekt-text-effect' ] ], 
    ], 
];
$controls[ 'animation_properties_info' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'type'  => 'info', 
    'clearable' => true, 
    'content' => '',
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '=', [ 'kinekt-fade-from-to', 'kinekt-text-effect' ] ], 
    ], 
];

$controls[ 'animation_properties' ] = [
    'group' => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'placeholder' => esc_html__( '"FROM - TO" point', 'ooohboi-kinekt' ),
    'type' => 'repeater', 
    'titleProperty' => 'property',
    'fields' => [
        'property'  => [
            'label' => esc_html__( 'Choose property to animate', 'ooohboi-kinekt' ), 
            'type'  => 'select', 
            'options'  => OoohBoi_Kinekted::get_animation_properties(), 
        ],
        'value_start' => [
            'label'    => esc_html__( 'Value - From', 'ooohboi-kinekt' ),
            'type'     => 'text',
            'inline' => false, 
            'default'  => 0,
            'required' => [
                [ 'property', '!=', [ 'backgroundColor', 'color' ] ], 
            ],
        ], 
        'value_end' => [
            'label'    => esc_html__( 'Value - To', 'ooohboi-kinekt' ),
            'type'     => 'text', 
            'inline' => false, 
            'default'  => 0,
            'required' => [
                [ 'property', '!=', [ 'backgroundColor', 'color' ] ], 
            ],
        ], 
        'value_start_color' => [
            'label'    => esc_html__( 'Value - From', 'ooohboi-kinekt' ),
            'type'     => 'color',
            'required' => [
                [ 'property', '=', [ 'backgroundColor', 'color' ] ], 
            ],
        ], 
        'value_end_color' => [
            'label'    => esc_html__( 'Value - To', 'ooohboi-kinekt' ),
            'type'     => 'color', 
            'required' => [
                [ 'property', '=', [ 'backgroundColor', 'color' ] ], 
            ],
        ], 
        'info_xy' => [
            'type'  => 'separator', 
            'label' => esc_html__( 'NOTE:', 'ooohboi-kinekt' ),
            'description' => esc_html__( 'Expressions accepted! You can access the current element via the "object" instance if you like. For example, if you enter the arrow function "() => `${object.offsetWidth}`" into the "Value - To", the object will move to right for the value of object\'s width.', 'ooohboi-kinekt' ),
            'required' => [
                [ 'property', '=', [ 'x', 'y' ] ], 
            ], 
        ], 
        'info_opacity' => [
            'type'  => 'separator', 
            'label' => esc_html__( 'NOTE:', 'ooohboi-kinekt' ),
            'description' => esc_html__( 'Opacity range is from 0 to 1. 0 = fully transparent, 1 = no transparency, 0.45 = transparency of 45%', 'ooohboi-kinekt' ),
            'required' => [
                [ 'property', '=', 'opacity' ], 
            ], 
        ], 
        'info_scale' => [
            'type'  => 'separator',
            'label' => esc_html__( 'NOTE:', 'ooohboi-kinekt' ),
            'description' => esc_html__( 'Value of: 1 = no scale (or 100%), 0.25 = scaled down to 25%, 1.85 = scaled up to 185%', 'ooohboi-kinekt' ),
            'required' => [
                [ 'property', '=', [ 'scaleX', 'scaleY' ] ], 
            ], 
        ], 
        'info_skew' => [
            'type'  => 'separator',
            'label' => esc_html__( 'NOTE:', 'ooohboi-kinekt' ),
            'description' => esc_html__( 'Can be positive or negative. CSS unit must exist at the end of the value, for instance: 10px, 0.5vw, 23%, 1em, 3rem, etc.', 'ooohboi-kinekt' ),
            'required' => [
                [ 'property', '=', [ 'skewX', 'skewY' ] ], 
            ], 
        ], 
        'info_rotation' => [
            'type'  => 'separator',
            'label' => esc_html__( 'NOTE:', 'ooohboi-kinekt' ),
            'description' => esc_html__( 'Can be positive or negative, in degrees! No CSS unit required!', 'ooohboi-kinekt' ),
            'required' => [
                [ 'property', '=', 'rotation' ], 
            ], 
        ], 
        'info_bg_color' => [
            'type'  => 'separator',
            'label' => esc_html__( 'NOTE:', 'ooohboi-kinekt' ),
            'description' => esc_html__( 'You may leave the "Value - From" empty if the background color has been defined elsewhere. Otherwise, it is strongly advised to define it here!', 'ooohboi-kinekt' ),
            'required' => [
                [ 'property', '=', 'backgroundColor' ], 
            ], 
        ], 



        
        'info_color' => [
            'type'  => 'separator',
            'label' => esc_html__( 'NOTE:', 'ooohboi-kinekt' ),
            'description' => esc_html__( 'You may leave the "Value - From" empty if the text color has been defined elsewhere. Otherwise, it is strongly advised to define it here!', 'ooohboi-kinekt' ),
            'required' => [
                [ 'property', '=', 'color' ], 
            ], 
        ],
        
        

/*         'default' => [
            [
                'property' => 'opacity',
                'value_start' => 0,
                'value_end' => 1,
            ],
        ], */
    ],
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '=', [ 'kinekt-fade-from-to', 'kinekt-text-effect' ] ], 
    ], 
];

/* Animation MARKERS */
$controls[ 'separator_markers' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'type'  => 'separator',
    'label' => esc_html__( 'Markers', 'ooohboi-kinekt' ),
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
    ], 
];
$controls[ 'info_markers' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'type'  => 'info', 
    'clearable' => true, 
    'content' => '',
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
    ], 
];
$controls[ 'animation_type_markers' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'Show markers?', 'ooohboi-kinekt' ), 
    'description' => esc_html__( 'These should help you with the trigger point', 'ooohboi-kinekt' ),
    'type'     => 'checkbox',
    'inline'   => true,
    'small'    => true,
    'default'  => false, 
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
    ], 
];
/* SCRUB */
$controls[ 'separator_scrub' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'type'  => 'separator',
    'label' => esc_html__( 'Scrubbing', 'ooohboi-kinekt' ),
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
    ], 
];
$controls[ 'info_scrub' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'type'  => 'info', 
    'clearable' => true, 
    'content' => '',
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
    ], 
];
$controls[ 'animation_type_use_scrub' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'Lock Animation to Scroll', 'ooohboi-kinekt' ), 
    'content' => ' ',
    'type'     => 'checkbox',
    'inline'   => true,
    'small'    => true,
    'default'  => false,
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
    ], 
];
$controls[ 'animation_type_scrub' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'Scrub amount', 'ooohboi-kinekt' ), 
    'content' => esc_html__( 'Value of 0.2 takes 0.2 second to "catch up" to the scrollbar', 'ooohboi-kinekt' ),
    'type'     => 'number',
    'default'  => 0,
    'placeholder' => '0', 
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type_use_scrub', '=', true ], 
        [ 'animation_type', '!=', '' ], 
    ], 
];
/* PIN */
$controls[ 'separator_pin' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'type'  => 'separator',
    'label' => esc_html__( 'Pinning', 'ooohboi-kinekt' ),
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
    ], 
];
$controls[ 'info_pin' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'type'  => 'info', 
    'clearable' => true, 
    'content' => '',
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
    ], 
];
$controls[ 'animation_type_pin' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'Pin Element? (Fixed)', 'ooohboi-kinekt' ), 
    'type'     => 'checkbox',
    'inline'   => true,
    'small'    => true,
    'default'  => false,
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
    ], 
];
$controls[ 'animation_type_pin_spacing' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'Pin spacing?', 'ooohboi-kinekt' ), 
    'description' => esc_html__( 'This will prevent a subsequent element(s) overflow.', 'ooohboi-kinekt' ),
    'type'     => 'checkbox',
    'inline'   => true,
    'small'    => true,
    'default'  => false,
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type_pin', '=', true ], 
        [ 'animation_type', '!=', '' ], 
    ], 
];
/* Transform origin */
$controls[ 'separator_transform_origin' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'type'  => 'separator',
    'label' => esc_html__( 'Transform Origin', 'ooohboi-kinekt' ),
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '=', [ 'kinekt-fade-from-to', 'kinekt-text-effect' ] ], 
    ], 
];
$controls[ 'info_transform_origin' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'type'  => 'info', 
    'clearable' => true, 
    'content' => '',
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '=', [ 'kinekt-fade-from-to', 'kinekt-text-effect' ] ], 
    ], 
];
$controls[ 'animation_type_rot_origin' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'Choose', 'ooohboi-kinekt' ), 
    'type'     => 'select', 
    'options'  => [
        'top left'  => esc_html__( 'Top Left', 'ooohboi-kinekt' ), 
        'top center' => esc_html__( 'Top Center', 'ooohboi-kinekt' ), 
        'top right' => esc_html__( 'Top Right', 'ooohboi-kinekt' ), 
        'center left' => esc_html__( 'Center Left', 'ooohboi-kinekt' ), 
        'center' => esc_html__( 'Center', 'ooohboi-kinekt' ), 
        'center right' => esc_html__( 'Center Right', 'ooohboi-kinekt' ), 
        'bottom left' => esc_html__( 'Bottom Left', 'ooohboi-kinekt' ), 
        'bottom center' => esc_html__( 'Bottom Center', 'ooohboi-kinekt' ), 
        'bottom right' => esc_html__( 'Bottom Right', 'ooohboi-kinekt' ), 
    ],
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '=', [ 'kinekt-fade-from-to', 'kinekt-text-effect' ] ],  
    ], 
];