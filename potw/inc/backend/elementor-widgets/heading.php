<?php

namespace Elementor; // Custom widgets must be defined in the Elementor namespace

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly (security measure)



/**

 * Widget Name: Section Heading 

 */

class POTW_Heading extends Widget_Base{



 	// The get_name() method is a simple one, you just need to return a widget name that will be used in the code.

	public function get_name() {

		return 'iheading';

	}



	// The get_title() method, which again, is a very simple one, you need to return the widget title that will be displayed as the widget label.

	public function get_title() {

		return __( 'POTW Heading', 'potw' );

	}



	// The get_icon() method, is an optional but recommended method, it lets you set the widget icon. you can use any of the eicon or font-awesome icons, simply return the class name as a string.

	public function get_icon() {

		return 'eicon-heading';

	}



	// The get_categories method, lets you set the category of the widget, return the category name as a string.

	public function get_categories() {

		return [ 'category_potw' ];

	}



	public static function get_potw_heading_html_tag() {

		return [

			'h1'  => __( 'H1', 'potw' ),

			'h2'  => __( 'H2', 'potw' ),

			'h3'  => __( 'H3', 'potw' ),

			'h4'  => __( 'H4', 'potw' ),

			'h5'  => __( 'H5', 'potw' ),

			'h6'  => __( 'H6', 'potw' ),

			'div'  => __( 'div', 'potw' ),

			'span'  => __( 'span', 'potw' ),

			'p'  => __( 'p', 'potw' ),

		];

	}



	protected function _register_controls() {



		//Content Service box

		$this->start_controls_section(

			'content_section',

			[

				'label' => __( 'Content', 'potw' ),

			]

		);



		$this->add_control(

			'iheading_title',

			[

				'label' => __( 'Subtitle & Title', 'potw' ),

				'type' => Controls_Manager::HEADING,

			]

		);

		$this->add_control(

			'sub',

			[

				'label' => '',

				'type' => Controls_Manager::TEXT,

				'default' => __( 'OUR SERVICE', 'potw' ),

				'placeholder' => __( 'Enter your subtitle', 'potw' ),

				'label_block' => true,

				'show_label' => false,

			]

		);



		$this->add_control(

			'title',

			[

				'label' => '',

				'type' => Controls_Manager::TEXTAREA,

				'default' => __( 'What we do', 'potw' ),

				'placeholder' => __( 'Enter your title', 'potw' ),

				'show_label' => false,

				'label_block' => true,

			]

		);

		$this->add_control(

			'switch_stroke',

			[

				'label' => __( 'Use Text Stroke?', 'potw' ),

				'type' => Controls_Manager::SWITCHER,

				'label_on' => __( 'On', 'potw' ),

				'label_off' => __( 'Off', 'potw' ),

				'return_value' => 'yes',

				'default' => 'no',

			]

		);

		$this->add_control(

			'text_stroke',

			[

				'label' => __( 'Text Stroke', 'potw' ),

				'type' => Controls_Manager::TEXT,

				'default' => '',

				'placeholder' => __( 'Type your text here', 'potw' ),

				'condition' => [

					'switch_stroke' => 'yes',

				]

			]

		);

		$this->add_control(

			'title_link',

			[

				'label' => __( 'Link To Title', 'potw' ),

				'type' => Controls_Manager::URL,

				'placeholder' => __( 'https://', 'potw' ),

			]

		);

		$this->add_control(

			'title_html_tag',

			[

				'label' => __( 'Title HTML Tag', 'potw' ),

				'type' => Controls_Manager::SELECT,

				'default' => 'h2',

				'options' => self::get_potw_heading_html_tag(),

			]

		);

		$this->add_control(

			'subtitle_html_tag',

			[

				'label' => __( 'Subtitle HTML Tag', 'archi' ),

				'type' => Controls_Manager::SELECT,

				'default' => 'h6',

				'options' => self::get_potw_heading_html_tag(),

			]

		);



		$this->add_control(

			'light',

			[

				'label' => __( 'Text light', 'potw' ),

				'type' => Controls_Manager::SWITCHER,

				'label_on' => __( 'Yes', 'potw' ),

				'label_off' => __( 'No', 'potw' ),

				'return_value' => 'yes',

				'default' => '',

			]

		);



		$this->add_responsive_control(

			'text_align',

			[

				'label' => __( 'Alignment', 'potw' ),

				'type' => Controls_Manager::CHOOSE,

				'options' => [

					'left'    => [

						'title' => __( 'Left', 'potw' ),

						'icon' => 'eicon-text-align-left',

					],

					'center' => [

						'title' => __( 'Center', 'potw' ),

						'icon' => 'eicon-text-align-center',

					],

					'right' => [

						'title' => __( 'Right', 'potw' ),

						'icon' => 'eicon-text-align-right',

					]

				],

				// 'prefix_class' => 'potw%s-align-',

				'selectors' => [

					'{{WRAPPER}}' => 'text-align: {{VALUE}};',

				],

				'default' => 'left',

			]

		);



		$this->end_controls_section();



		//Style

		$this->start_controls_section(

			'style_section',

			[

				'label' => __( 'Heading', 'potw' ),

				'tab'   => Controls_Manager::TAB_STYLE,

			]

		);



		//Subtitle

		$this->add_control(

			'heading_stitle',

			[

				'label' => __( 'Subtitle', 'potw' ),

				'type' => Controls_Manager::HEADING,

				'separator' => 'before',

			]

		);

		$this->add_control(

			'stitle_color',

			[

				'label' => __( 'Color', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .ot-heading .sub-heading span' => 'color: {{VALUE}};',

					'{{WRAPPER}} .ot-heading .sub-heading:before, {{WRAPPER}} .ot-heading .sub-heading:after' => 'background: {{VALUE}};',

				]

			]

		);

		$this->add_group_control(

			Group_Control_Typography::get_type(),

			[

				'name' => 'stitle_typography',

				'selector' => '{{WRAPPER}} .ot-heading .sub-heading',

			]

		);

		$this->add_responsive_control(

			'stitle_bottom_space',

			[

				'label' => __( 'Spacing', 'potw' ),

				'type' => Controls_Manager::SLIDER,

				'range' => [

					'px' => [

						'min' => 0,

						'max' => 100,

					],

				],

				'selectors' => [

					'{{WRAPPER}} .ot-heading .sub-heading' => 'margin-bottom: {{SIZE}}{{UNIT}};',

				],

			]

		);



		//Title

		$this->add_control(

			'heading_title',

			[

				'label' => __( 'Title', 'potw' ),

				'type' => Controls_Manager::HEADING,

				'separator' => 'before',

			]

		);

		$this->add_control(

			'title_color',

			[

				'label' => __( 'Color', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .ot-heading .main-heading' => 'color: {{VALUE}};',

				]

			]

		);

		$this->add_group_control(

			Group_Control_Typography::get_type(),

			[

				'name' => 'title_typography',

				'selector' => '{{WRAPPER}} .ot-heading .main-heading',

			]

		);

		$this->add_responsive_control(

			'title_bottom_space',

			[

				'label' => __( 'Spacing', 'potw' ),

				'type' => Controls_Manager::SLIDER,

				'range' => [

					'px' => [

						'min' => 0,

						'max' => 100,

					],

				],

				'selectors' => [

					'{{WRAPPER}} .ot-heading .main-heading' => 'margin-bottom: {{SIZE}}{{UNIT}};',

				],

			]

		);



		$this->end_controls_section();



		$this->start_controls_section(

			'stroke_section',

			[

				'label' => __( 'Text Stroke', 'potw' ),

				'tab' => Controls_Manager::TAB_STYLE,

				'condition' => [

					'switch_stroke' => 'yes',

				]

			]

		);

		$this->add_control(

			'text_stroke_color',

			[

				'label' => __( 'Color', 'potw' ),

				'type' => Controls_Manager::COLOR,

				'default' => '',

				'selectors' => [

					'{{WRAPPER}} .ot-heading .heading__text_stroke' => 'color: {{VALUE}};',

					'{{WRAPPER}} .ot-heading .heading__text_stroke' => '-webkit-text-stroke-color: {{VALUE}};',

				]

			]

		);

		$this->add_responsive_control(

			'text_stroke_position',

			[

				'label' => __( 'Position', 'potw' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', '%', 'em' ],

				'selectors' => [

					'{{WRAPPER}} .heading__text_stroke' => 'top: {{TOP}}{{UNIT}};right: {{RIGHT}}{{UNIT}};bottom: {{BOTTOM}}{{UNIT}};left: {{LEFT}}{{UNIT}};',

				],

			]

		);

		$this->add_control(

			'margin',

			[

				'label' => __( 'Margin', 'potw' ),

				'type' => Controls_Manager::DIMENSIONS,

				'size_units' => [ 'px', '%', 'em' ],

				'selectors' => [

					'{{WRAPPER}} .heading__text_stroke' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',

				],

			]

		);

		$this->add_group_control(

			Group_Control_Typography::get_type(),

			[

				'name' => 'text_stroke_typography',

				'selector' => '{{WRAPPER}} .ot-heading .heading__text_stroke',

			]

		);

		$this->end_controls_section();



	}



	protected function render() {

		$settings = $this->get_settings_for_display();

		if ( ! empty( $settings['title_link']['url'] ) ) {

			$this->add_render_attribute( 'link', 'href', $settings['title_link']['url'] );



			if ( $settings['title_link']['is_external'] ) {

				$this->add_render_attribute( 'link', 'target', '_blank' );

			}



			if ( $settings['title_link']['nofollow'] ) {

				$this->add_render_attribute( 'link', 'rel', 'nofollow' );

			}

		}



		$css_classes = array();

		$css_classes[] = $settings['text_align'] . '-align'; 

		if( $settings['light'] === 'yes' ){ $css_classes[] = 'text-light'; }

		if ( $settings['switch_stroke'] === 'yes' ) { $css_classes[] = 'wrap__text_stroke'; }



		$titletag = $settings['title_html_tag'];

		$subtitletag = $settings['subtitle_html_tag'];

		?>

		<div class="ot-heading <?php echo implode( ' ', $css_classes ); ?>">

			

			<?php if ( $settings['switch_stroke'] === 'yes' && !empty( $settings['text_stroke'] ) ) { ?>

				<div class="heading__text_stroke"><?php echo $settings['text_stroke']; ?></div>

			<?php } ?>	



	        <?php if ( ! empty( $settings['sub'] ) ) { ?>

	            <<?php echo $subtitletag; ?> class="sub-heading"><span><?php echo $settings['sub']; ?></span></<?php echo $subtitletag; ?>>

	        <?php } ?> 



	        <?php if ( !empty( $settings['title'] ) ) { ?>

	        	<<?php echo $titletag; ?> class="main-heading"><?php if ( ! empty( $settings['title_link']['url'] ) ) { echo '<a ' .$this->get_render_attribute_string( 'link' ). '>' . $settings['title'] . '</a>'; } else {  echo $settings['title']; } ?></<?php echo $titletag; ?>>

	        <?php } ?>

	    </div>

	    <?php

	}



	

}

// After the Schedule class is defined, I must register the new widget class with Elementor:

Plugin::instance()->widgets_manager->register_widget_type( new POTW_Heading() );