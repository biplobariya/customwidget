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
class BannerWidget extends \Elementor\Widget_Base {

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
		return 'banner';
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
		return esc_html__( 'Banner', 'picchi' );
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
		return [ 'banner', 'picchi', 'link' ];
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
				'label' => esc_html__( 'Banner Text', 'picchi' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);



        
        // Subtitle Control start
        $this->add_control(
			'sub_title',
			[
				'label' => esc_html__( 'Subtitle', 'picchi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __('write subtitle here', 'picchi')
			]
		);
        // title Control start
        $this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'picchi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __('write title here', 'picchi')
			]
		);
        // description control start
        $this->add_control(
			'desc',
			[
				'label' => esc_html__( 'Description', 'picchi' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
                'label_block' => true,
                'placeholder' => __('write description here', 'picchi')
			]
		);
        $this->end_controls_section();
        // Title section end

        // Button section start
        $this->start_controls_section(
			'banner_btn_sec',
			[
				'label' => esc_html__( 'Banner Button', 'picchi' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
        // Banner button one text
        $this->add_control(
			'btn1_text',
			[
				'label' => esc_html__( 'Button Text 1', 'picchi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __('Button text here', 'picchi')
			]
		);
        // Banner button one url
        $this->add_control(
			'btn1_url)',
			[
				'label' => esc_html__( 'Button URL 1', 'picchi' ),
				'type' => \Elementor\Controls_Manager::URL,
				'label_block' => true,
                'placeholder' => __('URL here', 'picchi'),
				'default' => [
					'url' => '',
				],
			]
		);
        // Banner button two text
        $this->add_control(
			'btn2_text',
			[
				'label' => esc_html__( 'Button Text 2', 'picchi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
				'label_block' => true,
                'placeholder' => __('Button text here', 'picchi')
			]
		);
        // Banner button two url
        $this->add_control(
            'btn2_url)',
            [
                'label' => esc_html__( 'Button URL 2', 'picchi' ),
                'type' => \Elementor\Controls_Manager::URL,
				'label_block' => true,
                'separator' => 'before',
                'placeholder' => __('URL here', 'picchi'),
				'default' => [
					'url' => '',
				],
            ]
        );


        $this->end_controls_section();
        // Banner section end


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

		$sub_title = $settings['sub_title'];
		$title = $settings['title'];
		$desc = $settings['desc'];
		$btn1_text = $settings['btn1_text'];

		$btn1_url = !empty($settings['btn1_url']) ? $settings['btn1_url']['url'] : '';
		
		$btn2_text = $settings['btn2_text'];
		$btn2_url = !empty($settings['btn2_url']) ? $settings['btn2_url']['url'] : '';
	?>

	<div class="banner">
		<h4><?php echo $sub_title; ?></h4>
		<h1><?php echo $title; ?></h1>
		<p><?php echo $desc; ?></p>
		
		<a href="<?php echo $btn1_url; ?>" class="box-btn" >
			<?php echo $btn1_text; ?>
		</a>
		
		<a href="<?php echo $btn2_url; ?>" class="border-btn" >
			<?php echo $btn2_text; ?>
		</a>

	</div>


	<?php

	}

}