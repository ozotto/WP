<?php
/**
 * Created by IntelliJ IDEA.
 * User: oscar
 * Date: 18.03.16
 * Time: 11:10
 */
class information_Widget extends WP_Widget {

    public function __construct() {

        parent::__construct(
            'information_widget', __( 'CROA Information', 'latomate' ),
            array(
                'classname'   => 'information_widget',
                'description' => __( 'Register information.', 'latomate' )
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

        $address    = $instance['address'];
        $place      = $instance['place'];
        $telephone  = $instance['telephone'];
        $email      = $instance['email'];

        if($address || $place){
            echo "<div>";
                echo "<i class='fa fa-map-marker'></i>";
                echo "<p>"; if($address){ echo "<span>$address</span>"; } echo "$place</p>";
            echo "</div>";
        }

        if($telephone){
            echo "<div>";
            echo "<i class='fa fa-phone'></i>";
            echo "<p> $telephone </p>";
            echo "</div>";
        }

        if($email){
            echo "<div>";
            echo "<i class='fa fa-envelope'></i>";
            echo "<p><a href='mailto:$email'> $email </a></p>";
            echo "</div>";
        }

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

        $instance['address'] = strip_tags( $new_instance['address'] );
        $instance['place'] = strip_tags( $new_instance['place'] );
        $instance['telephone'] = strip_tags( $new_instance['telephone'] );
        $instance['email'] = strip_tags( $new_instance['email'] );

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

        $address    = @esc_attr( $instance['address'] );
        $place      = @esc_attr( $instance['place'] );
        $telephone  = @esc_attr( $instance['telephone'] );
        $email      = @esc_attr( $instance['email'] );

        ?>

        <p>
            <label for="<?php echo $this->get_field_id('address'); ?>"><?php _e('Adresse'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" type="text" value="<?php echo $address; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('place'); ?>"><?php _e('Lieu'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('place'); ?>" name="<?php echo $this->get_field_name('place'); ?>" type="text" value="<?php echo $place; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('telephone'); ?>"><?php _e('Téléphone'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('telephone'); ?>" name="<?php echo $this->get_field_name('telephone'); ?>" type="text" value="<?php echo $telephone; ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" />
        </p>

        <?php
    }

}
