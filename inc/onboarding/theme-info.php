<?php
/**
 * Theme info page
 *
 * @package vonline
 */

/**
 * Recommended plugins
 */
require get_template_directory() . '/inc/onboarding/plugins/class-vonline-recommended-plugins.php'; 

//Add the theme page
add_action('admin_menu', 'vonline_add_theme_info');
function vonline_add_theme_info(){

	if ( !current_user_can('install_plugins') ) {
		return;
	}

	$theme_info = add_theme_page( __('vonline Info','vonline'), __('vonline Info','vonline'), 'manage_options', 'vonline-info.php', 'vonline_info_page' );
	add_action( 'load-' . $theme_info, 'vonline_info_hook_styles' );
}

//Callback
function vonline_info_page() {
	$user = wp_get_current_user();
?>
	<div class="info-container">
		<p class="hello-user"><?php echo sprintf( __( 'Hello, %s,', 'vonline' ), '<span>' . esc_html( ucfirst( $user->display_name ) ) . '</span>' ); ?></p>
		<h1 class="info-title"><?php echo __( 'Welcome to vonline', 'vonline' ); ?><span class="info-version"><?php echo 'v' . esc_html( wp_get_theme()->version ); ?></span></h1>
		<p class="welcome-desc"><?php _e( 'vonline is now installed and ready to go. To help you with the next step, we’ve gathered together on this page all the resources you might need. We hope you enjoy using vonline. You can always come back to this page by going to <strong>Appearance > vonline Info</strong>.', 'vonline' ); ?>
	

		<div class="vonline-theme-tabs">

			<div class="vonline-tab-nav nav-tab-wrapper">
				<a href="#begin" data-target="begin" class="nav-button nav-tab begin active"><?php esc_html_e( 'Getting started', 'vonline' ); ?></a>
				<a href="#support" data-target="support" class="nav-button support nav-tab"><?php esc_html_e( 'Support', 'vonline' ); ?></a>
				<a href="#table" data-target="table" class="nav-button table nav-tab"><?php esc_html_e( 'Free vs Pro', 'vonline' ); ?></a>
			</div>

			<div class="vonline-tab-wrapper">

				<div id="#begin" class="vonline-tab begin show">
					
					<div class="plugins-row">
						<h2><span class="step-number">1</span><?php esc_html_e( 'Install recommended plugins', 'vonline' ); ?></h2>
						<p><?php _e( 'Install one plugin at a time. Wait for each plugin to activate.', 'vonline' ); ?></p>

						<div style="margin: 0 -15px;overflow:hidden;display:flex;">
							<div class="plugin-block">
								<?php $plugin = 'vonline-toolbox'; ?>
								<h3>vonline Toolbox</h3>
								<p><?php esc_html_e( 'vonline Toolbox is a free addon for the vonline WordPress theme. It helps with things like demo import and additional Elementor widgets.', 'vonline' ); ?></p>
								<?php echo vonline_Recommended_Plugins::instance()->get_button_html( $plugin ); ?>
							</div>

							<div class="plugin-block">
								<?php $plugin = 'elementor'; ?>
								<h3>Elementor</h3>
								<p><?php esc_html_e( 'Elementor will enable you to create pages by adding widgets to them using drag and drop.', 'vonline' ); ?>
								<?php 
								//If Elementor is active, show a link to Elementor's getting started video
								$is_elementor_active = vonline_Recommended_Plugins::instance()->check_plugin_state( $plugin );
								if ( $is_elementor_active == 'deactivate' ) {
									echo '<a target="_blank" href="https://www.youtube.com/watch?v=nZlgNmbC-Cw&feature=emb_title">' . __( 'First time Elementor user?', 'vonline') . '</a>';
								}; ?>
								</p>
								<?php echo vonline_Recommended_Plugins::instance()->get_button_html( $plugin ); ?>
							</div>

							<div class="plugin-block">
								<?php $plugin = 'one-click-demo-import'; ?>
								<h3>One Click Demo Import</h3>
								<p><?php esc_html_e( 'This plugin is useful for importing our demos. You can uninstall it after you\'re done with it.', 'vonline' ); ?></p>
								<?php echo vonline_Recommended_Plugins::instance()->get_button_html( $plugin ); ?>
							</div>
						</div>
					</div>
					<hr style="margin-top:25px;margin-bottom:25px;">
					
					<div class="import-row">
						<h2><span class="step-number">2</span><?php esc_html_e( 'Import demo content (optional)', 'vonline' ); ?></h2>
						<p><?php esc_html_e( 'Importing the demo will make your website look like our website.', 'vonline' ); ?></p>
						<?php 
							$plugin = 'vonline-toolbox';
							$is_vonline_toolbox_active = vonline_Recommended_Plugins::instance()->check_plugin_state( $plugin );
							$plugin = 'elementor';
							$is_elementor_active = vonline_Recommended_Plugins::instance()->check_plugin_state( $plugin );
							$plugin = 'one-click-demo-import';
							$is_ocdi_active = vonline_Recommended_Plugins::instance()->check_plugin_state( $plugin );														
						?>
							<?php if ( $is_vonline_toolbox_active == 'deactivate' && $is_elementor_active == 'deactivate' && $is_ocdi_active == 'deactivate' ) : ?>
								<a class="button button-primary button-large" href="<?php echo admin_url( 'themes.php?page=pt-one-click-demo-import.php' ); ?>"><?php esc_html_e( 'Go to the automatic importer', 'vonline' ); ?></a>
							<?php else : ?>
								<p class="vonline-notice"><?php esc_html_e( 'All recommended plugins need to be installed and activated for this step.', 'vonline' ); ?></p>
							<?php endif; ?>
					</div>
					<hr style="margin-top:25px;margin-bottom:25px;">

					<div class="customizer-row">
						<h2><span class="step-number">3</span><?php esc_html_e( 'Styling with the Customizer', 'vonline' ); ?></h2>
						<p><?php esc_html_e( 'Theme elements can be styled from the Customizer. Use the links below to go straight to the section you want.', 'vonline' ); ?></p>		
						<p><a target="_blank" href="<?php echo esc_url( admin_url( '/customize.php?autofocus[section]=title_tagline' ) ); ?>"><?php esc_html_e( 'Change your site title or add a logo', 'vonline' ); ?></a></p>
						<p><a target="_blank" href="<?php echo esc_url( admin_url( '/customize.php?autofocus[panel]=vonline_header_panel' ) ); ?>"><?php esc_html_e( 'Header options', 'vonline' ); ?></a></p>
						<p><a target="_blank" href="<?php echo esc_url( admin_url( '/customize.php?autofocus[panel]=vonline_colors_panel' ) ); ?>"><?php esc_html_e( 'Color options', 'vonline' ); ?></a></p>
						<p><a target="_blank" href="<?php echo esc_url( admin_url( '/customize.php?autofocus[section]=vonline_fonts' ) ); ?>"><?php esc_html_e( 'Font options', 'vonline' ); ?></a></p>
						<p><a target="_blank" href="<?php echo esc_url( admin_url( '/customize.php?autofocus[section]=blog_options' ) ); ?>"><?php esc_html_e( 'Blog options', 'vonline' ); ?></a></p>		
					</div>


				</div>

				<div id="#support" class="vonline-tab support">
					<div class="column-wrapper">
						<div class="tab-column">
						<span class="dashicons dashicons-sos"></span>
						<h3><?php esc_html_e( 'Visit our forums', 'vonline' ); ?></h3>
						<p><?php esc_html_e( 'Need help? Go ahead and visit our support forums and we\'ll be happy to assist you with any theme related questions you might have', 'vonline' ); ?></p>
							<a href="https://forums.vonline.com/c/vonline" target="_blank"><?php esc_html_e( 'Visit the forums', 'vonline' ); ?></a>				
							</div>
						<div class="tab-column">
						<span class="dashicons dashicons-book-alt"></span>
						<h3><?php esc_html_e( 'Documentation', 'vonline' ); ?></h3>
						<p><?php esc_html_e( 'Our documentation can help you learn how to use the theme and also provides you with premade code snippets and answers to FAQs.', 'vonline' ); ?></p>
						<a href="http://docs.vonline.com/category/8-vonline" target="_blank"><?php esc_html_e( 'See the Documentation', 'vonline' ); ?></a>
						</div>
					</div>
				</div>
				<div id="#table" class="vonline-tab table">
				<table class="widefat fixed featuresList"> 
				   <thead> 
					<tr> 
					 <td><strong><h3><?php esc_html_e( 'Feature', 'vonline' ); ?></h3></strong></td>
					 <td style="width:20%;"><strong><h3><?php esc_html_e( 'vonline', 'vonline' ); ?></h3></strong></td>
					 <td style="width:20%;"><strong><h3><?php esc_html_e( 'vonline Pro', 'vonline' ); ?></h3></strong></td>
					</tr> 
				   </thead> 
				   <tbody> 
					<tr> 
					 <td><?php esc_html_e( 'Access to all Google Fonts', 'vonline' ); ?></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Responsive', 'vonline' ); ?></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Parallax backgrounds', 'vonline' ); ?></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Social Icons', 'vonline' ); ?></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Slider, image or video header', 'vonline' ); ?></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Front Page Blocks', 'vonline' ); ?></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Translation ready', 'vonline' ); ?></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Polylang integration', 'vonline' ); ?></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Color options', 'vonline' ); ?></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Blog options', 'vonline' ); ?></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Widgetized footer', 'vonline' ); ?></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Background image support', 'vonline' ); ?></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Footer Credits option', 'vonline' ); ?></td>
					 <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Extra widgets (timeline, latest news in carousel, pricing tables, a new employees widget and a new contact widget)', 'vonline' ); ?></td>
					 <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Extra Customizer Options (Front Page Section Titles, Single Employees, Single Projects, Header Contact Info, Buttons)', 'vonline' ); ?></td>
					 <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Header support for Crelly Slider', 'vonline' ); ?></td>
					 <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Header support for shortcodes', 'vonline' ); ?></td>
					 <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Single Post/Page Options', 'vonline' ); ?></td>
					 <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'WooCommerce compatible', 'vonline' ); ?></td>
					 <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( '5 Extra Page Templates (Contact, Featured Header - Default, Featured Header - Wide, No Header - Default, No Header - Wide)', 'vonline' ); ?></td>
					 <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Priority support', 'vonline' ); ?></td>
					 <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					 <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
				   </tbody> 
				  </table>
				  <p style="text-align: right;"><a class="button button-primary button-large" href="https://vanstoneonline.com/theme/vonline-pro/?utm_source=theme_table&utm_medium=button&utm_campaign=vonline"><?php esc_html_e('View vonline Pro', 'vonline'); ?></a></p>
				</div>		
			</div>
		</div>

		<div class="vonline-theme-sidebar">
			<div class="vonline-sidebar-widget">
				<h3>Review vonline</h3>
				<p><?php echo esc_html__( 'It makes us happy to hear from our users. We would appreciate a review.', 'vonline' ); ?> </p>	
				<p><a target="_blank" href="https://wordpress.org/support/theme/vonline/reviews/"><?php echo esc_html__( 'Submit a review here', 'vonline' ); ?></a></p>		
			</div>
			<hr style="margin-top:25px;margin-bottom:25px;">
			<div class="vonline-sidebar-widget">
				<h3>Changelog</h3>
				<p><?php echo esc_html__( 'Keep informed about each theme update.', 'vonline' ); ?> </p>	
				<p><a target="_blank" href="https://vanstoneonline.com/changelog/vonline"><?php echo esc_html__( 'See the changelog', 'vonline' ); ?></a></p>		
			</div>	
			<hr style="margin-top:25px;margin-bottom:25px;">
			<div class="vonline-sidebar-widget">
				<h3>Upgrade to vonline Pro</h3>
				<p><?php echo esc_html__( 'Take vonline to a whole other level by upgrading to the Pro version.', 'vonline' ); ?> </p>	
				<p><a target="_blank" href="https://vanstoneonline.com/theme/vonline-pro/?utm_source=theme_info&utm_medium=link&utm_campaign=vonline"><?php echo esc_html__( 'Discover vonline Pro', 'vonline' ); ?></a></p>		
			</div>									
		</div>
	</div>
<?php
}

//Styles
function vonline_info_hook_styles(){
	add_action( 'admin_enqueue_scripts', 'vonline_info_page_styles' );
}
function vonline_info_page_styles() {
	wp_enqueue_style( 'vonline-info-style', get_template_directory_uri() . '/inc/onboarding/assets/info-page.css', array(), true );

	wp_enqueue_script( 'vonline-info-script', get_template_directory_uri() . '/inc/onboarding/assets/info-page.js', array('jquery'),'', true );

	wp_enqueue_script( 'plugin-install' );
	wp_enqueue_script( 'updates' );	

}