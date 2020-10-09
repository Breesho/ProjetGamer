<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">User Listing</h3>
            	<!-- <div class="box-tools">
                    <a href="<?php echo site_url('user/add'); ?>" class="btn btn-success btn-sm">Add</a> 
                </div> -->
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
						<th>ID</th>
						<th>Is Email Verified</th>
						<th>Mail</th>
						<th>UserName</th>
						<th>Picture</th>
						<th>Verification Key</th>
						<th>CreateAt</th>
						<th>DeleteAt</th>
						<th>UpdateAt</th>
						<th>ID Role</th>
						<th>Actions</th>
                    </tr>
                    <?php foreach($user as $u){ ?>
                    <tr>
						<td><?php echo $u['ID_User']; ?></td>
						<td><?php echo $u['User_Is_Email_Verified']; ?></td>
						<td><?php echo $u['User_Mail']; ?></td>
						<td><?php echo $u['User_UserName']; ?></td>
						<td><?php echo $u['User_Picture']; ?></td>
						<td><?php echo $u['User_Verification_Key']; ?></td>
						<td><?php echo $u['User_CreateAt']; ?></td>
						<td><?php echo $u['User_DeleteAt']; ?></td>
						<td><?php echo $u['User_UpdateAt']; ?></td>
						<td><?php echo $u['ID_Role']; ?></td>
						<td>
                            <a href="<?php echo site_url('user/edit/'.$u['ID_User']); ?>" class="btn btn-info btn-xs"><span class="fa fa-pencil"></span> Edit</a> 
                            <a href="<?php echo site_url('user/remove/'.$u['ID_User']); ?>" class="btn btn-danger btn-xs"><span class="fa fa-trash"></span> Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
                                
            </div>
        </div>
    </div>
</div>
