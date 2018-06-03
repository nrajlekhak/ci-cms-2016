<div class="modal-header">
  <h3>login</h3>
  <p>Please login using your credentials</p>
</div>

<div class="modal-body">
  <div class= "loginmodal-container">
  <?php echo validation_errors(); ?>
  <?php echo form_open(); ?>
  <table class="table">
    <tr>
      <td>Email</td>
      <td><?php
          $usernameData=array(
            'id'=>'email',
            'class'=>"form-control",
            'name'=>'email',
            'value'=>set_value('email'),
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
          'required'=>'required',
          'placeholder'=>'password',);
       echo form_password($passwordData); ?></td>
    </tr>
    <tr>
      <td></td>
      <td><?php echo form_Submit('submit','Login', 'class="btn btn-primary"'); ?></td>
    </tr>
  </table>
  <?php echo form_close(); ?>
</div>
</div>
