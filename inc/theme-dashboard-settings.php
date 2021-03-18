<?php
/**
 * Theme activation.
 * @package    Vanstone_Online
 * @subpackage vonline
 * @since      1.0.0
 */

/**
 * Theme Dashboard [Free VS Pro]
 */
function vonline_free_vs_pro_html() {
	ob_start();
	?>
	<div class="thd-heading"><?php esc_html_e( 'Differences between vonline and vonline Pro', 'vonline' ); ?></div>
	<div class="thd-description"><?php esc_html_e( 'Here is the list of differences between vonline and vonline Pro:', 'vonline' ); ?></div>

	<table class="thd-table-compare">
		<thead>
			<tr>
				<th><?php esc_html_e( 'Feature', 'vonline' ); ?></th>
				<th><?php esc_html_e( 'vonline', 'vonline' ); ?></th>
				<th><?php esc_html_e( 'vonline Pro', 'vonline' ); ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php esc_html_e( 'Access to all Google Fonts', 'vonline' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Responsive', 'vonline' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Parallax backgrounds', 'vonline' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Social Icons', 'vonline' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Slider, image or video header', 'vonline' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Front Page Blocks', 'vonline' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Translation ready', 'vonline' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Polylang integration', 'vonline' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Color options', 'vonline' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Blog options', 'vonline' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Widgetized footer', 'vonline' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Background image support', 'vonline' ); ?></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Footer Credits option', 'vonline' ); ?></td>
				<td><span class="thd-badge thd-badge-warning"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Extra widgets (timeline, latest news in carousel, pricing table, a new employees widget and a new contact widget)', 'vonline' ); ?></td>
				<td><span class="thd-badge thd-badge-warning"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Extra Customizer Options (Front Page Section Titles, Single Employees, Single Projects, Header Contact Info, Buttons)', 'vonline' ); ?></td>
				<td><span class="thd-badge thd-badge-warning"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Header support for Smart Slider 3', 'vonline' ); ?></td>
				<td><span class="thd-badge thd-badge-warning"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Header support for shortcodes ', 'vonline' ); ?></td>
				<td><span class="thd-badge thd-badge-warning"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Single Post/Page Options ', 'vonline' ); ?></td>
				<td><span class="thd-badge thd-badge-warning"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'WooCommerce compatible', 'vonline' ); ?></td>
				<td><span class="thd-badge thd-badge-warning"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( '5 Extra Page Templates (Contact, Featured Header - Default, Featured Header - Wide, No Header - Default, No Header - Wide) ', 'vonline' ); ?></td>
				<td><span class="thd-badge thd-badge-warning"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Priority support ', 'vonline' ); ?></td>
				<td><span class="thd-badge thd-badge-warning"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="thd-badge thd-badge-success"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
		</tbody>
	</table>

	<div class="thd-separator"></div>

	<p>
		<a href="https://vanstoneonline.com/theme/vonline-pro/?utm_source=theme_table&utm_medium=button&utm_campaign=vonline" class="thd-button button">
			<?php esc_html_e( 'Get vonline Pro Today', 'vonline' ); ?>
		</a>
	</p>
	<?php
	return ob_get_clean();
}

/**
 * Theme Dashboard Settings
 *
 * @param array $settings The settings.
 */
function vonline_dashboard_settings( $settings ) {

	// Starter.
	$settings['starter_plugin_slug'] = 'vonline-starter-sites';

	// Hero.
	$settings['hero_title']       = esc_html__( 'Welcome to vonline', 'vonline' );
	$settings['hero_themes_desc'] = esc_html__( 'vonline is now installed and ready to use. Click on Starter Sites to get off to a flying start with one of our pre-made templates, or go to Theme Dashboard to get an overview of everything.', 'vonline' );
	$settings['hero_desc']        = esc_html__( 'vonline is now installed and ready to go. To help you with the next step, we\'ve gathered together on this page all the resources you might need. We hope you enjoy using vonline.', 'vonline' );
	$settings['hero_image']       = get_template_directory_uri() . '/theme-dashboard/images/welcome-banner@2x.png';

	// Tabs.
	$settings['tabs'] = array(
		array(
			'name'    => esc_html__( 'Theme Features', 'vonline' ),
			'type'    => 'features',
			'visible' => array( 'free', 'pro' ),
			'data'    => array(
				array(
					'name'          => esc_html__( 'Change Site Title or Logo', 'vonline' ),
					'type'          => 'free',
					'customize_uri' => '/wp-admin/customize.php?autofocus[section]=title_tagline',
				),
				array(
					'name'          => esc_html__( 'Header Options', 'vonline' ),
					'type'          => 'free',
					'customize_uri' => '/wp-admin/customize.php?autofocus[panel]=vonline_header_panel',
				),
				array(
					'name'          => esc_html__( 'Color Options', 'vonline' ),
					'type'          => 'free',
					'customize_uri' => '/wp-admin/customize.php?autofocus[panel]=vonline_colors_panel',
				),
				array(
					'name'          => esc_html__( 'Font Options', 'vonline' ),
					'type'          => 'free',
					'customize_uri' => '/wp-admin/customize.php?autofocus[section]=vonline_fonts',
				),
				array(
					'name'          => esc_html__( 'Blog Options', 'vonline' ),
					'type'          => 'free',
					'customize_uri' => '/wp-admin/customize.php?autofocus[section]=blog_options',
				),
				array(
					'name'          => esc_html__( 'Footer Credits', 'vonline' ),
					'type'          => 'pro',
					'customize_uri' => '/wp-admin/customize.php?autofocus[section]=vonline_footer_credits',
				),
				array(
					'name'          => esc_html__( 'Footer Contact', 'vonline' ),
					'type'          => 'pro',
					'customize_uri' => '/wp-admin/customize.php?autofocus[section]=vonline_footer_contact',
				),
				array(
					'name'          => esc_html__( 'Front Page Section Titles', 'vonline' ),
					'type'          => 'pro',
					'customize_uri' => '/wp-admin/customize.php?autofocus[section]=vonline_fp_titles',
				),
				array(
					'name'          => esc_html__( 'Single Employees', 'vonline' ),
					'type'          => 'pro',
					'customize_uri' => '/wp-admin/customize.php?autofocus[section]=vonline_single_employees',
				),
				array(
					'name'          => esc_html__( 'Single Projects', 'vonline' ),
					'type'          => 'pro',
					'customize_uri' => '/wp-admin/customize.php?autofocus[section]=vonline_single_projects',
				),
				array(
					'name'          => esc_html__( 'Header Contact Info', 'vonline' ),
					'type'          => 'pro',
					'customize_uri' => '/wp-admin/customize.php?autofocus[section]=vonline_contact_info',
				),
				array(
					'name'          => esc_html__( 'Buttons', 'vonline' ),
					'type'          => 'pro',
					'customize_uri' => '/wp-admin/customize.php?autofocus[section]=vonline_buttons',
				),
				array(
					'name'          => esc_html__( 'Extra Widget Area', 'vonline' ),
					'type'          => 'pro',
					'customize_uri' => '/wp-admin/customize.php?autofocus[section]=vonline_extra_widget_area',
				),
				array(
					'name'          => esc_html__( 'Google Maps', 'vonline' ),
					'type'          => 'pro',
					'customize_uri' => '/wp-admin/customize.php?autofocus[section]=vonline_pro_maps',
				),
			),
		),
		array(
			'name'    => esc_html__( 'Free vs PRO', 'vonline' ),
			'type'    => 'html',
			'visible' => array( 'free' ),
			'data'    => vonline_free_vs_pro_html(),
		),
		array(
			'name'    => esc_html__( 'Performance', 'vonline' ),
			'type'    => 'performance',
			'visible' => array( 'free', 'pro' ),
		),
	);

	// Documentation.
	$settings['documentation_link'] = 'https://docs.vonline.com/category/8-vonline';

	// Promo.
	$settings['promo_title']  = esc_html__( 'Upgrade to Pro', 'vonline' );
	$settings['promo_desc']   = esc_html__( 'Take vonline to a whole other level by upgrading to the Pro version.', 'vonline' );
	$settings['promo_button'] = esc_html__( 'Discover vonline Pro', 'vonline' );
	$settings['promo_link']   = 'https://vanstoneonline.com/theme/vonline-pro/?utm_source=theme_info&utm_medium=link&utm_campaign=vonline';

	// Review.
	$settings['review_link']       = 'https://wordpress.org/support/theme/vonline/reviews/';
	$settings['suggest_idea_link'] = 'https://vonline-47cb.nolt.io/';

	// Support.
	$settings['support_link']     = 'https://forums.vonline.com/';
	$settings['support_pro_link'] = 'https://vanstoneonline.com/theme/vonline-pro/?utm_source=theme_info&utm_medium=link&utm_campaign=vonline';

	// Community.
	$settings['community_link'] = 'https://www.facebook.com/groups/vonline';

	$theme = wp_get_theme();
	// Changelog.
	$settings['changelog_version'] = $theme->version;
	$settings['changelog_link']    = 'https://vanstoneonline.com/changelog/vonline/';

	return $settings;
}
add_filter( 'thd_register_settings', 'vonline_dashboard_settings' );

/**
 * Starter Settings
 *
 * @param array $settings The settings.
 */
function vonline_demos_settings( $settings ) {

	$settings['categories'] = array(
		'business' 	=> 'Business',
		'portfolio' => 'Portfolio',
		'ecommerce' => 'eCommerce',
		'event' 	=> 'Events',
	);	

	$settings['builders'] = array(
		'elementor' => 'Elementor',
	);		

	// Pro.
	$settings['pro_label'] = esc_html__( 'Get vonline Pro', 'vonline' );
	$settings['pro_link']  = 'https://vanstoneonline.com/theme/vonline-pro/?utm_source=theme_table&utm_medium=button&utm_campaign=vonline';

	return $settings;
}
add_filter( 'atss_register_demos_settings', 'vonline_demos_settings' );
