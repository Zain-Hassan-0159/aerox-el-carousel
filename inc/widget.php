
<?php

if(!defined('ABSPATH')){
    exit;
}

/**
 *  Aerox Carousel
 *
 * @Carousal            Aerox Carousel
 * @author            Zain Hassan
 *
 */
   


/**
 * Elementor List Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */

class Aerox_El_Carousel extends \Elementor\Widget_Base {

	public function get_script_depends() {
		return [ 'slick-js-min' ];
	}

	

	public function get_style_depends() {

		return [
			'slick-css',
		];

	}
	

	/**
	 * Get widget name.
	 *
	 * Retrieve company widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'aerox-carousel';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve company widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Aerox Carousel', 'aerox-el-carousel' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve company widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-wordpress';
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
		return 'https://developers.elementor.com/widgets/';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the company of categories the company widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return ['aerox-el-widgets'];
	}

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the company of keywords the company widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	public function get_keywords() {
		return [ 'Carousal', 'aerox carousel', 'custom', 'aerox' ];
	}


	/**
	 * Register company widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'section_image_carousel',
			[
				'label' => esc_html__( 'Aerox Carousel', 'aerox-el-carousel' ),
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'list_title',
			[
				'label' => esc_html__( 'Title', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'List Title' , 'aerox-el-carousel' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'list_content',
			[
				'label' => esc_html__( 'Content', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'List Content' , 'aerox-el-carousel' ),
				'show_label' => false,
			]
		);

		$repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_control(
			'list',
			[
				'label' => esc_html__( 'Steps List', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => esc_html__( 'Stap 1: Oriëntatie', 'aerox-el-carousel' ),
						'list_content' => esc_html__( 'In deze fase leren we u en uw wensen kennen. We analyseren uw persoonlijke stijl en bedrijfsbehoeften, zodat we een goed beeld krijgen van wat u zoekt in uw interieur.', 'aerox-el-carousel' ),
						'image' => [
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						],
					],
					[
						'list_title' => esc_html__( 'Stap 2: Vrijblijvend gesprek', 'aerox-el-carousel' ),
						'list_content' => esc_html__( 'Na de oriëntatie plannen we een vrijblijvende afspraak met u in om uw wensen en behoeften verder te bespreken. Tijdens deze afspraak zullen we dieper ingaan op de details.', 'aerox-el-carousel' ),
						'image' => [
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						],
					],
					[
						'list_title' => esc_html__( 'Stap 3: Ontwerp op maat', 'aerox-el-carousel' ),
						'list_content' => esc_html__( 'Onze professionele ontwerpers gaan aan de slag met het samenstellen van een uniek interieurontwerp dat perfect bij uw stijl en bedrijfsbehoeften past.', 'aerox-el-carousel' ),
						'image' => [
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						],
					],
					[
						'list_title' => esc_html__( 'Stap 4: Productie', 'aerox-el-carousel' ),
						'list_content' => esc_html__( 'Zodra het ontwerp is goedgekeurd, starten we met de productie. Ons team van experts zorgt voor de projectstoffering, interieurbouw, afbouw, maatwerk en montage.', 'aerox-el-carousel' ),
						'image' => [
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						],
					],
					[
						'list_title' => esc_html__( 'Stap 5: Productie', 'aerox-el-carousel' ),
						'list_content' => esc_html__( 'Zodra het ontwerp is goedgekeurd, starten we met de productie. Ons team van experts zorgt voor de projectstoffering, interieurbouw, afbouw, maatwerk en montage.', 'aerox-el-carousel' ),
						'image' => [
							'url' => \Elementor\Utils::get_placeholder_image_src(),
						],
					]
				],
				'title_field' => '{{{ list_title }}}',
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'section_additional_options',
			[
				'label' => esc_html__( 'Slider Options', 'aerox-el-carousel' ),
			]
		);

		$this->add_control(
			'slides_to_show',
			[
				'label' => esc_html__( 'Laptop Slides', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'step' => 1,
				'default' => 4,
			]
		);

		$this->add_control(
			'slides_to_show_tab',
			[
				'label' => esc_html__( 'Tab Slides', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'step' => 1,
				'default' => 2,
			]
		);

		$this->add_control(
			'slides_to_show_mobile',
			[
				'label' => esc_html__( 'Mobile Slides', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 1,
				'step' => 1,
				'default' => 1,
			]
		);

		$this->add_responsive_control(
			'slidespadding',
			[
				'label' => esc_html__( 'Slides Padding', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel .slick-slide' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);


		$this->add_control(
			'speed',
			[
				'label' => esc_html__( 'Speed', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 800,
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'false',
				'options' => [
					'true' => esc_html__( 'Yes', 'aerox-el-carousel' ),
					'false' => esc_html__( 'No', 'aerox-el-carousel' ),
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'pause_on_hover',
			[
				'label' => esc_html__( 'Pause on Hover', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'true',
				'options' => [
					'true' => esc_html__( 'Yes', 'aerox-el-carousel' ),
					'false' => esc_html__( 'No', 'aerox-el-carousel' ),
				],
				'condition' => [
					'autoplay' => 'true',
				],
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'pause_on_interaction',
			[
				'label' => esc_html__( 'Pause on Interaction', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'true',
				'options' => [
					'true' => esc_html__( 'Yes', 'aerox-el-carousel' ),
					'false' => esc_html__( 'No', 'aerox-el-carousel' ),
				],
				'condition' => [
					'autoplay' => 'true',
				],
				'frontend_available' => true,
			]
		);


		$this->add_control(
			'autoplay_speed',
			[
				'label' => esc_html__( 'Autoplay Speed', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 3000,
				'condition' => [
					'autoplay' => 'true',
				],
				'frontend_available' => true,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_navigation',
			[
				'label' => esc_html__( 'Navigation Next', 'aerox-el-carousel' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_style_arrows',
			[
				'label' => esc_html__( 'Arrows', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'arrow_positions',
			[
				'label' => esc_html__( 'Arrow Position From Top to Bottom', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel .slick-next' => 'top: {{SIZE}}%;',
				]
			]
		);

		$this->add_responsive_control(
			'arrow_positions_right',
			[
				'label' => esc_html__( 'Arrow Position From Right', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel .slick-next' => 'right: {{SIZE}}%;',
				]
			]
		);

		$this->add_responsive_control(
			'arrows_size',
			[
				'label' => esc_html__( 'Arrow Size', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 40,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel .slick-arrow.slick-next svg' => 'width: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'arrowsbg_size',
			[
				'label' => esc_html__( 'Arrow Background Size', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel .slick-arrow.slick-next' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->add_control(
			'arrows_color',
			[
				'label' => esc_html__( 'Arrow Color', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'blue',
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel .slick-arrow.slick-next svg path' => 'fill: {{VALUE}}; stroke: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'arrows_hovercolor',
			[
				'label' => esc_html__( 'Arrow Hover Color', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'black',
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel .slick-arrow.slick-next:hover svg path' => 'fill: {{VALUE}}; stroke: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' => esc_html__( 'Arrow Background Color', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'white',
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel .slick-arrow.slick-next' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'background_hovercolor',
			[
				'label' => esc_html__( 'Background Hover Color', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'white',
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel .slick-arrow.slick-next:hover' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_navigation_prev',
			[
				'label' => esc_html__( 'Navigation Previous', 'aerox-el-carousel' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'heading_style_arrows_prev',
			[
				'label' => esc_html__( 'Arrows', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_responsive_control(
			'arrow_positions_prev',
			[
				'label' => esc_html__( 'Arrow Position From Top to Bottom', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel .slick-prev' => 'top: {{SIZE}}%;',
				]
			]
		);

		$this->add_responsive_control(
			'arrow_positions_right_prev',
			[
				'label' => esc_html__( 'Arrow Position From Right', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel .slick-prev' => 'left: {{SIZE}}%;',
				]
			]
		);

		$this->add_responsive_control(
			'arrows_size_prev',
			[
				'label' => esc_html__( 'Arrow Size', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 40,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel .slick-arrow.slick-prev svg' => 'width: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->add_responsive_control(
			'arrowsbg_size_prev',
			[
				'label' => esc_html__( 'Arrow Background Size', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 100,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel .slick-arrow.slick-prev' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->add_control(
			'arrows_color_prev',
			[
				'label' => esc_html__( 'Arrow Color', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'blue',
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel .slick-arrow.slick-prev svg path' => 'fill: {{VALUE}}; stroke: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'arrows_hovercolor_prev',
			[
				'label' => esc_html__( 'Arrow Hover Color', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'black',
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel .slick-arrow.slick-prev:hover svg path' => 'fill: {{VALUE}}; stroke: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'background_color_prev',
			[
				'label' => esc_html__( 'Arrow Background Color', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'white',
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel .slick-arrow.slick-prev' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->add_control(
			'background_hovercolor_prev',
			[
				'label' => esc_html__( 'Background Hover Color', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'white',
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel .slick-arrow.slick-prev:hover' => 'background-color: {{VALUE}};'
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_image',
			[
				'label' => esc_html__( 'Image', 'aerox-el-carousel' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'image_height',
			[
				'label' => esc_html__( 'Image Height', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em', 'rem', 'custom' ],
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
						'step' => 5,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel .top img' => 'height: {{SIZE}}{{UNIT}};',
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'image_border',
				'selector' => '{{WRAPPER}} .aerox-el-carousel .top',
			]
		);

		$this->add_responsive_control(
			'image_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel .top, {{WRAPPER}} .aerox-el-carousel .top img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Title', 'aerox-el-carousel' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'text_align',
			[
				'label' => esc_html__( 'Alignment', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'aerox-el-carousel' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'aerox-el-carousel' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'aerox-el-carousel' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'aerox-el-carousel' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel h2' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_color',
			[
				'label' => esc_html__( 'Text Color', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel h2' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_color_hover',
			[
				'label' => esc_html__( 'Text Color Hover', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel .slick-slide:hover h2' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_ACCENT,
				],
				'selector' => '{{WRAPPER}} .aerox-el-carousel h2',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'caption_shadow',
				'selector' => '{{WRAPPER}} .aerox-el-carousel h2',
			]
		);

		$this->add_responsive_control(
			'margin',
			[
				'label' => esc_html__( 'Margin', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel h2' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
	
		$this->add_responsive_control(
			'padding',
			[
				'label' => esc_html__( 'Padding', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel h2' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_carousel',
			[
				'label' => esc_html__( 'Content', 'aerox-el-carousel' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'text_align_content_carousel',
			[
				'label' => esc_html__( 'Alignment', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'aerox-el-carousel' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'aerox-el-carousel' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'aerox-el-carousel' ),
						'icon' => 'eicon-text-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'aerox-el-carousel' ),
						'icon' => 'eicon-text-align-justify',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel p' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_color_content_carousel',
			[
				'label' => esc_html__( 'Text Color', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'text_color_hover_content_carousel',
			[
				'label' => esc_html__( 'Text Color Hover', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel .slick-slide:hover p' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography_content_carousel',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_ACCENT,
				],
				'selector' => '{{WRAPPER}} .aerox-el-carousel p',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Text_Shadow::get_type(),
			[
				'name' => 'caption_shadow_content_carousel',
				'selector' => '{{WRAPPER}} .aerox-el-carousel p',
			]
		);

		$this->add_responsive_control(
			'margin_content_carousel',
			[
				'label' => esc_html__( 'Margin', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
	
		$this->add_responsive_control(
			'padding_content_carousel',
			[
				'label' => esc_html__( 'Padding', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}


	/**
	 * Re24nder company widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$str_result = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
		$random = substr(str_shuffle($str_result), 0, 4);
		$slick_id = 'slick-' . $random;

        ?>
		<style>
			.aerox-el-carousel{
				margin: auto;
				overflow: hidden;
				position: relative;
			}
			<?php echo "#" . $slick_id; ?>  .slick-prev.d-none{
				display: none;
			}
			.aerox-el-carousel .slick-slide{
				padding: 0 20px;
				overflow: hidden;
			}

			.aerox-el-carousel .top img{
				object-fit: cover;
				width: 100%;
			}

			.aerox-el-carousel.slick-slider .slick-track, .aerox-el-carousel.slick-slider .slick-list{
				-webkit-transform: translate3d(0, 0, 0);
				24	-moz-transform: translate3d(0, 0, 0);
				-ms-transform: translate3d(0, 0, 0);
				-o-transform: translate3d(0, 0, 0);
				transform: translate3d(0, 0, 0);
			}

			.aerox-el-carousel .slick-next{
				position: absolute;
				top: 35%;
				right: 185px;
			}

			.aerox-el-carousel .slick-prev{
				position: absolute;
				top: 35%;
				left: 185px;
				z-index: 999;
			}

			.aerox-el-carousel .slick-arrow{
				background: white;
				border: none;
				outline: none;
				border-radius: 50%;
				width: 50px;
				height: 50px;
				padding: 0;
				display: flex;
				justify-content: center;
				align-items: center;
			}

			.aerox-el-carousel .slick-arrow svg{
				width: 15px;
    			height: 15px;

			}

			.aerox-el-carousel .slick-prev,
				.aerox-el-carousel .slick-next {
					transition: opacity 0.1s linear;
				}

				.aerox-el-carousel .slick-disabled {
				display: none !important;
				}

				.aerox-el-carousel .slick-slide.slick-active.first-item{
					margin-left: 0 !important;
				}

				.aerox-el-carousel .slick-slide.slick-active.last-item{
					margin-right: 0 !important;
				}

				<?php echo '.overlay_' . $slick_id; ?>.overlay_div{
					position: absolute;
					left: 0;
					top: 0;
					bottom: 0;
					width: 500px;
					z-index: 1000;
					background-color: white;
					transition: all 1s linear;
				}

		</style>
		<div style="position: relative;">
			<div id="<?php echo $slick_id; ?>" class="aerox-el-carousel aerox-el-carousel-before">
				<?php
					if( $settings['list'] ) :
						foreach (  $settings['list'] as $item ) :
							?>
						<?php $image = $item['image']['url']; ?>
						<div>
							<div class="top">
								<img width="400" height="400" src="<?php echo $image; ?>" alt="<?php echo $item['list_title'];  ?>">
							</div>
							<h2><?php echo $item['list_title'];  ?></h2>
							<p><?php echo $item['list_content'];  ?></p>
						</div>
						<?php
						
						endforeach;
					endif;
				?>
			</div>
			<div class="overlay_div overlay_<?php echo $slick_id; ?>"></div>
		</div>
		<script>
			jQuery(document).ready(function() {
				var carousel = jQuery('#<?php echo $slick_id; ?>');
				<?php 
					$pauseOnFocus =  $settings['autoplay'] === 'true' ?  $settings['pause_on_interaction'] : true;
					$pauseOnHover =  $settings['autoplay'] === 'true' ?  $settings['pause_on_hover'] : true;
					$autoplaySpeed =  $settings['autoplay'] === 'true' ?  $settings['autoplay_speed'] : 3000;
				?> 
				
				carousel.slick({
					slidesToShow: <?php echo $settings['slides_to_show']; ?>,
					centerMode: false,
					autoplay: <?php echo $settings['autoplay']; ?>,
					pauseOnFocus: <?php echo $pauseOnFocus; ?>,
					pauseOnHover: <?php echo $pauseOnHover; ?>,
					autoplaySpeed: <?php echo $autoplaySpeed; ?>,
					nextArrow: '<button type="button" class="slick-next"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg></button>',
					prevArrow: '<button type="button" class="slick-prev d-none"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg></button>',
					speed: <?php echo $settings['speed']; ?>,
					responsive: [
						{
						breakpoint: 770,
						settings: {
							slidesToShow: <?php echo $settings['slides_to_show_tab']; ?>
						}
						},
						{
						breakpoint: 480,
						settings: {
							slidesToShow: <?php echo $settings['slides_to_show_mobile']; ?>
						}
						}
					]
				});


				carousel.on('beforeChange', function(event, slick, currentSlide, nextSlide) {
					// Hide the arrows by reducing their opacity
					carousel.find('.slick-next, .slick-prev').css('opacity', '0');
					if(nextSlide == 0){
						jQuery('<?php echo "#" . $slick_id; ?>  .slick-prev').addClass('d-none');
						jQuery('.overlay_<?php echo $slick_id; ?>').addClass('overlay_div');
					}else{
						jQuery('.overlay_<?php echo $slick_id; ?>.overlay_div').removeClass('overlay_div');
						jQuery('<?php echo "#" . $slick_id; ?>  .slick-prev.d-none').removeClass('d-none');
					}
					
				});
				
				carousel.on('afterChange', function(event, slick, currentSlide) {
					// Show the arrows by restoring their opacity
					carousel.find('.slick-next, .slick-prev').css('opacity', '1');
					if(currentSlide == 0){
						set_slider_position()
					}
				});

				
				function handleScreenSize(carousel){
					var this_width = jQuery('.this_width').offset().left;
					jQuery('.overlay_<?php echo $slick_id; ?>.overlay_div').css('width', this_width + 'px');
				}

				
				handleScreenSize(); // Check the screen size when the page loads

				jQuery(window).on('resize', function() {
					handleScreenSize(); // Check the screen size when the window is resized
					set_slider_position()
				});

			});

			function set_slider_position(){
				var slider = document.querySelector('<?php echo "#" . $slick_id; ?>  .slick-track');
				if (slider) {
					setTimeout(function() {
						var currentSlick = document.querySelector('<?php echo "#" . $slick_id; ?>  .slick-current');
						var currStyle = window.getComputedStyle(currentSlick);
						var currPadding = currStyle.getPropertyValue('padding-left');
						var this_width = jQuery('.this_width').offset().left;
						var track_pos = jQuery('<?php echo "#" . $slick_id; ?>  .slick-current').offset().left;
						var final_width = track_pos - this_width + parseFloat(currPadding);
						var style = window.getComputedStyle(slider);
						var matrix = new WebKitCSSMatrix(style.transform);
						var currentX = matrix.m41;
						var newX = currentX - final_width;
						slider.style.transform = 'translate3d(' + newX + 'px, 0px, 0px)';
						
						observer.disconnect();
					}, 1000);  // Delay for 100 milliseconds
				}
			}


			var observer = new MutationObserver(function(mutations) {
				set_slider_position()
			});
			observer.observe(document.body, { childList: true, subtree: true });



		</script>
		<?php

	}


}