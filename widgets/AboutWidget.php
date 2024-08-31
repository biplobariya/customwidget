<?php

namespace FurnixarCore\Widgets;

use Elementor\Repeater;
use Elementor\Widget_Base;


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor About Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class AboutWidget extends \Elementor\Widget_Base {

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
		return 'about';
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
		return esc_html__( 'About', 'picchi' );
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
		return [ 'about', 'picchi', ];
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
				'label' => esc_html__( 'About Text', 'picchi' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        // about title control start
        $this->add_control(
			'about_title',
			[
				'label' => esc_html__( 'About Title', 'picchi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => __('write title here', 'picchi')
			]
		);
        // description control start
        $this->add_control(
			'about_desc',
			[
				'label' => esc_html__( 'Description', 'picchi' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
                'placeholder' => __('write description here', 'picchi')
			]
		);
		// about image control start
		$this->add_control(
			'about_image',
			[
				'label' => esc_html__( 'About Image', 'picchi' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'label_block' => true,
				'separator'	=> 'before',
				'placeholder' => __('write title here', 'picchi')
			]
		);

        // about button one text
        $this->add_control(
			'about_btn_text',
			[
				'label' => esc_html__( 'Button Text', 'picchi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
				'separator'	=> 'before',
                'placeholder' => __('Button text here', 'picchi')
			]
		);
        // about button one url
        $this->add_control(
			'about_btn_url)',
			[
				'label' => esc_html__( 'Button URL', 'picchi' ),
				'type' => \Elementor\Controls_Manager::URL,
				'label_block' => true,
                'placeholder' => __('URL here', 'picchi'),
				'default' => [
					'url' => '',
				],
			]
		);

        // about repeater option for about feature
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'about_feature_icon',
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



		$repeater->add_control(

			'about_feature_title',
			[
				'label' => esc_html__( 'Feature Title', 'picchi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'label_block' => true,
			]
		);
		$repeater->add_control(
			'about_feature_desc',
			[
				'label' => esc_html__( 'Features Description', 'picchi' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'label_block' => true,
			]
		);
        // about button one text
        $repeater->add_control(
			'feature_btn_text',
			[
				'label' => esc_html__( 'Button Text', 'picchi' ),
				'type' => \Elementor\Controls_Manager::TEXT,
                'label_block' => true,
				'separator'	=> 'before',
                'placeholder' => __('Button text here', 'picchi')
			]
		);
        // about button one url
        $repeater->add_control(
			'feature_btn_url)',
			[
				'label' => esc_html__( 'Button URL', 'picchi' ),
				'type' => \Elementor\Controls_Manager::URL,
				'label_block' => true,
                'placeholder' => __('URL here', 'picchi'),
				'default' => [
					'url' => '',
				],
			]
		);

		$this->add_control(
			'about_features_list',
			[
				'label' => esc_html__( 'Feature List', 'picchi' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'separator' => 'before',
				'title_field' => '{{{ about_feature_title }}}',
			]
		);



        $this->end_controls_section();
        // about section end


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

		$about_title = $settings['about_title'];
		$about_desc = $settings['about_desc'];
		$about_image = $settings['about_image']['url'];
		$about_btn_text = $settings['about_btn_text'];
		$about_btn_url = !empty($settings['about_btn_url']['url']) ? $settings['about_btn_url']['url'] : '';


	?>

	<div class="grid grid-cols-2 gap-4">
		<div class="col-6">
			<div class="about-text">
				<h4><?php echo $about_title; ?></h4>
				<?php echo $about_desc; ?>
				<a href="<?php echo $about_btn_url; ?>" class="box-btn"><?php echo $about_btn_text; ?></a>
			</div>
		</div>
		<div class="col-6">
			<div class="about-img">
				<img src="<?php echo $about_image; ?>" alt="" />
			</div>
		</div>
	</div>

	<div class="grid grid-cols-3 gap-4 pt-20">

		<?php 
			if ( $settings['about_features_list'] ) {
				foreach (  $settings['about_features_list'] as $item ) {
		?>

		<div class="col-xl-4">
			<div class="single-about">
				<div class="about-feature-icon">
					<?php \Elementor\Icons_Manager::render_icon( $item['about_feature_icon'], [ 'aria-hidden' => 'true' ] ); ?>
				</div>
				<h4><?php echo $item['about_feature_title'];?></h4>
				<p><?php echo $item['about_feature_desc'];?></p>
				<a href="#"><?php echo $item['feature_btn_text'];?></a>
			</div>
		</div>
		<?php 
				}
			}
		?>

	</div>


	<?php

	}

}