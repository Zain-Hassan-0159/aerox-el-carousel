
<?php

if(!defined('ABSPATH')){
    exit;
}

/**
 *  Reviews
 *
 * @Carousal            Reviews
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

class Aerox_Reviews_Carousel extends \Elementor\Widget_Base {

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
		return 'drvn-reviews-carousel';
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
		return esc_html__( 'Reviews', 'aerox-el-carousel' );
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
		return 'eicon-review';
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
		return [ 'Carousal', 'Reviews', 'custom', 'aerox' ];
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
				'label' => esc_html__( 'Reviews', 'aerox-el-carousel' ),
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
				'default' => -1,
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

		$this->add_control(
			'character_limits',
			[
				'label' => esc_html__( 'Content Characters', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'min' => 5,
				'step' => 1,
				'default' => 30,
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
			'slidesmargin',
			[
				'label' => esc_html__( 'Slides Margin', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel .slick-slide' => 'margin: 0 {{RIGHT}}{{UNIT}} 0 {{LEFT}}{{UNIT}};',
					'{{WRAPPER}} .right-to-left' => 'margin-bottom: calc({{TOP}}{{UNIT}} + {{TOP}}{{UNIT}})',

				],
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
				'default' => 5000,
				'frontend_available' => true,
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label' => esc_html__( 'Autoplay', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'true',
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


		$this->end_controls_section();


		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Content', 'aerox-el-carousel' ),
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
					'{{WRAPPER}} .aerox-el-carousel' => 'text-align: {{VALUE}};',

				],
			]
		);

		$this->add_control(
			'bg_color',
			[
				'label' => esc_html__( 'Bacground Color', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel .slick-slide' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'bg_color_hover',
			[
				'label' => esc_html__( 'Background Hover', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel .slick-slide:hover' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border_content',
				'selector' => '{{WRAPPER}} .aerox-el-carousel .slick-slide',
			]
		);

		$this->add_responsive_control(
			'border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px'],
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel .slick-slide'=> 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_heading',
			[
				'label' => esc_html__( 'Heading', 'aerox-el-carousel' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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
		$this->end_controls_section();


		$this->start_controls_section(
			'section_paragraph',
			[
				'label' => esc_html__( 'Descripiton', 'aerox-el-carousel' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'paragraph_color',
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
			'paragraph_color_hover',
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
				'name' => 'paragraph_typography',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_ACCENT,
				],
				'selector' => '{{WRAPPER}} .aerox-el-carousel p',
			]
		);


		$this->add_responsive_control(
			'marginparagraph',
			[
				'label' => esc_html__( 'Margin', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel p' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
	

		$this->end_controls_section();

		$this->start_controls_section(
			'section_author',
			[
				'label' => esc_html__( 'Author Text', 'aerox-el-carousel' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'author_color',
			[
				'label' => esc_html__( 'Text Color', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel h3' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'author_color_hover',
			[
				'label' => esc_html__( 'Text Color Hover', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '',
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel .slick-slide:hover h3' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'author_typography',
				'global' => [
					'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Typography::TYPOGRAPHY_ACCENT,
				],
				'selector' => '{{WRAPPER}} .aerox-el-carousel h3',
			]
		);


		$this->add_responsive_control(
			'marginauthor',
			[
				'label' => esc_html__( 'Margin', 'aerox-el-carousel' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors' => [
					'{{WRAPPER}} .aerox-el-carousel h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
		
	

		$this->end_controls_section();

	}

    public function limit_chars($string, $char_limit)
    {
        return substr($string, 0, $char_limit);
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

            .aerox-el-carousel h2{
                font-size: 18px;
                color: white;
                margin: 0;
                text-align: left;
            }

            .aerox-el-carousel p{
                font-size: 16px;
                color: white;
                margin: 0;
            }

			.aerox-el-carousel .slick-slide{
				padding: 20px;
                margin: 0 10px;
				overflow: hidden;
                background-color: black;
                border-radius: 8px;
			}


			.aerox-el-carousel.slick-slider .slick-track, .aerox-el-carousel.slick-slider .slick-list{
				-webkit-transform: translate3d(0, 0, 0);
				-moz-transform: translate3d(0, 0, 0);
				-ms-transform: translate3d(0, 0, 0);
				-o-transform: translate3d(0, 0, 0);
				transform: translate3d(0, 0, 0);
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

				/* Slider */
				.slick-slider
				{
					position: relative;

					display: block;
					box-sizing: border-box;

					-webkit-user-select: none;
					-moz-user-select: none;
						-ms-user-select: none;
							user-select: none;

					-webkit-touch-callout: none;
					-khtml-user-select: none;
					-ms-touch-action: pan-y;
						touch-action: pan-y;
					-webkit-tap-highlight-color: transparent;
				}

				.slick-list
				{
					position: relative;

					display: block;
					overflow: hidden;

					margin: 0;
					padding: 0;
				}
				.slick-list:focus
				{
					outline: none;
				}
				.slick-list.dragging
				{
					cursor: pointer;
					cursor: hand;
				}

				.slick-slider .slick-track,
				.slick-slider .slick-list
				{
					-webkit-transform: translate3d(0, 0, 0);
					-moz-transform: translate3d(0, 0, 0);
						-ms-transform: translate3d(0, 0, 0);
						-o-transform: translate3d(0, 0, 0);
							transform: translate3d(0, 0, 0);
				}

				.slick-track
				{
					position: relative;
					top: 0;
					left: 0;

					display: block;
					margin-left: auto;
					margin-right: auto;
				}
				.slick-track:before,
				.slick-track:after
				{
					display: table;

					content: '';
				}
				.slick-track:after
				{
					clear: both;
				}
				.slick-loading .slick-track
				{
					visibility: hidden;
				}

				.slick-slide
				{
					display: none;
					float: left;

					height: 100%;
					min-height: 1px;
				}
				[dir='rtl'] .slick-slide
				{
					float: right;
				}
				.right-to-left{
					margin-bottom: 20px;
				}
			.aerox-el-carousel .star-rating ul.star-rating{
				width: 100%;
				display: flex;
				color: #f0ad4e;
				font-size: 12px;
				list-style: none;
				margin: 0;
				padding: 0;
				gap: 3px;
			}

			/* .aerox-el-carousel .star-rating ul.star-rating{
				flex-direction: row-reverse;
    			justify-content: flex-end;			
			} */
			
			.aerox-el-carousel .star-rating ul.star-rating li{
				float: none;
			}

			.aerox-el-carousel div.field_type-star_rating_field ul.star-rating li:last-child{
				margin-right: 5px;
			}

			.rowOne{
				display: flex;
    			justify-content: space-between;
			}

			.left-to-right a{
				direction: initial;
			}
		</style>
		<div style="position: relative;">
			<div class="right-to-left aerox-el-carousel <?php echo $slick_id; ?>">
				<?php
					if( $the_query->have_posts() ) :
						while( $the_query->have_posts() ): $the_query->the_post();
                        $content = get_field( "google_review", get_the_ID() );
						?>
						<a href="<?php echo get_field( "link_naar_google_review", get_the_ID() );  ?>">
							<div class="rowOne">
								<h2><?php echo get_the_title(); ?></h2>
								<div class="star-rating">
									<?php echo get_field( "aantal_sterren_google_review", get_the_ID() );  ?>
								</div>
							</div>

                            <p><?php echo $this->limit_chars($content , $settings['character_limits']); ?></p>
							<h3><?php echo get_field( "author_of_review", get_the_ID() );  ?></h3>
						</a>
						<?php
						
					endwhile;
						wp_reset_postdata();  
					endif;
				?>
			</div>

            <div dir='rtl' class="left-to-right aerox-el-carousel <?php echo $slick_id; ?>">
				<?php
					$order = $settings['order'] === 'ASC' ? 'DESC' : 'ASC';
					$the_query = new WP_Query( 
						array( 
							'posts_per_page' => $settings['no_of_posts'], 
							'post_type' => $settings['post_type'],
							'orderby' => $settings['order_by'], 
							'order' => $order, 
						) 
					);
					if( $the_query->have_posts() ) :
						while( $the_query->have_posts() ): $the_query->the_post();
                        $content = get_field( "google_review", get_the_ID() );
						?>
						<a href="<?php echo get_field( "link_naar_google_review", get_the_ID() );  ?>">
							<div class="rowOne">
								<h2><?php echo get_the_title(); ?></h2>
								<div class="star-rating">
									<?php echo get_field( "aantal_sterren_google_review", get_the_ID() );  ?>
								</div>
							</div>
                            <p><?php echo $this->limit_chars($content , $settings['character_limits']); ?></p>
							<h3><?php echo get_field( "author_of_review", get_the_ID() );  ?></h3>

						</a>
						<?php
						
					endwhile;
						wp_reset_postdata();  
					endif;
				?>
			</div>
		</div>
		<script>
			jQuery(document).ready(function() {
				<?php 
					$pauseOnFocus =  $settings['autoplay'] === 'true' ?  $settings['pause_on_interaction'] : true;
					$pauseOnHover =  $settings['autoplay'] === 'true' ?  $settings['pause_on_hover'] : true;
				?> 
				
				jQuery('.right-to-left.<?php echo $slick_id; ?>').slick({
					infinite: true,
					slidesToShow: <?php echo $settings['slides_to_show']; ?>,
					slidesToScroll: 1,
					cssEase: 'linear',
					autoplay: <?php echo $settings['autoplay']; ?>,
					autoplaySpeed: 0,
					arrows: false,
					pauseOnFocus: <?php echo $pauseOnFocus; ?>,
					pauseOnHover: <?php echo $pauseOnHover; ?>,
					pauseOnDotsHover: false,	
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

                jQuery('.left-to-right.<?php echo $slick_id; ?>').slick({
					rtl: true,
					slidesToShow: <?php echo $settings['slides_to_show']; ?>,
					slidesToScroll: 1,
					cssEase: 'linear',
					autoplay: <?php echo $settings['autoplay']; ?>,
					autoplaySpeed: 0,
					arrows: false,
					pauseOnFocus: <?php echo $pauseOnFocus; ?>,
					pauseOnHover: <?php echo $pauseOnHover; ?>,
					pauseOnDotsHover: false,	
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

			});

		</script>
		<?php

	}


}