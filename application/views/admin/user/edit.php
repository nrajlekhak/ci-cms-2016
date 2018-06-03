<div class="modal-header">
  <h3><?php echo empty($user->id)? 'add a new user':'Edit User '.$user->name; ?></h3
</div>

<div class="modal-body">
  <div class= "loginmodal-container">
  <?php echo validation_errors(); ?>
  <?php echo form_open(); ?>
  <table class="table">
    <tr>
  		<td>Name</td>
  		<td><?php
      $nameData=array(
        'id'=>'name',
        'class'=>"form-control",
        'name'=>'name',
        'value'=>set_value('name',$user->name),
        'placeholder'=>'name',);
      echo form_input($nameData); ?></td>
	</tr>
  <tr>
      <td>Email</td>
      <td><?php
          $usernameData=array(
            'id'=>'email',
            'class'=>"form-control",
            'name'=>'email',
            'value'=>set_value('email',$user->email),
            'required'=>'required',
            'placeholder'=>'email',);
       echo form_input($usernameData); ?></td>
    </tr>

    <tr>
      <td>Password</td>
      <td><?php
        $passwordData=array(
          'id'=>'password',
          'class'=>"form-control",
          'name'=>'password',
          'value'=>set_value('password'),
          'placeholder'=>'password',);
       echo form_password($passwordData); ?></td>
    </tr>

    <tr>
		<td>Confirm password</td>
		<td><?php
    $ConfirmPasswordData=array(
      'id'=>'password_confirm',
      'class'=>"form-control",
      'name'=>'confirm_password',
      'value'=>set_value('confirm_password'),
      'placeholder'=>'re-enter password',);
     echo form_password($ConfirmPasswordData); ?></td>
	</tr>

    <tr>
      <td></td>
      <td><?php echo form_Submit('submit','submit', 'class="btn btn-primary"'); ?></td>
    </tr>
  </table>
  <?php echo form_close(); ?>
</div>
</div>
