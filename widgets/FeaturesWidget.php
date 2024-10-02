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
		
		/****************************/
        // Feature Layout Select
		$this->add_control(
			'feature_select',
			[
				'label' => esc_html__( 'Features Style', 'picchi' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'feature-layout-1',
				'options' => [
					'feature-layout-1' => esc_html__( 'Feature Style 1', 'picchi' ),
					'feature-layout-2' => esc_html__( 'Feature Style 2', 'picchi' ),
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



		//Feature Repeater List Start  
		$this->start_controls_section(
			'feature_list',
			[
				'label' => esc_html__( 'Feature List', 'picchi' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		
        $this->add_control(
			'features_lists',
			[
				'label' => esc_html__( 'Features List', 'picchi' ),
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
                        'name' => 'feature_item_icon',
                        'label' => esc_html__( 'Feature Icon', 'picchi' ),
                        'type' => \Elementor\Controls_Manager::ICONS,
                        'default' => [
                            'value' => 'fas fa-chair',
                            'library' => 'fa-solid',
                        ],
                    ],
                    [
                        'name' => 'feature_item_title',
                        'label' => esc_html__( 'Feature Title', 'picchi' ),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => esc_html__( 'This is feature title', 'picchi' ),
                        'placeholder' => esc_html__( 'Type your title here', 'picchi' ),
                    ],
                    [
                        'name' => 'feature_item_desc',
                        'label' => esc_html__( 'Features Description', 'picchi' ),
                        'type' => \Elementor\Controls_Manager::TEXTAREA,
                        'default' => esc_html__( 'Explain your feature here', 'picchi' ),
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

		//Feature Repeater List End

		//#Style Tab Start
		$this->start_controls_section(
			'feature_style',
			[
				'label' => esc_html__( 'Feature Style', 'picchi' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);
		// Feature Background color control heading
		$this->add_control(
			'feature_sec_color',
			[
				'label' => esc_html__( 'Feature Section BG', 'picchi' ),
				'type' => \Elementor\Controls_Manager::HEADING,
			]
		);
		// Feature BG color control
		$this->add_control(
			'feature_bg',
			[
				'label' => esc_html__( 'Section Background', 'picchi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#faf9f8',
				'selectors' => [
					'{{WRAPPER}} .features ' => 'background-color: {{VALUE}}',
				],
			]
		);

		// SubTitle Heading
		$this->add_control(
			'feature_subtitle_heading',
			[
				'label' => esc_html__( 'Subtitle', 'picchi' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// SubTitle color control
		$this->add_control(
			'feature_sub_title_color',
			[
				'label' => esc_html__( 'Sub Title Color', 'picchi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .single-feature h6' => 'color: {{VALUE}}',
				],
			]
		);
		// subTitle typography control
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'feature_subtitle_typography',
				'selector' => '{{WRAPPER}} .single-feature h6',
			]
		);

		// Title Heading
		$this->add_control(
			'feature_title_heading',
			[
				'label' => esc_html__( 'Title', 'picchi' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);

		// Title color control
		$this->add_control(
			'feature_sec_title_color',
			[
				'label' => esc_html__( 'Feature Section Title Color', 'picchi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#000000',
				'selectors' => [
					'{{WRAPPER}} .single-feature h4' => 'color: {{VALUE}}',
				],
			]
		);
		// Title typography control
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'feature_title_typography',
				'selector' => '{{WRAPPER}} .single-feature h4',
			]
		);

		// Section Border Heading
		$this->add_control(
			'feature_title_border',
			[
				'label' => esc_html__( 'Border BG', 'picchi' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);
		// Feature BG color control
		$this->add_control(
			'feature_border_bg',
			[
				'label' => esc_html__( 'Border Background', 'picchi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ff6347',
				'selectors' => [
					'{{WRAPPER}} .single-feature h4:before ' => 'background-color: {{VALUE}}',
				],
			]
		);

		// Feature sec Image Overlay Heading
		$this->add_control(
			'feature_img_overlay_heading',
			[
				'label' => esc_html__( 'Image Overlay', 'picchi' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before'
			]
		);
		// Feature sec Image Overlay Color
		$this->add_control(
			'feature_img_overlay_bg',
			[
				'label' => esc_html__( 'Overlay Color', 'picchi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#33333386',
				'selectors' => [
					'{{WRAPPER}} .fea-s-1::after, .fea-s-2::after' => 'background-color: {{VALUE}}',
				],
			]
		);
		//Image Overlay color opacity
		$this->add_control(
			'img_color_opacity',
			[
				'label' => esc_html__( 'Opacity', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
				],
				'default' => [
					'size' => 0.8,
				],
				'selectors' => [
					'{{WRAPPER}} .fea-s-1::after, .fea-s-2::after' => 'opacity: {{SIZE}};',
				],
			]
		);


		$this->end_controls_section();
		//#Style Tab End

		//#About featue Style Tab Start
		$this->start_controls_section(
			'features_style',
			[
				'label' => esc_html__( 'Features Item', 'picchi' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		//Icon size control
		$this->add_control(
			'feature_item_icon',
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
			'feature_item_heading',
			[
				'label' => esc_html__( 'Feature Item', 'picchi' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		// Title color control
		$this->add_control(
			'feature_item_title_color',
			[
				'label' => esc_html__( 'Feature Title Color', 'picchi' ),
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
				'name' => 'feature_item_title_typography',
				'selector' => '{{WRAPPER}} .feature-box h5',
			]
		);


		// Feature Description color & typography control Heading
		$this->add_control(
			'feature_item_desc',
			[
				'label' => esc_html__( 'Feature Description', 'picchi' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);
		// Feature Description color control
		$this->add_control(
			'feature_desc_color',
			[
				'label' => esc_html__( 'Feature Description Color', 'picchi' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .feature-box p' => 'color: {{VALUE}}',
				],
			]
		);

		// Feature Description typography control
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

		if ( $settings['features_lists'] ) {
			include( "feature-layout/$settings[feature_select].php" );
		}

	}

}

?>