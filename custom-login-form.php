<?php
/*
Plugin Name: Custom Login Form
Description: Customize the WordPress login form.
Author: Happy Brain
Author URI: https://www.happybrain.it
Version: 2.5
*/
require_once( plugin_dir_path( __FILE__ ) . 'settings.php' );
$clf_options = get_option( 'clf_options' );
function clf_login_stylesheet() {
	wp_enqueue_style( 'custom-login', plugin_dir_url( __FILE__ ) . 'style.css' );
	wp_enqueue_script( 'custom-login', plugin_dir_url( __FILE__ ) . 'script.min.js', array( 'jquery' ), 2.2 );
}
add_action( 'login_enqueue_scripts', 'clf_login_stylesheet' );
function clf_login_logo_url() {
	return home_url();
}
add_filter( 'login_headerurl', 'clf_login_logo_url' );
function clf_login_logo_url_title() {
	return get_bloginfo('name');
}
add_filter( 'login_headertitle', 'clf_login_logo_url_title' );
function clf_login_style() { ?>
	<style type="text/css">
		<?php if ($GLOBALS['clf_options']['clf_text_field_20']) { ?>
			#login h1 a, .login h1 a {
				background-image: url(<?php echo $GLOBALS['clf_options']['clf_text_field_20']; ?>) !important;
				<?php if ($GLOBALS['clf_options']['clf_text_field_26'] && $GLOBALS['clf_options']['clf_text_field_27']) { ?>
					width:<?php echo $GLOBALS['clf_options']['clf_text_field_26']; ?>px !important;
					height:<?php echo $GLOBALS['clf_options']['clf_text_field_27']; ?>px !important;
					background-size: <?php echo $GLOBALS['clf_options']['clf_text_field_26']; ?>px <?php echo $GLOBALS['clf_options']['clf_text_field_27']; ?>px !important;
				<?php } ?>
			}
			<?php
		}
		if ($GLOBALS['clf_options']['clf_text_field_21']) { ?>
			body.login div#login form#loginform p.submit input#wp-submit {
				background:<?php echo $GLOBALS['clf_options']['clf_text_field_21']; ?> !important;
				border-color:<?php echo $GLOBALS['clf_options']['clf_text_field_21']; ?> !important;
			}
			body.login div#login form#loginform input:focus {
				border-color:<?php echo $GLOBALS['clf_options']['clf_text_field_21']; ?> !important;
			}
			#login_footer .fa {
				color:<?php echo $GLOBALS['clf_options']['clf_text_field_21']; ?> !important;
			}
			<?php
		}
		if ($GLOBALS['clf_options']['clf_text_field_24']) { ?>
			body {
				background: <?php echo $GLOBALS['clf_options']['clf_text_field_24']; ?> !important;
			}
			<?php
		}
		if ($GLOBALS['clf_options']['clf_text_field_25']) { ?>
			#login_footer {
				color: <?php echo $GLOBALS['clf_options']['clf_text_field_25']; ?> !important;
			}
			<?php
		}
		?>
	</style>
	<?php
}
add_action( 'login_enqueue_scripts', 'clf_login_style' );
if ($GLOBALS['clf_options']['clf_text_field_23']) {
	function clf_login_footer() {
		echo '<p id="login_footer">' . $GLOBALS['clf_options']['clf_text_field_23'] . '</p>';
	}
	add_action('login_footer', 'clf_login_footer');
}
