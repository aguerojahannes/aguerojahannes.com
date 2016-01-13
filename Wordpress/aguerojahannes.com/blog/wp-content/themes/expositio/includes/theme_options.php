<?php/**  *	Admin styles & scripts  */add_action( 'admin_init', 'free01_admin_init' );function free01_admin_init() {   wp_register_style( 'free01_admin_css', get_bloginfo( 'template_url' ) . '/includes/theme_options.css' );   wp_register_script( 'free01_admin_js', get_bloginfo( 'template_url' ) . '/includes/theme_options.js' );}function free01_admin_styles() {   wp_enqueue_style('postbox');   wp_enqueue_style('media-upload');   wp_enqueue_style('thickbox');   wp_enqueue_style( 'free01_admin_css' );   wp_enqueue_style( 'farbtastic' );}function free01_admin_js() {   wp_enqueue_script('media-upload');   wp_enqueue_script('thickbox');   wp_enqueue_script( 'free01_admin_js' );   wp_enqueue_script( 'farbtastic' );}/**  *	Add admin pages  */function free01_options_page() {    add_theme_page( 'Theme Options', 'Theme Options', 'edit_theme_options', basename(__FILE__), 'free01_options' );    add_action( 'admin_print_styles', 'free01_admin_styles' );    add_action( 'admin_enqueue_scripts', 'free01_admin_js' );}add_action('admin_menu', 'free01_options_page');/***** Options page *****/function free01_options() {    if ( isset( $_POST['update_options'] ) ) { free01_options_update(); }  //check options update	?>    <div class="wrap free01">        <div id="icon-options-general" class="icon32"><br /></div>		<h2><?php _e('Theme Options', 'free01'); ?></h2>				<form method="post" action="">            <fieldset>                <input type="hidden" name="update_options" value="true"/>                <div id="poststuff" class="metabox-holder">                    <div class="meta-box-sortables">                        <!-- General -->                        <div class="postbox">                            <div class="handlediv" title="<?php _e('Click to toggle'); ?>">                                <br/>                            </div>                            <h3 class="hndle"><span><?php _e('General', 'free01'); ?></span></h3>                            <div class="inside">								                                <table class="form-table">                                    <tr>                                        <th scope="row"><?php _e('Favicon URL:'); ?></th>                                        <td>                                            <label for="free01_favicon_url"><input type="text" name="free01_favicon_url" id="free01_favicon_url" size="76" value="<?php echo get_option('free01_favicon_url'); ?>"/> <input id="free01_favicon_url_button" class="button" type="button" value="Upload" /></label><br/>                                            <?php _e( 'Max width 32 px', 'free01' ); ?>                                            <br/>                                            <?php                                                if ( get_option('free01_favicon_url') ) :                                                $size = getimagesize(get_option('free01_favicon_url'));                                            ?>                                                <p><img src="<?php echo get_option('free01_favicon_url'); ?>" <?php echo $size[3]; ?> alt=""/></p>                                            <?php endif; ?>                                        </td>                                    </tr>                                    <tr>                                        <th scope="row"><?php _e('Font size:'); ?></th>                                        <td>                                            <label for="free01_font_size">												<select name="free01_font_size" id="free01_font_size">													<option value="12" <?php echo get_option('free01_font_size') == 12 ? 'selected="selected"' : '' ?>> 12 </option>													<option value="14" <?php echo get_option('free01_font_size', 14) == 14 ? 'selected="selected"' : '' ?>> 14 </option>													<option value="16" <?php echo get_option('free01_font_size') == 16 ? 'selected="selected"' : '' ?>> 16 </option>													<option value="18" <?php echo get_option('free01_font_size') == 18 ? 'selected="selected"' : '' ?>> 18 </option>												</select>											</label><br/>                                            <?php _e( 'Font size of the whole theme', 'free01' ); ?>                                        </td>                                    </tr>									<tr>                                        <th scope="row"><?php _e('Font family:'); ?></th>                                        <td>                                            <label for="free01_font_family">												<select name="free01_font_family" id="free01_font_family">													<option value="Helvetica" <?php echo get_option('free01_font_family', 'Helvetica') == 'Helvetica' ? 'selected="selected"' : '' ?>> <?php echo __('Helvetica') ?> </option>													<option value="Arial" <?php echo get_option('free01_font_family') == 'Arial' ? 'selected="selected"' : '' ?>> <?php echo __('Arial') ?> </option>													<option value="Georgia" <?php echo get_option('free01_font_family') == 'Georgia' ? 'selected="selected"' : '' ?>> <?php echo __('Georgia') ?> </option>													<option value="Droid Sans Mono" <?php echo get_option('free01_font_family') == 'Droid Sans Mono' ? 'selected="selected"' : '' ?>> <?php echo __('Droid Sans Mono') ?> </option>													<option value="Arvo" <?php echo get_option('free01_font_family') == 'Arvo' ? 'selected="selected"' : '' ?>> <?php echo __('Arvo') ?> </option>													<option value="Bentham" <?php echo get_option('free01_font_family') == 'Bentham' ? 'selected="selected"' : '' ?>> <?php echo __('Bentham') ?> </option>																									</select>											</label><br/>                                            <?php _e( 'Font size of the whole theme', 'free01' ); ?>                                        </td>                                    </tr>									<tr>                                        <th scope="row"><?php _e('Text color:'); ?></th>                                        <td>                                            <label for="free01_text_color"><input type="text" name="free01_text_color" id="free01_text_color" size="8" value="<?php echo get_option('free01_text_color', '#000'); ?>" data-hex="true" /><a id="colorpicker_text_color_link" href="javascript:;"><?php echo __('Select a Color') ?></a><div id="colorpicker_text_color"></div></label><br/>                                            <?php _e( 'Main Text color', 'free01' ); ?>                                        </td>                                    </tr>									<tr>                                        <th scope="row"><?php _e('Link color:'); ?></th>                                        <td>                                            <label for="free01_link_color"><input type="text" name="free01_link_color" id="free01_link_color" size="8" value="<?php echo get_option('free01_link_color', '#000'); ?>" data-hex="true" /><a id="colorpicker_link_color_link" href="javascript:;"><?php echo __('Select a Color') ?></a><div id="colorpicker_link_color"></div></label><br/>                                            <?php _e( 'Link color of the theme', 'free01' ); ?>                                        </td>                                    </tr>									<tr>                                        <th scope="row"><?php _e('Background color:'); ?></th>                                        <td>                                            <label for="free01_bg_color"><input type="text" name="free01_bg_color" id="free01_bg_color" size="8" value="<?php echo get_option('free01_bg_color', '#fff'); ?>" data-hex="true" /><a id="colorpicker_bg_color_link" href="javascript:;"><?php echo __('Select a Color') ?></a><div id="colorpicker_bg_color"></div></label><br/>                                            <?php _e( 'Background color of the theme', 'free01' ); ?>                                        </td>                                    </tr>									<tr>                                        <th scope="row"><?php _e('Google Analytics'); ?></th>                                        <td>                                            <label for="free01_google_analytics"><textarea type="text" name="free01_google_analytics" id="free01_google_analytics" cols="63" rows="5"><?php echo get_option('free01_google_analytics', ''); ?></textarea></label><br/>                                            <?php _e( 'Copy & paste your analytics here', 'free01' ); ?>                                        </td>                                    </tr>                                </table>								<p><input type="submit" value="<?php _e('Save Changes', 'free01'); ?>" class="button button-primary"/></p>							</div>							<script type="text/javascript">								(function($) {									jQuery(function() {										jQuery('#free01_favicon_url_button').click(function() {											formfield = $(this).prev().attr('name');											tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');											return false;										});										jQuery('#colorpicker_text_color').farbtastic('#free01_text_color');										jQuery('#colorpicker_link_color').farbtastic('#free01_link_color');										jQuery('#colorpicker_bg_color').farbtastic('#free01_bg_color');																		jQuery('#colorpicker_text_color_link').click( function() {											jQuery('#colorpicker_text_color').toggle();										});										jQuery('#free01_text_color').blur( function() {											jQuery('#colorpicker_text_color').hide();										});										jQuery('#free01_text_color').focus( function() {											jQuery('#colorpicker_text_color').show();										});										jQuery('#colorpicker_link_color_link').click( function() {											jQuery('#colorpicker_link_color').toggle();										});										jQuery('#free01_link_color').blur( function() {											jQuery('#colorpicker_link_color').hide();										});										jQuery('#free01_link_color').focus( function() {											jQuery('#colorpicker_link_color').show();										});										jQuery('#colorpicker_bg_color_link').click( function() {											jQuery('#colorpicker_bg_color').toggle();										});										jQuery('#free01_bg_color').blur( function() {											jQuery('#colorpicker_bg_color').hide();										});										jQuery('#free01_bg_color').focus( function() {											jQuery('#colorpicker_bg_color').show();										});										window.send_to_editor = function(html) {											imgurl = $('img', html).attr('src');											$('#' + formfield).val(imgurl);											tb_remove();										}									})								})(jQuery)							</script>                        </div>                        <!-- /General -->																							</div>                </div>            </fieldset>        </form>				            </div><?php}function free01_options_update() {		if (isset($_POST['free01_favicon_url'])) update_option('free01_favicon_url', trim(strip_tags(($_POST['free01_favicon_url']))));	if (isset($_POST['free01_font_size'])) update_option('free01_font_size', trim(strip_tags(($_POST['free01_font_size']))));	if (isset($_POST['free01_font_family'])) update_option('free01_font_family', trim(strip_tags(($_POST['free01_font_family']))));	if (isset($_POST['free01_text_color'])) update_option('free01_text_color', trim(strip_tags(($_POST['free01_text_color']))));	if (isset($_POST['free01_link_color'])) update_option('free01_link_color', trim(strip_tags(($_POST['free01_link_color']))));	if (isset($_POST['free01_bg_color'])) update_option('free01_bg_color', trim(strip_tags(($_POST['free01_bg_color']))));	if (isset($_POST['free01_google_analytics'])) update_option('free01_google_analytics', trim(stripslashes_deep($_POST['free01_google_analytics'])));	}