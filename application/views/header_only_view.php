<div class="navbar navbar-fixed-top">
<div class="navbar-inner">
    <div class="fill">
      <div class="container">
        <a class="brand" href="#/admin/home">Bookymark <?php /*<sup>&reg;</sup> */ ?></a>
<?php
// logged in text
if (is_callable('auth_username')):
	if (auth_username() !== FALSE):
?>
<p class="navbar-text pull-right"><i class="icon-user icon-white"></i> Logged in as <strong><?=auth_username()?></strong>. <a href="<?=base_url()?>home/logout"><i class="icon-share icon-white"></i> Logout</a></p>
<?php 
	endif; 
endif;
?>
        </div><!--container-->
        </div><!--fill-->
        </div><!--navbar-inner-->
</div><!--navbar-->
