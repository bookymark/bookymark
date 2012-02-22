<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * list_bookmarks_view
 * 
 * Shows a list of bookmarks paginated.
 * 
 * @license		http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @author		Mike Funk
 * @link		http://mikefunk.com
 * @email		mike@mikefunk.com
 * 
 * @file		list_bookmarks_view.php
 * @version		1.0
 * @date		02/18/2012
 * 
 * Copyright (c) 2012
 */

// --------------------------------------------------------------------------
?>
    <section>
        <div class="container">
            <div class="page-header">
                <h1>My Bookymarks</h1>
            </div><!--page-header-->
			<div class="notification_wrap">
<?php
// login success notification
if ($this->input->get('notification') == 'login_success'):
?>
			<div class="alert alert-success fade in" data-dismiss="alert"><a class="close" href="#">&times;</a>You have been logged in.</div>
<?php endif; ?>
			</div><!--notification_wrap-->
<?php
// if permission allows
if ($this->session->userdata('can_add_bookmarks')):
?>
            <p><a href="<?=base_url()?>bookmarks/add" class="btn btn-primary"><i class="icon-plus icon-white"></i> Add Bookymark</a></p>
<?php endif; ?>
            <?php
            // loop through bookmarks
            if ($bookmarks->num_rows() > 0):
                $result = $bookmarks->result();
            ?>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>URL</th>

                        <th>Description</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead><?php 
                    foreach ($result as $item):
                ?>

                <tr>
                    <td><?=$item->url?></td>

                    <td><?=$item->description?></td>
                    <td><div class="actions pull-right">
<?php
// if permission allows
if ($this->session->userdata('can_edit_bookmarks')):
?>
                    <a href="<?=base_url()?>bookmarks/edit/<?=$item->id?>" class="btn btn-mini"><i class="icon-edit"></i> Edit</a> 
<?php endif; 
// if permission allows
if ($this->session->userdata('can_delete_bookmarks')):
?>       
                    <a href="<?=base_url()?>bookmarks/delete/<?=$item->id?>" class="btn btn-mini"><i class="icon-trash"></i> Delete</a>
<?php endif; ?>
                    </div><!--actions--></td>
                </tr><?php 
                    endforeach;
                ?>
            </table>
			<?=$this->pagination->create_links()?>
            <?php
            else:
            ?>

            <div class="alert alert-error ">
                No bookymarks found. Add one!
            </div><?php
            endif; 
            ?>
        </div><!--container-->
    </section>
<?php
/* End of file list_bookmarks_view.php */
/* Location: ./bookymark/application/views/list_bookmarks_view.php */