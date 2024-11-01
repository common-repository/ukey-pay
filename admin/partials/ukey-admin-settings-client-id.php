<?php

/**
 * Client ID field
 *
 * WordPress has magic interaction with the following keys: label_for, class.
 * - the "label_for" key value is used for the "for" attribute of the <label>.
 * - the "class" key value is used for the "class" attribute of the <tr> containing the field.
 *
 * @link       https://ukey.app
 * @since      1.0.0
 *
 * @package    UKey
 * @subpackage UKey/admin/partials
 */

// Get the value of the setting we've registered with register_setting()
$options = get_option( 'ukey_settings' );
?>

<input name="ukey_settings[<?php echo esc_attr( $args['label_for'] ); ?>]"
       type="text"       
       value="<?php echo esc_attr($options[ $args['label_for'] ] ); ?>"/>
