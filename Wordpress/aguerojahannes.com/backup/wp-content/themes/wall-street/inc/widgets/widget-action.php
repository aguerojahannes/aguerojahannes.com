<?php class ActionWidget extends WP_Widget
{
    function ActionWidget(){
		$widget_ops = array('description' => 'Display call to action button');
		$control_ops = array('width' => 300, 'height' => 300);
		parent::WP_Widget(false,$name='GPP Call to Action',$widget_ops,$control_ops);
    }

  /* Displays the Widget in the front-end */
    function widget($args, $instance){
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? 'Latest Tweets' : $instance['title']);
		$actionContent = empty($instance['actionContent']) ? '' : $instance['actionContent'];
		$actionLink = empty($instance['actionLink']) ? '' : $instance['actionLink'];
		$actionButton = empty($instance['actionButton']) ? '' : $instance['actionButton'];

		echo $before_widget;
		if ( $title )
		    echo $before_title . $title . $after_title;

?>
<div class="action-content">
	<div class="action-text">
		<p><?php echo $actionContent; ?></p>
	</div>
	<div class="action-button">
		<?php if ( isset( $actionLink ) && $actionLink <> '' ) { ?>
			<h3 class="button-title">
				<a href="<?php echo $actionLink; ?>" class="button"><?php echo $actionButton; ?></a>
			</h3>
		<?php } ?>
	</div>
</div> <!-- .action-content  -->

<?php
		echo $after_widget;
	}

  /*Saves the settings. */
    function update($new_instance, $old_instance){
		$instance = $old_instance;
		$instance['title'] = stripslashes($new_instance['title']);
		$instance['actionContent'] = stripslashes($new_instance['actionContent']);
		$instance['actionLink'] = stripslashes($new_instance['actionLink']);
		$instance['actionButton'] = stripslashes($new_instance['actionButton']);

		return $instance;
	}

  /*Creates the form for the widget in the back-end. */
    function form($instance){
		//Defaults
		$instance = wp_parse_args( (array) $instance, array('title'=>'Call to Action Title', 'actionContent'=>'Example Text', 'actionLink' => '', 'actionButton' => 'Take Action Now' ) );

		$title = htmlspecialchars($instance['title']);
		$actionContent = htmlspecialchars($instance['actionContent']);
		$actionLink = htmlspecialchars($instance['actionLink']);
		$actionButton = htmlspecialchars($instance['actionButton']);

		# Title
		echo '<p><label for="' . $this->get_field_id('title') . '">' . 'Title:' . '</label><input class="widefat" id="' . $this->get_field_id('title') . '" name="' . $this->get_field_name('title') . '" type="text" value="' . $title . '" /></p>';
		# Action Text
		echo '<p><label for="' . $this->get_field_id('actionContent') . '">' . 'Text:' . '</label><textarea cols="10" rows="10" class="widefat" id="' . $this->get_field_id('actionContent') . '" name="' . $this->get_field_name('actionContent') . '" >'. $actionContent .'</textarea></p>';
		# Action Link
		echo '<p><label for="' . $this->get_field_id('actionLink') . '">' . 'Button Link:' . '</label><textarea cols="10" rows="2" class="widefat" id="' . $this->get_field_id('actionLink') . '" name="' . $this->get_field_name('actionLink') . '" >'. $actionLink .'</textarea></p>';
		# Action Button
		echo '<p><label for="' . $this->get_field_id('actionButton') . '">' . 'Button Text:' . '</label><textarea cols="10" rows="2" class="widefat" id="' . $this->get_field_id('actionButton') . '" name="' . $this->get_field_name('actionButton') . '" >'. $actionButton .'</textarea></p>';
	}

}// end ActionWidget class

function ActionWidgetInit() {
  register_widget('ActionWidget');
}

add_action('widgets_init', 'ActionWidgetInit');

?>