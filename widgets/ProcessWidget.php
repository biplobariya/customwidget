<?php

namespace FurnixarCore\Widgets;

use Elementor\Repeater;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Process Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class ProcessWidget extends \Elementor\Widget_Base {

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
		return 'process-widget';
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
		return esc_html__( 'Process', 'picchi' );
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
		return [ 'process', 'picchi', 'pro', 'section' ];
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


        // #Content Tab Start
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Process', 'picchi' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        
        // Process Title Control start
        $this->add_control(
			'process_title',
			[
				'label' => esc_html__( 'Process Title', 'picchi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __('write title here', 'picchi')
			]
		);
        // Process Number Control start
        $this->add_control(
			'process_number',
			[
				'label' => esc_html__( 'Number', 'picchi' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
                'label_block' => true,
                'placeholder' => __('write number here', 'picchi')
			]
		);
        // Process description control start
        $this->add_control(
			'process_desc',
			[
				'label' => esc_html__( 'Description', 'picchi' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __('write description here', 'picchi')
			]
		);
		// Alignment control
		$this->add_control(
			'text_align',
			[
				'label' => esc_html__( 'Alignment', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'textdomain' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'textdomain' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'textdomain' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'toggle' => true,
				'selectors' => [
					'{{WRAPPER}} .section-title' => 'text-align: {{VALUE}};',
				],
			]
		);

        $this->end_controls_section();
        // Section title section end

		        //#Style Tab Start
				$this->start_controls_section(
					'style_section',
					[
						'label' => esc_html__( 'Style', 'picchi' ),
						'tab' => \Elementor\Controls_Manager::TAB_STYLE,
					]
				);
				// Title color control
				$this->add_control(
					'pro_title',
					[
						'label' => esc_html__( 'Title', 'picchi' ),
						'type' => \Elementor\Controls_Manager::HEADING,
					]
				);
				// Title color control
				$this->add_control(
					'pro_tile_color',
					[
						'label' => esc_html__( 'Title', 'picchi' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .section-title h4' => 'color: {{VALUE}}',
						],
					]
				);
				// Title typography control
				$this->add_group_control(
					\Elementor\Group_Control_Typography::get_type(),
					[
						'name' => 'pro_title_typography',
						'selector' => '{{WRAPPER}} .section-title h4',
					]
				);
				// Number control Heading
				$this->add_control(
					'pro_num_h',
					[
						'label' => esc_html__( 'Number', 'picchi' ),
						'type' => \Elementor\Controls_Manager::HEADING,
						'separator' => 'before',
					]
				);
				// Number color control
				$this->add_control(
					'pro_num_color',
					[
						'label' => esc_html__( 'Number Color', 'picchi' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .section-title h2' => 'color: {{VALUE}}',
						],
					]
				);
				// Number typography control
				$this->add_group_control(
					\Elementor\Group_Control_Typography::get_type(),
					[
						'name' => 'num_typography',
						'selector' => '{{WRAPPER}} .section-title h2',
					]
				);
		
		
				// Description color & typography control Heading
				$this->add_control(
					'pro_desc_heading',
					[
						'label' => esc_html__( 'Description', 'picchi' ),
						'type' => \Elementor\Controls_Manager::HEADING,
						'separator' => 'before',
					]
				);
				// Description color control
				$this->add_control(
					'pro_desc_color',
					[
						'label' => esc_html__( 'Description Color', 'picchi' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'selectors' => [
							'{{WRAPPER}} .section-title p' => 'color: {{VALUE}}',
						],
					]
				);

				// Description typography control
				$this->add_group_control(
					\Elementor\Group_Control_Typography::get_type(),
					[
						'name' => 'pro_desc_typography',
						'selector' => '{{WRAPPER}} .section-title p',
					]
				);

				// Border color control Heading
				$this->add_control(
					'border_color_title',
					[
						'label' => esc_html__( 'Border', 'picchi' ),
						'type' => \Elementor\Controls_Manager::HEADING,
						'separator' => 'before',
					]
				);
				// Border 1 color control
				$this->add_control(
					'border1_color',
					[
						'label' => esc_html__( 'Border 1 Color', 'picchi' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'default' => '#777',
						'selectors' => [
							'{{WRAPPER}} .section-title h2::before' => 'background-color: {{VALUE}}',
						],
					]
				);
				// Border 2 color control
				$this->add_control(
					'border2_color',
					[
						'label' => esc_html__( 'Border 2 Color', 'picchi' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'default' => '#e16038',
						'selectors' => [
							'{{WRAPPER}} .section-title h2::after' => 'background-color: {{VALUE}}',
						],
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

		$pro_title = $settings['process_title'];
		$pro_number = $settings['process_number'];
		$pro_desc = $settings['process_desc'];
		
	?>

	<div class="col-xl-3">
		<div class="single-process">
			<h6><?php echo $pro_title; ?> <span><?php echo $pro_number; ?></span></h6>
			<p><?php echo $pro_desc; ?></p>
		</div>
	</div>




	<?php

	}

}