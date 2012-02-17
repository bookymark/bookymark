<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * encrypt_helper
 * 
 * Formerly in admin_model and then users_model.
 * 
 * @license		Copyright Xulon Press, Inc. All Rights Reserved.
 * @author		Xulon Press
 * @link		http://xulonpress.com
 * @email		info@xulonpress.com
 * 
 * @file		
 * @version		1.0
 * @date		10/14/2011
 * 
 * Copyright (c) 2011
 */
 
// --------------------------------------------------------------------------
// !Utility functions
// --------------------------------------------------------------------------

/**
 * Encrypt_this
 *
 * Obfuscates the password with a session-specific salt and a
 * few other things.
 *
 * @param string  $password
 * @param int $salt (default: '')
 * @return string
 */
function encrypt_this($password, $salt = '')
{
	if ($salt == '') {
		$CI =& get_instance();
		$CI->load->helper('string');
		$salt = random_string('alnum', 64);
	}
	// return $this->_hash($salt, $password);
	
	// Prefix the password with the salt
	$hash = $salt . $password;
	// Hash the salted password a bunch of times
	for ( $i = 0; $i < 53; $i ++ ) {
		$hash = hash('sha256', $hash);
	}
	// Prefix the hash with the salt so we can find it back later
	$hash = $salt . $hash;
	// set the session variable for the salt
	return $hash;
}

// --------------------------------------------------------------------------

/* End of file encrypt_helper.php */
/* Location: ./booktrack/application/helpers/encrypt_helper.php */