<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * email config
 * 
 * Base email class configuration
 * 
 * @license		http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @author		Mike Funk
 * @link		http://mikefunk.com
 * @email		mike@mikefunk.com
 * 
 * @file		email.php
 * @version		1.0
 * @date		02/20/2012
 * 
 * Copyright (c) 2012
 */

// --------------------------------------------------------------------------

$config['mailtype'] = 'html';

$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://smtp.googlemail.com';
$config['smtp_port'] = '465';
$config['smtp_user'] = 'mikedfunk@gmail.com';//also valid for Google Apps Accounts
$config['smtp_pass'] = 'mrcgzkvqtjhzmvpq';
$config['charset'] = 'utf-8';
$config['mailtype'] = 'html';
$config['newline'] = '\r\n';

// --------------------------------------------------------------------------

/* End of file email.php */
/* Location: ./bookymark/application/config/email.php */