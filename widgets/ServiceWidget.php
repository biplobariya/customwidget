<?php

namespace FurnixarCore\Widgets;

use Elementor\Repeater;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Service Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class ServiceWidget extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'service-widget';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Service Widget', 'picchi' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-code';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'custom-elements' ];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'ser', 'picchi', 'widget', 'service' ];
	}

	/**
	 * Get custom help URL.
	 *
	 * Retrieve a URL where the user can get more information about the widget.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget help URL.
	 */
	public function get_custom_help_url() {
		return 'https://developers.elementor.com/docs/widgets/';
	}

	/**
	 * Register banner widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {


	
		//Feature Repeater List Start  
		$this->start_controls_section(
			'services_list',
			[
				'label' => esc_html__( 'Services List', 'picchi' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		// Service Column Select
		$this->add_control(
			'service_col_select',
			[
				'label' => esc_html__( 'Service Column', 'picchi' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'columnThree',
				'options' => [
					'columnFour' => esc_html__( '4 Col', 'picchi' ),
					'columnThree' => esc_html__( '3 Col', 'picchi' ),
					'columnTwo' => esc_html__( '2 Col', 'picchi' ),
				]
			]
		);
		
        $this->add_control(
			'services_lists',
			[
				'label' => esc_html__( 'Services List', 'picchi' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => [
                    // [
                    //     'name' => 'icon_fill_color',
                    //     'label' => esc_html__( 'Fill Color', 'picchi' ),
                    //     'type' => \Elementor\Controls_Manager::COLOR,
                    //     'selectors' => [
                    //         '{{WRAPPER}} .choose-icon-color-{{_id}} svg path' => 'fill: {{VALUE}}',
                    //     ],
                    // ],
					// [
                    //     'name' => 'icon_stroke_color',
                    //     'label' => esc_html__( 'Stroke Color', 'picchi' ),
                    //     'type' => \Elementor\Controls_Manager::COLOR,
                    //     'selectors' => [
                    //         '{{WRAPPER}} .choose-icon-color-{{_id}} svg path' => 'stroke: {{VALUE}}',//.choose-icon-color-{{_id}}
                    //     ],
                    // ],
					[
                        'name' => 'service_item_icon',
                        'label' => esc_html__( 'Service Icon', 'picchi' ),
                        'type' => \Elementor\Controls_Manager::ICONS,
                        'default' => [
                            'value' => 'fas fa-chair',
                            'library' => 'fa-solid',
                        ],
                    ],
                    [
                        'name' => 'service_item_title',
                        'label' => esc_html__( 'Service Title', 'picchi' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'This is service title', 'picchi' ),
                        'placeholder' => esc_html__( 'Type your title here', 'picchi' ),
                    ],
                    [
                        'name' => 'service_item_desc',
                        'label' => esc_html__( 'Service Description', 'picchi' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__( 'Explain your service here', 'picchi' ),
                        'placeholder' => esc_html__( 'Type your text here', 'picchi' ),
                    ]
				],
				// 'default' => [
				// 	[
				// 		'partners_logo' => 'fas fa-circle',
				// 		'partners_link' => '#',
				// 	],
				// ],
			]
		);

        $this->end_controls_section();

		//Service Repeater List End


		//#Service Item Style Tab Start
		$this->start_controls_section(
			'services_style',
			[
				'label' => esc_html__( 'Service Item', 'picchi' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		//Icon size control
		$this->add_control(
			'service_item_icon',
			[
				'label' => esc_html__( 'Icon Size', 'picchi' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
					'%' => [
						'min' => 0,
						'max' => 100,
					],
				],
				'default' => [
					'unit' => '%',
					'size' => 50,
				],
				'selectors' => [
					'{{WRAPPER}} .feature-box .about-feature-icon' => 'max-width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'icon_fill_color',
			[
				'label' => esc_html__( 'Fill Color', 'picchi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-feature-icon svg path' => 'fill: {{VALUE}}',
				],
			]
		);
		$this->add_control(
			'icon_stroke_color',
			[
				'label' => esc_html__( 'Stroke Color', 'picchi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-feature-icon svg path' => 'stroke: {{VALUE}}',
				],
			]
		);


		// Feature title style
		$this->add_control(
			'service_item_heading',
			[
				'label' => esc_html__( 'Service Item', 'picchi' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		// Title color control
		$this->add_control(
			'service_item_title_color',
			[
				'label' => esc_html__( 'Service Title Color', 'picchi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature-box h5' => 'color: {{VALUE}}',
				],
			]
		);
		// Title typography control
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'service_item_title_typography',
				'selector' => '{{WRAPPER}} .feature-box h5',
			]
		);


		// Feature Description color & typography control Heading
		$this->add_control(
			'service_item_desc',
			[
				'label' => esc_html__( 'Feature Description', 'picchi' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		// service Description color control
		$this->add_control(
			'service_desc_color',
			[
				'label' => esc_html__( 'Feature Description Color', 'picchi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature-box p' => 'color: {{VALUE}}',
				],
			]
		);

		// service Description typography control
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'feature_desc_typography',
				'selector' => '{{WRAPPER}} .feature-box p',
			]
		);



	$this->end_controls_section();
	//#Style Tab End





	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$service_column = $settings['service_col_select'];

		if($service_column == 'columnThree'){
			$service_column_class = 'grid-cols-3';
		}elseif(($service_column == 'columnFour')){
			$service_column_class = 'grid-cols-4';
		}else{
			$service_column_class = 'grid-cols-2';
		}


?>

	<div class="grid <?php echo $service_column_class; ?> gap-5">

		<?php 
			if ( $settings['services_lists'] ) {
				foreach (  $settings['services_lists'] as $singleservice ) {
		?>
		<div class="single-service">
			<div class="about-feature-icon">

				<?php \Elementor\Icons_Manager::render_icon( $singleservice['service_item_icon'], [ 'aria-hidden' => 'true' ] ); ?>
			</div>
			<h4><?php echo $singleservice['service_item_title']?></h4>
			<p><?php echo $singleservice['service_item_desc']?></p>

		</div>

		<?php
				}
			}
		?>

	</div>


<?php
	}

}

?>