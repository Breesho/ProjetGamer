<div class="row p-2 m-auto">
    <div class="col-md-12">
      	<div class="box box-info">
            <div class="box-header with-border">
              	<h3 class="box-title">Modification Compte</h3>
            </div>
			<?php echo form_open('user/edit/'.$user['ID_User']); ?>
			<div class="box-body">
				<div class="row clearfix d-flex flex-column">
					<div class="col-md-6">
						<div class="form-group">
							<input type="checkbox" name="User_Is_Email_Verified" value="1" <?php echo ($user['User_Is_Email_Verified']==1 ? 'checked="checked"' : ''); ?> id='User_Is_Email_Verified' />
							<label for="User_Is_Email_Verified" class="control-label">User Is Email Verified</label>
						</div>
					</div>
					<div class="col-md-6">
						<label for="User_Mail" class="control-label"><span class="text-danger">*</span>User Mail</label>
						<div class="form-group">
							<input type="text" name="User_Mail" value="<?php echo ($this->input->post('User_Mail') ? $this->input->post('User_Mail') : $user['User_Mail']); ?>" class="form-control" id="User_Mail" />
							<span class="text-danger"><?php echo form_error('User_Mail');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="User_Password" class="control-label"><span class="text-danger">*</span>User Password</label>
						<div class="form-group">
							<input type="text" name="User_Password" value="<?php echo $this->input->post('User_Password'); ?>" class="form-control" id="User_Password" />
							<span class="text-danger"><?php echo form_error('User_Password');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="User_UserName" class="control-label"><span class="text-danger">*</span>User UserName</label>
						<div class="form-group">
							<input type="text" name="User_UserName" value="<?php echo ($this->input->post('User_UserName') ? $this->input->post('User_UserName') : $user['User_UserName']); ?>" class="form-control" id="User_UserName" />
							<span class="text-danger"><?php echo form_error('User_UserName');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="User_Picture" class="control-label"><span class="text-danger">*</span>User Picture</label>
						<div class="form-group">
							<input type="text" name="User_Picture" value="<?php echo ($this->input->post('User_Picture') ? $this->input->post('User_Picture') : $user['User_Picture']); ?>" class="form-control" id="User_Picture" />
							<span class="text-danger"><?php echo form_error('User_Picture');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="User_Verification_Key" class="control-label">User Verification Key</label>
						<div class="form-group">
							<input type="text" name="User_Verification_Key" value="<?php echo ($this->input->post('User_Verification_Key') ? $this->input->post('User_Verification_Key') : $user['User_Verification_Key']); ?>" class="form-control" id="User_Verification_Key" />
							<span class="text-danger"><?php echo form_error('User_Verification_Key');?></span>
						</div>
					</div>
					<div class="col-md-6">
						<label for="User_CreateAt" class="control-label">User CreateAt</label>
						<div class="form-group">
							<input type="text" name="User_CreateAt" value="<?php echo ($this->input->post('User_CreateAt') ? $this->input->post('User_CreateAt') : $user['User_CreateAt']); ?>" class="form-control" id="User_CreateAt" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="User_DeleteAt" class="control-label">User DeleteAt</label>
						<div class="form-group">
							<input type="text" name="User_DeleteAt" value="<?php echo ($this->input->post('User_DeleteAt') ? $this->input->post('User_DeleteAt') : $user['User_DeleteAt']); ?>" class="form-control" id="User_DeleteAt" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="User_UpdateAt" class="control-label">User UpdateAt</label>
						<div class="form-group">
							<input type="text" name="User_UpdateAt" value="<?php echo ($this->input->post('User_UpdateAt') ? $this->input->post('User_UpdateAt') : $user['User_UpdateAt']); ?>" class="form-control" id="User_UpdateAt" />
						</div>
					</div>
					<div class="col-md-6">
						<label for="ID_Role" class="control-label"><span class="text-danger">*</span>ID Role</label>
						<div class="form-group">
							<input type="text" name="ID_Role" value="<?php echo ($this->input->post('ID_Role') ? $this->input->post('ID_Role') : $user['ID_Role']); ?>" class="form-control" id="ID_Role" />
							<span class="text-danger"><?php echo form_error('ID_Role');?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
            	<button type="submit" class="btn btn-success">
					<i class="fa fa-check"></i> Save
				</button>
	        </div>				
			<?php echo form_close(); ?>
		</div>
    </div>
</div>