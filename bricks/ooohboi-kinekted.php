<?php

/**
 * Extend Bricks Elements
 *
 * @since      1.0.0
 * @package    Ooohboi_Kinekt
 * @subpackage Ooohboi_Kinekt/includes
 * @author     OoohBoi <oooh.boi29@gmail.com>
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
if ( class_exists( 'OoohBoi_Kinekted' ) ) return; // Bail if class exists

class OoohBoi_Kinekted {

    public static $element_animation;

    public static function init() {

        $layout_elements = [
            'section',
			'container', 
			'block', 
			'div', 
        ];

        $text_elements = [
			'heading',
			'text-basic', 
			'text',
        ];

        $image_elements = [
            'image', 
        ];

		$all_elements = [
            // layout
            'section',
			'container', 
			'block', 
			'div', 

			// Basic
            'heading',
			'text-basic', 
			'text', 
			'text-link', 
			'button',
			'icon',
			'image',
			'video',

			// General
			'nav-nested', 
			'icon-box',
			'social-icons',
			'list',
			'accordion',
			'tabs',
			'form',
			'map',
			'counter',
			'pie-chart',
			'team-members',
			'testimonials',
			'html',
			'code',
			'template',
			'logo',

			// Media
			'image-gallery',
			'carousel',
			'slider',
			'slider-nested', 
			'svg',

			// Single
			'post-title',
			'post-excerpt',
			'post-meta',
			'post-content',
			'post-comments',
		];

        // assign common groups & controls
        foreach ( $all_elements as $layout_element) {

            add_filter( "bricks/elements/$layout_element/control_groups", array( __CLASS__, 'kinekt_control_group' ) ); 
            add_filter( "bricks/elements/$layout_element/controls", array( __CLASS__, 'kinekt_controls_fade_from_to' ) ); 

        }

        foreach ( $text_elements as $layout_element) {

            add_filter( "bricks/elements/$layout_element/controls", array( __CLASS__, 'kinekt_controls_text_effects' ) ); 

        }
        
        foreach ( $image_elements as $layout_element) {

            add_filter( "bricks/elements/$layout_element/controls", array( __CLASS__, 'kinekt_controls_image_effects' ) ); 

        }

        foreach ( $layout_elements as $layout_element) {

            add_filter( "bricks/elements/$layout_element/controls", array( __CLASS__, 'kinekt_controls_layout_effects' ) ); 

        }

        // set attributes
        add_filter( 'bricks/element/render_attributes', array( __CLASS__, 'render_attributes' ), 99, 3 ); 

    }

	/**
	 * Add control group
	 *
	 * @since 1.0
	 */
    public static function kinekt_control_group( $control_groups ) {

        $control_groups[ 'ooohboi_kinekt_controls' ] = [
            'tab'   => 'content', 
            'title' => 'ANIMATIONS',
        ];

        return $control_groups;
        
    }

    /**
	 * Add controls
	 *
	 * @since 1.0
	 */
    public static function kinekt_controls_fade_from_to( $controls ) {

        // common settings/options for all animation types: Animation activation only
        require plugin_dir_path( dirname( __FILE__ ) ) . 'bricks/ooohboi-kinekt-controls-common-before.php';

        $controls[ 'animation_type' ] = [
            'group'    => 'ooohboi_kinekt_controls', 
            'tab'      => 'content', 
            'label'    => esc_html__( 'Animation type', 'ooohboi-kinekt' ), 
            'type'     => 'select', 
            'options'  => [
                'kinekt-fade-from-to' => esc_html__( 'From - To', 'ooohboi-kinekt' ), 
            ],
            'rerender' => true, 
            'required' => [ 'animation_activate', '=', true ], 
        ];

        // kind of a placeholder ... we'll set it up postponed
        $controls[ 'animate_children' ] = [
            'group'    => 'ooohboi_kinekt_controls', 
            'tab' => 'content', 
        ];

        // animation specific controls!
        require plugin_dir_path( dirname( __FILE__ ) ) . 'bricks/ooohboi-kinekt-controls-common.php';

        // common settings/options for all animation types: Trigger, Duration, Delay, Easing, Repeat, Markers
        require plugin_dir_path( dirname( __FILE__ ) ) . 'bricks/ooohboi-kinekt-controls-common-after.php';

        return $controls;
        
    }
    /**
	 * "Patch" controls per specific group
	 *
	 * @since 1.0
	 */
    public static function kinekt_controls_text_effects( $controls ) {

        $controls[ 'animation_type' ][ 'options' ][ 'kinekt-text-effect' ] = esc_html__( 'Text effects', 'ooohboi-kinekt' );

        return $controls;

    }
    public static function kinekt_controls_image_effects( $controls ) {

        // error_log( print_r( $controls[ 'animation_type' ][ 'options' ], true ) );
        $controls[ 'animation_type' ][ 'options' ][ 'kinekt-image-effects' ] = esc_html__( 'Image effects', 'ooohboi-kinekt' );

        return $controls;

    }
    public static function kinekt_controls_layout_effects( $controls ) {

        // inject...
        $controls[ 'animate_children' ][ 'label' ] = esc_html__( 'Animate children?', 'ooohboi-kinekt' );
        $controls[ 'animate_children' ][ 'description' ] = esc_html__( 'This will apply the animation to all child elements instead', 'ooohboi-kinekt' );
        $controls[ 'animate_children' ][ 'type' ] = 'checkbox';
        $controls[ 'animate_children' ][ 'inline' ] = 'checkbox';
        $controls[ 'animate_children' ][ 'small' ] = 'checkbox';
        $controls[ 'animate_children' ][ 'required' ] = [ 'animation_activate', '=', true ];

        return $controls;

    }

    /**
	 * Set element root attributes
	 *
	 * @since 1.4
	 */
    public static function render_attributes( $attributes, $key, $element ) {

        if ( bricks_is_frontend() ) {

            if ( isset( $element->settings[ 'animation_activate' ] ) && $element->settings[ 'animation_activate' ] == true ) {

                require plugin_dir_path( dirname( __FILE__ ) ) . 'bricks/ooohboi-kinekt-attributes.php';

            }

        }

        return $attributes;

    }

    /**
	 * Default SELECT Animation easing
	 *
	 * @since 1.4
	 */
    public static function get_animation_type_easing() {

        $animation_type_easing = [
            'ease.in' => esc_html__( 'Ease In', 'ooohboi-kinekt' ), 
            'ease.out' => esc_html__( 'Ease Out', 'ooohboi-kinekt' ), 
            'ease.inOut' => esc_html__( 'Ease in.Out', 'ooohboi-kinekt' ), 
            'power4.in' => esc_html__( 'Power In', 'ooohboi-kinekt' ), 
            'power4.out' => esc_html__( 'Power Out', 'ooohboi-kinekt' ),
            'power4.inOut' => esc_html__( 'Power InOut', 'ooohboi-kinekt' ),
            'circ.in' => esc_html__( 'Circ In', 'ooohboi-kinekt' ),
            'circ.out' => esc_html__( 'Circ Out', 'ooohboi-kinekt' ),
            'circ.inOut' => esc_html__( 'Circ InOut', 'ooohboi-kinekt' ),
            'expo.in' => esc_html__( 'Expo In', 'ooohboi-kinekt' ),
            'expo.out' => esc_html__( 'Expo Out', 'ooohboi-kinekt' ),
            'expo.inOut' => esc_html__( 'Expo InOut', 'ooohboi-kinekt' ),
            'sine.in' => esc_html__( 'Sine In', 'ooohboi-kinekt' ),
            'sine.out' => esc_html__( 'Sine Out', 'ooohboi-kinekt' ),
            'sine.inOut' => esc_html__( 'Sine InOut', 'ooohboi-kinekt' ), 
            'elastic.in' => esc_html__( 'Elastic In', 'ooohboi-kinekt' ),
            'elastic.out' => esc_html__( 'Elastic Out', 'ooohboi-kinekt' ),
            'elastic.inOut' => esc_html__( 'Elastic InOut', 'ooohboi-kinekt' ),
            'bounce.in' => esc_html__( 'Bounce In', 'ooohboi-kinekt' ),
            'bounce.out' => esc_html__( 'Bounce Out', 'ooohboi-kinekt' ),
            'bounce.inOut' => esc_html__( 'Bounce InOut', 'ooohboi-kinekt' ),
            'back.in' => esc_html__( 'Back In', 'ooohboi-kinekt' ),
            'back.out' => esc_html__( 'Back Out', 'ooohboi-kinekt' ),
            'back.inOut' => esc_html__( 'Back InOut', 'ooohboi-kinekt' ),
        ];

        return $animation_type_easing;

    }

    /**
	 * Default SELECT Animation props
	 *
	 * @since 1.4
	 */
    public static function get_animation_properties() {

        $animation_properties = [
            'opacity' => esc_html__( 'Opacity', 'ooohboi-kinekt' ), 
            'x'  => esc_html__( 'X position', 'ooohboi-kinekt' ), 
            'y'  => esc_html__( 'Y position', 'ooohboi-kinekt' ), 
            'scaleX'  => esc_html__( 'scaleX', 'ooohboi-kinekt' ), 
            'scaleY'  => esc_html__( 'scaleY', 'ooohboi-kinekt' ), 
            'skewX'  => esc_html__( 'skewX', 'ooohboi-kinekt' ), 
            'skewY'  => esc_html__( 'skewY', 'ooohboi-kinekt' ),  
            'rotation'  => esc_html__( 'Rotation', 'ooohboi-kinekt' ), 
            'backgroundColor' => esc_html__( 'Background Color', 'ooohboi-kinekt' ), 
            'color' => esc_html__( 'Color (text)', 'ooohboi-kinekt' ), 
        ];

        return $animation_properties;

    }

    /**
	 * Default SELECT Toggle actions
	 *
	 * @since 1.4
	 */
    public static function get_toggle_actions() {

        $toggle_actions = [
            'play'  => esc_html__( 'Play', 'ooohboi-dawg' ), 
            'pause' => esc_html__( 'Pause', 'ooohboi-dawg' ), 
            'resume' => esc_html__( 'Resume', 'ooohboi-dawg' ), 
            'reverse' => esc_html__( 'Reverse', 'ooohboi-dawg' ), 
            'restart' => esc_html__( 'Restart', 'ooohboi-dawg' ), 
            'reset' => esc_html__( 'Reset', 'ooohboi-dawg' ), 
            'complete' => esc_html__( 'Complete', 'ooohboi-dawg' ), 
            'none' => esc_html__( 'None', 'ooohboi-dawg' ), 
        ];

        return $toggle_actions;

    }

}