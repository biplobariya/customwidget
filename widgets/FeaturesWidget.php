<?php

namespace FurnixarCore\Widgets;

use Elementor\Repeater;
use Elementor\Widget_Base;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor Banner Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class FeaturesWidget extends \Elementor\Widget_Base {

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
		return 'features-widget';
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
		return esc_html__( 'Features Widget', 'picchi' );
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
		return [ 'feature', 'picchi', 'widget', 'section' ];
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


        // #Features Content Tab Section Start
		$this->start_controls_section(
			'feature_content_sec',
			[
				'label' => esc_html__( 'Features Content', 'picchi' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        // Feature Layout Select
		$this->add_control(
			'feature_select',
			[
				'label' => esc_html__( 'Features Style', 'picchi' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'features-1',
				'options' => [
					'features-1' => esc_html__( 'Feature Style 1', 'picchi' ),
					'features-2' => esc_html__( 'Feature Style 2', 'picchi' ),
				]
			]
		);

        
        // Feature Subtitle Control start
        $this->add_control(
			'feature_sub_title',
			[
				'label' => esc_html__( 'Subtitle', 'picchi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __('write subtitle here', 'picchi')
			]
		);

        // Feature Title Control start
        $this->add_control(
			'feature_title',
			[
				'label' => esc_html__( 'Title', 'picchi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __('write title here', 'picchi')
			]
		);

        // Feature Description control start
        $this->add_control(
			'feature_desc',
			[
				'label' => esc_html__( 'Description', 'picchi' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __('write description here', 'picchi')
			]
		);


		// Repeater option start for features list
		$repeater = new \Elementor\Repeater();

		// Features item icon
		$repeater->add_control(
			'feature_list_icon',
			[
				'label' => esc_html__( 'Icon', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-circle',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'circle',
						'dot-circle',
						'square-full',
					],
					'fa-regular' => [
						'circle',
						'dot-circle',
						'square-full',
					],
				],
			]
		);
		// Features item title
		$repeater->add_control(

			'feature_item_title',
			[
				'label' => esc_html__( 'Feature Title', 'picchi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		// Features item description
		$repeater->add_control(
			'feature_item_desc',
			[
				'label' => esc_html__( 'Features Description', 'picchi' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);

		// Repeater control end section
		$this->add_control(
			'features_lists',
			[
				'label' => esc_html__( 'Feature List', 'picchi' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'separator' => 'before',
				'title_field' => '{{{ feature_item_title }}}',
			]
		);

		// about image control start
		$this->add_control(
			'features_image',
			[
				'label' => esc_html__( 'Feature Image', 'picchi' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
				'separator'	=> 'before',
			]
		);




        $this->end_controls_section();
        // Features Content Tab Section End



		//#Style Tab Start
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'Style', 'picchi' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		// Subtitle color control
		$this->add_control(
			'sec_subtitle',
			[
				'label' => esc_html__( 'Subtitle', 'picchi' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);
		// Subtitle color control
		$this->add_control(
			'sec_subtitle_color',
			[
				'label' => esc_html__( 'Subtitle Color', 'picchi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title h4' => 'color: {{VALUE}}',
				],
			]
		);
		// Subtitle typography control
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'sec_subtitle_typography',
				'selector' => '{{WRAPPER}} .section-title h4',
			]
		);
		// Title color control Heading
		$this->add_control(
			'sec_title',
			[
				'label' => esc_html__( 'Title', 'picchi' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		// Title color control
		$this->add_control(
			'sec_title_color',
			[
				'label' => esc_html__( 'Title Color', 'picchi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title h2' => 'color: {{VALUE}}',
				],
			]
		);
		// Title typography control
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .section-title h2',
			]
		);


		// Description color & typography control Heading
		$this->add_control(
			'sec_desc',
			[
				'label' => esc_html__( 'Description', 'picchi' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		// Description color control
		$this->add_control(
			'sec_desc_color',
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
				'name' => 'sec_desc_typography',
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
		
	?>

	<div class="features features-1 grid grid-cols-2 gap-5">
		<div class="col-xl-6">
			<div class="single-feature text-center">
				<h6>Highly Creative Solutions</h6>
				<h4>we are digital</h4>
				<div class="grid grid-cols-2 gap-5">
					<div class="col-xl-6">
						<div class="feature-box">
							<i class="fa-solid fa-newspaper"></i>
							<h5>modern design</h5>
							<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latinin contaversy. </p>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="feature-box">
							<i class="fa-solid fa-newspaper"></i>
							<h5>mobile firendly</h5>
							<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latinin contaversy. </p>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="feature-box">
							<i class="fa-solid fa-newspaper"></i>
							<h5>error free</h5>
							<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latinin contaversy. </p>
						</div>
					</div>
					<div class="col-xl-6">
						<div class="feature-box">
							<i class="fa-solid fa-newspaper"></i>
							<h5>24/7 support</h5>
							<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latinin contaversy. </p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="feature-image">
			<img src="https://img.freepik.com/free-photo/man-isolated-showing-emotions-end-gestures_1303-30095.jpg?t=st=1725205283~exp=1725208883~hmac=3fb2b87a974532c4cda4aacae661d62be8ccf4471f46b6f8095a8137d62c351b&w=1380" alt="">
		</div>
	</div>


	<?php

	}

}