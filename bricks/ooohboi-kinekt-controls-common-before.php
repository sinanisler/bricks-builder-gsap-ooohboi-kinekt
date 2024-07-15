<?php

/**
 * Kinekt common Controls before
 *
 * @since      1.0.0
 * @package    Ooohboi_Kinekt
 * @subpackage Ooohboi_Kinekt/includes
 * @author     OoohBoi <oooh.boi29@gmail.com>
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/* COMMON FOR ALL! --------------------------- */
$controls[ 'info_intro' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'type'  => 'info', 
    'clearable' => true, 
    'content' => '',
];
$controls[ 'animation_activate' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'label'    => esc_html__( 'Activate Kinekt?', 'ooohboi-kinekt' ), 
    'description' => esc_html__( 'This will enable Kinekt for the current element', 'ooohboi-kinekt' ),
    'type'     => 'checkbox',
    'inline'   => true,
    'small'    => true,
];
$controls[ 'separator_animation_types' ] = [
    'group'    => 'ooohboi_kinekt_controls', 
    'tab' => 'content', 
    'type'  => 'separator',
    'label' => esc_html__( 'Animation Keypoints', 'ooohboi-dawg' ),
    'required' => [ 'animation_activate', '=', true ],
];
/* COMMON FOR ALL! ----------------------- END */