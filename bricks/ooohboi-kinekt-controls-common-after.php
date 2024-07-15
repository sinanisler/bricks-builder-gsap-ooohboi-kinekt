<?php

/**
 * Kinekt common Controls after
 *
 * @since      1.0.0
 * @package    Ooohboi_Kinekt
 * @subpackage Ooohboi_Kinekt/includes
 * @author     OoohBoi <oooh.boi29@gmail.com>
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* COMMON FOR ALL! --------------------------- */
/* Animation TRIGGER POINT */
$controls[ 'separator_trigger_point' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'type'  => 'separator',
    'label' => esc_html__( 'Animation triggers', 'ooohboi-dawg' ), 
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
    ], 
];
$controls[ 'info_trigger_point' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'type'  => 'info',
    'content' => esc_html__( 'When to trigger the animation? For instance: When the [TOP] of this element hits the [CENTER] of the Viewport ... with an offset of [10%].', 'ooohboi-dawg' ),
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
    ], 
];
$controls[ 'custom_start_end' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'Custom code?', 'ooohboi-kinekt' ), 
    'description' => esc_html__( 'Define your own Start and End animation code. NOTE: You can access the current element via the "object" instance!', 'ooohboi-kinekt' ),
    'type'     => 'checkbox',
    'inline'   => true,
    'small'    => true,
    'default'  => false, 
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
    ], 
];
$controls[ 'animation_type_custom_start' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'type'  => 'textarea',
    'label' => esc_html__( 'Start animation:', 'ooohboi-dawg' ),
    'description' => esc_html__( 'For instance, the following is an arrow function that returns a string: () => "top" + `+=${object.offsetHeight/2}` + " bottom". It says: whenever the element\'s top + the element\'s height devided by 2 hits the viewport\'s bottom.', 'ooohboi-dawg' ),
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
        [ 'custom_start_end', '=', true ], 
    ], 
];
$controls[ 'animation_type_custom_end' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'type'  => 'textarea',
    'label' => esc_html__( 'End animation:', 'ooohboi-dawg' ),
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
        [ 'custom_start_end', '=', true ], 
    ], 
];
$controls[ 'animation_type_start' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'Start animation when:', 'ooohboi-kinekt' ), 
    'type'     => 'select', 
    'options'  => [
        'top'  => esc_html__( 'Top of the element...', 'ooohboi-dawg' ), 
        'center' => esc_html__( 'Center of the element...', 'ooohboi-dawg' ), 
        'bottom' => esc_html__( 'Bottom of the element...', 'ooohboi-dawg' ), 
    ], 
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
        [ 'custom_start_end', '!=', true ], 
    ], 
];
$controls[ 'animation_type_meet' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( '...hits the:', 'ooohboi-kinekt' ), 
    'type'     => 'select', 
    'options'  => [
        'top'  => esc_html__( 'Top of the viewport', 'ooohboi-dawg' ), 
        'center' => esc_html__( 'Center of the viewport', 'ooohboi-dawg' ), 
        'bottom' => esc_html__( 'Bottom of the viewport', 'ooohboi-dawg' ), 
    ],
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
        [ 'custom_start_end', '!=', true ], 
    ], 
];
$controls[ 'animation_type_offset' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'Offset (start):', 'ooohboi-kinekt' ), 
    'type'     => 'number',
    'units'    => true, 
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
        [ 'custom_start_end', '!=', true ], 
    ], 
];
$controls[ 'animation_type_trigger' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'type'  => 'text',
    'label' => esc_html__( 'Start Trigger element: ', 'ooohboi-dawg' ),
    'description' => esc_html__( 'The target element ID. If provided, the animation points (both Start and End) shall refer to that element instead of the current one.', 'ooohboi-dawg' ),
    'placeholder' => '#element-ID', 
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
    ], 
];
$controls[ 'animation_type_end' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'End animation when:', 'ooohboi-kinekt' ), 
    'type'     => 'select', 
    'options'  => [
        'top'  => esc_html__( 'Top of the element...', 'ooohboi-dawg' ), 
        'center' => esc_html__( 'Center of the element...', 'ooohboi-dawg' ), 
        'bottom' => esc_html__( 'Bottom of the element...', 'ooohboi-dawg' ), 
    ], 
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
        [ 'custom_start_end', '!=', true ], 
    ], 
];
$controls[ 'animation_type_meet_end' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( '...hits the:', 'ooohboi-kinekt' ), 
    'type'     => 'select', 
    'options'  => [
        'top'  => esc_html__( 'Top of the viewport', 'ooohboi-dawg' ), 
        'center' => esc_html__( 'Center of the viewport', 'ooohboi-dawg' ), 
        'bottom' => esc_html__( 'Bottom of the viewport', 'ooohboi-dawg' ), 
    ],
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
        [ 'custom_start_end', '!=', true ], 
    ], 
];
$controls[ 'animation_type_offset_end' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'Offset (end):', 'ooohboi-kinekt' ), 
    'type'     => 'number',
    'units'    => true, 
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
        [ 'custom_start_end', '!=', true ], 
    ], 
];
$controls[ 'animation_type_end_trigger' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'type'  => 'text',
    'label' => esc_html__( 'End Trigger element: ', 'ooohboi-dawg' ),
    'description' => esc_html__( 'The target element ID. If provided, the animation point (the End) shall refer to that element instead of the current one.', 'ooohboi-dawg' ),
    'placeholder' => '#element-ID', 
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
    ], 
];
/* Toggle actions */
$controls[ 'separator_toggle_actions' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'type'  => 'separator',
    'label' => esc_html__( 'Toggle Actions', 'ooohboi-dawg' ),
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
    ], 
];
$controls[ 'info_toggle_actions' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'type'  => 'info', 
    'clearable' => true, 
    'content' => esc_html__( 'toggleActions give us fine-grained control over our animations when it comes to playing, pausing, restarting, etc.', 'ooohboi-dawg' ),
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
    ], 
];
$controls[ 'animation_toggle_actions_onenter' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'onEnter', 'ooohboi-kinekt' ), 
    'description' => esc_html__( 'This action refers to a moment when a designated element enters the viewport. It\'s the moment when the START trigger point in met. Most likely you will want to use "Play" here.', 'ooohboi-kinekt' ),
    'type'     => 'select', 
    'options'  => OoohBoi_Kinekted::get_toggle_actions(),
    'default' => 'play', 
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
    ], 
];
$controls[ 'animation_toggle_actions_onleave' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'onLeave', 'ooohboi-kinekt' ), 
    'description' => esc_html__( 'This action refers to a moment when a designated element leaves the viewport. It\'s the moment when the END trigger point in met.', 'ooohboi-kinekt' ),
    'type'     => 'select', 
    'options'  => OoohBoi_Kinekted::get_toggle_actions(),
    'default' => 'play', 
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
    ], 
];
$controls[ 'animation_toggle_actions_onenterback' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'onEnterBack', 'ooohboi-kinekt' ), 
    'description' => esc_html__( 'This action happens when the associated element re-enters the viewport from the top during backward scrolling.', 'ooohboi-kinekt' ),
    'type'     => 'select', 
    'options'  => OoohBoi_Kinekted::get_toggle_actions(),
    'default' => 'resume', 
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
    ], 
];
$controls[ 'animation_toggle_actions_onleaveback' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'onLeaveBack', 'ooohboi-kinekt' ), 
    'description' => esc_html__( 'This action happens when the associated element leaves the viewport during backward scrolling.', 'ooohboi-kinekt' ),
    'type'     => 'select', 
    'options'  => OoohBoi_Kinekted::get_toggle_actions(), 
    'default' => 'reverse', 
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '!=', '' ], 
    ], 
];
/* STAGGER */
$controls[ 'separator_stagger' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'type'  => 'separator',
    'label' => esc_html__( 'Stagger', 'ooohboi-dawg' ),
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '=', [ 'kinekt-text-effect', 'kinekt-fade-from-to' ] ], /* VISIBLE FOR "kinekt-text-effect" & "kinekt-fade-from-to" ONLY! */
    ], 
];
$controls[ 'info_stagger' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'type'  => 'info', 
    'clearable' => true, 
    'content' => esc_html__( 'A stagger is a technique used to space out the start times of multiple animations so that they don\'t all start at the same time. This will work with "Text Effects" and "From - To" animation types -- in case the "Animate children?" option is enabled.', 'ooohboi-dawg' ),
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '=', [ 'kinekt-text-effect', 'kinekt-fade-from-to' ] ], /* VISIBLE FOR "kinekt-text-effect" & "kinekt-fade-from-to" ONLY! */
    ], 
];
$controls[ 'animation_type_stagger' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'Stagger amount (in seconds)', 'ooohboi-kinekt' ),
    'type'     => 'number',
    'default'  => 0,
    'placeholder' => '0.1', 
    'required' => [
        [ 'animation_activate', '=', true ], 
        [ 'animation_type', '=', [ 'kinekt-text-effect', 'kinekt-fade-from-to' ] ], /* VISIBLE FOR "kinekt-text-effect" & "kinekt-fade-from-to" ONLY! */
    ], 
];
/* COMMON FOR ALL! ----------------------- END */