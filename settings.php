<?php
function clf_add_admin_menu() {
	add_options_page( 'Custom Login Form', 'Custom Login Form', 'manage_options', 'custom_login_form', 'clf_options_page' );
}
add_action( 'admin_menu', 'clf_add_admin_menu' );
function clf_options_exist() {
	if( false == get_option( 'clf_options' ) ) {
		add_option( 'clf_options' );
	}
}
function clf_options_init(  ) {
	register_setting( 'clf_page', 'clf_options' );
	add_settings_section(
		'clf_page_section',
		__( 'Settings', 'custom-login-form' ),
		'clf_options_section_callback',
		'clf_page'
	);
	add_settings_field(
		'clf_text_field_20',
		__( 'Logo URL', 'custom-login-form' ),
		'clf_text_field_20_render',
		'clf_page',
		'clf_page_section'
	);
	add_settings_field(
		'clf_text_field_26',
		__( 'Logo Width (px)', 'custom-login-form' ),
		'clf_text_field_26_render',
		'clf_page',
		'clf_page_section'
	);
	add_settings_field(
		'clf_text_field_27',
		__( 'Logo Height (px)', 'custom-login-form' ),
		'clf_text_field_27_render',
		'clf_page',
		'clf_page_section'
	);
	add_settings_field(
		'clf_text_field_21',
		__( 'Primary Color', 'custom-login-form' ),
		'clf_text_field_21_render',
		'clf_page',
		'clf_page_section'
	);
	add_settings_field(
		'clf_text_field_24',
		__( 'Background Color', 'custom-login-form' ),
		'clf_text_field_24_render',
		'clf_page',
		'clf_page_section'
	);
	add_settings_field(
		'clf_text_field_25',
		__( 'Text Color', 'custom-login-form' ),
		'clf_text_field_25_render',
		'clf_page',
		'clf_page_section'
	);
	add_settings_field(
		'clf_text_field_23',
		__( 'Footer Text', 'custom-login-form' ),
		'clf_text_field_23_render',
		'clf_page',
		'clf_page_section'
	);
}
add_action( 'admin_init', 'clf_options_init' );
function clf_text_field_20_render() {
	$clf_options = get_option( 'clf_options' );
	?>
	<input type='text' name='clf_options[clf_text_field_20]' value='<?php echo $clf_options['clf_text_field_20']; ?>' class='regular-text'>
	<?php
}
function clf_text_field_21_render() {
	$clf_options = get_option( 'clf_options' );
	?>
	<input type='text' name='clf_options[clf_text_field_21]' value='<?php echo $clf_options['clf_text_field_21']; ?>' class='regular-text' placeholder='#fe3265'>
	<?php
}
function clf_text_field_24_render() {
	$clf_options = get_option( 'clf_options' );
	?>
	<input type='text' name='clf_options[clf_text_field_24]' value='<?php echo $clf_options['clf_text_field_24']; ?>' class='regular-text' placeholder='#202634'>
	<?php
}
function clf_text_field_25_render() {
	$clf_options = get_option( 'clf_options' );
	?>
	<input type='text' name='clf_options[clf_text_field_25]' value='<?php echo $clf_options['clf_text_field_25']; ?>' class='regular-text' placeholder='#9ea3a8'>
	<?php
}
function clf_text_field_23_render() {
	$clf_options = get_option( 'clf_options' );
	?>
	<input type='text' name='clf_options[clf_text_field_23]' value='<?php echo $clf_options['clf_text_field_23']; ?>' class='regular-text'>
	<?php
}
function clf_text_field_26_render() {
	$clf_options = get_option( 'clf_options' );
	?>
	<input type='text' name='clf_options[clf_text_field_26]' value='<?php echo $clf_options['clf_text_field_26']; ?>' class='regular-text' placeholder="250">
	<?php
}
function clf_text_field_27_render() {
	$clf_options = get_option( 'clf_options' );
	?>
	<input type='text' name='clf_options[clf_text_field_27]' value='<?php echo $clf_options['clf_text_field_27']; ?>' class='regular-text' placeholder="155">
	<?php
}
function clf_options_section_callback() {
	echo __( 'Customize the login form of WordPress.', 'custom-login-form' );
}
function clf_options_page() {
	?>
	<div class="wrap">
		<h2>Custom Login Form</h2>
		<form action='options.php' method='post'>
			<?php
			settings_fields( 'clf_page' );
			do_settings_sections( 'clf_page' );
			submit_button();
			?>
		</form>
	</div>
	<?php
}
?>