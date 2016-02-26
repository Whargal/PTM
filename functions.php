<?php

/*-------------------------------*/
/*-----       STYLES        -----*/
/*-------------------------------*/

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );

}


/*-------------------------------*/
/*-----       BLURB         -----*/
/*-------------------------------*/

// Creating the widget 
class ptm_wd_video extends WP_Widget {

	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'ptm_wd_video', 

			// Widget name will appear in UI
			__('PTM video', 'ptm_widget_domain'), 

			// Widget description
			array( 'description' => __( 'PTM custom video widget', 'ptm_widget_domain' ), ) 
			);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		?>
		<div class="mj_wd_blurb">
			<div class="mj_wd_blurb_content">
				<?php
				if (!empty($instance['img'])){
					$url = 'https://'.$_SERVER['HTTP_HOST'].'/'.$instance['img']; ?>
					<img src="<?= $url ?>"> <?php
				}
				if (!empty($instance['text'])){
					?> <p><?= $instance['text'] ?></p> <?php
				}
				?>
			</div> <!-- End mj_wd_blurb_content -->
		</div> <!-- End mj_wd_blurb -->
		<?php
		echo $args['after_widget'];
	}

	// Widget Backend 
	public function form( $instance ) {
		(isset($instance['img'])) ? $img = $instance[ 'img' ] : $img = '';
		(isset($instance['text'])) ? $text = $instance[ 'text' ] : $text = '';
		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'img' ); ?>"><?php _e( 'Image :' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'img' ); ?>" name="<?php echo $this->get_field_name( 'img' ); ?>" type="text" value="<?php echo esc_attr( $img ); ?>" placeholder="URL"/>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Text:' ); ?></label> 
			<textarea class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" placeholder="Text"><?php echo esc_attr( $text ); ?></textarea>
		</p>
		<?php 
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['img'] = ( ! empty( $new_instance['img'] ) ) ? strip_tags( $new_instance['img'] ) : '';
		$instance['text'] = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';
		return $instance;
	}
} // Class ptm_wd_video ends here


function mj_widgets_init() {
	register_widget( 'ptm_wd_video' );
}
add_action( 'widgets_init', 'mj_widgets_init' );

?>