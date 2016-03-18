<?php
/**
 * Created by IntelliJ IDEA.
 * User: oscar
 * Date: 18.03.16
 * Time: 11:10
 */
class social_Widget extends WP_Widget {

    public function __construct() {

        parent::__construct(
            'social_widget', __( 'CROA Réseaux sociaux', 'latomate' ),
            array(
                'classname'   => 'social_widget',
                'description' => __( 'Register les réseaux sociaux.', 'latomate' )
            )
        );

        load_plugin_textdomain( 'latomate', false, basename( dirname( __FILE__ ) ) . '/languages' );

    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {

        extract( $args );

        $facebook    = $instance['facebook'];
        $twitter     = $instance['twitter'];
        $linkedin    = $instance['linkedin'];
        $google      = $instance['google'];
/*
        <a href="#"><i class="fa fa-facebook"></i></a>
					<a href="#"><i class="fa fa-twitter"></i></a>
					<a href="#"><i class="fa fa-linkedin"></i></a>
					<a href="#"><i class="fa fa-github"></i></a>
  */
        echo "<div class='footer-icons'>";
            if($facebook){
                echo "<a href='$facebook' target=\"_blank\"><i class='fa fa-facebook'></i></a>";
            }

            if($twitter){
                echo "<a href='$twitter' target=\"_blank\"><i class='fa fa-twitter'></i></a>";
            }

            if($linkedin){
                echo "<a href='$linkedin' target=\"_blank\"><i class='fa fa-linkedin'></i></a>";
            }

            if($google){
                echo "<a href='$google' target=\"_blank\"><i class='fa fa-google-plus'></i></a>";
            }
        echo "</div>";

    }


    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {

        $instance = $old_instance;

        $instance['facebook'] = strip_tags( $new_instance['facebook'] );
        $instance['twitter'] = strip_tags( $new_instance['twitter'] );
        $instance['linkedin'] = strip_tags( $new_instance['linkedin'] );
        $instance['google'] = strip_tags( $new_instance['google'] );

        return $instance;

    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {

        $facebook    = @esc_attr( $instance['facebook'] );
        $twitter     = @esc_attr( $instance['twitter'] );
        $linkedin    = @esc_attr( $instance['linkedin'] );
        $google      = @esc_attr( $instance['google'] );

        ?>

        <p>
            <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" name="<?php echo $this->get_field_name('facebook'); ?>" type="text" value="<?php echo $facebook; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" name="<?php echo $this->get_field_name('twitter'); ?>" type="text" value="<?php echo $twitter; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Linkedin'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" name="<?php echo $this->get_field_name('linkedin'); ?>" type="text" value="<?php echo $linkedin; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('google'); ?>"><?php _e('Google+'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('google'); ?>" name="<?php echo $this->get_field_name('google'); ?>" type="text" value="<?php echo $google; ?>" />
        </p>

        <?php
    }

}
