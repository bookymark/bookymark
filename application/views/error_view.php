<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * error_view
 * 
 * The inner error view called from the errors/error_404.php template.
 * 
 * @license		http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @author		Mike Funk
 * @link		http://mikefunk.com
 * @email		mike@mikefunk.com
 * 
 * @file		error_view.php
 * @version		1.0
 * @date		02/18/2012
 * 
 * Copyright (c) 2012
 */
?>
<section>
<div class="container">
<div class="page-header">
<h1><?=$title?></h1>
</div><!--page-header-->
<p><?=$message?></p>
</div><!--container-->
</section>
<?php
/* End of file error_view.php */
/* Location: ./base_codeigniter_app/application/views/error_view.php */