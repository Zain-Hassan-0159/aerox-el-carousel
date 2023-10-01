
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

	public function get_all_custom_post_type(){
		// this is all custom post types
		$args       = array(
			'public' => true,
		);
		$post_types = get_post_types( $args, 'objects' );
		$posts = array();
		foreach ($post_types as $post_type) {
			$posts[$post_type->name] = $post_type->labels->singular_name;
		}

		return $posts;
		// this is all custom post types
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

		$this->add_control(
			'post_type',
			[
				'label' => esc_html__( 'Post Type', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => $this->get_all_custom_post_type()
			]
		);

		$this->add_control(
			'no_of_posts',
			[
				'label' => esc_html__( 'No of Posts', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => -1,
				'step' => 1,
				'default' => 6,
			]
		);

		$this->add_control(
			'order_by',
			[
				'label' => esc_html__( 'Order By', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'title' => 'Title',
					'rand' => 'Random',
					'date' => 'Date',
				]
			]
		);

		$this->add_control(
			'order',
			[
				'label' => esc_html__( 'Order', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'ASC' => 'Ascending',
					'DESC' => 'Descending',
				]
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

	}


	/**
	 * Render company widget output on the frontend.
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



		$the_query = new WP_Query( 
			array( 
			  'posts_per_page' => $settings['no_of_posts'], 
			  'post_type' => $settings['post_type'],
			  'orderby' => $settings['order_by'], 
			  'order' => $settings['order'], 
			) 
		);

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
				-moz-transform: translate3d(0, 0, 0);
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
				transform: rotate(180deg);
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
					if( $the_query->have_posts() ) :
						while( $the_query->have_posts() ): $the_query->the_post();
						?>
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ); ?>
						<a href="<?php echo get_the_permalink(); ?>">
							<div class="top">
								<img width="400" height="400" src="<?php echo $image[0]; ?>" alt="<?php echo get_the_title();  ?>">
							</div>
							<h2><?php echo get_the_title();  ?></h2>
						</a>
						<?php
						
					endwhile;
						wp_reset_postdata();  
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
					nextArrow: '<button type="button" class="slick-next"><svg xmlns="http://www.w3.org/2000/svg" width="22.5" height="15.243" viewBox="0 0 22.5 15.243"><path id="Icon_ionic-ios-arrow-round-forward" data-name="Icon ionic-ios-arrow-round-forward" d="M21.9,11.533a1,1,0,0,0-.008,1.406l4.646,4.654H8.861a.993.993,0,0,0,0,1.987H26.536L21.89,24.233a1.006,1.006,0,0,0,.008,1.406.989.989,0,0,0,1.4-.008l6.3-6.342h0a1.116,1.116,0,0,0,.206-.313.948.948,0,0,0,.076-.382,1,1,0,0,0-.283-.7l-6.3-6.342A.973.973,0,0,0,21.9,11.533Z" transform="translate(-7.625 -11.002)" fill="blue" stroke="blue" stroke-width="0.5"></path></svg></button>',
					prevArrow: '<button type="button" class="slick-prev d-none"><svg xmlns="http://www.w3.org/2000/svg" width="22.5" height="15.243" viewBox="0 0 22.5 15.243"><path id="Icon_ionic-ios-arrow-round-forward" data-name="Icon ionic-ios-arrow-round-forward" d="M21.9,11.533a1,1,0,0,0-.008,1.406l4.646,4.654H8.861a.993.993,0,0,0,0,1.987H26.536L21.89,24.233a1.006,1.006,0,0,0,.008,1.406.989.989,0,0,0,1.4-.008l6.3-6.342h0a1.116,1.116,0,0,0,.206-.313.948.948,0,0,0,.076-.382,1,1,0,0,0-.283-.7l-6.3-6.342A.973.973,0,0,0,21.9,11.533Z" transform="translate(-7.625 -11.002)" fill="blue" stroke="blue" stroke-width="0.5"></path></svg></button>',
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
					}, 50);  // Delay for 100 milliseconds
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