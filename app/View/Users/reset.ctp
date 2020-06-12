<h2 class="hightitle"><?php __('Forget Password'); ?></h2>
<h2 align="center"><?php echo __('system_name'); ?></h2>
<div class="forgetpwd form" style="margin:5px auto 5px auto;width:450px;">
<?php //echo $this->Form->create('User', array('action' => 'reset')); ?>
 
<?php
if(isset($errors)){
echo '<div class="error">';
echo "<ul>";
foreach($errors as $error){
 echo"<li><div class='error-message'>$error</div></li>";
}
echo"</ul>";
echo'</div>';
}
?>

    
    <div class="box-content">
			
        <fieldset>
<div class="alert alert-info" style="text-align: center;"> 
        <?php echo __('type_your_new_password'); ?>
</div>
<form method="post">
    <div class="controls form-vertical" style="width: 220px; margin-left: auto; margin-right: auto;">
<?php
echo $this->Form->input(__('password'),array("type"=>"password","name"=>"data[User][password]"));?>
</div>
 <div class="controls form-vertical" style="width: 220px; margin-left: auto; margin-right: auto;">   
<?php echo $this->Form->input(__('password_confirm'),array("type"=>"password","name"=>"data[User][password_confirm]"));
?>
 </div> 
<div class="form-actions">
                                                            
        <p class="center">
                <button type="submit" class="btn btn-primary"><?php echo __('save_changes'); ?></button>
        </p>



    </div>

<?php //echo $this->Form->end();?>
</form>
</div>
</fieldset>
</div>