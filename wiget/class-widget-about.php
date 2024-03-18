<?php
 
class Company_Widget extends WP_Widget {
 
    function __construct() {
 
        parent::__construct(
            'company-wiget',  // Base ID
            'Footer 1 colum',   // Name
        );  
    }
 
    public function widget( $args, $instance ) {
 
        echo $args['before_widget'];
 
        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        
        echo '<div class="textwidget">';

        echo esc_html__( $instance['text'], 'text_domain' );
        echo $instance['text-logo'];
        echo '</div>';
 
        echo $args['after_widget'];
 
    }
 
    public function form( $instance ) {
 
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'text_domain' );
        $text = ! empty( $instance['text'] ) ? $instance['text'] : esc_html__( '', 'text_domain' );
        $textlogo = ! empty( $instance['text-logo'] ) ? $instance['text-logo'] : esc_html__( '', 'text_domain' );
        $textcop = ! empty( $instance['text-cop'] ) ? $instance['text-cop'] : esc_html__( '', 'text_domain' );
        $fburl = ! empty( $instance['url-fb'] ) ? $instance['url-fb'] : esc_html__( '', 'text_domain' );
        $inst = ! empty( $instance['url-inst'] ) ? $instance['url-inst'] : esc_html__( '', 'text_domain' );
        ?>
        <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php echo esc_html__( 'Title:', 'text_domain' ); ?></label>
        <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>"><?php echo esc_html__( 'Text:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text' ) ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'text-logo' ) ); ?>"><?php echo esc_html__( 'Text:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text-logo' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text-logo' ) ); ?>" type="text" value="<?php echo esc_attr( $textlogo ); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'text-cop' ) ); ?>"><?php echo esc_html__( 'Text:', 'text_domain' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'text-cop' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'text-cop' ) ); ?>" type="text" cols="30" rows="10"><?php echo esc_attr( $textcop ); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'url-fb' ) ); ?>"><?php echo esc_html__( 'Text:', 'text_domain' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'url-fb' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'url-fb' ) ); ?>" type="text" cols="30" rows="10"><?php echo esc_attr( $fburl ); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'url-inst' ) ); ?>"><?php echo esc_html__( 'Text:', 'text_domain' ); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'url-inst' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'url-inst' ) ); ?>" type="text" cols="30" rows="10"><?php echo esc_attr( $inst ); ?></textarea>
        </p>
        <?php
 
    }
 
    public function update( $new_instance, $old_instance ) {
 
        $instance = array();
 
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['text'] = ( !empty( $new_instance['text'] ) ) ? $new_instance['text'] : '';
        $instance['text'] = ( !empty( $new_instance['textlogo'] ) ) ? $new_instance['textlogo'] : '';
        $instance['text'] = ( !empty( $new_instance['textcop'] ) ) ? $new_instance['textcop'] : '';
        $instance['text'] = ( !empty( $new_instance['url-fb'] ) ) ? $new_instance['url-fb'] : '';
        $instance['text'] = ( !empty( $new_instance['url-inst'] ) ) ? $new_instance['url-inst'] : '';
 
        return $instance;
    }
 
}
$my_widget = new Company_Widget();
?>