<?php
/**
 * Services widget
 * @package    Vanstone_Online
 * @subpackage vonline
 * @since      1.0.0
 */

class vonline_Services_Type_B extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'vonline_services_b_widget', 'description' => __( 'Show what services you are able to provide.', 'vonline') );
        parent::__construct(false, $name = __('vonline FP: Services type B', 'vonline'), $widget_ops);
		$this->alt_option_name = 'vonline_services_b_widget';		
    }
	
	function form($instance) {
		$title     		= isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    		= isset( $instance['number'] ) ? intval( $instance['number'] ) : -1;
		$category   	= isset( $instance['category'] ) ? esc_attr( $instance['category'] ) : '';
		$see_all   		= isset( $instance['see_all'] ) ? esc_url_raw( $instance['see_all'] ) : '';		
		$see_all_text  	= isset( $instance['see_all_text'] ) ? esc_html( $instance['see_all_text'] ) : '';
		$cols 			= isset( $instance['cols'] ) ? esc_attr( $instance['cols'] ) : '';
		$content_excerpt  	= isset( $instance['content_excerpt'] ) ? esc_attr( $instance['content_excerpt'] ) : '';			

	?>

	<p><?php esc_html_e('In order to display this widget, you must first add some services from your admin area.', 'vonline'); ?></p>
	<p>
	<label for="<?php echo $this->get_field_id('title'); ?>"><?php esc_html_e('Title', 'vonline'); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
	</p>
	<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php esc_html_e( 'Number of services to show (-1 shows all of them):', 'vonline' ); ?></label>
	<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
    <p><label for="<?php echo $this->get_field_id('see_all'); ?>"><?php esc_html_e('The URL for your button [In case you want a button below your services block]', 'vonline'); ?></label>
	<input class="widefat custom_media_url" id="<?php echo $this->get_field_id( 'see_all' ); ?>" name="<?php echo $this->get_field_name( 'see_all' ); ?>" type="text" value="<?php echo $see_all; ?>" size="3" /></p>	
    <p><label for="<?php echo $this->get_field_id('see_all_text'); ?>"><?php esc_html_e('The text for the button [Defaults to <em>See all our services</em> if left empty]', 'vonline'); ?></label>
	<input class="widefat custom_media_url" id="<?php echo $this->get_field_id( 'see_all_text' ); ?>" name="<?php echo $this->get_field_name( 'see_all_text' ); ?>" type="text" value="<?php echo $see_all_text; ?>" size="3" /></p>
	<p><label for="<?php echo $this->get_field_id( 'category' ); ?>"><?php esc_html_e( 'Enter the slug for your category or leave empty to show all services.', 'vonline' ); ?></label>
	<input class="widefat" id="<?php echo $this->get_field_id( 'category' ); ?>" name="<?php echo $this->get_field_name( 'category' ); ?>" type="text" value="<?php echo $category; ?>" size="3" /></p>
	<p>
	<label for="<?php echo $this->get_field_id('cols'); ?>"><?php esc_html_e( 'Number of columns:', 'vonline' ); ?></label>
	<select name="<?php echo $this->get_field_name('cols'); ?>" id="<?php echo $this->get_field_id('cols'); ?>">
	<?php
	$options = array('1', '2', '3');
	foreach ($options as $option) {
	echo '<option value="' . $option . '" id="' . $option . '"', $cols == $option ? ' selected="selected"' : '', '>', esc_attr($option), '</option>';
	}
	?>
	</select>
	</p>
	<p><label for="<?php echo $this->get_field_id('content_excerpt'); ?>"><?php esc_html_e('Content to display:', 'vonline'); ?></label>
        <select name="<?php echo $this->get_field_name('content_excerpt'); ?>" id="<?php echo $this->get_field_id('content_excerpt'); ?>">		
			<option value="fullcontent" <?php if ( 'fullcontent' == $content_excerpt ) echo 'selected="selected"'; ?>><?php echo __('Full content', 'vonline'); ?></option>
			<option value="excerpt" <?php if ( 'excerpt' == $content_excerpt ) echo 'selected="selected"'; ?>><?php echo __('Excerpt', 'vonline'); ?></option>
       	</select>
    </p>
	<?php
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] 			= strip_tags($new_instance['title']);
		$instance['number'] 		= strip_tags($new_instance['number']);
		$instance['see_all'] 		= esc_url_raw( $new_instance['see_all'] );	
		$instance['see_all_text'] 	= strip_tags($new_instance['see_all_text']);		
		$instance['category'] 		= strip_tags($new_instance['category']);
		$instance['cols'] 			= strip_tags($new_instance['cols']);
		$instance['content_excerpt'] = sanitize_text_field($new_instance['content_excerpt']);		
  
		return $instance;
	}
		
	function widget($args, $instance) {
		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		extract($args);

		$title 			= ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
		$title 			= apply_filters( 'widget_title', $title, $instance, $this->id_base );
		$see_all 		= isset( $instance['see_all'] ) ? esc_url($instance['see_all']) : '';
		$see_all_text 	= isset( $instance['see_all_text'] ) ? esc_html($instance['see_all_text']) : '';		
		$number 		= ( ! empty( $instance['number'] ) ) ? intval( $instance['number'] ) : -1;
		if ( ! $number )
			$number 	= -1;				
		$category 		= isset( $instance['category'] ) ? esc_attr($instance['category']) : '';
		$cols 			= isset( $instance['cols'] ) ? esc_attr($instance['cols']) : '';
		$content_excerpt = isset( $instance['content_excerpt'] ) ? esc_html($instance['content_excerpt']) : 'fullcontent';

		$services = new WP_Query( array(
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'post_type' 		  => 'services',
			'posts_per_page'	  => $number,
			'category_name'		  => $category			
		) );

		if ( $cols == '1' ) {
			$cols_no = '';
		} elseif ( $cols == '3' ) {
			$cols_no = 'col-md-4';
		} elseif ( $cols == '2' ) {
			$cols_no = 'col-md-6';
		}

		echo $args['before_widget'];

		if ($services->have_posts()) :
?>
			<?php if ( $title ) echo $before_title . $title . $after_title; ?>

				<div class="roll-icon-list">
					<?php while ( $services->have_posts() ) : $services->the_post(); ?>
						<?php $icon = get_post_meta( get_the_ID(), 'wpcf-service-icon', true ); ?>
						<?php $link = get_post_meta( get_the_ID(), 'wpcf-service-link', true ); ?>
						<div class="service clearfix <?php echo $cols_no; ?>">
							<div class="list-item clearfix">
								<?php if ( has_post_thumbnail() ) : ?>
									<div class="service-thumb">
										<?php if ($link) : ?>
											<?php echo '<a href="' . esc_url($link) . '">' . get_the_post_thumbnail(get_the_ID(), 'vonline-service-thumb') . '</a>'; ?>
										<?php else : ?>
											<?php the_post_thumbnail('vonline-service-thumb'); ?>
										<?php endif; ?>
									</div>
								<?php elseif ($icon) : ?>			
									<div class="icon">
										<?php if ($link) : ?>
											<?php echo '<a href="' . esc_url($link) . '"><i class="fa ' . esc_html($icon) . '"></i></a>'; ?>
										<?php else : ?>
											<?php echo '<i class="fa ' . esc_html($icon) . '"></i>'; ?>
										<?php endif; ?>
									</div>
								<?php endif; ?>
								<div class="content">
									<h3>
										<?php if ($link) : ?>
											<a href="<?php echo esc_url($link); ?>"><?php the_title(); ?></a>
										<?php else : ?>
											<?php the_title(); ?>
										<?php endif; ?>
									</h3>
									<?php if ( $content_excerpt == 'fullcontent' ) : ?>								
										<?php the_content(); ?>
									<?php else : ?>
										<?php the_excerpt(); ?>
									<?php endif; ?>
								</div><!--.info-->	
							</div>
						</div>
					<?php endwhile; ?>
				</div>	

				<?php if ($see_all != '') : ?>
					<a href="<?php echo esc_url($see_all); ?>" class="roll-button more-button">
						<?php if ($see_all_text) : ?>
							<?php echo $see_all_text; ?>
						<?php else : ?>
							<?php echo __('See all our services', 'vonline'); ?>
						<?php endif; ?>
					</a>
				<?php endif; ?>				
	<?php
		wp_reset_postdata();
		endif;
		echo $args['after_widget'];
	}
	
}